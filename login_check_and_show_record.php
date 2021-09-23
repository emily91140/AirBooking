<head>
	
	 <title>登入結果</title>  <!-- 網頁標題 -->
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body bgcolor="#DDDDDD"  >  
<marquee onMouseOver="this.stop()" onMouseOut="this.start()" height="50" behavior="alternate" scrolldelay="4" scrollamount="5"> <img src="pic/login_check_upper.png" width="40" height="40"> <a href="index.php">→點我前往【班次查詢系統】←</a></marquee>
<!-- ↑左右碰撞返回跑馬燈+超連結+圖片-->

<?php
	#載入跟資料庫連線的程式碼
	include 'conn_mysql.php';
?>
	
<!--<div style="position:absolute;left:40%;top:20%"> <!-- 輸出的位置：絕對路徑，靠左邊40%,靠上方20% -->
<div align="center" ><font size="6"><strong>會員登入</strong></font></div>  <!-- 置中、字體:6、粗體字 -->

<?php
	$m_user_id=$_POST['m_user_id'];
	$m_password=$_POST['m_password'];
	echo "你的用戶號碼：$m_user_id </br>";
	echo "你的密碼：$m_password </br>";
	echo"<br/>";
	echo"<br/>";
	
If($_POST['m_user_id']==""||strlen($_POST['m_user_id'])<7)
{	 echo"<br/>";
	 echo"<center><font color=red size=18><b>請輸入學生證號碼!</b></font></center>";
	 echo"<br/>";
	 echo "<center>5秒後自動導回登入頁面</center>";
	 echo '<meta http-equiv=REFRESH CONTENT=5;url=login.php>';
	 echo"<br/>";
  
}
else{
	$m_user_id =  mysqli_real_escape_string($db_link,$_POST['m_user_id']);
	$m_password = mysqli_real_escape_string($db_link,$_POST['m_password']);

	$sql3 = "SELECT * FROM `user` WHERE account = $m_user_id AND password = $m_password ";
	$result11 = mysqli_query($db_link,$sql3);
	$num=mysqli_num_rows($result11);
	if($m_user_id != null && $m_password != null ) 
	{	
		if ($num == 0){
			//登入失敗
			echo "<CENTER><font size=\"6\" color=red><strong>!失敗!</strong></font></CENTER>";
			echo "</br>";
			echo "<CENTER>帳號或密碼不正確!請確認或註冊新帳號</CENTER>";
			echo "</br>";
			#echo '<CENTER><a href="login.php">前往註冊頁面</a></CENTER>';
			echo "</br>";
			echo "<center>5秒後自動導回登入頁面</center>";
			echo '<meta http-equiv=REFRESH CONTENT=5;url=login.php>';
		}
		else{
			#=====登入成功並顯示歷史訂票紀錄	
			echo "<CENTER><font size=\"4\" color=red><strong>登入成功</strong></font></CENTER>";
			echo "</br>";
			echo '<CENTER><font size=\"5\" color=brown><strong>歷史訂票紀錄</strong></font></CENTER>';
			#SQL搜尋歷史訂票紀錄
			$sql50 = ("SELECT * FROM `order_record` WHERE user_account = '$m_user_id' ");
			$result50 = mysqli_query($db_link,$sql50);
			$record_num=mysqli_num_rows($result50);	
			
			if ($record_num != 0){
				echo "<CENTER>";
				echo "<table border='3' BGCOLOR=#FFFFBB>";
				echo "<tr>";
				echo "<td><strong>更動類別</strong></td>";
				echo "<td><strong>紀錄時間</strong></td>";
				echo "<td><strong>訂票編號</strong></td>";
				echo "<td><strong>顧客帳號</strong></td>";
				echo "<td><strong>飛機航班</strong></td>";
				
				echo "<td><strong>航空公司</strong></td>";
				echo "<td><strong>起始機場</strong></td>";
				echo "<td><strong>目的機場</strong></td>";
				echo "<td><strong>起飛時間</strong></td>";
				echo "<td><strong>抵達時間</strong></td>";
				echo "<td><strong>機票單價</strong></td>";
				echo "<td><strong>訂購票數</strong></td>";
				echo "<td><font color=\"CC0000\"><strong>總共票價</strong></font></td>";
				echo "</tr>";
				
				while($row = mysqli_fetch_array($result50)){
					echo "<tr>" ;  	  
					echo "<td>".$row['action']."</td>";
					echo "<td>".$row['time_stamp']."</td>";
					echo "<td>".$row['id']."</td>";
					echo "<td>".$row['user_account']."</td>";
					echo "<td>".$row['flight_id']."</td>";
					
					$flight_id = $row['flight_id'];
					$sql51 = "SELECT * FROM `flight_info` WHERE id = $flight_id";
					$result51 = mysqli_query($db_link,$sql51);
					while ($row1 = mysqli_fetch_array($result51)){
						echo "<td>".$row1['company_name']."</td>";
						echo "<td>".$row1['origin']."</td>";
						echo "<td>".$row1['destination']."</td>";
						echo "<td>".$row1['left_time']."</td>";
						echo "<td>".$row1['arrive_time']."</td>";
						echo "<td>".$row1['price']."</td>";
					}
					echo "<td>".$row['ticket_num']."</td>";
					echo "<td>".$row['total_price']."</td>";
					echo "</tr>";	
				}
				echo "</table>";
				echo"</CENTER>";
			}
			else{
				echo"<CENTER><font color = red >【無相符歷史訂票紀錄】</font></CENTER>";
			};
			
			echo "</br>";
			echo '<CENTER><button type="button" ><a href="order.php">【我要訂票】</a></button></CENTER>';
			 #前往訂票頁面
			echo "</br>"; 
			echo '<CENTER><button type="button" ><a href="modify_order.php">【我要確認或退票】</a></button></CENTER>'; 
		
		};
	}
	else{
		echo "<CENTER><font size=\"6\" color=red><strong>!失敗!</strong></font></CENTER>";
		echo "</br>";
		echo "帳號與密碼不可為空白，請重新輸入(10秒後自動導回登入頁面)";
		echo '<meta http-equiv=REFRESH CONTENT=10;url=login.php>';
	};
}
?>
	
</div>
</body>
</html>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<style>
	body, html {
		height: 100%;
	}

	.bg {
	  /* 對應到下面的div 需定義class名稱, 這邊要設定class名稱前面加"." */
	  /* The image used */
	  background-image: url("pic/search_bg.jpg");

	  /* Full height */
	  height: 100%;

	  /* Center and scale the image nicely */
	  background-position: center;
	  background-repeat: no-repeat;
	  background-size: cover;
	}
	</style>

</head>



<body>
	<div class = "bg">
		<?php
		include 'conn_mysql.php';
		?>
		
		<div style="position:absolute;left:35%;top:15%"> 
		<?php
		if($_POST['start']==$_POST['dest'] && $_POST['start'] != "所有地點")//起訖點相同
		 {

			echo"<br/>";
			echo"<font color=red size=18><b>錯誤!起訖點相同</b></font>";
			echo"<br/>";
			echo"<br/>";
			
		  
		 }
		 elseif($_POST['GoDate']==""||strlen($_POST['GoDate'])<8)
		 {
			 echo"<br/>";
			 echo"<font color=red size=18><b>請輸入航班日期!</b></font>";
			 echo"<br/>";
			 echo"<br/>";
		  
		 }

		 else
		 { 
			
			echo"<br/>";
			echo "您選擇的出發地是 <font color=blue><b>".$_POST['start']."</b></font color></br>";
			echo "您選擇的目的地是 <font color=blue><b>".$_POST['dest']."</b></font color></br>";
			echo "您選擇的航空公司是 <font color=blue><b>".$_POST['company']."</b></font color></br>";
			echo "您輸入的航班日期是 <font color=009FCC><b>".$_POST['GoDate']."</b></font color></br>";
		//
			echo "去程<b>".$_POST['GoDate']."</b>航班</br>";
			echo "<table border='1' >";
				echo "<td bgcolor=BBFFEE ><font color=888888>航班</font></td>";
				echo "<td bgcolor=BBFFEE><font color=888888>航空公司</font></td>";
				echo "<td bgcolor=BBFFEE><font color=888888>出發地</font></td>";
				echo "<td bgcolor=BBFFEE><font color=888888>目的地</font></td>";
				echo "<td bgcolor=BBFFEE><font color=888888>出發時間</font></td>";
				echo "<td bgcolor=BBFFEE><font color=888888>到站時間</font></td>";
				echo "<td bgcolor=BBFFEE><font color=888888>機票價錢</font></td>";
				echo "<td bgcolor=BBFFEE><font color=888888>剩餘票數</font></td>";
			echo "</tr>";
			
			
			$request4 = "SELECT * FROM `flight_info` ORDER BY left_time ASC";
			$result4 = mysqli_query($db_link,$request4);
			while($row=mysqli_fetch_array($result4)){
				if (($row['company_name'] == $_POST['company'])||("所有航空" == $_POST['company'])){
					if (($row['origin'] == $_POST['start'])||("所有地點" == $_POST['start'])){
						if (($row['destination'] == $_POST['dest'])||("所有地點" == $_POST['dest'])){
							echo "<tr>";  
								echo "<td>".$row['id']."</td>";
								echo "<td>".$row['company_name']."</td>"; 
								echo "<td>".$row['origin']."</td>";
								echo "<td>".$row['destination']."</td>";
								echo "<td>".$row['left_time']."</td>";
								echo "<td>".$row['arrive_time']."</td>";
								echo "<td>".$row['price']."</td>";
								echo "<td>".$row['available_num']."</td>";
							echo "</tr>";
						}
					}
				}
				
			
			}
			echo "</table>";
			
			
			} 
			
			

		 ?>
			
			<!--超連結，返回查詢頁面-->
				<tr>
					<td align="center">
						<a href="index.php">【返回查詢】</a>
					</td>
				</tr>
			<!--超連結，前往登入頁面-->
				<tr>
					<td align="center">
						<a href="login.php"> 【會員登入】 </a>
					</td>
				</tr>
			<!--超連結，前往註冊頁面-->
				<tr>
					<td align="center">
						<a href="register.php"> 【我要註冊】 </a>
					</td>
				</tr>
			<!--超連結，前往訂票頁面-->	
				<tr>
					<td align="center">
						<a href="order.php"> 【我要訂票】 </a>
					</td>
				</tr>	
		</div>
	</div>
</body>
</html>
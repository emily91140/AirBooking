<head>
	<title>最終結果</title> <!-- 網頁標題 -->	
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body   bgcolor=#FFB7DD>
<marquee onMouseOver="this.stop()" onMouseOut="this.start()" height="50" behavior="alternate" scrolldelay="4" scrollamount="5"> <img src="19-07.png" width="40" height="40"> <a href="index.php">→點我前往【班次查詢系統】←</a></marquee>
<!-- ↑左右碰撞返回跑馬燈+超連結+圖片-->
<div align="center" ><font size="7"><strong>修改結果</strong></font></div>
<div style="position:absolute;left:10%;top:15%"> 

<?php
	#載入跟資料庫連線的程式碼
	include 'conn_mysql.php';

	#檢查Array動作
	if (isset($_POST['ticketOrdered'])) //確認$_POST['ticketOrdered']存在
	{		
		$ticketOrdered = $_POST['ticketOrdered'];
		echo "</br>";
		echo "<center>已取消訂票</center>";
		
		#=====列出取消訂票資訊=====
		echo "<center><table border='3' BGCOLOR=#FFFFBB></center>";
		
		echo "<tr>";
		echo "<td><strong>訂票編號</strong></td>";
		echo "<td><strong>顧客帳號</strong></td>";
		echo "<td><strong>航班班次</strong></td>";
		echo "<td><strong>航空公司</strong></td>";
		echo "<td><strong>起始機場</strong></td>";
		echo "<td><strong>目的機場</strong></td>";
		echo "<td><strong>出發時間</strong></td>";
		echo "<td><strong>到達時間</strong></td>";
		echo "<td><strong>單張票價</strong></td>";
		echo "<td><strong>訂購票數</strong></td>";
		echo "<td><font color=\"CC0000\"><strong>總共價錢</strong></font></td>";
		echo "</tr>";
		
		//利用迴圈刪除被選中的資料庫資料
		for( $i = 0; $i < Count($ticketOrdered); $i++){ 
		
			echo "ticketOrdered[i] = $ticketOrdered[$i] <br/>";
			
			#====表格內容=======
			$sql0=("SELECT * FROM `order_record` WHERE id = $ticketOrdered[$i] ");
			$result0=mysqli_query($db_link,$sql0);
			$num = mysqli_num_rows($result0);
			
			echo " num = $num <br/>";
			
			
			while ($row = mysqli_fetch_array($result0)){
				
				echo "<tr>" ; 
				echo "<td>".$row['id']."</td>"; 	  
				echo "<td>".$row['user_account']."</td>";
				echo "<td>".$row['flight_id']."</td>";
				
				$flight_id = $row['flight_id'];
				$sql1 = "SELECT * FROM `flight_info` WHERE id = $flight_id";
				$result1 = mysqli_query($db_link, $sql1);
				while($row1 = mysqli_fetch_array($result1)){
					echo "<td>".$row1['company_name']."</td>";
					echo "<td>".$row1['origin']."</td>";
					echo "<td>".$row1['destination']."</td>";
					echo "<td>".$row1['left_time']."</td>";
					echo "<td>".$row1['arrive_time']."</td>";
				}
				echo "<td>".$row['price']."</td>";
				echo "<td>".$row['ticket_num']."</td>";
				echo "<td>".$row['total_price']."</td>";
				echo "</tr>";
				
				
				#====把刪除的資料加回flight_info available_num==
				$ticket_num = $row['ticket_num'];
				$sql2 ="UPDATE `flight_info` SET available_num = available_num + $ticket_num WHERE id = $flight_id ";
				mysqli_query($db_link,$sql2);
				#echo mysqli_error($db_link) . ": " . mysqli_error($db_link). "\n";
				
				#====把刪除的資料從order_record刪掉==
				$sql3 = "DELETE FROM `order_record` WHERE id = $ticketOrdered[$i] ";
				mysqli_query($db_link,$sql3);
				#echo mysqli_error($db_link) . ": " . mysqli_error($db_link). "\n";
			}
		}
		
		echo "</table>";

	}
	else{
		echo "<font color=red>請選擇欲取消訂票選項</font>";
	    echo "</br>";
	}
?>


</br>
	<!-- button + 超連結-->
	<CENTER><button type="button" ><a href="order.php"> 前往訂票系統 </a></button></CENTER>
</br>
	<!-- button + 超連結 -->
	<CENTER><button type="button" ><a href="modify_order.php"> 返回修改與查詢訂票頁面，再度確認 </a></button></CENTER> <!-- 前往確認頁面 -->
</br>
	<!-- button + 超連結 -->
	<CENTER><button type="button" ><a href="login.php"> 登入與確認訂票紀錄 </a></button></CENTER>	


</div>  
</body>
</html>
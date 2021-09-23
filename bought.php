<?php
session_start();
?>
<head>
	<title>訂票結果</title> <!-- 網頁標題 -->		
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
</head>
<body   bgcolor=#BBFFEE>

<div style="position:absolute;left:10%;top:15%"> 



<?php

	#載入跟資料庫連線的程式碼
	include 'conn_mysql.php';

	#變數連結上張表單傳來的POST值，印出使用者名稱
	$user_id = $_POST['user_id'];
	$user_t_id = $_POST['user_t_id'];
	$ticket_num = $_POST['ticket_num'];//購買張數
	$_SESSION["UI"]=$user_id; //儲存session變數 可連續在多個頁面使用 User Id
	$_SESSION["PI"]=$user_t_id; //Plane Id
	
	$available_num=0;
	echo "你的用戶號碼：$user_id </br>";
	echo "選擇的航空班次：$user_t_id </br>";
	echo "購買張數：$ticket_num </br>";
    
	//尋找相符使用者帳號
	$sql="SELECT * FROM `user` WHERE account = '$user_id' ";
	$result3 = mysqli_query($db_link,$sql);
	$num=mysqli_num_rows($result3);
	////若有相符User 筆數不等於0
	if($num==0){echo "<font color=red>輸入帳號錯誤,請重新輸入</font>";}
	else{   
		//尋找相符航班
		$sql2="SELECT * FROM `flight_info` WHERE id = '$user_t_id'";
		$result4 = mysqli_query($db_link,$sql2);
		$num2=mysqli_num_rows($result4);
		//若有相符航班 筆數不等於0
		if($num2==0){echo "<font color=red>輸入航班錯誤,請重新輸入</font>";}
		else{//有找到相符航班
			while($row=mysqli_fetch_array($result4)){
				//檢查票數是否足夠本次訂票
				$available_num = $row['available_num'];
				if( $available_num < $ticket_num ){
					echo "<font color=red size=12><b>此班次票數只剩</b></font>";
					echo "<font color=red size=12><b>$available_num</b></font>";
					echo "<font color=red size=12><b>張</b></font>";
					echo "</br>";
					echo "請重新查詢/訂購";
				}
				else{//可以訂票
					$price_per_ticket = $row['price'];		
					$total_price = $ticket_num * $price_per_ticket;
					$action = 'add';
					// 儲存訂購資料 insert SQL
					$request5 = "INSERT INTO `order_record` (`user_account`, `flight_id`, `price`, `ticket_num`, `total_price`, `action`, `time_stamp`) 
					VALUES ('$user_id', '$user_t_id', $price_per_ticket, $ticket_num, $total_price, '$action', current_timestamp())";
					mysqli_query($db_link,$request5);
					
					$order_id = 0;
					$sql3 = "SELECT * FROM `order_record` ORDER BY id DESC LIMIT 1;"; #取最後一筆 最新訂購編號id
					$result6 = mysqli_query($db_link,$sql3);
					while($row1=mysqli_fetch_array($result6)){
						$order_id = $row1['id'];
					}
					// 修改航班剩餘票數
					$new_available_num = $available_num - $ticket_num;
					$request6 = "UPDATE flight_info SET available_num = $new_available_num WHERE id = $user_t_id";
					mysqli_query($db_link,$request6);
					
					//顯示表格
					echo "<font color=red>訂票成功!</font>";
					echo "</br>";
					echo "<font color=red>訂票代碼: $order_id </font>";
					echo "</br>";
					echo "<table border='3' BGCOLOR=#FFFFBB>";
					
					echo "<td><strong>航班班次</strong></td>";
					echo "<td><strong>航空公司</strong></td>";
					echo "<td><strong>起始機場</strong></td>";
					echo "<td><strong>目的機場</strong></td>";
					echo "<td><strong>出發時間</strong></td>";
					echo "<td><strong>到達時間</strong></td>";
					echo "<td><strong>單張票價</strong></td>";
					echo "<td><strong>訂購票數</strong></td>";
					echo "<td><font color=\"CC0000\"><strong>總共價錢</strong></font></td>";
					echo "<td><strong>剩餘票數</strong></td>";
					echo "</tr>"; 
					
					echo "<tr>"  ;  
					echo "<td>".$row['id']."</td>";
					echo "<td>".$row['company_name']."</td>"; 
					echo "<td>".$row['origin']."</td>";
					echo "<td>".$row['destination']."</td>";
					echo "<td>".$row['left_time']."</td>";
					echo "<td>".$row['arrive_time']."</td>";
					echo "<td>".$row['price']."</td>";
					echo "<td>$ticket_num</td>";
					echo "<td>$total_price</td>";
					echo "<td>$new_available_num</td>";
					echo "</tr>";										
					
					echo "</br>";
					echo "</table>";
				}
			}
			
		}
	}
?>
	
	</br>
	<!-- button + 超連結 -->
	<CENTER><button type="button" ><a href="order.php"> 繼續訂票 </a></button></CENTER>
	<!-- 前往訂票系統 -->
	</br>
	<CENTER><button type="button" ><a href="index.php"> 返回查詢 </a></button></CENTER>
	<!-- 前往確認系統 -->
	</br>
	<CENTER><button type="button" ><a href="modify_order.php"> 確認或修改訂票 </a></button></CENTER> 
	<!-- 傳遞變數到下一個php -->
    
	

	
</div>	


  
</body>
</html>
<head>
	<title>確認訂票</title> <!-- 網頁標題 -->	
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body   bgcolor=#FFDDAA>
<marquee onMouseOver="this.stop()" onMouseOut="this.start()" height="50" behavior="alternate" scrolldelay="4" scrollamount="5"> <img src="pic/delete_chk_upper.png" width="40" height="40"> <a href="index.php">→點我返回【班次查詢系統】←</a></marquee>
<!-- ↑左右碰撞返回跑馬燈+超連結+圖片-->

<div align="center" ><font size="6"><strong>查詢與刪除</strong></font></div>
<div style="position:absolute;left:10%;top:15%"> 

<form type="INPUT" method="POST" action="final_ck.php">
<?php
	#載入跟資料庫連線的程式碼
	include 'conn_mysql.php';
	
	#檢查使用者輸入之帳號是否正確
	if($_POST['checker_id']==""||strlen($_POST['checker_id'])<7){
		echo"<br/>";
		echo"<center><font color=red size=18><b>請輸入學生證號碼!</b></font></center>";
		echo"<br/>";
		echo "<center>5秒後自動導回修改訂票頁面</center>";
		echo '<meta http-equiv=REFRESH CONTENT=5;url=modify_order.php>';
		echo"<br/>";
  
	}
	
	#設定變數
	$checker_id=$_POST['checker_id'];
	#於訂單紀錄資料庫比對相符學生證號碼
	$sql0 = "SELECT * FROM `order_record` WHERE user_account = $checker_id ";
	$result0 = mysqli_query($db_link,$sql0);
	$num0=mysqli_num_rows($result0);
	
	#若筆數為零，跳出視窗並導回上一頁	
	if ($num0 == 0) {echo"<script>alert('【查無相符資料，請確認後再輸入】');history.go(-1);</script>";}
	else
	{#筆數不為零
		#顯示學生證號碼(用戶)
		echo "你的學生證號碼： $checker_id <br/>";  

		#表格欄位
		echo "<table border='3' BGCOLOR=#FFFFBB>";
		
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
		echo "<td><strong><font color=\"CC0000\">刪除</strong></font></td>";
		echo "</tr>";

		#於資料庫找出相符學生證號碼之資料
        while($row=mysqli_fetch_array($result0))
		{	
			#印出相符資料
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
			
			#設置刪除勾選選項 input
			echo "<td>";
			echo "<input type='checkbox'  name='ticketOrdered[]' value= '".$row['id']."'/>";
			echo "</td>";
			
			echo "</tr>";
			
				
			#$a = $a + $row['total_price'];
		}	
		echo "</table>";
		#累積金額計算
		#echo "</table>";
		#echo "</br>";
		#echo "目前累積總金額：";
		#echo "$a";
		#echo "元";
	}
?>


</br>
	<!-- submit鈕 -->
	<CENTER><INPUT TYPE="submit" name="submit2"  value="確認" /></button></CENTER>      <!-- 前往刪除結果 -->
</br>
	<!-- button + 超連結 -->
	<CENTER><button type="button" ><a href="order.php"> 取消修改，前往訂票系統 </a></button></CENTER> <!-- 前往訂票系統 -->
</form>
</div>  
</body>
</html>
<?php
session_start();
?>
<head>
	<title>飛機訂票服務</title><!-- 網頁標題 -->	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body bgcolor="#FFEE99">  
<marquee onMouseOver="this.stop()" onMouseOut="this.start()" height="50" behavior="alternate" scrolldelay="4" scrollamount="5"> <img src="pic/order_upper.png" width="40" height="40"> <a href="index.php">→點我前往【班次查詢系統】←</a></marquee>
<!-- ↑左右碰撞返回跑馬燈+超連結+圖片-->

<?php
	#即時日期與時間
	echo "今天是 " . date("Y/m/d") . "</br>";
	date_default_timezone_set("Asia/Taipei");
	echo "時間為 " . date("h:i:sa"). "</br>";

	#載入跟資料庫連線的程式碼
	include 'conn_mysql.php';
?>

<div style="position:absolute;left:40%;top:20%"> <!-- 輸出的位置：絕對路徑，靠左邊40%,靠上方20% -->
<div align="center" ><font size="6"><strong>訂票系統</strong></font></div>  <!-- 置中、字體:6、粗體字 -->
	</br>
		<table border="3" BGCOLOR=#CCFF99>
		<form type="INPUT" method="POST" action="bought.php">
		<!--第一個填入式text表單，填入學生證號碼，命名user_id-->
			<tr> 
				<td height="50px">
					<font color="6F4A92">學生證號碼 : </font> 
					<input type="text" name="user_id" />
				</td>
			</tr>
		<!--第二個填入式text表單，填入航班班次，命名user_t_id-->
			<tr>
				<td align="center" valign="center" height="50px">
					<font color="6F4A92">航班 : </font> 
					<input type="text" name="user_t_id" /> 
				</td>
			</tr>
		<!--第三個下拉式表單，選擇訂購票數，命名ticket_num-->
			<tr>
				<td align="center" valign="center" height="50px">				
					<font color="6F4A92">訂購票數 : </font>
					<select name="ticket_num" > 
						<option value="1">1 張</option> <!-- 加入選項-->
　						<option value="2">2 張</option>
　						<option value="3">3 張</option>
　						<option value="4">4 張</option>
					</select>				
				</td>
			</tr>	
		
		<!-- 設置訂購鈕 -->			
			<tr>
				<td align="center" valign="center" height="50px">
					<INPUT TYPE="submit" name="submit"  value="訂票" />
				</td>
			</tr>
		</form>
		</table> <!-- 表格結束-->
		
	</br>
	<CENTER><a href="login.php"> 【會員登入與查詢訂票紀錄】 </a></CENTER>
	</br>
	<CENTER><a href="register.php"> 【我要註冊】 </a></CENTER>
	</br>
	<!-- 超連結+圖片至確認頁面-->
	<a href="modify_order.php" ><img src="pic/order_bottom.png" width="40" height="45">我已訂票，想要確認或修改</a>

	
	
	
</div>
</body>
</html>

<head>
	<title>修改查詢訂票</title> <!-- 網頁標題 -->	
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body   bgcolor=#CCDDFF>
<marquee onMouseOver="this.stop()" onMouseOut="this.start()" height="50" behavior="alternate" scrolldelay="4" scrollamount="5"> <img src="19-07.png" width="40" height="40"> <a href="index.php">→點我返回【班次查詢系統】←</a></marquee>
<!-- ↑左右碰撞返回跑馬燈+超連結+圖片-->
<div style="position:absolute;left:10%;top:15%"> 

<?php
	#載入跟資料庫連線的程式碼
	include 'conn_mysql.php';

	#即時日期與時間
	echo "今天是 " . date("Y/m/d") . "</br>";
	date_default_timezone_set("Asia/Taipei");
	echo "時間為 " . date("h:i:sa"). "</br>";
?>
<div style="position:absolute;left:220%;top:20%">
<div align="center" ><font size="6"><strong>修改與查詢訂票</strong></font></div>
		<table border="3" width="400" BGCOLOR=#E8CCFF>
			<!--填入式text表單，填入查詢者學生證號碼，命名checker_id -->
			<form type="INPUT" method="POST" action="delete_chk.php">
			<tr> 
				<td height="50px" >
					<font color="6F4A92">用戶帳號 : </font> 
					<input type="text" name="checker_id"  maxlength="7"/>
　					<input type="submit" name="submit3" value="確定查詢">
				</td>
			</tr>
			</form>
		
		<!-- 超連結至訂票頁面 -->
		</table>
		</br>
		<CENTER><a href="order.php"> ? 我還沒訂票 </a></CENTER>
		</br>
		<CENTER><a href="login.php"> 會員中心 </a></CENTER>
		</br>
		<CENTER><a href="register.php"> 我要註冊 </a></CENTER>
		</br>
		
	
</div>  
</body>
</html>
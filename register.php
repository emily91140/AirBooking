<head>
	<title>會員註冊</title><!-- 網頁標題 -->	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body bgcolor="#00AAAA"  >  
<marquee onMouseOver="this.stop()" onMouseOut="this.start()" height="50" behavior="alternate" scrolldelay="4" scrollamount="5"> <img src="pic/register_upper.png" width="40" height="40">如欲訂票,請先加入會員</a></marquee>
<!-- ↑左右碰撞返回跑馬燈+超連結+圖片-->


<?php
	#載入跟資料庫連線的程式碼
	include 'conn_mysql.php';
?>
<div style="position:absolute;left:40%;top:20%"> <!-- 輸出的位置：絕對路徑，靠左邊40%,靠上方20% -->
<div align="center" ><font size="6"><strong>註冊系統</strong></font></div>  <!-- 置中、字體:6、粗體字 -->
</br>	
		<table border="3" BGCOLOR=#DDDDDD>
		<form type="INPUT" method="POST" action="register_result.php">
		<!--第一個填入式text表單，填入學生證號碼，命名user_id-->
			<tr> 
				<td height="50px">
					<font color="6F4A92">註冊帳號 : </font> 
					<input type="text" name="set_user_account" maxlength="7"/>
				</td>
			</tr>
		<!--第二個填入式text表單，填入密碼，命名user_t_id-->
			<tr>
				<td align="center" valign="center" height="50px">
					<font color="6F4A92">設定密碼 : </font> 
					<input type="password" name="set_password" /> 
				</td>
			</tr>
			
			<!-- 設置註冊鈕 -->			
			<tr>
				<td align="center" valign="center" height="50px">
					<INPUT type="submit" name="submit"  value="註冊" />
				</td>
			</tr>
		</form>
		</table> <!-- 表格結束-->
	</br>


	<!-- 返回查詢頁面連結 -->
  
				<center><a href="index.php"> 【返回查詢】 </a></center>
				</br>
				<center><a href="login.php"> 【已有帳號,我要登入】 </a></center>
				</br>
				<center><a href="order.php"> 【我要訂票】 </a></center>
		
</div>
</body>
</html>

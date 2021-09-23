<head>
	<title>會員登入</title><!-- 網頁標題 -->	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body bgcolor="#FFC8B4"  >  
	<marquee onMouseOver="this.stop()" onMouseOut="this.start()" height="50" behavior="alternate" scrolldelay="4" scrollamount="5"> <img src="pic/login_upper.png" width="40" height="40">登入會員以查看歷史訂票紀錄</a></marquee>
	<!-- ↑左右碰撞返回跑馬燈+超連結+圖片-->
	<form type="INPUT" method="POST" action="login_check_and_show_record.php">

		<?php
			#載入跟資料庫連線的程式碼
			include 'conn_mysql.php';
			
			// ini_set('display_errors', 1);
			// ini_set('display_startup_errors', 1);
			// error_reporting(E_ALL);
		?>
		<div style="position:absolute;left:40%;top:20%"> <!-- 輸出的位置：絕對路徑，靠左邊40%,靠上方20% -->
			<div align="center" ><font size="6"><strong>會員登入</strong></font></div>  <!-- 置中、字體:6、粗體字 -->
			</br>	
			<table border="3" BGCOLOR=#CCEEFF>
			<!--<form type="INPUT" method="POST" action="record.php">-->
			<!--第一個填入式text表單，填入學生證號碼，命名m_user_id-->
				<tr> 
					<td height="50px">
						<!--<form action="record.php" method="POST">-->
						<font color="6F4A92">會員帳號 : </font> 
						<input type="text" name="m_user_id" maxlength="7"/>
					</td>
				</tr>
			<!--第二個填入式text表單，填入密碼，命名m_password-->
				<tr>
					<td align="center" valign="center" height="50px">
						<font color="6F4A92">密碼 : </font> 
						<input type="password" name="m_password" /> 
					</td>
				</tr>
				
				<!-- 設置送出鈕 -->			
				<tr>
					<td align="center" valign="center" height="50px">
						<INPUT TYPE="submit" name="submit"  value="登入" />
					</td>
				</tr>
			</table> <!-- 表格結束-->
			</br>

			<!--登入前畫面，連結index、login註冊--!>
			<!-- button + 超連結-->
				<CENTER><a href="index.php">  【返回查詢】 </a></CENTER>
			</br>
				<CENTER><a href="register.php"> 【我要註冊】 </a></CENTER>
			</br>
				<CENTER><a href="order.php"> 【我要訂票】 </a></CENTER>
			</br>
		</div>
	</form>
</body>
</html>

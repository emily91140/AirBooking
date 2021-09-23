<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body bgcolor="#DDDDDD"  >  
<marquee onMouseOver="this.stop()" onMouseOut="this.start()" height="50" behavior="alternate" scrolldelay="4" scrollamount="5"> <img src="pic/register_upper.png" width="40" height="40">如欲訂票,請先加入會員</a></marquee>
<!-- ↑左右碰撞返回跑馬燈+超連結+圖片-->
<form type="INPUT" method="POST" action="login.php">

<?php
	#載入跟資料庫連線的程式碼
	include 'conn_mysql.php';
?>
<div style="position:absolute;left:30%;top:20%"> <!-- 輸出的位置：絕對路徑，靠左邊40%,靠上方20% -->
<div align="center" ><font size="6"><strong>註冊結果</strong></font></div>  <!-- 置中、字體:6、粗體字 -->

<?php
	//在這裡宣告感覺沒意義
	//$set_user_account=$_POST['set_user_account'];
	//$set_password=$_POST['set_password'];
	// echo "你的用戶號碼：$set_user_account </br>";
	// echo "你的密碼：$set_password </br>";
	echo "你的用戶號碼：" . $_POST['set_user_account'] . " </br>";
	echo "你的密碼：" . $_POST['set_password'] . "</br>";
	echo"<br/>";
	echo"<br/>";
	

If($_POST['set_user_account']==""||strlen($_POST['set_user_account'])<7)
{	 echo"<br/>";
	 echo"<font color=red size=18><b>請輸入'7碼'學生證號碼!</b></font>";
	 echo"<br/>";
	 echo"<br/>"; 
	 echo "<center>5秒後自動導回註冊頁面</center>";
	 echo '<meta http-equiv=REFRESH CONTENT=5;url=register.php>';
}

else{
	//字串處理 轉換字串中的特殊字符 mysqli_real_escape_string(connection,escapestring)
	$set_user_account = mysqli_real_escape_string($db_link,$_POST['set_user_account']);
	$set_password = mysqli_real_escape_string($db_link,$_POST['set_password']);

	$sql = "SELECT * FROM `user` WHERE account = $set_user_account ";
	$result10 = mysqli_query($db_link,$sql);
	$num= mysqli_num_rows($result10);


		If($set_user_account != null && $set_password != null ) 
		{	
				If ($num == 0)
				{
					echo "<font size=\"6\" color=red><strong>註冊成功!</strong></font>";	
					$member_id= '0';
					//寫入資料庫
					$sql2= "INSERT INTO `user` (account ,password)
							VALUES('$set_user_account','$set_password')" ;	
					mysqli_query($db_link,$sql2);
				}
				else
				{
					echo "<center><font size=\"6\" color=red><strong>!失敗!</strong></font></center>";
					echo "</br>";
					echo "<center>此帳號已有人註冊，10秒後自動導回註冊頁面</center>";
					echo '<meta http-equiv=REFRESH CONTENT=10;url=register.php>';
				};
		}
		else 
			{
				echo "<center><font size=\"6\" color=red><strong>!失敗!</strong></font></center>";
				echo "</br>";
				echo "<center>帳號與密碼不可為空白，請重新註冊(10秒後自動導回註冊頁面)</center>";
				echo '<meta http-equiv=REFRESH CONTENT=10;url=register.php>';
			};
	}	
?>
	<!-- submit 鈕 -->
	</br>
	<CENTER><INPUT TYPE="submit" name="submit2"  value="前往登入" /></button></CENTER>  
	</br>
	<!-- 返回查詢頁面連結 -->
        <tr>
			<td align="center">
				<center><a href="index.php"> 【返回查詢】 </a></center>
			</td>
        </tr>

</div>
</body>
</html>

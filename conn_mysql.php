<?php
	//$db_link = @mysqli_connect("連網ip位址","phpmyadmin帳戶","phpmyadmin密碼");
	$db_link = @mysqli_connect("127.0.0.1","root","");
	if(!$db_link){
		die("資料庫連線失敗<br>");
	}else{
		echo"資料庫連線成功<br>";
	}
	
	mysqli_query($db_link,"SET NAMES 'utf-8'");  //設定字元集與編碼為utf-8
	$seldb = @mysqli_select_db($db_link,"airline_booking"); //後續查詢要用 $db_link (連接資料庫)
	if(!$seldb){
		die("資料庫選擇失敗<br>");
	}else{
		echo"資料庫選擇成功<br>";
	}
?>
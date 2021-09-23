<!DOCTYPE HTML>
<html>
<head>
	<title>國內機票網路查詢系統</title>
 	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<style>
	body, html {
		height: 100%;
	}

	.bg {
	  /* 對應到下面的div 需定義class名稱, 這邊要設定class名稱前面加"." */
	  /* The image used */
	  background-image: url("pic/index_background2.jpg");

	  /* Full height */
	  height: 100%;

	  /* Center and scale the image nicely */
	  background-position: center;
	  background-repeat: no-repeat;
	  background-size: cover;
}
</style>
<!-- 跳出視窗、背景色 -->
<!-- <body bgcolor="BBFFEE" onload="alert('【歡迎進入國內飛機航班時刻表查詢系統】')" background="index_background.jpg" width="800" height="500" /> -->
<body>
<div class = "bg">
<marquee onMouseOver="this.stop()" onMouseOut="this.start()" height="50" behavior="alternate" scrolldelay="4" scrollamount="5"> <img src="pic/index_upper.png" width="30" height="30">如欲訂票,請先加入會員</a></marquee>
<font color="darkblue" size=30 style="position:absolute;left:36.5%;top:5%">國內機票查詢系統</font>


<?php
include 'conn_mysql.php';
?>

	<div class="search_board" style="position:absolute;left:35%;top:15%">
		<table border="1">
			<form type="INPUT" method="POST" action="search.php"> <!-- 將下列form選單的data 傳去search.php使用 -->

			<tr> 
				<td>
					<font color="FF0088">出發地(From) : </font> 
					<select name="start">  
						<?php
							$request1 = "SELECT `name` FROM `airport`";
							$result1 = mysqli_query($db_link,$request1);
							while($row=mysqli_fetch_array($result1)){
								echo "<option value=".$row['name'].">".$row['name']."</option>\n";
							}
						?>
						<option value="所有地點">所有地點</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<font color="FFAA33">目的地(To) : </font>
					<select name="dest">
						<?php
							$request2 = "SELECT `name` FROM `airport`";
							$result2 = mysqli_query($db_link,$request2);
							while($row=mysqli_fetch_array($result2)){
								echo "<option value=".$row['name'].">".$row['name']."</option>\n";
							}
						?>
						<option value="所有地點">所有地點</option>					
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<font color="00AAAA">航空公司(Airline) : </font>
					<select name="company"> 
						<?php
						   $request3 = "SELECT `name` FROM `plane_company`";
						   $result3 = mysqli_query($db_link,$request3);
							while($row=mysqli_fetch_array($result3)){
								echo "<option value=".$row['name'].">".$row['name']."</option>\n";
							}
						?>
						<option value="所有航空">所有航空</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<font color="5599FF">航班日期(outbound_date,yyyymmdd) : </font>
					<input type="text" name="GoDate" size="20"  maxlength="8" >
				</td>
			</tr>
			
			<!--送出的按鈕，顯示:查詢，把選擇的選項利用POST送到search.php中-->
			<tr>
				<td align="center">
					<INPUT TYPE="submit"  name="submit"  value="查詢" />
				</td>
			</tr>
			
			<!--超連結，前往登入頁面-->
			<tr>
				<td align="center">
				<a href="login.php"> 【會員登入】 </a>
			
			<!--超連結，前往註冊頁面-->

				<a href="register.php"> 【我要註冊】 </a>
			
			<!--超連結，前往訂票頁面-->

				<a href="order.php"> 【我要訂票】 </a>	
					
			  </td>
			</tr>
		</table>
	</div>
</div>
</body>
</html>

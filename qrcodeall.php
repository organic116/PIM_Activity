<html>
<head>
<title>ข้อมูลนักศึกษา</title>
</head>
<body onLoad="window.print()">
<center>
	<button class="btn btn-outline-success my-2 my-sm-0" ><a href="admin_showuser.php" >กลับหน้าหลัก</a></button>
	<?php

	$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
    mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
    //2. query ข้อมูลจากตาราง :
    $query = "SELECT * FROM tb_user " or die(mysql_error());
    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
    $result = mysqli_query($conn,$query);
	echo"<table border=\"1\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
	$intRows = 0;
	 while($row = mysqli_fetch_array($result)){

		echo "<td>";
			$intRows++;
	?>
	<center>
				<img src="<?php echo $row["user_imgqrcode"];?>"><br>
				<?php echo $row["user_name"];?>&nbsp;<?php echo $row["user_lastname"];?><br>
				<?php echo $row["user_id"];?>
				<br>
			</center>
	<?php
			echo"</td>";
			if(($intRows)%5==0)
			{
				echo"</tr>";
			}
		}
		echo"</tr></table>";
	?><button onclick="myFunction()">ปรินQRcode</button>
	</center>


<script>
function myFunction() {
  window.print();
}
</script>
</body>

</html>

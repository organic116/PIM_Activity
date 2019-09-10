<!DOCTYPE html>  <html>
<title>บัตรเข้าร่วมกิจกรรม</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<script src="http://www.sys2u.com/qrcode/jquery.min.js" type="text/javascript"></script>
<script src="http://www.sys2u.com/qrcode/jquery.qrcode.min.js" type="text/javascript"></script>
<body>
<body onLoad="window.print()">
<center>
<button class="btn btn-outline-success my-2 my-sm-0" ><a href="admin_showuser.php" >กลับหน้าหลัก</a></button>
</center>
 <?php
		$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
		mysqli_query($conn, "SET NAMES UTF8");
		$stu_id = $_GET["stu_id"];
		$yer =  date('Y')+543;
		$sql=" select * from tb_user where user_id='$stu_id' ";
		echo "<center>";
		echo"<table border=\"1\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
		echo "<td>";
		$result=mysqli_query($conn,$sql) or die ("ไม่สามารถค้นหาข้อมูลได้").mysql_error();
		if(mysqli_num_rows($result) == 1)
		{

			while($row = mysqli_fetch_array($result)){ ?>


			<center>
				<img src="<?php echo $row["user_imgqrcode"];?>"><br>
				<?php echo $row["user_name"];?>&nbsp;<?php echo $row["user_lastname"];?><br>
				<?php echo $row["user_id"]; 	echo"</tr>";?>
				<br>
			</center>
		<button onclick="myFunction()">ปรินQRcode</button>
 <?php echo"</tr></table></center>"; }
		}
		else{

			echo "ไม่พบข้อมูลนักศึกษา";

		}
		mysqli_close($conn);
	?>
<script>
function myFunction() {
  window.print();
}
</script>


</body>

</html>

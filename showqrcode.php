<html>
<head>
<title>ข้อมูลนักศึกษา</title>
<style type="text/css">
p.dotted {border-style: dotted; color:#FF0000;//สีข้อความ
text-decoration:none; background:#FFFFFF; //สีพื้นหลัง
border-width : 5px;border-style ://ขนาด dot
dotted;border-color : #000000;} //สีของ dot
</style>
</head>
<body onLoad="window.print()">
<center>
	<button class="btn btn-outline-success my-2 my-sm-0" ><a href="admin_showuser.php" >กลับหน้าหลัก</a></button>
	<?php
	$SQL="SELECT * FROM tb_user WHERE user_statustype = '0' ";
	if(!$_GET["re_major"] == ""){
		$SQL .= "AND major_id = '".$_GET["re_major"]."'AND user_year = '".$_GET["user_year"]."'";
	}
	if(!$_GET["user_year"] == ""){
		$SQL .= "'AND user_year = '".$_GET["user_year"]."'";
	}
	$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
    mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
    //2. query ข้อมูลจากตาราง :
    $query = "SELECT * FROM tb_user WHERE user_statustype = '0' ";
if(!$_GET["re_major"] == ""){
		$query .= "AND major_id = '".$_GET["re_major"]."'";
	}
	if(!$_GET["user_year"] == ""){
		$query .= "AND user_year = '".$_GET["user_year"]."'";
	}
    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
    $result = mysqli_query($conn,$query);
	echo"<table border=\"1\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
	$intRows = 0;
	 while($row = mysqli_fetch_array($result)){

		echo "<td>";
			$intRows++;
	?>
	<center>
	<p class="dotted">
				<img src="<?php echo $row["user_imgqrcode"];?>" >
				</p><br>
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

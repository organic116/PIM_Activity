<?php
$serverName = "localhost";
$username="id10717672_organic";
$password="Tanakorn1340";
$database="id10717672_dbactivities";
$qrcode = $_POST["qrcodelink"];
$user = $_POST["user"];

$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
mysqli_set_charset($objCon,"utf8");

$SQL = "UPDATE tb_activities SET qrcode_ar = '".$qrcode."' WHERE user = '".$user."'";
$objQuery1 = mysqli_query($objCon,$SQL);
if($objQuery1) {
				header("location:admin_uishowar.php");
}



?>

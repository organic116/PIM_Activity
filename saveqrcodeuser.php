<?php
session_save_path("session/");
session_start();
?>
<?php
$serverName = "localhost";
$username="id10717672_organic";
$password="Tanakorn1340";
$database="id10717672_dbactivities";
$qrcode_user = $_POST["qrcodelink"];
$user_qrcode = $_POST["user_qrcode"];

$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
mysqli_set_charset($objCon,"utf8");

//echo  $qrcode_user;
//echo  $user_qrcode;
$SQL = "UPDATE tb_user SET  user_imgqrcode = '".$qrcode_user."' WHERE  user_qrcode = '".$user_qrcode."'";
$objQuery1 = mysqli_query($objCon,$SQL);
if($objQuery1) {
				header("location:admin_showuser.php");
}



?>

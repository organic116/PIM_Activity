<?php
session_save_path("session/");
session_start();
?>
<?php
  $servername = "localhost";
  $username="id10717672_organic";
  $password="Tanakorn1340";
  $database="id10717672_dbactivities";
	if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"imagerprofile/".$_FILES["filUpload"]["name"]))
	{
    $conn = new mysqli($servername, $username, $password,$db);
	mysqli_set_charset($conn,"utf8");
	$user_id= $_SESSION["user_id"];
	$user_date=$_POST["user_date"];
	$user_address=$_POST["user_address"];
	$user_tel=$_POST["user_tel"];
	$user_email=$_POST["user_email"];
	$user_club=$_POST["user_club"];

$sql="UPDATE tb_user
	SET user_id='$user_id',
		user_date='$user_date',
		user_address='$user_address',
		user_tel='$user_tel',
		user_email='$user_email',
		user_club='$user_club',
		user_image ='".$_FILES["filUpload"]["name"]."'
		WHERE user_id='$user_id'";


if(!mysqli_query($conn,$sql)){
	echo "<p><div align='center'>คำเตือน : ระบบไม่สามารถแก้ไขข้อมูลนักศึกษาได้</div></p>";
}else{
	echo "<p><div align='center'><h2 style='color:#55DDFF;'>ระบบแก้ไขข้อมูลนักศึกษาเรียบร้อยแล้ว</h2></div></p>";
}
mysqli_close($conn);
	}
echo "<div align='center'>|<a href='user_profileshow.php'>กลับหน้าแสดงข้อมูลนักศึกษา</a>|</div>";
?>
if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"imagerprofile/".$_FILES["filUpload"]["name"]))
	{
		echo "Copy/Upload Complete<br>";

		//*** Insert Record ***//
		$con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');

		$strSQL = "INSERT INTO tb_user ";
		$strSQL .="(user_id,user_date,user_address,user_tel,user_email,user_club,user_image) VALUES ('".$_POST["user_id"]."','".$_POST["user_date"]."',
		'".$_POST["user_address"]."',
		'".$_POST["user_tel"]."',
		'".$_POST["user_email"]."',
		'".$_POST["user_club"]."',
		'".$_FILES["filUpload"]["name"]."')";
		$objQuery = mysqli_query($conn,$strSQL);
	}

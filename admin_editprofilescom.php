<?php
	$user_id=$_POST["user_id"];
	$user_prefix=$_POST["user_prefix"];
	$user_name=$_POST["user_name"];
	$user_lastname=$_POST["user_lastname"];
	$major_id=$_POST["major_id"];
	$user_status=$_POST["user_status"];
	$user_statusqrcode=$_POST["user_statusqrcode"];
$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
mysqli_query($conn, "SET NAMES UTF8");
$sql="UPDATE tb_user SET user_prefix = '$user_prefix',user_name='$user_name', user_lastname='$user_lastname',major_id='$major_id',user_status='$user_status',user_statusqrcode='$user_statusqrcode' WHERE user_id='$user_id'";
if(!mysqli_query($conn,$sql)){
	echo "<script>";
				echo "alert(\"คำเตือน : ระบบไม่สามารถแก้ไขข้อมูลนักศึกษา\");";
				echo "window.location=\"admin_showuser.php\"";
				echo "</script>";
}else{
				echo "<script>";
				echo "alert(\"คำเตือน : ระบบแก้ไขข้อมูลนักศึกษาเรียบร้อย\");";
				echo "window.location=\"admin_showuser.php\"";
				echo "</script>";
}
mysqli_close($conn);
?>

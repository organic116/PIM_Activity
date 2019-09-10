<?php
	$activities_id=$_POST["activities_id"];
	$activities_name=$_POST["activities_name"];
	$activities_valueuser=$_POST["activities_valueuser"];
	$activities_hour=$_POST["activities_hour"];
	$activities_detail=$_POST["activities_detail"];
	$activities_startdate=$_POST["activities_startdate"];
	$activities_enddate=$_POST["activities_enddate"];
	$activities_starttime=$_POST["activities_starttime"];
	$activities_endtime=$_POST["activities_endtime"];
	$activities_admin=$_POST["activities_admin"];
	$activities_place=$_POST["activities_place"];

$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
mysqli_query($conn, "SET NAMES UTF8");
$sql="UPDATE tb_activities SET activities_name='$activities_name',activities_valueuser='$activities_valueuser',activities_hour='$activities_hour',activities_detail='$activities_detail',activities_startdate='$activities_startdate',activities_enddate='$activities_enddate',activities_starttime='$activities_starttime',activities_endtime='$activities_endtime',activities_admin='$activities_admin',activities_place='$activities_place' WHERE activities_id='$activities_id'";
if(!mysqli_query($conn,$sql)){
	echo "<script>";
				echo "alert(\"คำเตือน : ระบบไม่สามารถแก้ไขข้อมูลกิจกรรมได้\");";
				echo "window.location=\"admin_uishowar.php\"";
				echo "</script>";
}else{
				echo "<script>";
				echo "alert(\"คำเตือน : ระบบแก้ไขข้อมูลกิจกรรมเรียบร้อย\");";
				echo "window.location=\"admin_uishowar.php\"";
				echo "</script>";
}
mysqli_close($conn);
?>

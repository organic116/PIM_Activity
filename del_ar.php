<?php
$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
		mysqli_query($conn, "SET NAMES UTF8");
		$ar_id = $_GET["ar_id"];
		$sql = "DELETE FROM tb_activities
			WHERE activities_id = '".$ar_id."' ";

	$query = mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)) {
		  echo "<script>";
				echo "alert(\"ลบกิจกรรมเรียบร้อย\");";
				echo "window.location=\"admin_showuser.php\"";
				echo "</script>";
	}

	mysqli_close($conn);
?>

<?php

	$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
	$strSQL = "SELECT * FROM personal WHERE personal_username = '".mysqli_real_escape_string($conn,$_POST["username"])."' and personal_password = '".mysqli_real_escape_string($conn,$_POST["password"])."'";
	$objQuery = mysqli_query($conn,$strSQL) or die("Error: ".mysqli_error($conn));
	$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
	if(!$objResult)
	{
		echo "<script>";
		echo "alert(\"ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!\");";
		echo "window.location=\"login_teacher.php\"";
		echo "</script>";
	}
	else
	{

			{

				session_save_path("session/");
				session_start();

				if(isset($_POST["username"]))
				{

					$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
					mysqli_query($conn, "SET NAMES UTF8");
					$personal_name=$_POST['username'];
					$strSQL = "SELECT * FROM personal WHERE personal_username = '".$personal_name."'";
					$result = mysqli_query($conn,$strSQL);
					$objQuery = mysqli_query($conn,$strSQL) or die("Error: ".mysqli_error($conn));
						while($row = mysqli_fetch_array($result)) {
						$_SESSION["personal_id"]=$row["personal_id"];
						$_SESSION["personal_username"]=$row["personal_username"];
						$_SESSION["personal_name"]=$row["personal_name"];
						$_SESSION["personal_status"]=$row["personal_status"];
						$_SESSION["major_id"]=$row["major_id"];
						}



					session_write_close();

				}

				header("location:teacher_mainui.php");
				}
			}



	mysqli_close($conn);

?>

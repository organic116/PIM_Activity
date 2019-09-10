<?php
header("location:login.php");
$user = $_GET["user"];
$pass = $_GET["pass"];
$conn = mysqli_connect("localhost", "1129002", "0846596470", "1129002");

$strSQL = "SELECT * FROM tb_activities WHERE user = '" . mysqli_real_escape_string($conn, $user) . "' 
	and pass = '" . mysqli_real_escape_string($conn, $pass) . "'";
$objQuery = mysqli_query($conn, $strSQL) or die("Error: " . mysqli_error($conn));;
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
if (!$objResult) {
?>
	<script>alert('Username and Password Incorrect!');</script>
<?php
	header('Refresh:0; url=login.php');
	exit();
} else {

	

		session_save_path("session/");
		session_start();
		if (isset($user)) {
				$conn = mysqli_connect("localhost", "1129002", "0846596470", "1129002");
				$user_id = $user;
				$strSQL = "SELECT * FROM tb_activities WHERE user = '" . $user_id . "'";
				$objQuery = mysqli_query($conn, $strSQL) or die("Error: " . mysqli_error($conn));
				$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
				
				$_SESSION["activities_id"] =  $objResult["activities_id"];
				$_SESSION["activities_name"] = $objResult["activities_name"];


				session_write_close();
				header("location:login.php");
			}

		

	}


mysqli_close($conn);

?>
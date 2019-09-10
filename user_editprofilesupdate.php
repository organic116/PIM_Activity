<?php
session_save_path("session/");
session_start();


?>
<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<?php
$servername = "localhost";
$username="id10717672_organic";
$password="Tanakorn1340";
$database="id10717672_dbactivities";
			$id = $_SESSION['user_id'];



	// Create connection
	$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
	mysqli_query($conn,"SET NAMES UTF8");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



		//รูปที่1
		    if($_FILES["filUpload"]["name"]  != "")

		{
			$fileName1 = $_FILES["filUpload"]["name"];
			    if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"myfile/".$fileName1))
			{

				//*** Delete Old File ***//
				@unlink("myfile/".$_POST["hdnOldFile"]);

				//*** Update New File ***//
				$strSQL1 = "UPDATE tb_user SET  user_address   = '".$_POST["user_address"]."'
						, user_date   = '".$_POST["user_date"]."'
						, image = '".$fileName1."'
						, user_tel   = '".$_POST["user_tel"]."'
						, user_email   = '".$_POST["user_email"]."'
						, user_club   = '".$_POST["user_club"]."'
						, user_password   = '".$_POST["user_password"]."'
						WHERE user_id = '".$_GET["id"]."'";

				$query1 = mysqli_query($conn,$strSQL1);
			}
		}else
		{
			$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
			$strSQL = "SELECT * FROM tb_user WHERE user_id = '$id' ";
			mysqli_query($conn,"SET NAMES UTF8");
			$objQuery = mysqli_query($conn,$strSQL);
			$objResult = mysqli_fetch_array($objQuery, MYSQLI_BOTH);
				$strSQL1 = "UPDATE tb_user  SET image = '".$objResult["image"]."'
				, user_date   = '".$_POST["user_date"]."'
				, user_address   = '".$_POST["user_address"]."'
				, user_tel   = '".$_POST["user_tel"]."'
						, user_email   = '".$_POST["user_email"]."'
						, user_club   = '".$_POST["user_club"]."'
						, user_password   = '".$_POST["user_password"]."'
						WHERE user_id = '".$_GET["id"]."'";
				$query1 = mysqli_query($conn,$strSQL1) or die( mysqli_error($conn));

		}
		if($query1)
		{
	 echo "<script>";
				echo "alert(\"บันทึกเรียบร้อย\");";
				echo "window.location=\"user_profileshow.php\"";
				echo "</script>";

	}

mysqli_close($conn);
?>
</body>

</html>

<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<?php
	if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"imagerprofile/".$_FILES["filUpload"]["name"]))
	{
		echo "Copy/Upload Complete<br>";

		//*** Insert Record ***//
		$con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');

		$strSQL = "INSERT INTO tb_user ";
		$strSQL .="(user_date,user_address,user_tel,user_email,user_club,user_image) VALUES ('".$_POST["user_date"]."',
		'".$_POST["user_address"]."',
		'".$_POST["user_tel"]."',
		'".$_POST["user_email"]."',
		'".$_POST["user_club"]."',
		'".$_FILES["filUpload"]["name"]."'
		)";
		$objQuery = mysqli_query($conn,$strSQL);
	}
?>
<a href="kuy3.php">View files</a>
</body>

</html>

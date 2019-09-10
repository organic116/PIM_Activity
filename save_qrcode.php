<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<?php
	if(move_uploaded_file($_FILES["qrcode"]["qrcode_ar"],"qrcode/".$_FILES["qrcode"]["name"]))
	{
		echo "บันทึก QR-CODE สำเร็จ<br>";

		//*** Insert Record ***//
		$conn = mysqli_connect("localhost", "1129002", "0846596470", "1129002");
		$strSQL = "INSERT INTO qrcode_ar ";
		$strSQL .="(FilesName) VALUES ('".$_FILES["qrcode"]["name"]."')";
		$objQuery = mysql_query($strSQL);
	}
?>
<a href="PageUploadToMySQL3.php">View files</a>
</body>

</html>

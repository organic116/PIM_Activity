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
function genuser($length = 4) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return "USR_".$randomString;
}
?>
<?php
$servername = "localhost";
$username="id10717672_organic";
$password="Tanakorn1340";
$database="id10717672_dbactivities";
$id= $_POST["user_id"];
$user_qrcode = genuser();

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
$strSQL1 = "INSERT tb_user INTO  user_qrcode = '".$user_qrcode."'
						,	user_id   = '".$_POST["user_id"]."'
						, user_prefix   = '".$_POST["user_prefix"]."'
						, user_name   = '".$_POST["user_name"]."'
						, user_lastname   = '".$_POST["user_lastname"]."'
						, faculty_id   = '".$_POST["faculty_id"]."'
						, major_id   = '".$_POST["major_id"]."'
						, course_id   = '".$_POST["course_id"]."'
						, user_room   = '".$_POST["user_room"]."'
						, user_year   = '".$_POST["user_year"]."'
						, user_area   = '".$_POST["user_area"]."'
						, user_status   = '".$_POST["user_status"]."'
						, user_address   = '".$_POST["user_address"]."'
						, user_password   = '000000'
						, image = '".$fileName1."'
						WHERE user_id = '".$_POST["user_id"]."'";

				$query1 = mysqli_query($conn,$strSQL1);
			}
		}else
		{
			$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
			$strSQL = "SELECT * FROM tb_user WHERE user_id = '$id' ";
			mysqli_query($conn,"SET NAMES UTF8");
			$objQuery = mysqli_query($conn,$strSQL);
			$objResult = mysqli_fetch_array($objQuery, MYSQLI_BOTH);
$strSQL1 = "INSERT tb_user INTO  user_qrcode = '".$user_qrcode."'
						,	user_id   = '".$_POST["user_id"]."'
						, user_prefix   = '".$_POST["user_prefix"]."'
						, user_name   = '".$_POST["user_name"]."'
						, user_lastname   = '".$_POST["user_lastname"]."'
						, faculty_id   = '".$_POST["faculty_id"]."'
						, major_id   = '".$_POST["major_id"]."'
						, course_id   = '".$_POST["course_id"]."'
						, user_room   = '".$_POST["user_room"]."'
						, user_year   = '".$_POST["user_year"]."'
						, user_area   = '".$_POST["user_area"]."'
						, user_status   = '".$_POST["user_status"]."'
						, user_address   = '".$_POST["user_address"]."'
						, user_password   = '000000'
						, image = '".$fileName1."'
						WHERE user_id = '".$_POST["user_id"]."'";
				$query1 = mysqli_query($conn,$strSQL1) or die( mysqli_error($conn));

		}
		if(!$query)
			{
                die("เกิดข้อผิดพลาดในการเชื่อมต่อกับเครื่องให้บริการฐานข้อมูล!!!". mysqli_connect_error());
            }else{
                echo "<center>";
				echo "ทำการเพิ่มนักศึกษาเรียบร้อย!<br>";
				echo "</center>";
				echo "<center>";
				echo "รหัสนักศึกษา: ".$user_id."<br>ชื่อ-นามสกุล : ". $user_prefix." ".$user_name."     ".$user_lastname."<br>";
				$qrCode = $user_id;
				echo "</center>";
			?>
				<?php
				echo "<center>";


$qrcodelink = "https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=".$qrCode."&choe=UTF-8";
echo "</center>";
?>
<br>
<center>
<img src=<?php echo $qrcodelink ?>title="QRCode" />
<center>
<br>
<form  name ="form1" method="post" action="saveqrcodeuser.php">
<input type="hidden" value=<?php echo $qrcodelink; ?> name="qrcodelink" />
<input type="hidden" value=<?php echo $user_qrcode ?> name = "user_qrcode" />

                <?php
            }

						echo "<p><input type=\"submit\" class='btn btn-primary' value = \"ทำการบันทึก QRCODE และ กลับหน้าหลัก\" /></p>";

				mysqli_close($con);
             ?>

        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>


</html>

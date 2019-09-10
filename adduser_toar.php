<?php
session_save_path("session/");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
<?php

             $servername = "localhost";
             $username = "id10717672_organic";
             $password = "Tanakorn1340";
             $db = "id10717672_dbactivities";
    $con = new mysqli($servername, $username, $password,$db);
            mysqli_set_charset($con,"utf8");
			$time_join= date("h:i:s");
            $id = $_SESSION["activities_id"];
			$user_idjoin= $_POST['user_id'];
			$activities_id= $_POST['activities_join'];


            $s="INSERT INTO tb_joinac(time_joinar,user_id,activities_id)
            VALUES('$time_join','$user_idjoin','$id')";

            $SQLz = "SELECT * FROM tb_user WHERE user_id = '".$user_idjoin."'";
            $result=mysqli_query($conn,$SQLz) or die ("ไม่สามารถค้นหาข้อมูลได้").mysql_error();
		    $row=mysqli_fetch_assoc($result);

            ?>
<script>
  const imageURL = <?php echo "myfile/".$row['image']; ?>;

swal({
    title: "ผลการค้นหา:",
    text: <?php echo $row["user_name"]." ".$row["user_lastname"]; ?>,
    icon: imageURL,
  })
.then((value) => {
    <?php
            $query=mysqli_query($con,$s);

			if(!$query)
			{

                die("เกิดข้อผิดพลาดในการเชื่อมต่อกับเครื่องให้บริการฐานข้อมูล!!!". mysqli_connect_error());

            }else{
                echo "<center>";
				echo "ทำการเข้าร่วมกิจกรรมเรียบร้อย<br>";
				echo "<p align='center'><a href='login.php'>เข้าสู่ระบบนักศึกษา</a></p>";

				}

			?>
});
</script>

            </body>
            <!-- The core Firebase JS SDK is always required and must be listed first -->
            <script src="/__/firebase/6.5.0/firebase-app.js"></script>

            <!-- TODO: Add SDKs for Firebase products that you want to use
                 https://firebase.google.com/docs/web/setup#reserved-urls -->

            <!-- Initialize Firebase -->
            <script src="/__/firebase/init.js"></script>
</html>

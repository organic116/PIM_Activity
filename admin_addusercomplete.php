<?php
session_save_path("session/");
session_start();
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>ระบบเข้าร่วมกิจกรรมนักศึกษา</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
     <!--<link rel="stylesheet" href="style4.css">-->
	<link rel="stylesheet" href="style4.css?v=<?php echo filemtime('style4.css'); ?>" />

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
	<style type="text/css">
@import 'https://fonts.googleapis.com/css?family=Ubuntu:300, 400, 500, 700';

*, *:after, *:before {
  margin: 0;
  padding: 0;
}

.svg-container {
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  z-index: -1;
}

#svg {
  path {
    transition: .1s;
  }

  &:hover path {
    d: path("M 800 300 Q 400 250 0 300 L 0 0 L 800 0 L 800 300 Z");
  }
}

body {
  background: #fff;
  color: #333;
  font-family: 'Ubuntu', sans-serif;
  position: relative;
}

h3 {
  font-weight: 400;
}

header {
height:4vw;
  color: #fff;
  padding-top: 0vw;
  padding-bottom: 0vw;
  text-align: center;
}
#rcorners2 {
    border-radius: 500px;
    border: 2px solid #3366FF;
    padding: 20px;
    width: 200px;
    height: 150px;
}
</style>
</head>

<body>
   <div class="wrapper">
		<nav id="sidebar">
		<div  class="sidebar-header">
				<h3><center><b>Activities</b></center></h3>
					<strong>AT</strong>
				</div>
					<ul class="list-unstyled components">
					<li class="active">
							<a href="#" >
								<i  class="fas fa-plus"></i>
									เพิ่มนักศึกษา
							</a>
						</li>
						<li >
							<a href="#" >
								<i class="fas fa-calendar-plus"></i>
									เพิ่มกิจกรรม
							</a>
						</li>
						<li>
							<a href="#">
								&nbsp;<i class="fas fa-calendar-alt" ></i>
									กิจกรรมปัจจุบัน
							</a>
						</li>
						<li>
							<a href="#">
								&nbsp;<i class="fas fa-calendar-check"></i>
									กิจกรรมที่ผ่านมาแล้ว
							</a>
						</li>
						<li>
							<a href="#" >
								<i class="fas fa-print"></i>
									พิมพ์รายงานกิจกรรมรายปี
							</a>
						</li>
						<li>
							<a href="#" >
								<i class="fas fa-address-card" ></i>
									นักศึกษาทั้งหมด
							</a>
						</li>
						<li>
							<a href="#" >
								<i class="fas fa-sign-out-alt"></i>
									ออกจากระบบ
							</a>
						</li>
					</ul>
<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<i class="fas fa-align-justify"></i>
</button>
		</nav>



        <!-- Page Content  -->
        <div id="content">
	<div class="svg-container">
    <svg viewbox ="0 0 800 43" class="svg">
      <path id="curve" fill="#00aae1" d="M 800 80 Q 400 350 0 300 L 0 0 L 800 0 L 800 300 Z">
      </path>
    </svg>
  </div>

  <header>
    <h2>ระบบเข้าร่วมกิจกรรมนักศึกษา</h2>
  </header>
  <br>
             <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-arrow-left"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;

                    <h4>เพิ่มนักศึกษา</h4>
                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                        <B>ผู้ใช้งาน :&nbsp;</B><?php echo $_SESSION["personal_name"];?>
                        &nbsp;<B>สถานะ :&nbsp;</B><?php

									$a=$_SESSION["major_id"];
													if ($a==1)
													echo "เจ้าหน้าที่";
													else($a=="")
			                        ?>
                        </ul>
                </div>
            </div>
            </nav>

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
         $username ="id10717672_organic";
         $password ="Tanakorn1340";
         $db ="id10717672_dbactivities";
    $con = new mysqli($servername, $username, $password,$db);
            mysqli_set_charset($con,"utf8");
			$user_qrcode = genuser();
            $user_id= $_POST['user_id'];
            $user_prefix= $_POST['user_prefix'];
			$user_password="000000";
            $user_name= $_POST['user_name'];
            $user_lastname= $_POST['user_lastname'];
			$faculty_id= $_POST['faculty_id'];
			$major_id= $_POST['major_id'];
			$course_id= $_POST['course_id'];
			$user_room= $_POST['user_room'];
			$user_year= $_POST['user_year'];
			$user_area= $_POST['user_area'];
			$user_status= "1";
			//$user_address= $_POST['user_address'];
			  if($_FILES["filUpload"]["name"]  != "")

		{
			$fileName1 = $_FILES["filUpload"]["name"];
			    if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"myfile/".$fileName1))
			{

$s="INSERT INTO			    tb_user(user_qrcode,user_id,user_password,user_prefix,user_name,user_lastname,major_id,faculty_id,user_area,user_room,course_id,user_year,user_status,image) VALUES('$user_qrcode','$user_id','$user_password','$user_prefix','$user_name','$user_lastname','$major_id','$faculty_id','$user_area','$user_room','$course_id','$user_year','$user_status','$fileName1')";
			}
		}else {
			$filename1 = "http://ssl.gstatic.com/accounts/ui/avatar_2x.png";
$s="INSERT INTO			    tb_user(user_qrcode,user_id,user_password,user_prefix,user_name,user_lastname,major_id,faculty_id,user_area,user_room,course_id,user_year,user_status,image) VALUES('$user_qrcode','$user_id','$user_password','$user_prefix','$user_name','$user_lastname','$major_id','$faculty_id','$user_area','$user_room','$course_id','$user_year','$user_status','$filename1')";
			}


            $query=mysqli_query($con,$s);
			if(!$query)
			{
                die("เกิดข้อผิดพลาดในการเชื่อมต่อกับเครื่องให้บริการฐานข้อมูล!!!". mysqli_connect_error());
            }else{
                echo "<center>";
				echo "ทำการเพิ่มนักศึกษาเรียบร้อย!<br>";
				echo "</center>";
				echo "<center>";
				echo "รหัสนักศึกษา: ".$user_id."<br><b>ชื่อ-นามสกุล : ". $user_prefix." ".$user_name."     ".$user_lastname."</b><br>";
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

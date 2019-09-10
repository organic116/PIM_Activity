<?php
session_save_path("session/");
session_start();
?>
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
    <link rel="stylesheet" href="style4.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> <!-- Css ปุ่ม-->
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">

                <h3>ระบบเข้าร่วมกิจกรรมนักศึกษา</h3>
				<strong>AR</strong>


            <ul class="list-unstyled components">
            <li class="active">
                    <a href="admin_activesuimain.php" >
                    <i class="fas fa-paper-plane"></i>
                        เพิ่มกิจกรรม
                    </a></li>

            <li >
                    <a href="admin_uishowar.php">
                    <i class="fas fa-paper-plane"></i>
                        กิจกรรมทั้งหมด
                    </a></li>
			 <li>
				<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
				  <i class="fas fa-briefcase"></i>
				เมนูนักศึกษา</a>

                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="admin_showuser.php">นักศึกษาทั้งหมด</a>
                        </li>
                        <li>
                            <a href="admin_showqrcodeuser.php">QR-CODE นักศึกษา</a>
                        </li>
                    </ul>
                </li>

            <li>
                    <a href="admin_showteacher.php">
                    <i class="fas fa-briefcase"></i>
                        อาจารย์
                    </a></li>
					<li>
                <a href="logout_admin.php" onclick="return confirm('คุณต้องการออกจากระบบใช่หรือไม่ ?')">
                        <i class="fas fa-paper-plane"></i>
                        ออกจากระบบ
                    </a></li>
            </ul>

          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
            </button>
 </div>
        </nav>

        <!-- Page Content  -->
        <div id="content">

             <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-right"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;

                <h4>เพิ่มกิจกรรม</h4>
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
             $servername = "localhost";
    $username = "id10717672_organic";
    $password = "Tanakorn1340";
    $db = "id10717672_dbactivities";

    $con = new mysqli($servername, $username, $password,$db);
            mysqli_set_charset($con,"utf8");
            $a= $_POST['activities_id'];
            $b= $_POST['amphur_list'];
            $m= $_POST['activities_year'];
            $c= $_POST['activities_name'];
            $e= date("Y-m-d");
            $d= $_POST['activities_valueuser'];
            $f= $_POST['activities_hour'];
            $g= $_POST['activities_detail'];
            $h= $_POST['activities_startdate'];
            $i= $_POST['activities_enddate'];
            $j= $_POST['activities_starttime'];
            $k= $_POST['activities_endtime'];
            $l= $_POST['activities_admin'];
            $z=$_POST['province_list'];
			$x=$_POST['activities_status'];
			$q=$_POST['activities_place'];
            	//$last_id = $ret['maxid']; // คืนค่า id ที่ insert สูงสุด
 $s="INSERT INTO tb_activities(activities_id,activities_name,activities_detail,activities_year,genus_id,activities_addstart,activities_startdate,activities_enddate,activities_starttime,activities_endtime,activities_admin,activities_valueuser,activities_hour,type_id,activities_status,activities_place)
            VALUES('$a','$c','$g','$m','$z','$e','$h','$i','$j','$k','$l','$d','$f','$b','$x','$q')";


          $query=mysqli_query($con,$s);

			if(!$query)
			{

                die("เกิดข้อผิดพลาดในการเชื่อมต่อกับเครื่องให้บริการฐานข้อมูล!!!". mysqli_connect_error());

            }else{
				 echo "<script>";
				echo "alert(\"บันทึกเรียบร้อย\");";
				echo "window.location=\"admin_uishowar.php\"";
				echo "</script>";

            }

						//echo "<p align='center'><a href='admin_activesuimain.php'>กลับหน้าหลัก</a></p>";
                     //   echo "<p align='center'><a href='admin_uishowar.php'>หน้ากิจกรรม</a></p>";

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

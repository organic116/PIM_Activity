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
     <!--<link rel="stylesheet" href="style4.css">-->
	<link rel="stylesheet" href="style4.css?v=<?php echo filemtime('style4.css'); ?>" />
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> <!-- Css ปุ่ม-->
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
<style type="text/css">

img:disabled {
  opacity:0.1;
}
a.disabled {
   pointer-events: none;
   cursor: default;

}

	</style>
</head>

<body>
   <div class="wrapper">
		<nav id="sidebar">
		<div class="sidebar-header">
				<h3><center><b>Activities</b></center></h3>
					<strong>AT</strong>
				</div>
					<ul class="list-unstyled components">
					<li >
							<a href="admin_adduser.php" >
								&nbsp;<i  class="fas fa-plus"></i>
									เพิ่มนักศึกษา
							</a>
						</li>
						<li>
							<a href="admin_activesuimain.php" >
								&nbsp;<i class="fas fa-calendar-plus"></i>
									เพิ่มกิจกรรม
							</a>
						</li>
						<li >
							<a href="admin_uishowar.php">
								&nbsp;<i class="fas fa-calendar-alt" ></i>
									กิจกรรมปัจจุบัน
							</a>
						</li>
						<li>
							<a href="admin_uishowarlast.php">
								&nbsp;<i class="fas fa-calendar-check"></i>
									กิจกรรมที่ผ่านมาแล้ว
							</a>
						</li>
						<li>
							<a href="admin_arreport.php">
								&nbsp;<i class="fas fa-print"></i>
									พิมพ์รายงานกิจกรรมรายปี
							</a>
						</li>
						<li class="active">
							<a href="admin_showuser.php">
								&nbsp;<i class="fas fa-address-card" ></i>
									นักศึกษาทั้งหมด
							</a>
						</li>
						<li>
							<a href="logout_admin.php" onclick="return confirm('คุณต้องการออกจากระบบใช่หรือไม่ ?')">
								&nbsp;<i class="fas fa-sign-out-alt"></i>
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

                    <h4>แสดงข้อมูลนักศึกษา</h4>
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
			<table width="100%" cellpadding="4" cellspacing="0" ><tr id="rcorners2"><td>
			<br>
		<a href='admin_showuser.php'>
			   &nbsp;&nbsp;&nbsp;&nbsp;<button type='button' id='sidebarCollapse' class='btn btn-info'>
			 <i class="fas fa-home"></i>&nbsp;กลับหน้าแสดงข้อมูลนักศึกษา
					</button></a>
		<br>
		</br>
 <?php
		$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
		mysqli_query($conn, "SET NAMES UTF8");
		$stu_id = $_GET["stu_id"];
		//yer =  date('Y')+543;
		$sql="SELECT
tb_user.user_id,
tb_user.user_prefix,
tb_user.user_name,
tb_user.user_lastname,
tb_user.major_id,
tb_user.user_room,
tb_user.user_year,
tb_user.user_status,
tb_major.major_name,
tb_major.course_id,
tb_course.course_name,
tb_user.user_statusqrcode,
tb_user.user_imgqrcode,
tb_user.user_status,
tb_status.s_name,
tb_user.image
FROM
tb_user
INNER JOIN tb_major ON tb_user.major_id = tb_major.major_id
INNER JOIN tb_course ON tb_major.course_id = tb_course.course_id
INNER JOIN tb_status ON tb_user.user_status = tb_status.s_id
 where user_id='$stu_id' ";
		$result=mysqli_query($conn,$sql) or die ("ไม่สามารถค้นหาข้อมูลได้").mysql_error();
		if(mysqli_num_rows($result) == 1)
		{
			while($row = mysqli_fetch_array($result)){
			echo "<form name='frmedituser' method='POST' action='testqrcode.php?stu_id=". $row["user_id"]."' enctype='multipart/form-data'>";
			echo "<center>";
			echo "<span>";
			echo " <label>รูป QR-CODE</label>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ";
			echo " <label>รูปนักศึกษา</label>";
			echo "<br>";
			echo "<img src=$row[user_imgqrcode] title=\"QRCode\" name=\"qrcode\" />";
			if($row["image"] == "http://ssl.gstatic.com/accounts/ui/avatar_2x.png"){
			echo "<img src= '$row[image]' name=\"image\" width='200'  height='200' / >";
			} else {
			echo "<img src= 'myfile/$row[image]' name=\"image\" width='200'  height='200' / >";
			}
			echo "</span>";
			echo "</center>";
			echo "<br>";
			echo "<div class='form-row'>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;<div  class='form-group col-md-2'>";
			echo "<label for='activities_year'>รหัสนักศึกษา</label>";
			echo "<input type='text' class='form-control'  id='user_id' name='user_id' value='$row[user_id]' readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-1'>";
			echo " <label for='user_prefix'>คำนำหน้า</label>";
			echo "<input type='text' class='form-control'  id='user_prefix' name='user_prefix' value='$row[user_prefix]' readonly >";
			echo "</div>";
			echo "<div  class='form-group col-md-3'>";
			echo " <label for='user_name'>ชื่อ</label>";
			echo "<input type='text' class='form-control'  id='user_name' name='user_name' value='$row[user_name]' readonly >";
			echo "</div>";
			echo "<div  class='form-group col-md-3'>";
			echo " <label for='user_lastname'>นามสกุล</label>";
			echo "<input type='text' class='form-control'  id='user_lastname' name='user_lastname' value='$row[user_lastname]' readonly >";
			echo "</div>";
			echo "</div>";

			echo "<div class='form-row'>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;<div  class='form-group col-md-4'>";
			echo "<label for='major_id'>สาขา</label>";
			echo "<input type='text' class='form-control'  id='major_id' name='major_id' value='$row[major_name]' readonly >";
			echo "</div>";
			echo "<div  class='form-group col-md-2'>";
			echo "<label for='course_id'>หลักสูตร</label>";
			echo "<input  class='form-control '  id='course_id' name='course_id' value='$row[course_name]' readonly>";
			echo "</div>";
			echo "</div>";

			echo "<div class='form-row'>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;<div  class='form-group col-md-2'>";
			echo "<label for='user_year'>ปีการที่เข้าศึกษา</label>";
			echo "<input type='text' class='form-control'  id='user_year' name='user_year' value='$row[user_year]' readonly >";
			echo "</div>";
			echo "<div  class='form-group col-md-1'>";
			echo "<label for='user_year'>ชั้นปี</label>";
			//echo "<input type='text' class='form-control'  id='user_year' name='user_year' value='$yer' readonly >";
				 $yer =  date('Y')+543;
				if ($yer - $row["user_year"]<='1')
				echo "<input type='text' class='form-control'  id='user_year' name='user_year' value='1' readonly >";
				else if ($yer - $row["user_year"]=='2')
					echo "<input type='text' class='form-control'  id='user_year' name='user_year' value='2' readonly >";
				else if ($yer - $row["user_year"]=='3')
					echo "<input type='text' class='form-control'  id='user_year' name='user_year' value='3' readonly >";
				else if ($yer - $row["user_year"]>='4')
					echo "<input type='text' class='form-control'  id='user_year' name='user_year' value='4' readonly >";
			else($yer - $row["user_year"]=="") ;
			echo "</div>";
			echo "<div  class='form-group col-md-1'>";
			echo "<label for='user_room'>ห้อง</label>";
			echo "<input type='text' class='form-control'  id='user_room' name='user_room' value='$row[user_room]' readonly >";
			echo "</div>";
			echo "<div  class='form-group col-md-1'>";
			echo "<label for='user_status'>สถานะ</label>";
			echo "<input type='text' class='form-control'  id='user_status' name='user_status' value='$row[s_name]' readonly >";
			echo "</div>";
			echo "<div  class='form-group col-md-2'>";
			echo "<label for='user_statusqrcode'>สถานะการแจก QR-CODE</label>";
			if ($row["user_statusqrcode"]=='0'){
			echo "<input  class='form-control  ' value='ยังไม่ได้แจก ' readonly>";}
			else if ($row["user_statusqrcode"]=='1'){
			echo "<input  class='form-control ' value='แจกแล้ว' readonly>";}
			else if($row["user_statusqrcode"]==''){
			echo "<input  class='form-control col-md-1'  id='user_status' name='user_statusqrcode' value='$row[user_statusqrcode]' >";
			}
			echo "</div>";
			echo "</div>";
			echo "</form>";
			}
		}
		else{
			echo "ไม่พบข้อมูลนักศึกษา";

		}
		mysqli_close($conn);
	?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


        </div>
    </div>
</td></tr></table>
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
    <!-- นำเข้า Javascript jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>


</body>


</html>

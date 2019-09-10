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
#div1 {
    float:left;

    height:100px;

    text-align:center;
}
#div2 {
    float:left;

    height:100px;

    text-align:center;
}
#div3 {
    float:left;

    height:100px;

    text-align:center;
}
#div4 {
    float:left;

    height:100px;

    text-align:center;
}
</style>
<script>
function myFunction() {
 <?php
if(!isset($_SESSION['personal_id'])) {
	 ?>
		 alert('เซซซันหมด!');
window.location="login_teacher.php";
<?php } ?>
}
</script>
</head>

<body onload="myFunction()">

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
               <h3><center><b>Activities</b></center></h3>
					<strong>AT</strong>
            </div>
            <ul class="list-unstyled components">
            <li >
                    <a href="teacher_showuser.php">
                      <i class="fas fa-address-card" ></i>
                        นักศึกษา
                    </a>
            </li>
                 <li class="active">
                    <a href="teacher_mainui.php">
                        <i class="fas fa-home"></i>
                        กิจกรรมทั้งหมด
                    </a>

                </li>
                <li>
                <a href="logout_teacher.php" onclick="return confirm('คุณต้องการออกจากระบบใช่หรือไม่ ?')">
                        <i class="fas fa-paper-plane"></i>
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

                    </button>
             <h4> รายละเอียดกิจกรรม </h4>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                       <B>ผู้ใช้งาน  : &nbsp;</B><?php echo $_SESSION["personal_name"];?>
                        &nbsp;<?php echo $_SESSION["personal_lastname"];?> &nbsp;<B>สถานะผู้ใช้งาน : &nbsp;</B><?php

									$dep=$_SESSION["dep_id"];
													if ($dep>1)
													echo "อาจารย์";
													else($dep=="")

									?>
                        </ul>
                    </div>
                </div>
            </nav>
		<a href=' teacher_mainui.php'>
			   &nbsp;&nbsp;&nbsp;&nbsp;<button type='button' id='sidebarCollapse' class='btn btn-info'>
			 <i class="fas fa-home"></i>&nbsp;กลับหน้าค้นนักศึกษา
					</button></a>
		<br>
		</br>
  <?php
function DateThai($strDate)
{
$strYear = date("Y",strtotime($strDate))+543;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
$strMonthThai=$strMonthCut[$strMonth];
return "$strDay $strMonthThai $strYear";
}

$strDate =date("d-m-Y");
?>
 <?php
		$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
		mysqli_query($conn, "SET NAMES UTF8");
		$ar_id = $_GET["ar_id"];
		$sql="select * from tb_activities where activities_id='$ar_id' ";
		echo "<form name='frmeditteacher' method='POST' action='b03-update.php' enctype='multipart/form-data'>";
		$result=mysqli_query($conn,$sql) or die ("ไม่สามารถค้นหาข้อมูลได้").mysql_error();
		if(mysqli_num_rows($result) == 1)
		{
			while($row = mysqli_fetch_array($result)){
			echo "<div class='form-row'>";
			echo "<div  class='form-group col-md-3'>";
			echo " <label for='activities_year'>ปีการศึกษา</label>";
			echo "<input type='number' class='form-control'  id='activities_year' name='activities_year' value='$row[activities_year]' readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-3'>";
			echo "<label for='activities_year'>กลุ่ม</label>";
			if ($row["genus_id"]=='1'){
			echo "<input  class='form-control' value='กิจกรรมบังคับ' readonly>";}
			else if ($row["genus_id"]=='2'){
			echo "<input  class='form-control' value='กิจกรรมเลือก' readonly>";}
			else if ($row["genus_id"]=='3'){
			echo "<input  class='form-control' value='กิจกรรมอื่นๆ' readonly>";}
			else if($row["genus_id"]=='0'){
			echo "<input  class='form-control'  id='genus_id' name='genus_id' value='$row[genus_id]' readonly>";
			}
			echo "</div>";

			echo "<div  class='form-group col-md-3'>";
			echo "<label for='activities_year'>ประเภทกิจกรรม</label>";
      if ($row["type_id"]=='10'){
          echo "<input  class='form-control' value='ปฐมนิเทศ' readonly>";}
        else if ($row["type_id"]=='11'){
          echo "<input  class='form-control' value='อบรม' readonly>";}
        else if ($row["type_id"]=='12'){
          echo "<input  class='form-control' value='ทดสอบ' readonly>";}
        else if ($row["type_id"]=='13'){
          echo "<input  class='form-control' value='แข่งขันกีฬา' readonly>";}
        else if ($row["type_id"]=='14'){
          echo "<input  class='form-control' value='ศึกษาดูงาน' readonly>";}
        else if ($row["type_id"]=='15'){
          echo "<input  class='form-control' value='เข้าค่าย' readonly>";}
        else if ($row["type_id"]=='16'){
          echo "<input  class='form-control' value='งานแสดง' readonly>";}
        else if ($row["type_id"]=='17'){
          echo "<input  class='form-control' value='ปัจฉิมนิเทศ' readonly>";}
			else if($row["type_id"]=='0'){
			echo "<input  class='form-control'  id='type_id' name='type_id' value='$row[type_id]' readonly>";
			}
			echo "</div>";
			echo "</div>";

			echo "<div class='form-row'>";
			echo "<div  class='form-group col-md-4'>";
			echo "<label for='activities_year'>ชื่อกิจกรรม</label>";
			echo "<input type='text' class='form-control'  id='activities_name' name='activities_name' value='$row[activities_name]' readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-4'>";
			echo "<label for='activities_place'>สถานที่จัดกิจกรรม</label>";
			echo "<input type='text' class='form-control'  id='activities_place' name='activities_place' value='$row[activities_place]' readonly>";
			echo "</div>";
			echo "</div>";
			echo "<div class='form-row'>";
			echo "<div  class='form-group col-md-2'>";
			echo "<label for='activities_year'>วันเพิ่มกิจกรรม</label>";
			echo "<input type='text' class='form-control'  id='activities_addstart' name='activities_addstart'
			value='".DateThai($row["activities_addstart"])."' readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-2'>";
			echo "<label for='activities_valueuser'>จำนวนนักศึกษา</label>";
			echo "<input type='text' class='form-control'  id='activities_valueuser' name='activities_valueuser' value='$row[activities_valueuser]' readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-2'>";
			echo "<label for='activities_hour'>ชั่วโมงกิจกรรม</label>";
			echo "<input type='text' class='form-control'  id='activities_hour' name='activities_hour' value='$row[activities_hour]' readonly>";
			echo "</div>";
			echo "</div>";

			echo "<div class='form-row'>";
			echo "<div class='form-group'>";
			echo "<label for='activities_detail'>รายละเอียดกิจกรรม</label>";
			echo  "<textarea readonly rows='4' cols='150' class='form-control' id='activities_detail' name='activities_detail'>$row[activities_detail]</textarea>";
			echo  "</div>";
			echo "</div>";

			echo "<div class='form-row'>";
			echo "<div  class='form-group col-md-2'>";
			echo "<label for='activities_startdate'>วันเดือนปีที่เริ่มกิจกรรม</label>";
			echo "<input type='text' class='form-control'  id='activities_startdate' name='activities_startdate' value='".DateThai($row["activities_startdate"])."' readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-2'>";
			echo "<label for='activities_enddate'>วันเดือนปีที่สิ้นสุดกิจกรรม</label>";
			echo "<input type='text' class='form-control'  id='activities_enddate' name='activities_enddate' value='".DateThai($row["activities_enddate"])."' readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-1'>";
			echo "<label for='activities_starttime'>เวลาที่เริ่ม</label>";
			echo "<input type='text' class='form-control'  id='activities_starttime' name='activities_starttime' value='$row[activities_starttime]' readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-1'>";
			echo "<label for='activities_endtime'>เวลาที่สิ้นสุด</label>";
			echo "<input type='text' class='form-control'  id='activities_endtime' name='activities_endtime' value='$row[activities_endtime]' readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-3'>";
			echo "<label for='activities_admin'>ผู้ดูแลกิจกรรม</label>";
			echo "<input type='text' class='form-control'  id='activities_admin' name='activities_admin' value='$row[activities_admin]' readonly>";
			echo "</div>";
			echo "</div>";



			echo "</form>";
			}
		}
		else{
			echo "ไม่พบข้อมูลกิจรรมที่ต้องการแก้ไข";

		}
		mysqli_close($conn);
	?>
	<?php
   $conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
    mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

    //2. query ข้อมูลจากตาราง :
    $query0 = "SELECT COUNT(activities_id) AS countjoin FROM tb_joinac WHERE activities_id = '".$_GET["ar_id"]."' " or die(mysql_error());
    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
	$result0 = mysqli_query($conn,$query0);
	$row = mysqli_fetch_array($result0,MYSQLI_ASSOC);
		$count = $row["countjoin"];



  ?>
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

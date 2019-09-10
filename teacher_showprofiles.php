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
            <li class="active">
                    <a href="teacher_showuser.php">
                      <i class="fas fa-address-card" ></i>
                        นักศึกษา
                    </a>
            </li>
                 <li >
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
             <h4> ข้อมูลนักศึกษา </h4>
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

		<br>
		<a href='teacher_showuser.php'>
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
	<!-- <h4 class="widget-title blue smaller">
<i class="ace-icon fa fa-rss orange"></i>
กิจกรรมที่เข้าร่วมทั้งหมด</h4>
<?php
   $conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
    mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
    //2. query ข้อมูลจากตาราง :
    $query0 = "SELECT COUNT(activities_id) AS countactivities FROM tb_joinac   " or die(mysql_error());

	$query4 = "SELECT * FROM  tb_joinac INNER JOIN tb_activities ON tb_joinac.activities_id = tb_activities.activities_id WHERE  tb_joinac.user_id = '".$stu_id."'";

	$result4 = mysqli_query($conn,$query4);
	$rowcount4=mysqli_num_rows($result4);
	$hour4 = 0;
	while($row4 = mysqli_fetch_array($result4)){
	$hour4 += $row4["activities_hour"];
	}

	echo  "เข้าร่วม ".$rowcount4." ครั้ง   รวม ".$hour4." ชั่วโมง";

  ?>
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

    //1. เชื่อมต่อ database:
    $conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
    mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
	$stu_id = $_GET["stu_id"];
	$query = "SELECT * FROM tb_joinac WHERE user_id = '".$stu_id."' " or die(mysql_error());
    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
    $result = mysqli_query($conn,$query);
	?>
	<div class='col-lg-12' >
<table  border='3' align='center' class='form-group table table-bordered'>
<tr align='center' bgcolor='FFDAB9'>
 <h6>
 <th width='100'>ชื่อกิจกรรม</th>
 <th width='100'>กลุ่มกิจกรรม</th>
 <th width='100'>วันที่จัดกิจกรรม</th>
 </h6></tr>
 </thead>
  <?php
$i = 1;
while($row = mysqli_fetch_array($result)){

$query_user = "SELECT * FROM tb_activities WHERE activities_id = '".$row ["activities_id"]."' " or die(mysql_error());
	$result_user = mysqli_query($conn,$query_user);
while($aaa = mysqli_fetch_array($result_user)){

$query_userq = "SELECT * FROM tb_activities WHERE activities_id = '".$aaa ["activities_id"]."' " or die(mysql_error());
	$result_userq = mysqli_query($conn,$query_userq);
while($aaaq = mysqli_fetch_array($result_userq)){


	$query_userz = "SELECT * FROM tb_activities WHERE activities_id  = '".$aaa ["activities_id"]."' " or die(mysql_error());
	$result_userz = mysqli_query($conn,$query_userz);
while($aaaz = mysqli_fetch_array($result_userz)){

	$query_userza = "SELECT * FROM tb_activities WHERE activities_id  = '".$aaa ["activities_id"]."' " or die(mysql_error());
	$result_userza = mysqli_query($conn,$query_userza);
while($aaaza = mysqli_fetch_array($result_userza)){


?>
 <tr>

	<td><div><?php echo $aaa ["activities_name"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  DateThai( $aaaza ["activities_startdate"]);?></div></a></td>
	<?php
	?>


  </tr>
<?php
		$i++;
}
}
}
}
}
?>
</table>

<?php
$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
require('fpdf.php');//ที่อยู่ของไฟล์ mpdf.php ในเครื่องเรานะครับ
ob_start(); // ทำการเก็บค่า html นะครับ
?>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">

<style type="text/css">
<!--
@page rotated { size: landscape; }
.style1 {
	font-family: "TH SarabunPSK";
	font-size: 16pt;
	font-weight: bold;
}
.style2 {
	font-family: "TH SarabunPSK";
	font-size: 16pt;
	font-weight: bold;
}
.style3 {
	font-family: "TH SarabunPSK";
	font-size: 16pt;

}
.style5 {cursor: hand; font-weight: normal; color: #000000;}
.style9 {font-family: Tahoma; font-size: 12px; }
.style11 {font-size: 12px}
.style13 {font-size: 9}
.style16 {font-size: 9; font-weight: bold; }
.style17 {font-size: 12px; font-weight: bold; }

</style>
<?php
$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
		mysqli_query($conn, "SET NAMES UTF8");
		$stu_id = $_GET["stu_id"];
		$sql=" select * from tb_user where user_id='".$stu_id."' ";
		$result=mysqli_query($conn,$sql) or die ("ไม่สามารถค้นหาข้อมูลได้").mysql_error();
		$row=mysqli_fetch_assoc($result);

		mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
			$queryAc = "SELECT * FROM tb_joinac WHERE user_id = '".$stu_id."' " or die(mysql_error());
    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
		$resultAc = mysqli_query($conn,$queryAc);
		 if ($row["major_id"]=='701')
                    $major = "วิศวกรรมคอมพิวเตอร์";
                   else if ($row["major_id"]=='702')
                     $major=  "เทคโนโลยีสารสนเทศ";
                     else if($row["major_id"]=='703')
                    $major=  "วิศวกรรมอุตสาหการ";
                     else if($row["major_id"]=='704')
                    $major=  "วิศวกรรมการผลิตยานยนต์";
                     else if ($row["major_id"]=='705')
                    $major=  "วิศวกรรมหุ่นยนต์และระบบอัตโนมัติ";
                    else($row["major_id"]=="");

		 if ( $row["faculty_id"]=='105')
                   $faculty =  "วิศวกรรมศาสตร์และเทคโนโลยี";
                    else( $row["faculty_id"]=="");

	define('FPDF_FONTPATH','font/');

	class PDF extends FPDF
	{
		function Header(){

			$this->AddFont('angsa','','angsa.php');
			$this->SetFont('angsa','',15);
	 		$this->Cell(0,0,iconv( 'UTF-8','TIS-620','หน้าที่... '.$this->PageNo()),0,1,"R");
			$this->Image('myfile/logo.png',10,12,25,0,'');
			$this->Ln(15);


		}

		function Footer(){
			$this->AddFont('angsa','','angsa.php');
			$this->SetFont('angsa','',10);
			$this->SetLeftMargin( 108 );
$this->Ln(130);

$this->SetY(-35);
$this->AddFont('cordiab','','cordiab.php');
$this->SetFont('cordiab','',9);
$this->SetFillColor(240,231,155);
$this->Cell(100,4,iconv('UTF-8','TIS-620','สรุปผลการเข้าร่วมกิจกรรม'),1,0,'C',true);
$this->Ln();
$this->SetFillColor(224,235,255);
$this->Cell(70,4,iconv('UTF-8','TIS-620','ประเภทกิจกรรม'),1,0,'C',true);
$this->Cell(15,4,iconv('UTF-8','TIS-620','ครั้ง'),1,0,'C',true);
$this->Cell(15,4,iconv('UTF-8','TIS-620','ชั่วโมง'),1,0,'C',true);
$this->Ln();
$this->Cell(70,4,iconv('UTF-8','TIS-620','กิจกรรมบังคับ'),1,0,'L',true);
	$stu_id = $_GET["stu_id"];
		$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
    mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
    //2. query ข้อมูลจากตาราง :
    $query0 = "SELECT COUNT(activities_id) AS countactivities FROM tb_joinac   " or die(mysql_error());

	$query1 = "SELECT * FROM  tb_joinac INNER JOIN tb_activities ON tb_joinac.activities_id = tb_activities.activities_id WHERE tb_activities.genus_id = '1' AND tb_joinac.user_id = '".$stu_id."'";
	$query2 = "SELECT * FROM  tb_joinac INNER JOIN tb_activities ON tb_joinac.activities_id = tb_activities.activities_id WHERE tb_activities.genus_id = '2' AND tb_joinac.user_id = '".$stu_id."'";
	$query3 = "SELECT * FROM  tb_joinac INNER JOIN tb_activities ON tb_joinac.activities_id = tb_activities.activities_id WHERE tb_activities.genus_id = '3' AND tb_joinac.user_id = '".$stu_id."'";
	$query4 = "SELECT * FROM  tb_joinac INNER JOIN tb_activities ON tb_joinac.activities_id = tb_activities.activities_id WHERE  tb_joinac.user_id = '".$stu_id."'";
    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
	$result1 = mysqli_query($conn,$query1);
	$rowcount1=mysqli_num_rows($result1);
	$this->Cell(15,4,iconv('UTF-8','TIS-620',$rowcount1),1,0,'C',true);
	$hour1 = 0;
	while($row1 = mysqli_fetch_array($result1)){
	$hour1 += $row1["activities_hour"];

	}
	$this->Cell(15,4,iconv('UTF-8','TIS-620',$hour1),1,0,'C',true);

	$this->Ln();
	$this->Cell(70,4,iconv('UTF-8','TIS-620','กลุ่มกิจกรรมเลือก'),1,0,'L',true);
	$result2 = mysqli_query($conn,$query2);
	$rowcount2=mysqli_num_rows($result2);
	$this->Cell(15,4,iconv('UTF-8','TIS-620',$rowcount2),1,0,'C',true);
	$hour2 = 0;
	while($row2 = mysqli_fetch_array($result2)){
	$hour2 += $row2["activities_hour"];

	}
	$this->Cell(15,4,iconv('UTF-8','TIS-620',$hour2),1,0,'C',true);

	$this->Ln();
	$this->Cell(70,4,iconv('UTF-8','TIS-620','กลุ่มกิจกรรมอื่น ๆ'),1,0,'L',true);
	$result3 = mysqli_query($conn,$query3);
	$rowcount3=mysqli_num_rows($result3);
	$this->Cell(15,4,iconv('UTF-8','TIS-620',$rowcount3),1,0,'C',true);
	$hour3 = 0;
	while($row3 = mysqli_fetch_array($result3)){
	$hour3 += $row3["activities_hour"];


	}
	$this->Cell(15,4,iconv('UTF-8','TIS-620',$hour3),1,0,'C',true);

	$this->Ln();
	$this->Cell(70,4,iconv('UTF-8','TIS-620','รวมทั้งหมด'),1,0,'L',true);
	$result4 = mysqli_query($conn,$query4);
	$rowcount4=mysqli_num_rows($result4);
	$this->Cell(15,4,iconv('UTF-8','TIS-620',$rowcount4),1,0,'C',true);
	$hour4 = 0;
	while($row4 = mysqli_fetch_array($result4)){
	$hour4 += $row4["activities_hour"];
	}
		$this->Cell(15,4,iconv('UTF-8','TIS-620',$hour4),1,0,'C',true);
$this->Ln();
			$this->Ln();
	 		$this->Cell(0,0,iconv( 'UTF-8','TIS-620','งานกิจกรรม คณะวิศวกรรมศาสตร์และเทคโนโลยี '),0,1,"L");
			$this->Cell(0,0,iconv( 'UTF-8','TIS-620','Create date : '.DateThai(date("Y-m-d"))),0,1,"R");
		}

	}

	$pdf=new PDF('P','mm','A4');
	$pdf->SetMargins( 5,5,5 );
	$pdf->AddPage();
	$pdf->AddFont('cordiab','','cordiab.php');
	$pdf->SetFont('cordiab','',17);

$pdf->AliasNbPages();//จำนวนหน้าทั้งหมด
$pdf->Cell(0,10,iconv('UTF-8','TIS-620','ใบรับรองการเข้าร่วมกิจกรรมเสริมหลักสูตร'), 0 , 1 ,'C' );
$pdf->AddFont('angsa','','angsa.php');
$pdf->SetFont('angsa','',15);
$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620','สถาบันการจัดการปัญญาภิวัฒน์'),0,1,"C");
$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620','85/1 หมู่ 2 ถ.แจ้งวัฒนะ ต.บางตลาด อ.ปากเกร็ด จังหวัด นนทบุรี 11120'),0,1,"C");

$pdf->SetLeftMargin(5);
$pdf->Ln();
$pdf->Cell(0,7,iconv( 'UTF-8','cp874' ,'รหัสนักศึกษา :'.$row["user_id"].''),0,1,'L',$pdf->Cell(0,7,iconv( 'UTF-8','cp874' , 'ชื่อ-สกุล :'.$row["user_name"].'   '.$row["user_lastname"].'' ) , 0, 1,'C' ),$pdf->Cell(0,-7,iconv( 'UTF-8','cp874' , 'วันเดือนปีเกิด :'.DateThai($row["user_date"]).'' ) , 0, 1,'R' ) );

$pdf->Cell(0,7,iconv( 'UTF-8','cp874' , 'หลักสูตร :'.$row["course_id"].'') , 0, 1 ,'L',$pdf->Cell(0,7,iconv( 'UTF-8','cp874' , 'คณะ : '.$faculty.'' ) , 0, 1,'C' ),$pdf->Cell(0,-7,iconv( 'UTF-8','cp874' , 'พื้นที่ : นนทบุรี ' ) , 0, 1,'R' )  );

$pdf->Cell(0,8,iconv( 'UTF-8','cp874' , 'สาขาวิชา :'.$major.'' ) , 0, 1 ,'L');
$pdf->SetFillColor(240,231,155);
$pdf->Cell(200,7,iconv('UTF-8','TIS-620','กิจกรรม  '),1,0,'C',true);
$pdf->Ln();
$pdf->SetFillColor(224,235,255);

$pdf->Cell(80,7,iconv('UTF-8','TIS-620','ชือกิจกรรม'),1,0,'C',true);
$pdf->Cell(40,7,iconv('UTF-8','TIS-620','ปีการศึกษา'),1,0,'C',true);
$pdf->Cell(50,7,iconv('UTF-8','TIS-620','กลุ่ม'),1,0,'C',true);
$pdf->Cell(30,7,iconv('UTF-8','TIS-620','ชั่วโมง'),1,0,'C',true);
$pdf->Ln();

	while($rowAc = mysqli_fetch_array($resultAc)) {
		$sqlr=" select * from tb_activities where activities_id='".$rowAc["activities_id"]."' ";
		$resultr=mysqli_query($conn,$sqlr) or die ("ไม่สามารถค้นหาข้อมูลได้").mysql_error();
		$rowr=mysqli_fetch_assoc($resultr);
		 if ($rowr["genus_id"]=='1')
			$genus = "กิจกรรมบังคับ";
			else if ($rowr["genus_id"]=='2')
			 $genus = "กิจกรรมเลือก";
			 else if ($rowr["genus_id"]=='3')
				$genus = "กิจกรรมอื่นๆ";
			 else($rowr["genus_id"]=="");

	$pdf->Cell(80,7,iconv( 'UTF-8','TIS-620',''.$rowr["activities_name"].'' ),1,"C");
	$pdf->Cell(40,7,iconv( 'UTF-8','TIS-620',''.$rowr["activities_year"].'' ),1,"C");
	$pdf->Cell(50,7,iconv( 'UTF-8','TIS-620',''.$genus.'' ),1,'L');
	$pdf->Cell(30,7,iconv( 'UTF-8','TIS-620',''.$rowr["activities_hour"].'' ),1,"C");
	$pdf->Ln();

	}
				$pdf->Output("MyPDF/การเข้าร่วม ".$stu_id.".pdf","F");
				echo "<button  class='btn btn-primary'><a href=\"MyPDF/การเข้าร่วม ".$stu_id.".pdf\">พิมพ์รายงาน</button>";
?>
</div>
<?php
$i = 1;
while($row = mysqli_fetch_array($result)){

$query_user = "SELECT * FROM tb_activities WHERE activities_id = '".$row ["activities_id"]."' " or die(mysql_error());
	$result_user = mysqli_query($conn,$query_user);
while($aaa = mysqli_fetch_array($result_user)){


?>
<?Php


	}


?>
<?php
		$i++;


}
?>-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


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
    <!-- นำเข้า Javascript jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>


</body>


</html>

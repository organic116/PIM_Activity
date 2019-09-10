<?php
session_save_path("session/");
session_start();
?>
<!DOCTYPE html>
<html>
<head>

 <SCRIPT LANGUAGE="JavaScript">
function printPage() {
if (window.print)
window.print()
else
alert("Sorry, your browser doesn't support this feature.");
}
</SCRIPT>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>ระบบเข้าร่วมกิจกรรมนักศึกษา</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
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
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
               	<h3><center><b>Activities</b></center></h3>
					<strong>AT</strong>
				</div>

            <ul class="list-unstyled components">
			<li>
                    <a href="user_joinavi.php">
                        <i class="fas fa-briefcase"></i>
                        การเข้าร่วมกิจกรรม
                    </a></li>
			<li >
                    <a href="user_profileshow.php">
                       <i class="fas fa-address-card" ></i>
                        ประวัตินักศึกษา
                    </a></li>
					<li class="active">
                    <a href="report_ar.php">
                        <i class="fas fa-image"></i>
                       รายงานสรุปรวมกิจกรรม
					 </a></li>

			<!--<li>
					<a href="activities_uimain.php">
                      <i class="fas fa-calendar-alt" ></i>
                        กิจกรรมทั้งหมด
                    </a></li>-->


            <!-- <li>
                    <a href="report_ar.php">
                        <i class="fas fa-image"></i>
                       รายงานสรุปรวมกิจกรรม
					 </a></li>-->

                <li>
                <a href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบใช่หรือไม่ ?')">
                      <i class="fas fa-sign-out-alt"></i>
                        ออกจากระบบ
                    </a></li>

            </ul>

            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i></button>
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
                <i class="fas fa-align-right"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;

                <h4> พิมพ์สรุปรายงานการเข้าร่วมกิจกรรม</h4>

             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                            <B>ผู้ใช้งาน :&nbsp;</B><?php echo $_SESSION["user_name"];?>&nbsp;
									<B>สถานะ :&nbsp;</B><?php

									$a=$_SESSION["user_status"];
													if ($a==1)
													echo "นักศึกษา";
													else if($a==3)
													echo "พ้นสภาพ";
													else($a==0)

									?>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
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
-->
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
</head>
<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td align="center" valign="top"><img src="assets/images/logo/logo.png"  class="img" alt=""/></td>

      <td align="center" valign="top">
	  ใบรับรองการเข้าร่วมกิจกรรมเสริมหลักสูตร<br>
	  <span>สถาบันการจัดการปัญญาภิวัฒน์</span><br>
        <span>85/1 หมู่ 2 ถ.แจ้งวัฒนะ ต.บางตลาด อ.ปากเกร็ด จังหวัด นนทบุรี 11120</span>

       </td>
<td></td>
    </tr>
	 <?php function DateThai($strDate)
{
	$strYear = date("Y",strtotime($strDate))+543;
	$strMonth= date("n",strtotime($strDate));
	$strDay= date("j",strtotime($strDate));
	$strMonthCut = Array("","มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน","พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม","กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
	$strMonthThai=$strMonthCut[$strMonth];
	return "$strDay $strMonthThai $strYear";

}
?>
	<?php
		$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
		mysqli_query($conn, "SET NAMES UTF8");
		$sql="SELECT
tb_user.major_id,
tb_major.major_id,
tb_major.major_name,
tb_user.user_id,
tb_user.user_name,
tb_user.user_lastname,
tb_major.course_id,
tb_course.course_id,
tb_course.course_name,
tb_user.user_room,
tb_user.user_year,
tb_user.user_status,
tb_faculty.faculty_name
FROM
tb_user
INNER JOIN tb_faculty ON tb_user.faculty_id = tb_faculty.faculty_id
INNER JOIN tb_major ON tb_user.major_id = tb_major.major_id
INNER JOIN tb_course ON tb_major.course_id = tb_course.course_id where user_id='".$_SESSION['user_id']."' ";
		$result=mysqli_query($conn,$sql) or die ("ไม่สามารถค้นหาข้อมูลได้").mysql_error();
		$row=mysqli_fetch_assoc($result);?>

    <tr>
      <td colspan="3" align="center"><table width="90%" border="0" cellspacing="0" cellpadding="0" class="name">
        <tbody>
          <tr>
            <td><strong>รหัสนักศึกษา : </strong></td>
            <td><?php echo $row['user_id'] ?></td>
            <td><strong>ชื่อ-สกุล : </strong></td>
            <td><?php echo $row['user_name'] ?>&nbsp;&nbsp;<?php echo $row['user_lastname'] ?></td>
          </tr>
          <tr>
            <td><strong>หลักสูตร : </strong></td>
            <td><?php echo $row['course_name'] ?></td>

            <td><strong>คณะ</strong></td>
            <td><?php echo $row["faculty_name"] ?></td>
			<td><strong>พื้นที่</strong></td>
            <td>นนทบุรี</td>
          </tr>
          <tr>


            <td><strong>คณะ : </strong></td>
            <td><?php echo $row["major_name"] ?></td>
          </tr>
        </tbody>
      </table>
 <br>
 <?php

    //1. เชื่อมต่อ database:
    $conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
    mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
    //$ur_id = $_SESSION["user_id"];
	//$sql=" select * from tb_user where user_id='$ur_id' ";
    //2. query ข้อมูลจากตาราง :
	$query = "SELECT * FROM tb_joinac WHERE user_id = '".$_SESSION["user_id"]."' " or die(mysql_error());
    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
    $result = mysqli_query($conn,$query);
	?>
 <table  border='2' align='center' class='form-group table table-striped' width='100px' style='table-layout:fixed' >
  <tr>
    <th width="100px"  bgcolor='#00aae1'  ><div align="center">ชื่อกิจกรรม </div></th>
    <th width="50px"  bgcolor='#00aae1'><div align="center">กลุ่มกิจกรรม </div></th>
	 <th width="30px"  bgcolor='#00aae1'> <div align="center">ปีการศึกษา</div></th>
    <th width="30px"  bgcolor='#00aae1'> <div align="center">ชั่วโมง</div></th>
  </tr>
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
 $sqlgenus = "SELECT
tb_activities.activities_id,
tb_activities.activities_name,
tb_activities.genus_id,
tb_activities.type_id,
tb_activities.activities_startdate,
tb_activities_type.type_id,
tb_activities_type.type_name
FROM
tb_activities
INNER JOIN tb_activities_type ON tb_activities.genus_id = tb_activities_type.type_id WHERE activities_id  = '".$aaa ["activities_id"]."' ";
 $querygenus = mysqli_query($conn,$sqlgenus);
 while ($rowgenus = mysqli_fetch_assoc($querygenus) ){

?>
 <tr>
	<td><div align="center"><?php echo $aaa ["activities_name"]; ?></div></td>
<td><div align="center"><?php echo $rowgenus ["type_name"]; ?></div></td>

	   <td><div align="center"><?php echo $aaaza ["activities_year"];?></div></td>
	<td><div align="center"><?php echo $aaaza ["activities_hour"];?></div></td>
  </tr>
  <?php
		$i++;
 }
}
}
}
}
}
?>

</table>

<?php
$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
		mysqli_query($conn, "SET NAMES UTF8");

		$sql=" select * from tb_user where user_id='".$_SESSION['user_id']."' ";
		$sqlar="SELECT
tb_user.user_id,
tb_major.major_name,
tb_course.course_name,
tb_faculty.faculty_name
FROM
tb_user
INNER JOIN tb_major ON tb_user.major_id = tb_major.major_id
INNER JOIN tb_course ON tb_major.course_id = tb_course.course_id
INNER JOIN tb_faculty ON tb_user.faculty_id = tb_faculty.faculty_id
";
$resultar=mysqli_query($conn,$sqlar) or die ("ไม่สามารถค้นหาข้อมูลได้").mysql_error();
		$result=mysqli_query($conn,$sql) or die ("ไม่สามารถค้นหาข้อมูลได้").mysql_error();
		$row=mysqli_fetch_assoc($result);
		$rowar=mysqli_fetch_assoc($resultar);

		mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

	define('FPDF_FONTPATH','font/');

	class PDF extends FPDF
	{
		function Header(){

			//$this->Image('thaicreate-logo.jpg',87,0,40);
			$this->AddFont('angsa','','angsa.php');
			$this->SetFont('angsa','',15);
	 		$this->Cell(0,0,iconv( 'UTF-8','TIS-620','หน้าที่ '.$this->PageNo()),0,1,"R");
			//$this->Image('myfile/logo.png',95,0,20,'R');
			//$this->Image('myfile/logo.png', 95, 0, 20, '');
			 $this->Ln(5);


		}

		function Footer(){
			$this->AddFont('angsa','','angsa.php');
			$this->SetFont('angsa','',10);
			$this->SetLeftMargin( 108 );
$this->Ln(130);
$this->SetY(-35);
$this->AddFont('cordiab','','cordiab.php');
$this->AddFont('cordiab','','cordiab.php');
$this->SetFont('cordiab','',9);
$this->SetFillColor(240,231,155);
$this->Cell(100,4,iconv('UTF-8','TIS-620','สรุปผลการเข้าร่วมกิจกรรม'),1,0,'C',true);
$this->Ln();
$this->SetFillColor(224,235,255);
$this->Cell(70,4,iconv('UTF-8','TIS-620','ประเภทกิจกรรม'),1,0,'C',true);
$this->Cell(15,4,iconv('UTF-8','TIS-620','ครั้ง'),1,0,'C',true);
$this->Cell(15,4,iconv('UTF-8','TIS-620','ชั่วโมง'),1,0,'C',true);
//$this->Cell(10,4,iconv('UTF-8','TIS-620','ผล'),1,0,'C',true);
$this->Ln();
$this->Cell(70,4,iconv('UTF-8','TIS-620','กิจกรรมบังคับ'),1,0,'L',true);

		$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
    mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
    //2. query ข้อมูลจากตาราง :
    $query0 = "SELECT COUNT(activities_id) AS countactivities FROM tb_joinac   " or die(mysql_error());

	$query1 = "SELECT * FROM  tb_joinac INNER JOIN tb_activities ON tb_joinac.activities_id = tb_activities.activities_id WHERE tb_activities.genus_id = '1' AND tb_joinac.user_id = '".$_SESSION['user_id']."'";
	$query2 = "SELECT * FROM  tb_joinac INNER JOIN tb_activities ON tb_joinac.activities_id = tb_activities.activities_id WHERE tb_activities.genus_id = '2' AND tb_joinac.user_id = '".$_SESSION['user_id']."'";
	$query3 = "SELECT * FROM  tb_joinac INNER JOIN tb_activities ON tb_joinac.activities_id = tb_activities.activities_id WHERE tb_activities.genus_id = '3' AND tb_joinac.user_id = '".$_SESSION['user_id']."'";
	$query4 = "SELECT * FROM  tb_joinac INNER JOIN tb_activities ON tb_joinac.activities_id = tb_activities.activities_id WHERE  tb_joinac.user_id = '".$_SESSION['user_id']."'";
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
	$rowcount2 = 0;
	$rowcount2 += mysqli_num_rows($result2);
	$this->Cell(15,4,iconv('UTF-8','TIS-620',$rowcount2),1,0,'C',true);
	$hour2 = 0;
	while($row2 = mysqli_fetch_array($result2)){
	$hour2 += $row2["activities_hour"];
	}
		$this->Cell(15,4,iconv('UTF-8','TIS-620',$hour2),1,0,'C',true);


	$this->Ln();
	$this->Cell(70,4,iconv('UTF-8','TIS-620','กลุ่มกิจกรรมอื่น ๆ'),1,0,'L',true);
	$result3 = mysqli_query($conn,$query3);
	$rowcount3 = 0;
	$rowcount3 += mysqli_num_rows($result3);
	if(mysqli_num_rows($result3) == 0){
	$rowcount3 = 0;
	}
	$this->Cell(15,4,iconv('UTF-8','TIS-620',$rowcount3),1,0,'C',true);
	$hour3 = 0;
	while($row3 = mysqli_fetch_array($result3)){
	$hour3 += $row3["activities_hour"];

	}
		$this->Cell(15,4,iconv('UTF-8','TIS-620',$hour3),1,0,'C',true);


	$this->Ln();
	$this->Cell(70,4,iconv('UTF-8','TIS-620','รวมทั้งหมด'),1,0,'L',true);
	$result4 = mysqli_query($conn,$query4);
	$rowcount4 = 0;
	$rowcount4 += mysqli_num_rows($result4);
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
$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620','สถาบันการจัดการปัญญาภิวัฒน์์'),0,1,"C");
$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620','85/1 หมู่ 2 ถ.แจ้งวัฒนะ ต.บางตลาด อ.ปากเกร็ด จังหวัด นนทบุรี 11120'),0,1,"C");
$pdf->SetLeftMargin(5);
$pdf->Cell(0,7,iconv( 'UTF-8','cp874' ,'รหัสนักศึกษา :'.$row["user_id"].''),0,1,'L',$pdf->Cell(0,7,iconv( 'UTF-8','cp874' , 'ชื่อ-สกุล :'.$row["user_name"].'   '.$row["user_lastname"].'' ) , 0, 1,'C' ),$pdf->Cell(0,-7,iconv( 'UTF-8','cp874' ,'' ) , 0, 1,'R' ) );

$pdf->Cell(0,7,iconv( 'UTF-8','cp874' , 'หลักสูตร : '.$rowar["course_name"].'') , 0, 1 ,'L',$pdf->Cell(0,7,iconv( 'UTF-8','cp874' , 'คณะ : '.$rowar['faculty_name'].'' ) , 0, 1,'C' ),$pdf->Cell(0,-7,iconv( 'UTF-8','cp874' , 'พื้นที่ : นนทบุรี ' ) , 0, 1,'R' )  );

$pdf->Cell(0,8,iconv( 'UTF-8','cp874' , 'สาขาวิชา : '.$rowar['major_name'].'' ) , 0, 1 ,'L');
$pdf->SetFillColor(240,231,155);
$pdf->Cell(200,7,iconv('UTF-8','TIS-620','กิจกรรม  '),1,0,'C',true);
$pdf->Ln();
$pdf->SetFillColor(224,235,255);

$pdf->Cell(80,7,iconv('UTF-8','TIS-620','ชือกิจกรรม'),1,0,'C',true);
$pdf->Cell(40,7,iconv('UTF-8','TIS-620','ปีการศึกษา'),1,0,'C',true);
$pdf->Cell(50,7,iconv('UTF-8','TIS-620','กลุ่มกิจกรรม'),1,0,'C',true);
$pdf->Cell(30,7,iconv('UTF-8','TIS-620','ชั่วโมง'),1,0,'C',true);
$pdf->Ln();
 $conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
    mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
    //$ur_id = $_SESSION["user_id"];
	//$sql=" select * from tb_user where user_id='$ur_id' ";
    //2. query ข้อมูลจากตาราง :
	$query = "SELECT * FROM tb_joinac WHERE user_id = '".$_SESSION["user_id"]."' " or die(mysql_error());
    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
    $result = mysqli_query($conn,$query);
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
 $sqlgenus = "SELECT
tb_activities.activities_id,
tb_activities.activities_name,
tb_activities.genus_id,
tb_activities.type_id,
tb_activities.activities_startdate,
tb_activities_type.type_id,
tb_activities_type.type_name
FROM
tb_activities
INNER JOIN tb_activities_type ON tb_activities.genus_id = tb_activities_type.type_id WHERE activities_id  = '".$aaa ["activities_id"]."' ";
 $querygenus = mysqli_query($conn,$sqlgenus);
 while ($rowgenus = mysqli_fetch_assoc($querygenus)){
	$pdf->Cell(80,7,iconv( 'UTF-8','TIS-620',''. $aaa ["activities_name"].'' ),1,"C");
	$pdf->Cell(40,7,iconv( 'UTF-8','TIS-620',''. $aaaza ["activities_year"].'' ),1,0,'C');
	$pdf->Cell(50,7,iconv( 'UTF-8','TIS-620',''.$rowgenus ["type_name"].'' ),1,0,'C');
	$pdf->Cell(30,7,iconv( 'UTF-8','TIS-620',''. $aaaza ["activities_hour"].'' ),1,0,'C');
	$pdf->Ln();
}
}
}
}
}
}

				$pdf->Output("MyPDF/การเข้าร่วม ".$_SESSION['user_id'].".pdf","F");
				//echo "ดาวโหลดรายงานในรูปแบบ PDF <a href=\"MyPDF/การเข้าร่วม ".$stu_id.".pdf\">คลิกที่นี้</a>";
				echo "<button  class='btn btn-primary'><a href=\"MyPDF/การเข้าร่วม ".$_SESSION['user_id'].".pdf\">พิมพ์รายงาน</button>";

?>
</div>
<?php

$i = 1;
while($row = mysqli_fetch_array($result)){

$query_user = "SELECT * FROM tb_activities WHERE activities_id = '".$row ["activities_id"]."' " or die(mysql_error());
	$result_user = mysqli_query($conn,$query_user);
while($aaa = mysqli_fetch_array($result_user)){


?>
<?php


	}


?>
<?php
		$i++;


}
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

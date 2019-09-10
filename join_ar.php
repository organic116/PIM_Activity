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
						<li class="active">
							<a href="admin_uishowar.php">
								&nbsp;<i class="fas fa-calendar-alt" ></i>
									กิจกรรมปัจจุบัน
							</a>
						</li>
						<li >
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
						<li>
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

                    <h4>ข้อมูลกิจกรรม</h4>
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

 <form name="frmAdd" method="post">
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
    mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

    //2. query ข้อมูลจากตาราง :
    $query0 = "SELECT COUNT(activities_id) AS countjoin FROM tb_joinac WHERE activities_id = '".$_GET["ar_id"]."' " or die(mysql_error());
    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
	$result0 = mysqli_query($conn,$query0);
	$row = mysqli_fetch_array($result0,MYSQLI_ASSOC);
	$count = $row["countjoin"];

  ?>

 <?php

		echo "<table width='100%' cellpadding='4' cellspacing='0' ><tr id='rcorners2'><td>";
		echo "<br>";
		echo "<a href='admin_uishowar.php'>
			   &nbsp;&nbsp;&nbsp;&nbsp;<button type='button' id='sidebarCollapse' class='btn btn-info'>
			 <i class='fas fa-home'></i>

			&nbsp;กลับหน้าแสดงกิจกรรม
					</button></a>";

		$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
		mysqli_query($conn, "SET NAMES UTF8");
		$ar_id = $_GET["ar_id"];
		$sql="SELECT
tb_activities.activities_id,
tb_activities.activities_name,
tb_activities.activities_detail,
tb_activities.activities_year,
tb_activities.activities_startdate,
tb_activities.activities_starttime,
tb_activities.activities_admin,
tb_activities.activities_enddate,
tb_activities.activities_endtime,
tb_activities.activities_addstart,
tb_activities.activities_valueuser,
tb_activities.activities_hour,
tb_activities.activities_place,
tb_activities_type.type_name,
tb_genus.genus_nameis,
tb_genus.genus_name
FROM
tb_activities
INNER JOIN tb_activities_type ON tb_activities.genus_id = tb_activities_type.type_id
INNER JOIN tb_genus ON tb_activities_type.type_id = tb_genus.type_id AND tb_activities.type_id = tb_genus.genus_id where activities_id='$ar_id' ";
		echo "<form name='frmeditteacher' method='POST' enctype='multipart/form-data'>";
		$result=mysqli_query($conn,$sql) or die ("ไม่สามารถค้นหาข้อมูลได้").mysql_error();
		if(mysqli_num_rows($result) == 1)
		{
			while($row = mysqli_fetch_array($result)){

			echo "<br>";
			echo "<br>";
			echo "<div class='form-row'>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;<div  class='form-group col-md-1'>";
			echo " <label for='activities_year'>ปีการศึกษา</label>";
			echo "<input type='number' class='form-control'  id='activities_year' name='activities_year' value='$row[activities_year]' readonly style='width:100px;' >";
			echo "</div>";
			echo "<div  class='form-group col-md-1'>";
			echo "<label for='genus_nameis'>กลุ่มกิจกรรม</label>";
			echo "<input type='texy' class='form-control'  id='genus_nameis' name='genus_nameis' value='$row[genus_nameis]' readonly style='width:100px;'>";
			echo "</div>";
			echo "<div  class='form-group col-md-3'>";
			echo "<label for='genus_name'>ประเภทกิจกรรม</label>";
			echo "<input type='texy' class='form-control'  id='genus_name' name='genus_name' value='$row[genus_name]' readonly>";
			echo "</div>";
			echo "</div>";

			echo "<div class='form-row'>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;<div  class='form-group col-md-4'>";
			echo "<label for='activities_name'>ชื่อกิจกรรม</label>";
			echo "<input type='text' class='form-control'  id='activities_name' name='activities_name' value='$row[activities_name]' readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-3'>";
			echo "<label for='activities_place'>สถานที่จัดกิจกรรม</label>";
			echo "<input type='text' class='form-control'  id='activities_place' name='activities_place' value='$row[activities_place]' readonly>";
			echo "</div>";
			echo "</div>";
			echo "<div class='form-row'>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;<div  class='form-group col-md-2'>";
			echo "<label for='activities_addstart'>วันเพิ่มกิจกรรม</label>";
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
			echo "&nbsp;&nbsp;&nbsp;&nbsp;<div class='form-group col-md-8'>";
			echo "<label for='activities_detail'>รายละเอียดกิจกรรม</label>";
			echo  "<textarea readonly rows='4' cols='150' class='form-control' id='activities_detail' name='activities_detail'>$row[activities_detail]</textarea>";
			echo  "</div>";
			echo "</div>";

			echo "<div class='form-row'>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;<div  class='form-group col-md-2'>";
			echo "<label for='activities_startdate'>วันเดือนปีที่เริ่มกิจกรรม</label>";
			echo "<input type='text' class='form-control'  id='activities_startdate' name='activities_startdate' value='".DateThai($row["activities_startdate"])."' readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-2'>";
			echo "<label for='activities_enddate'>วันเดือนปีที่สิ้นสุดกิจกรรม</label>";
			echo "<input type='text' class='form-control'  id='activities_enddate' name='activities_enddate' value='".DateThai($row["activities_enddate"])."' readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-1'>";
			echo "<label for='activities_starttime'>เวลาที่เริ่ม</label>";
			echo "<input type='text' class='form-control'  id='activities_starttime' name='activities_starttime' value='".date('H:i',strtotime($row["activities_starttime"]))."'น. readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-1'>";
			echo "<label for='activities_endtime'>เวลาที่สิ้นสุด</label>";
			echo "<input type='text' class='form-control'  id='activities_endtime' name='activities_endtime' value='".date('H:i',strtotime($row["activities_endtime"]))."' readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-3'>";
			echo "<label for='activities_admin'>ผู้ดูแลกิจกรรม</label>";
			echo "<input type='text' class='form-control'  id='activities_admin' name='activities_admin' value='$row[activities_admin]' readonly>";
			echo "</div>";
			echo "</div>";

			if ($count == $row["activities_valueuser"]){
			echo "<div>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;<button type='submit' class='btn btn-primary' name='submit' id='submit' disabled>สแกน QR-CODE นักศึกษา</button> ";
			echo "</div>";
			}
			if($count != $row["activities_valueuser"]){
			echo "<div>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;<button type='submit' class='btn btn-primary' name='submit' id='submit' ><a href='webcodecamjs/index.php?ar_id=".$row["activities_id"]."'>สแกน QR-CODE นักศึกษา</a></button> ";
			echo "</div>";
			}
			echo "</form>&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "</td></tr></table>";
			}
		}
		else{
			echo "ไม่พบข้อมูลกิจรรมที่ต้องการแก้ไข";

		}
		mysqli_close($conn);
	?>

	<br>
 <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                <div class="container-fluid">

                <font color="white"><B>รายชื่อผู้เข้าร่วมกิจกรรมโครงการ  <div align="center">จำนวนผู้เข้าร่วมกิจกรรม : <?php echo $count;?></B></font></div>

                </div>
            </nav>
			<?php
    $conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
    mysqli_query($conn, "SET NAMES UTF8");
    $query = "SELECT * FROM tb_joinac WHERE activities_id = '".$_GET["ar_id"]."' " or die(mysql_error());
	$result = mysqli_query($conn,$query);
	?>
	<table width="585" border="1" class="table" >
  <tr>
	<th width="30"> <div align="center">ลำดับ </div></th>
    <th width="100"> <div align="center">รหัสนักศึกษา </div></th>
    <th width="250"> <div align="center">ชื่อ-นามสกุล </div></th>
    <th width="150"> <div align="center">สาขา </div></th>
    <th width="55"> <div align="center" >เวลาที่สแกน </div></th>
  </tr>
    <?php
$i = 1;
while($row = mysqli_fetch_array($result)){

$query_user = "SELECT * FROM tb_user WHERE user_id = '".$row ["user_id"]."' " or die(mysql_error());
	$result_user = mysqli_query($conn,$query_user);
while($aaa = mysqli_fetch_array($result_user)){

$query_userq = "SELECT * FROM tb_user WHERE user_id = '".$aaa ["user_id"]."' " or die(mysql_error());
	$result_userq = mysqli_query($conn,$query_userq);
while($aaaq = mysqli_fetch_array($result_userq)){


	$query_userz = "SELECT * FROM tb_major WHERE major_id = '".$aaa ["major_id"]."' " or die(mysql_error());
	$result_userz = mysqli_query($conn,$query_userz);
while($aaaz = mysqli_fetch_array($result_userz)){

	$query_userza = "SELECT * FROM tb_faculty WHERE faculty_id = '".$aaa ["faculty_id"]."' " or die(mysql_error());
	$result_userza = mysqli_query($conn,$query_userza);
while($aaaza = mysqli_fetch_array($result_userza)){


?>
 <tr>
	<td><div align="center"><?php echo $i;?></div></td>
    <td><div align="center"><?php echo $row ["user_id"];?></div></td>
	<td><div align="center"><?php echo $aaa ["user_name"]; ?>&nbsp;&nbsp;&nbsp;<?php echo $aaaq ["user_lastname"];?></div></td>

	<td><div align="center"><?php echo $aaaz ["major_name"];?></div></td>
	<!--<td><div align="center"><?php echo $aaaza ["faculty_name"];?></div></td>-->
	<td><div align="center"><?php echo date('H:i',strtotime($row ["time_joinar"]));?></div></td>


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
-->
</style>
<?php
$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
		mysqli_query($conn, "SET NAMES UTF8");
		$ar_id = $_GET["ar_id"];
		$sql="SELECT
tb_activities_type.type_id,
tb_activities_type.type_name,
tb_genus.type_id,
tb_genus.genus_nameis,
tb_genus.genus_name,
tb_genus.genus_id,
tb_activities.activities_id,
tb_activities.activities_name,
tb_activities.activities_year,
tb_activities.activities_startdate,
tb_activities.activities_starttime,
tb_activities.activities_enddate,
tb_activities.activities_endtime
FROM
tb_activities_type
INNER JOIN tb_genus ON tb_activities_type.type_id = tb_genus.type_id,tb_activities where activities_id='".$ar_id."' ";
		$result=mysqli_query($conn,$sql) or die ("ไม่สามารถค้นหาข้อมูลได้").mysql_error();
		$row=mysqli_fetch_assoc($result);
	define('FPDF_FONTPATH','font/');
	class PDF extends FPDF
	{
		function Header(){

			$this->AddFont('angsa','','angsa.php');
			$this->SetFont('angsa','',15);
	 		$this->Cell(0,0,iconv( 'UTF-8','TIS-620','หน้าที่ '.$this->PageNo()),0,1,"R");
			$this->Ln(5);


		}

		function Footer(){
			$this->AddFont('angsa','','angsa.php');
			$this->SetFont('angsa','',10);
			$this->SetLeftMargin( 108 );
$this->Ln(130);

			$this->SetY(-10);
			$this->AddFont('cordiab','','cordiab.php');
$this->AddFont('cordiab','','cordiab.php');
$this->SetFont('cordiab','',9);
$this->SetFillColor(240,231,155);

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
$pdf->Cell(0,10,iconv('UTF-8','TIS-620','ใบสรุปรายชื่อนักศึกษาที่เข้าร่วมกิจกรรม'), 0 , 1 ,'C' );
$pdf->AddFont('angsa','','angsa.php');
$pdf->SetFont('angsa','',15);
$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620','สถาบันการจัดการปัญญาภิวัฒน์'),0,1,"C");
$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620','85/1 หมู่ 2 ถ.แจ้งวัฒนะ ต.บางตลาด อ.ปากเกร็ด จังหวัด นนทบุรี 11120'),0,1,"C");
$pdf->SetLeftMargin(5);
$pdf->Ln();
$pdf->Cell(0,7,iconv( 'UTF-8','cp874' ,'ชื่อโครงการ : '.$row["activities_name"].''),0,1,'L',$pdf->Cell(0,7,iconv( 'UTF-8','cp874' , 'ประเภทกิจกรรม : '.$row["genus_name"].'' ) , 0, 1,'C' ),$pdf->Cell(0,-7,iconv( 'UTF-8','cp874' , 'กลุ่มกิจกรรม : '.$row["genus_nameis"].'' ) , 0, 1,'R' ) );

$pdf->Cell(0,7,iconv( 'UTF-8','cp874' , 'ประจำปีการศึกษา : '.$row["activities_year"].''), 0, 1 ,'L',
$pdf->Cell(0,7,iconv( 'UTF-8','cp874' , 'คณะ : วิคณะวิศวกรรมศาสตร์และเทคโนโลยี  ' ) , 0, 1,'C' ),
$pdf->Cell(0,-7,iconv( 'UTF-8','cp874' , 'พื้นที่ : นนทบุรี ' ) , 0, 1,'R' )  );

$pdf->Cell(0,7,iconv( 'UTF-8','cp874' ,'วันที่จัด - สิ้นสุดกิจกรรม  : '.DateThai($row["activities_startdate"]).' ถึง '.DateThai($row["activities_enddate"]).''), 0, 1 ,'L',
$pdf->Cell(0,7,iconv( 'UTF-8','cp874' ,'' ) , 0, 1,'C' ),
$pdf->Cell(0,-7,iconv( 'UTF-8','cp874' ,'เวลาเรื่ม - สิ้นสุดกิจกรรม : '.date('H:i',strtotime($row["activities_starttime"])).' น. ถึง  '.date('H:i',strtotime($row["activities_endtime"])).' น.' ) , 0, 1,'R' )  );

$pdf->Cell(0,7,iconv( 'UTF-8','cp874' , 'จำนวนนักศึกษาที่เข้าร่วม : '.$count .' คน') , 0, 1 ,'L');
$pdf->SetFillColor(240,231,155);
$pdf->Cell(200,7,iconv('UTF-8','TIS-620','รายชื่อผู้เข้าร่วมโครงการ'),1,0,'C',true);
$pdf->Ln();
$pdf->SetFillColor(224,235,255);
$pdf->Cell(30,7,iconv('UTF-8','TIS-620','รหัสนักศึกษา'),1,0,'C',true);
$pdf->Cell(60,7,iconv('UTF-8','TIS-620','ชือ-สกุลนักศึกษา'),1,0,'C',true);
$pdf->Cell(90,7,iconv('UTF-8','TIS-620','สาขา'),1,0,'C',true);
$pdf->Cell(20,7,iconv('UTF-8','TIS-620','ชั้นปี'),1,0,'C',true);
$pdf->Ln();

$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
mysqli_query($conn, "SET NAMES UTF8");
$query = "SELECT * FROM tb_joinac WHERE activities_id = '".$_GET["ar_id"]."' " or die(mysql_error());
$result = mysqli_query($conn,$query);
$i = 1;

while($row = mysqli_fetch_array($result)){
$query_user = "SELECT * FROM tb_user WHERE user_id = '".$row ["user_id"]."' " or die(mysql_error());
$result_user = mysqli_query($conn,$query_user);

while($aaas = mysqli_fetch_array($result_user)){
	$query_userqr = "SELECT * FROM tb_user WHERE user_id = '".$aaas ["user_id"]."' " or die(mysql_error());
	$resultr_userac = mysqli_query($conn,$query_userqr);
	$yer =  date('Y')+543;
		if ($yer - $aaas["user_year"]<='1')
		$user_year = "1";
		else if ($yer - $aaas["user_year"]=='2')
		$user_year ="2";
		else if ($yer - $aaas["user_year"]=='3')
		$user_year = "3";
		else if ($yer - $aaas["user_year"]>='4')
		$user_year = "4";


while($aaa = mysqli_fetch_array($resultr_userac)){
$query_userq = "SELECT * FROM tb_user WHERE user_id = '".$aaa ["user_id"]."' " or die(mysql_error());
$result_userq = mysqli_query($conn,$query_userq);

while($aaaq = mysqli_fetch_array($result_userq)){
$query_userz = "SELECT * FROM tb_major WHERE major_id = '".$aaa ["major_id"]."' " or die(mysql_error());
$result_userz = mysqli_query($conn,$query_userz);

while($aaaz = mysqli_fetch_array($result_userz)){
$query_userza = "SELECT * FROM tb_faculty WHERE faculty_id = '".$aaa ["faculty_id"]."' " or die(mysql_error());
$result_userza = mysqli_query($conn,$query_userza);

while($aaaza = mysqli_fetch_array($result_userza)){
$pdf->Cell(30,7,iconv( 'UTF-8','TIS-620',''.$row ["user_id"].'' ),1,"C");
	$pdf->Cell(60,7,iconv( 'UTF-8','TIS-620',''.$aaa ["user_name"].'     '.$aaaq ["user_lastname"].'' ),1,"C");

	$pdf->Cell(90,7,iconv( 'UTF-8','TIS-620',''.$aaaz ["major_name"].'' ),1,0,'C');
	$pdf->Cell(20,7,iconv( 'UTF-8','TIS-620',''.$user_year.'/'.$aaas['user_room'].'' ),1,0,'C');
	$pdf->Ln();

	$i++;

}
}
}
}
}
}

				$pdf->Output("MyPDF/การเข้าร่วม ".$ar_id.".pdf","F");
				echo "<button  class='btn btn-primary'><a href=\"MyPDF/การเข้าร่วม ".$ar_id.".pdf\">พิมพ์รายงาน</button>";
?>
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

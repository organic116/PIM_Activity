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
</head>

<body>
<?php
$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
mysqli_query($conn, "SET NAMES UTF8");
$yearOnthai = date("Y")+543;
if($_SESSION["year_ary"] > $yearOnthai){
$_SESSION["year_ary"] = $yearOnthai;
}
$SQL="SELECT
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
tb_activities.activities_status,
tb_activities.activities_place,
tb_genus.genus_name,
tb_activities_type.type_name
FROM
tb_activities
INNER JOIN tb_genus ON tb_activities.type_id = tb_genus.genus_id
INNER JOIN tb_activities_type ON tb_genus.type_id = tb_activities_type.type_id
 WHERE activities_status = '0'";
	if(isset($_GET["back"])){
		$_SESSION["year_ary"] = $_SESSION["year_ary"] - 1;
		$SQL .= "AND activities_year = '".$_SESSION["year_ary"]."'  ORDER BY activities_id";
	}
	else if(isset($_GET["next"])){
		$_SESSION["year_ary"] = $_SESSION["year_ary"] + 1;
		$SQL .= "AND activities_year = '".$_SESSION["year_ary"]."'  ORDER BY activities_id";
	}else{
		$_SESSION["year_ary"] = date("Y")+543-1;
		$SQL .= "AND activities_year = '".$_SESSION["year_ary"]."'  ORDER BY activities_id";
	}
$result=mysqli_query($conn,$SQL) or die ("ไม่สามารถค้นหาข้อมูลได้").mysql_error();
?>
	<body>
   <div class="wrapper">
		<nav id="sidebar">
		<div  class="sidebar-header">
				<h3><center><b>Activities</b></center></h3>
					<strong>AT</strong>
				</div>
					<ul class="list-unstyled components">
					<li>
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
						<li>
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
						<li  class="active">
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

                    <h4>พิมพ์รายงานสรุปโครงการรายปี</h4>
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
			<script language="javascript">
					function fncSubmit()
						{
						if(document.frmfind.year_ar.value == "")

							swal("เกิดข้อผิดพลาด!", "กรุณากรอกข้อมูล", "error");
							return false;
							}
						document.frmfind.submit();
						}
						</script>





<div id='div1'>
<form action = "admin_arreport.php" name= "frmfind" method = "GET" style="display: inline;" >
<input type = "hidden" name = "back" value = "1">
<button type='submit' class='btn btn-primary'  name='submit' id='submit' class="nav" ><i class="fas fa-arrow-left"></i>
</button></a>
</form>
</div>
<div id='div3'>
<input  type = "text"  class="form-control mr-sm-1" value = <?php echo $_SESSION["year_ary"]; ?> name = "yearwant" disabled>
</div>
<div id='div2' >
<form action = "admin_arreport.php" name= "frmfind" method = "GET" style="display: inline;">
<input type = "hidden" name = "next" value = "1">
<button type='submit' class='btn btn-primary'  name='submit' id='submit' class="nav" ><i class="fas fa-arrow-right"></i>
</form>
</div>
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
&nbsp;&nbsp;&nbsp;&nbsp;
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
	define('FPDF_FONTPATH','font/');

	class PDF extends FPDF
	{
		function Header(){


			$this->AddFont('angsa','','angsa.php');
			$this->SetFont('angsa','',15);
	 		$this->Cell(0,0,iconv( 'UTF-8','TIS-620','หน้าที่  '.$this->PageNo()),0,1,"R");
			$this->Ln(5);


		}

		function Footer(){
			$this->AddFont('angsa','','angsa.php');
			$this->SetFont('angsa','',10);
			$this->SetLeftMargin( 108 );
$this->Ln(130);



			$this->SetY(-20);
			$this->AddFont('cordiab','','cordiab.php');
		$this->AddFont('cordiab','','cordiab.php');
		$this->SetFont('cordiab','',9);
		$this->SetFillColor(240,231,155);



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
$pdf->Cell(0,10,iconv('UTF-8','TIS-620','ใบสรุปโครงการประจำปีการศึกษา '.$_SESSION["year_ary"].''), 0 , 1 ,'C' );
$pdf->AddFont('angsa','','angsa.php');
$pdf->SetFont('angsa','',15);
$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620','สถาบันการจัดการปัญญาภิวัฒน์'),0,1,"C");
$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620','85/1 หมู่ 2 ถ.แจ้งวัฒนะ ต.บางตลาด อ.ปากเกร็ด จังหวัด นนทบุรี 11120'),0,1,"C");
$pdf->SetLeftMargin(5);
$pdf->SetFillColor(224,235,255);
$pdf->Cell(10,7,iconv('UTF-8','TIS-620','ลำดับ'),1,0,'C',true);
$pdf->Cell(70,7,iconv('UTF-8','TIS-620','ชื่อกิจกรรม'),1,0,'C',true);
$pdf->Cell(40,7,iconv('UTF-8','TIS-620','วันจัดกิจกรรม'),1,0,'C',true);
$pdf->Cell(30,7,iconv('UTF-8','TIS-620','กลุ่มกิจกรรม'),1,0,'C',true);
$pdf->Cell(20,7,iconv('UTF-8','TIS-620','ชั่วโมง'),1,0,'C',true);
$pdf->Cell(30,7,iconv('UTF-8','TIS-620','จำนวนผู้เข้าร่วม'),1,0,'C',true);
$pdf->Ln();
 $i = 1;
while($rowAc = mysqli_fetch_array($result)) {

	$pdf->Cell(10,7,iconv('UTF-8','TIS-620',''.$i.'' ),1,0,'C');
	$pdf->Cell(70,7,iconv('UTF-8','TIS-620',''.$rowAc["activities_name"].'' ),1,"C");
	$pdf->Cell(40,7,iconv('UTF-8','TIS-620',''.DateThai($rowAc["activities_startdate"]).'' ),1,"C");
	$pdf->Cell(30,7,iconv('UTF-8','TIS-620',''. $rowAc["type_name"] .''),1,0,'C');
	$pdf->Cell(20,7,iconv('UTF-8','TIS-620',''.$rowAc["activities_hour"].'' ),1,0,'C');
	$pdf->Cell(30,7,iconv('UTF-8','TIS-620',''.$rowAc["activities_valueuser"].'' ),1,0,'C');
	$pdf->Ln();
$i++;
}





				$pdf->Output("MyPDF/การเข้าร่วม ".$_SESSION["year_ary"].".pdf","F");

				//echo "ดาวโหลดรายงานในรูปแบบ PDF <a href=\"MyPDF/การเข้าร่วม ".$stu_id.".pdf\">คลิกที่นี้</a>";

				//echo "<div id='div4' >";

				echo "<button class='btn btn-primary' ><a href=\"MyPDF/การเข้าร่วม ".$_SESSION["year_ary"].".pdf\"><i class='fas fa-file-pdf' size:7x></i></button>";

				//echo "</div>";


?>
<embed src="MyPDF/การเข้าร่วม <?php echo $_SESSION["year_ary"]; ?>.pdf" mce_src="pdf.pdf" width="100%" height="650"></embed>
          </table>
      </div>
      </div>

  </div>



    <script>
function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}
</script>
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

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
    <link rel="stylesheet" href="style4.css">

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
				<strong>AR</strong
            </div>

            <ul class="list-unstyled components">
			<li class="active">
                    <a href="user_profileshow.php">
                        <i class="fas fa-briefcase"></i>
                        ประวัตินักศึกษา
                    </a></li>

			<li>
					<a href="activities_uimain.php">
                        <i class="fas fa-home"></i>
                        กิจกรรมทั้งหมด
                    </a></li>

             <li>
                    <a href="user_joinavi.php">
                        <i class="fas fa-briefcase"></i>
                        การเข้าร่วมกิจกรรม
                    </a></li>
             <li>
                    <a href="report_ar.php">
                        <i class="fas fa-image"></i>
                       รายงานสรุปรวมกิจกรรม
					 </a></li>

                <li>
                <a href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบใช่หรือไม่ ?')">
                        <i class="fas fa-paper-plane"></i>
                        ออกจากระบบ
                    </a></li>
            </ul>

        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-align-justify"></i></button>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-right"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;

                <h4>  รายงานสรุปรวมกิจกรรม</h4>

             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                            <B>ผู้ใช้งาน :</B><?php echo $_SESSION["user_name"];?>
									<B>สถานะผู้ใช้งาน:</B><?php

									$a=$_SESSION["user_status"];
													if ($a==0)
													echo "นักศึกษา";
													else($a==1)
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

      <td align="center" valign="top"><span>สถาบันการจัดการปัญญาภิวัฒน์</span><br>
       <small>85/1 หมู่ 2 ถ.แจ้งวัฒนะ ต.บางตลาด อ.ปากเกร็ด จังหวัด นนทบุรี 11120 </small>
       <h4><strong>ใบรับรองการเข้าร่วมกิจกรรมเสริมหลักสูตร</strong></h4>
       </td>
      <td align="center" valign="top"><!--<img src="assets/images/report/no-pic.jpg" class="img" alt=""/>-->

											 <img src="assets/images/report/no-pic.jpg" class="img" alt=""/>


      </td>
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
		$sql=" select * from tb_user where user_id='".$_SESSION['user_id']."' ";
		$result=mysqli_query($conn,$sql) or die ("ไม่สามารถค้นหาข้อมูลได้").mysql_error();
		$row=mysqli_fetch_assoc($result);?>
    <tr>
      <td colspan="3" align="center"><table width="90%" border="0" cellspacing="0" cellpadding="0" class="name">
        <tbody>
          <tr>
            <td><strong>รหัสนักศึกษา</strong></td>
            <td><?php echo $row['user_id'] ?></td>
            <td><strong>ชื่อ-สกุล</strong></td>
            <td><?php echo $row['user_name'] ?>&nbsp;&nbsp;<?php echo $row['user_lastname'] ?></td>
            <td><strong>วันเดือนปีเกิด</strong></td>
            <td><?php echo DateThai( $row["user_date"]);?></td>
          </tr>
          <tr>
            <td><strong>หลักสูตร</strong></td>
            <td><?php echo $row['course_id'] ?></td>

            <td><strong>ชมรม</strong></td>
            <td><?php echo $row['user_club'] ?></td>
          </tr>
          <tr>
            <td><strong>พื้นที่</strong></td>
            <td>นนทบุรี</td>
            <td><strong>คณะ</strong></td>
            <td><?php   $row["faculty_id"];
                    if ( $row["faculty_id"]=='105')
                    echo "วิศวกรรมศาสตร์และเทคโนโลยี";
                    else( $row["faculty_id"]==""); ?></td>
            <td><strong>สาขาวิชา</strong></td>
            <td><?php   $row["major_id"];
                    if ($row["major_id"]=='164')
                    echo "เทคโนโลยีสารสนเทศทางธุรกิจ <br> - พัฒนาซอฟต์แวร์";
                   else if ($row["major_id"]=='064')
                    echo "บัญชีบัณฑิต";
                     else if($row["major_id"]=='074')
                    echo "การจัดการทั่วไป";
                     else if($row["major_id"]=='104')
                    echo "การตลาด";
                     else if ($row["major_id"]=='194')
                    echo "ภาษาจีน";
					else if ($row["major_id"]=='062')
                    echo "บัญชีบัณฑิต";
					else if ($row["major_id"]=='154')
                    echo "การจัดการเทคโนโลยีสารสนเทศ";
					else if ($row["major_id"]=='134')
                    echo "ภาษาอังกฤษ";
					else if ($row["major_id"]=='144')
                    echo "การจัดการอุตสาหกรรม";
                    else($row["major_id"]=="");  ?></td>
          </tr>
        </tbody>
      </table>


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
<table width="585" border="1" class="table">
  <tr>
    <th width="350"> <div align="center">ชื่อกิจกรรม </div></th>
    <th width="118"> <div align="center">กลุ่ม </div></th>
	 <th width="55"> <div align="center">ปีการศึกษา</div></th>
    <th width="55"> <div align="center">ชั่วโมง</div></th>
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


?>
 <tr>
	<td><div align="center"><?php echo $aaa ["activities_name"]; ?></div></td>

	<td><div align="center"><?php
	 if ($aaaz["genus_id"]=='1')
       echo "กิจกรรมบังคับ";
       else if ($aaaz["genus_id"]=='2')
       echo "กิจกรรมเลือก";
       else if ($aaaz["genus_id"]=='3')
       echo "กิจกรรมอื่นๆ";
       else($aaaz["genus_id"]=='0')?></div></td>

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
?>

</table>
<table width="200" border="0">
  <tbody>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<?php
$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
		mysqli_query($conn, "SET NAMES UTF8");
		$sql=" select * from tb_user where user_id='".$_SESSION['user_id']."' ";
		$result=mysqli_query($conn,$sql) or die ("ไม่สามารถค้นหาข้อมูลได้").mysql_error();
		$row=mysqli_fetch_assoc($result);

		mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
			$queryAc = "SELECT * FROM tb_joinac WHERE user_id = '".$_SESSION["user_id"]."' " or die(mysql_error());
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

		 if ($row["faculty_id"]=='105')
                   $faculty =  "วิศวกรรมศาสตร์และเทคโนโลยี";
                    else( $row["faculty_id"]=="");



	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',15);
	$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620','สถาบันการจัดการปัญญาภิวัฒน์'),0,1,"C");
	$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620','85/1 หมู่ 2 ถ.แจ้งวัฒนะ ต.บางตลาด อ.ปากเกร็ด จังหวัด นนทบุรี 11120'),0,1,"C");
	$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620','ใบรับรองการเข้าร่วมกิจกรรมเสริมหลักสูตร'),0,1,"C");
	$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620','รหัสนักศึกษา : '.$row["user_id"].'         ชื่อ-สกุล :'.$row["user_name"].'   '.$row["user_lastname"].'    วันเดือนปีเกิด : '.DateThai($row["user_date"]).'                                   '),0,1,"C");
	$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620','หลักสูตร : '.$row["course_id"].'                             ชมรม :'.$row["user_club"].'                                                                                                                        '),0,1,"C");
	$pdf->Cell(150,10,iconv( 'UTF-8','TIS-620',' สาขาวิชา : '.$major.'      พื้นที่ : นนทบุรี         คณะ : '.$faculty.''),0,1,"C");
	$pdf->Ln();
	$pdf->Cell(100,10,iconv( 'UTF-8','TIS-620',"ชื่อกิจกรรม "),1,'L');
	$pdf->Cell(30,10,iconv( 'UTF-8','TIS-620',"ปีการศึกษา" ),1,'L');
	$pdf->Cell(30,10,iconv( 'UTF-8','TIS-620',"กลุ่ม" ),1,'L');
	$pdf->Cell(30,10,iconv( 'UTF-8','TIS-620',"ชั่วโมง" ),1,'L');
	$pdf->Ln();
	//$pdf->Cell(0,20,iconv( 'UTF-8','TIS-620','สวัสดี กูชื่อ'.$row["user_name"].''),0,1,"C");
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

	$pdf->Cell(100,10,iconv( 'UTF-8','TIS-620',''.$rowr["activities_name"].'' ),1,'L');
	$pdf->Cell(30,10,iconv( 'UTF-8','TIS-620',''.$rowr["activities_year"].'' ),1,'L');
	$pdf->Cell(30,10,iconv( 'UTF-8','TIS-620',''.$genus.'' ),1,'L');
		$pdf->Cell(30,10,iconv( 'UTF-8','TIS-620',''.$rowr["activities_hour"].'' ),1,'L');
			$pdf->Ln();
	}
				$pdf->Output("MyPDF/การเข้าร่วม ".$_SESSION["user_id"].".pdf","F");
				echo "ดาวโหลดรายงานในรูปแบบ PDF <a href=\"MyPDF/การเข้าร่วม ".$_SESSION['user_id'].".pdf\">คลิกที่นี้</a>";
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

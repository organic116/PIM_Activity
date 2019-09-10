<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Pruksa Ville 29 </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome icons -->

<link rel="stylesheet" type="text/css" href="semantic/semantic.min.css"><!-- step semantic -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="crossorigin="anonymous">
    </script><!-- step semantic -->
    <script src="semantic/semantic.min.js"></script><!-- step semantic -->

<script src="js/jquery2.0.3.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}



			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});
		});
		</script>

</head>
<style>

<style>

	@media (max-width: 500px) {
        table {

    margin-top: 37%;
    margin-left: -20px !important;
        }
        .topnav .search-container {
    float: none !important;
  }
  .col-md-12 {
    width: 54%;
    float: none !important;
    /* padding-right: 1px; */
    margin-right: -262px;
    margin-top: -77px;
    background: none !important;
}


</style>
<body class="dashboard-page">

<nav class="main-menu">
		<ul>
			<li>
				<a href="index2.php">
					<i class="fa fa-home nav_icon"></i>
					<span class="nav-text">
					Menu
					</span>
				</a>
			</li>

			<li>
				<a href="payment.php">
					<i class="fa fa-check-square-o nav_icon"></i>
					<span class="nav-text">
					ชำระเงิน
					</span>
				</a>
			</li>

			<li>
				<a href="">
					<i class="fa fa-check-square-o nav_icon"></i>
					<span class="nav-text">
					จัดการพนักงาน
					</span>
				</a>
			</li>

			<li>
				<a href="history.php">
					<i class="fa fa-file-text-o nav_icon"></i>
					<span class="nav-text">
					ประวัติการชำระ
					</span>
				</a>
			</li>

		</ul>
		<ul class="logout">
			<li>
			<a href="login.html">
			<i class="icon-off nav-icon"></i>
			<span class="nav-text">
			Logout
			</span>
			</a>
			</li>
		</ul>
	</nav>
	<section class="wrapper scrollable">
		<nav class="user-menu">
			<a href="javascript:;" class="main-menu-access">
			<i class="icon-proton-logo"></i>
			<i class="icon-reorder"></i>
			</a>
		</nav>
		<section class="title-bar">
			<div class="logo">
				<h1><a href="index2.php"><img src="images/logo.png" width=10% alt="" />Pruksa Ville 29 </a></h1>
			</div>


			<div class="header-right">
				<div class="profile_details_left">
					<div class="header-right-left">
						<!--notifications of menu start -->
						<ul class="nofitications-dropdown">




							<div class="clearfix"> </div>
						</ul>
					</div>
					<div class="profile_details">
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">
										<span class="prfil-img"><i class="fa fa-user" aria-hidden="true"></i></span>
										<div class="clearfix"></div>
									</div>
								</a>
								<ul class="dropdown-menu drp-mnu">
									<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>
									<li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>
									<li> <a href="#"><i class="fa fa-sign-out"></i> Logout</a> </li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</section>




      <div class="col-md-5 card" style="padding-bottom: 30px">


                 <div class="ui ordered steps" >

<div class="disabled step">

  <div class="content">
    <div class="title">เงื่อนไขการชำระเงิน</div>
    <div class="description" text align="center">Condiction Payment</div>
  </div>

</div>
<div class="disabled step">
  <div class="content">
    <div class="title">ยืนยันการชำระเงิน</div>
    <div class="description" text align="center">Enter Payment</div>
  </div>
</div>
<div class="active step">
  <div class="content">
    <div class="title">ออกใบเสร็จ</div>
    <div class="description" text align="center">Issue a receipt</div>
  </div>
</div>
</div>

<?php
  $con = mysqli_connect("localhost","root","","projectend");

  $address = $_POST['address'];
  $total = $_POST['total'];
  $month = $_POST['month'];
  $name = "พนักงานที่1" ;
  $id_ext = 0;

  $sqlz = "SELECT no_recipe AS maxid FROM tbl_recipe order by no_recipe desc limit 0,1"; // query อ่านค่า id สูงสุด
                      $res = mysqli_query($con,$sqlz); // ทำคำสั่ง
                      $ret = mysqli_fetch_assoc($res); // อ่านค่า
                      $last_id = $ret['maxid']; // คืนค่า id ที่ insert สูงสุด
                      $num_last_id = substr($last_id,1);
                      $one = 1;
                      $calculate_id = $last_id + $one;
                      $id_ext = $calculate_id;

                      $con = mysqli_connect("localhost","root","","projectend");
                      $Date = date("d/m/Y");
                      $monthz = date("m");
  $sq = "INSERT INTO tbl_recipe(no_recipe, Address_home, re_condition, total_all, staff_home, Recipe_date, Recipe_month) VALUES ('".$id_ext."','".$address."','".$month."','".$total."','".$name."','".$Date."','".$monthz."')";
  mysqli_query($con,"SET NAMES UTF8");
mysqli_query($con,$sq) or die("Error: ".mysqli_error($con));



if($month ==  1){
      $sqlzz = "SELECT id_check AS maxid FROM tbl_payment order by id_check desc limit 0,1"; // query อ่านค่า id สูงสุด
                      $resz = mysqli_query($con,$sqlzz); // ทำคำสั่ง
                      $retz = mysqli_fetch_assoc($resz); // อ่านค่า
                      $last_idz = $retz['maxid']; // คืนค่า id ที่ insert สูงสุด
                      $num_last_idz = substr($last_idz,1);
                      $one = 1;
                      $calculate_idz = $last_idz + $one;
                      $id_extz = $calculate_idz;
                      $monthz = date("m");
                      $Date = date("d/m/Y");
                      $year = date("Y");

$sqz = "INSERT INTO tbl_payment(id_check, Home_address, Home_month, Home_year, Home_date) VALUES ('".$id_extz."','".$address."','".$monthz."','".$year."','".$Date."')";
mysqli_query($con,$sqz) or die("Error: ".mysqli_error($con));
} else if($month == 6) {
$sqlzz = "SELECT id_check AS maxid FROM tbl_payment order by id_check desc limit 0,1"; // query อ่านค่า id สูงสุด
                      $resz = mysqli_query($con,$sqlzz); // ทำคำสั่ง
                      $retz = mysqli_fetch_assoc($resz); // อ่านค่า
                      $last_idz = $retz['maxid']; // คืนค่า id ที่ insert สูงสุด
                      $num_last_idz = substr($last_idz,1);
                      $one = 1;
                      $calculate_idz = $last_idz + $one;
                      $id_extz = $calculate_idz;
                      $monthz = date("m");
                      $Date = date("d/m/Y");
                      $year = date("Y");

for ($x = 0; $x <= 5; $x++) {
      $toMonth = $monthz + $x;
if($toMonth > 12) {
$toMonth = $toMonth - 12;
  $toyear = date("Y") + 1;

   $sqlzz = "SELECT id_check AS maxid FROM tbl_payment order by id_check desc limit 0,1"; // query อ่านค่า id สูงสุด
                      $resz = mysqli_query($con,$sqlzz); // ทำคำสั่ง
                      $retz = mysqli_fetch_assoc($resz); // อ่านค่า
                      $last_idz = $retz['maxid']; // คืนค่า id ที่ insert สูงสุด
                      $num_last_idz = substr($last_idz,1);
                      $one = 1;
                      $calculate_idz = $last_idz + $one;
                      $id_extz = $calculate_idz;
  $sqz = "INSERT INTO tbl_payment(id_check, Home_address, Home_month, Home_year, Home_date) VALUES ('".$id_extz."','".$address."','".$toMonth."','".$toyear."','".$Date."')";
mysqli_query($con,$sqz) or die("Error: ".mysqli_error($con));
} else {
   $sqlzz = "SELECT id_check AS maxid FROM tbl_payment order by id_check desc limit 0,1"; // query อ่านค่า id สูงสุด
                      $resz = mysqli_query($con,$sqlzz); // ทำคำสั่ง
                      $retz = mysqli_fetch_assoc($resz); // อ่านค่า
                      $last_idz = $retz['maxid']; // คืนค่า id ที่ insert สูงสุด
                      $num_last_idz = substr($last_idz,1);
                      $one = 1;
                      $calculate_idz = $last_idz + $one;
                      $id_extz = $calculate_idz;
  $sqz = "INSERT INTO tbl_payment(id_check, Home_address, Home_month, Home_year, Home_date) VALUES ('".$id_extz."','".$address."','".$toMonth."','".$year."','".$Date."')";
mysqli_query($con,$sqz) or die("Error: ".mysqli_error($con));
}
}
} else {
$sqlzz = "SELECT id_check AS maxid FROM tbl_payment order by id_check desc limit 0,1"; // query อ่านค่า id สูงสุด
                      $resz = mysqli_query($con,$sqlzz); // ทำคำสั่ง
                      $retz = mysqli_fetch_assoc($resz); // อ่านค่า
                      $last_idz = $retz['maxid']; // คืนค่า id ที่ insert สูงสุด
                      $num_last_idz = substr($last_idz,1);
                      $one = 1;
                      $calculate_idz = $last_idz + $one;
                      $id_extz = $calculate_idz;
                      $monthz = date("m");
                      $Date = date("d/m/Y");
                      $year = date("Y");

for ($x = 0; $x <= 11; $x++) {
      $toMonth = $monthz + $x;
if($toMonth > 12) {
  $toMonth = $toMonth - 12;
  $toyear = date("Y") + 1;
   $sqlzz = "SELECT id_check AS maxid FROM tbl_payment order by id_check desc limit 0,1"; // query อ่านค่า id สูงสุด
                      $resz = mysqli_query($con,$sqlzz); // ทำคำสั่ง
                      $retz = mysqli_fetch_assoc($resz); // อ่านค่า
                      $last_idz = $retz['maxid']; // คืนค่า id ที่ insert สูงสุด
                      $num_last_idz = substr($last_idz,1);
                      $one = 1;
                      $calculate_idz = $last_idz + $one;
                      $id_extz = $calculate_idz;
  $sqz = "INSERT INTO tbl_payment(id_check, Home_address, Home_month, Home_year, Home_date) VALUES ('".$id_extz."','".$address."','".$toMonth."','".$toyear."','".$Date."')";
mysqli_query($con,$sqz) or die("Error: ".mysqli_error($con));
} else {
   $sqlzz = "SELECT id_check AS maxid FROM tbl_payment order by id_check desc limit 0,1"; // query อ่านค่า id สูงสุด
                      $resz = mysqli_query($con,$sqlzz); // ทำคำสั่ง
                      $retz = mysqli_fetch_assoc($resz); // อ่านค่า
                      $last_idz = $retz['maxid']; // คืนค่า id ที่ insert สูงสุด
                      $num_last_idz = substr($last_idz,1);
                      $one = 1;
                      $calculate_idz = $last_idz + $one;
                      $id_extz = $calculate_idz;
  $sqz = "INSERT INTO tbl_payment(id_check, Home_address, Home_month, Home_year, Home_date) VALUES ('".$id_extz."','".$address."','".$toMonth."','".$year."','".$Date."')";
mysqli_query($con,$sqz) or die("Error: ".mysqli_error($con));
}
}
}



  $sql = "SELECT * FROM tbl_home WHERE Address_home = '".$address."'";
  mysqli_query($con,"SET NAMES UTF8");
  $objQuery = mysqli_query($con,$sql) or die("Error: ".mysqli._error($con));
  $chkResult = mysqli_fetch_array($objQuery, MYSQLI_BOTH);
  if(!$chkResult){
      echo "ไม่พบข้อมูล";

  }
  else {



      ?>
      <div class="col-md-12">
          <table>
          <br>
          <form>
              <input type="hidden" value = <?php echo $chkResult["Address_home"]; ?> name = "address" >



      <?php

                  echo "<tr><td>บ้านเลขที่ : ".$chkResult["Address_home"]."</td></tr>";
                  echo "<tr><td>เจ้าของบ้าน : ".$chkResult["Name_home"]."</td></tr>";
                  echo "<tr><td>ขนาดบ้าน   : ".$chkResult["Area_home"]."ตารางวา</td></tr>";
                  echo "<tr><td>เงื่อนไขการชำระ : ".$month." เดือน </td></tr>";
                  echo "<tr><td>ค่าใช้จ่ายส่วนกลาง   : ".$total." บาท</td></tr>";


           ?>
<?php
  require('fpdf.php');

  define('FPDF_FONTPATH','font/');

  $pdf=new FPDF();
  $pdf->AddPage();
  $pdf->AddFont('angsa','','angsa.php');
  $pdf->SetFont('angsa','',36);
  $pdf->Cell(0,20,iconv( 'UTF-8','TIS-620','ใบเสร็จ'),0,1,"C");
  $pdf->SetFont('angsa','',20);
  $pdf->Cell(190,10,iconv( 'UTF-8','TIS-620','หมู่บ้านพฤษาวิลล์ 29                    '),0,1,"R");
  $pdf->Cell(190,10,iconv( 'UTF-8','TIS-620','ที่อยู่ : บลาๆๆๆๆๆๆๆๆๆๆๆๆ                 '),0,1,"R");
  $pdf->Cell(190,10,iconv( 'UTF-8','TIS-620','เบอร์ติด่อ : 090xxxxxxx                    '),0,1,"R");
  $pdf->Cell(190,10,iconv( 'UTF-8','TIS-620','วันที่ : '.$Date),0,1,"R");

  $pdf->SetFont('angsa','',16);

  $pdf->Ln();
  $pdf->Cell(30,10,iconv( 'UTF-8','TIS-620',"เลขที่บ้าน : " ),1,'L');
  $pdf->Cell(160,10,iconv( 'UTF-8','TIS-620', $chkResult["Address_home"]),1,'L');/*ดึงมาจากดาต้าเบสนะครับ*/
  $pdf->Ln();
  $pdf->Cell(30,10,iconv( 'UTF-8','TIS-620',"ชื่อเจ้าบ้าน : " ),1,'L');
  $pdf->Cell(160,10,iconv( 'UTF-8','TIS-620', $chkResult["Name_home"]),1,0,'L');
  $pdf->Ln();
  $pdf->Cell(30,10,iconv( 'UTF-8','TIS-620',"ขนาดบ้าน : " ),1,'L');
  $pdf->Cell(160,10,iconv( 'UTF-8','TIS-620', $chkResult["Area_home"]." ตารางวา"),1,0,'L');

  $pdf->Ln();
  $pdf->Cell(30,10,iconv( 'UTF-8','TIS-620',"เงื่อนไขการชำระ : " ),1,0,'R');
  $pdf->Cell(160,10,iconv( 'UTF-8','TIS-620',$month." เดือน"),1,0,'L');
  $pdf->Ln();
  $pdf->Cell(30,10,iconv( 'UTF-8','TIS-620',"ราคาชำระ : " ),1,0,'L');
  $pdf->Cell(160,10,iconv( 'UTF-8','TIS-620', $total." บาท"),1,0,'L');
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Cell(200,10,iconv( 'UTF-8','TIS-620',"ลายเซ็นเจ้าหน้าที่  __________________                         " ),0,0,'R');
      //$this->Cell(20,6,$eachResult["Budget"],1);
      $pdf->Ln();
  $pdf->Output("recipe.pdf","F");
?>


<div class="ui placeholder segment" >
	<div class="ui icon header" >
  <i class="pdf file outline icon"></i>
  พิมพ์ใบเสร็จ
	</div>
<a href="recipe.pdf"><div class="ui primary button">พิมพ์</div></a>
</div>
          </form>
          </table>
      </div>


        <!--  <div class="footer">
	 		<p>© 2016 Colored . All Rights Reserved . Design by <a href="http://w3layouts.com/">W3layouts</a></p>
		</div>-->

      <?php
  }

mysqli_close($con);
   ?>
      </div>

  </div>



	</section>
	<script src="js/bootstrap.js"></script>
	<script src="js/proton.js"></script>
</body>

</html>

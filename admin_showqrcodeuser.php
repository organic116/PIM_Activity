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

    <title>ข้อมูลนักศึกษา</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style4.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
<style type="text/css">
ul.showInColumn{
    display:show;float:center;
    list-style:none;
    padding:0;margin:0;
    width:1080px;
/*  background-color:#FFCCCC;*/
    border:1px solid #333333;  /* เทียบใกล้เคียงกับการกำหนด  ของ table  */
    padding:2px 0 2px 2px;
}
ul.showInColumn li{
    list-style:none;
    display:show;float:left;
    background-color:#99CC99;
    margin:2px;  /* เทียบใกล้เคียงกับการกำหนด  cellspacing"  ของ table  */
    margin-left:3px;
    padding:0px; /* เทียบใกล้เคียงกับการกำหนด  cellpadding  ของ table  */
    border:3px solid #333333;  /* เทียบใกล้เคียงกับการกำหนด border ใน td ของ table  */
    width:200px; /*  กำหนดความกว้างของแต่ละคอลัมน์  */
}
</style>
</head>

<body >
	<div class="wrapper">
        <!-- Sidebar  -->
       <nav id="sidebar">
            <div class="sidebar-header">

                <h3>ระบบเข้าร่วมกิจกรรมนักศึกษา</h3>
				<strong>AR</strong>


            <ul class="list-unstyled components">
            <li>
                    <a href="admin_activesuimain.php" >
                    <i class="fas fa-paper-plane"></i>
                        เพิ่มกิจกรรม
                    </a></li>

            <li>
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
                        <li class="active">
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

                    <h4>แสดง QR-CODE นักศึกษา</h4>
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
<form class="form-inline" name="frmfind" method="GET" action="user_searchqecode.php">
	รหัสประจำตัว&nbsp;
		<input class="form-control mr-sm-2" type="text" name="emp_Rec" placeholder="กรุณากรอกรหัสนักศึกษา" aria-label="Search"  />
	ชื่อ&nbsp;
	<input class="form-control mr-sm-2" type="text" name="re_username" placeholder="กรุณากรอกชื่อนักศึกษา" aria-label="Search" / >
	นามสกุล&nbsp;
	<input class="form-control mr-sm-2" type="text" name="re_lastname" placeholder="กรุณากรอกนามสกุลนักศึกษา" aria-label="Search" / >
		<br>
		</br>

<div class="form-group col-md-2.5">
     <div class="input-group-prepend">

     <label for="re_major">สาขาวิชา &nbsp;</label>
  </div>
  <select class="custom-select" name="re_major">
    <option value="" selected>กรุณาเลือก</option>
    <option value="701">วิศวกรรมคอมพิวเตอร์ </option>
	  <option value="702">เทคโนโลยีสารสนเทศ </option>
	  <option value="703">วิศวกรรมอุตสาหการ </option>
	  <option value="704">วิศวกรรมการผลิตยานยนต์ </option>
	  <option value="705">วิศวกรรมหุ่นยนต์และระบบอัตโนมัติ </option>
  </select>
 </div>


		<br></br>&nbsp;<input class="btn btn-outline-success my-2 my-sm-0"   type="submit" name="find_Emp" value="ค้นหา">
</form>
<br></br><?php
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
 $con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
 mysqli_query($con, "SET NAMES UTF8");
 $perpage = 20;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 $start = ($page - 1) * $perpage;
 $sql = "select * from tb_user limit {$start} , {$perpage} ";
 $query = mysqli_query($con, $sql);
 ?>
<?php
$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
		mysqli_query($conn, "SET NAMES UTF8");

	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',15);
	$u = 0;
	$resultr=mysqli_query($conn,$sql) or die ("ไม่สามารถค้นหาข้อมูลได้").mysql_error();
	while($rowAc = mysqli_fetch_array($resultr)) {
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Cell(60,60,$pdf->Image(''.$rowAc["user_imgqrcode"].'',10,$u,50,0,'png'),0, "L");
	$pdf->Cell(35,25,iconv( 'UTF-8','TIS-620',''.$rowAc["user_id"].'' ),1,"C");
	$pdf->Cell(35,25,iconv( 'UTF-8','TIS-620',''.$rowAc["user_name"].'' ),1,"C");
	$u += 50;

			if($u == 250){


$u = 0;

			}
	}
				$pdf->Output("MyPDF/การเข้าร่วม ".".pdf","F");
				echo "<button  class='btn btn-primary'><a href=\"MyPDF/การเข้าร่วม ".".pdf\">พิมพ์รายงาน</button>";
?>
			<?php
   $conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
    mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
    //2. query ข้อมูลจากตาราง :
    $query0 = "SELECT COUNT(user_id) AS countuser FROM tb_user  " or die(mysql_error());
    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
	$result0 = mysqli_query($conn,$query0);
	$row = mysqli_fetch_array($result0,MYSQLI_ASSOC);
	$count = $row["countuser"];
	echo  "จำนวนนักศึกษาทั้งหมด ".$count." คน";


  ?>


 </br><div class='col-lg-12' >
 <table  border='3' align='center' class='form-group table table-bordered'  >
 <tr align='center' bgcolor='FFDAB9'>
 <h6><th width='100'>QR-CODE</th>
 <th width='100'>รหัสนักศึกษา</th>
 <th width='100'>ชื่อ</th>
 <th width='100'>นามสกุล</th>
 <th width='100'>สาขา</th>
 <th width='100'>ปีที่เข้าศึกษา</th>
 <th width='100'>จัดการข้อมูล</th>
 </h6></tr>
 </thead>
 <tbody>
 <?php while ($row = mysqli_fetch_assoc($query)) { ?>
 <tr align="center" bgcolor='FFF0F5'>
 <td><div align="center"><img src="<?php echo $row["user_imgqrcode"];?>" /></div></td>
 <td><?php echo $row['user_id']; ?></td>
 <td><?php echo $row['user_name']; ?></td>
 <td><?php echo $row['user_lastname']; ?></td>

    <!--<td><?php
     if ($row["faculty_id"]=='105')
     echo "วิศวกรรมศาสตร์และเทคโนโลยี";
     else($row["faculty_id"]=="") .  "</td> ";  ?></td>-->

 <td><?php
     if ($row["major_id"]=='701')
			 echo "วิศวกรรมคอมพิวเตอร์ ";
		else if($row["major_id"]=="")  "</td> ";

	 else if ($row["major_id"]=='702')
		echo "เทคโนโลยีสารสนเทศ ";
		else if($row["major_id"]=="")  "</td> ";

	else if ($row["major_id"]=='703')
		echo "วิศวกรรมอุตสาหการ ";
	else if($row["major_id"]=="")  "</td> ";

	else if($row["major_id"]=='704')
		echo "วิศวกรรมการผลิตยานยนต์ ";
	else if($row["major_id"]=="")  "</td> ";

	else if($row["major_id"]=='705')
		echo "วิศวกรรมหุ่นยนต์และระบบอัตโนมัติ ";
	else if($row["major_id"]=="")  "</td> ";

    echo "<td>" .$row["user_year"] .  "</td> "; ?></td>

<!-- <td><?php
     if ($row["user_status"]=='0')
		echo "ใช้งาน";
		else if ($row["user_status"]=='1')
		echo "ปิดใช้งาน";
		else($row["user_status"]=="") ; ?></td>-->

 <td><?php echo "<a href='admin_showprofiles.php?stu_id=".$row["user_id"]."' ><img src='img/seeuser.png' width= '30' height= '30' align='center' ></a><br>
	<a href='user_showedit.php?stu_id=".$row["user_id"]."'><img src='img/edit_user.png' width= '30' height= '30' align='center'></a><br>
	<a href='tese_qrcode.php?stu_id=".$row["user_id"]."'><img src='img/QR_code.png' width= '30' height= '30' align='center'  ></a>"; ?></td>




 </tr>

 <?php } ?>
 </tbody>
 </table>
 <?php
 $sql2 = "select * from tb_user ";
 $query2 = mysqli_query($con, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>

 <nav>
 <div class="clearfix">
                    <div class="hint-text">แสดง <b><?php echo  $perpage; ?></b> จาก <b><?php echo $total_page; ?></b> รายการ</div>
                  <ul class="pagination">
 <li>
 <a href="admin_showqrcodeuser.php?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php
 $sos = 1;
 for($i=1;$i<=$total_page;$i++){ ?>
 <li  class="page-item"><a href="admin_showqrcodeuser.php?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
 <?php } ?>
 <li >
 <a href="admin_showqrcodeuser.php?page=<?php echo $total_page;?>" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
                </div>


 </nav>
 </div>
 </div>
 </div> <!-- /container -->



 <script src="bootstrap/js/bootstrap.min.js"></script>

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
	<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>


</html>

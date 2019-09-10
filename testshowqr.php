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

<body>
	<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>ระบบเข้าร่วมกิจกรรมนักศึกษา</h3>
				<strong>AR</strong>
            </div>

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
                <a href="admin_showuser.php">
                <i class="fas fa-briefcase"></i>
                    นักศึกษาทั้งหมด
                </a></li>

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
            <i class="fas fa-align-justify"></i></button>
        </nav>

        <!-- Page Content  -->

        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-right"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;

				<h4>แสดงข้อมูลนักศึกษา </h4>
                   <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                        <B>ผู้ใช้งาน :&nbsp;</B><?php echo $_SESSION["admin_username"];?>
                        &nbsp;<B>สถานะ :&nbsp;</B><?php

									$a=$_SESSION["admin_status"];
													if ($a==0)
													echo "เจ้าหน้าที่";
													else($a==1)
							?>
                        </ul>
                    </div>
                </div>
            </nav>
<form class="form-inline" name="frmfind" method="GET" action="user_search.php">
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
<a href="admin_adduser.php" ><img src="img/add-icon.png" width= "40" height= "40" align="right"></a>
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

	<?php
 $con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
 mysqli_query($con, "SET NAMES UTF8");
 $perpage = 25;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 $start = ($page - 1) * $perpage;
 $sql = "select * from tb_user limit {$start} , {$perpage} ";
 $query = mysqli_query($con, $sql);
 ?>
  </br>
  <center>
<ul class="showInColumn" align="center">
<?php
$con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
mysqli_query($con, "SET NAMES UTF8");
$query = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($query)) {
?>
<li align="center"  ><img src="<?php echo $row["user_imgqrcode"];?>" /><br><div align="center"><?php echo $row['user_id']; ?></div><br><div align="center"><?php echo $row['user_name']; ?></div></li>
<?php } ?>
</ul>
</center>



   <table  border='3' align='center' class='form-group table table-bordered'  >
 </thead>
 <tbody>

 <?php while ($row = mysqli_fetch_assoc($query)) { ?>
 <table width="91" border="0" cellspacing="0" cellpadding="0">
        <tr>
 <td><div align="center"><img src="<?php echo $row["user_imgqrcode"];?>" /></div></td>
        </tr>
		  <tr>
 <td><div align="center"><?php echo $row['user_id']; ?></div></td>
        </tr>
        <tr>
          <td><div align="center"><?php echo $row['user_name']; ?></div></td>
        </tr>
      </table>
  <!--<td><?php
     if ($row["faculty_id"]=='105')
     echo "วิศวกรรมศาสตร์และเทคโนโลยี";
     else($row["faculty_id"]=="") .  "</td> ";  ?></td>-->


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
                    <div class="hint-text">Showing <b><?php echo  $perpage; ?></b> out of <b><?php echo $total_page; ?></b> entries</div>
                  <ul class="pagination">
 <li>
 <a href="testshowqr.php?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li  class="page-item"><a href="testshowqr.php?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
 <?php } ?>
 <li >
 <a href="testshowqr.php?page=<?php echo $total_page;?>" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
                </div>

<?php
	require('fpdf.php');

	define('FPDF_FONTPATH','font/');

	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',36);
	$pdf->Cell(0,20,iconv( 'UTF-8','TIS-620','สวัสดี ชาวไทยครีเอท'),0,1,"C");

	$con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
	mysqli_query($con, "SET NAMES UTF8");
	$sqlqr = "SELECT * FROM tb_user ";
	$queryqr = mysqli_query($con, $sqlqr);
	while ($rowqr = mysqli_fetch_assoc($queryqr))
		{
	$pdf->Image($rowqr["user_imgqrcode"],60,30,90,0,'PNG');
	}

	$pdf->Output("MyPDF/AllQR.pdf","F");
?>
	PDF Created Click <a href="MyPDF/AllQR.pdf">here</a> to Download
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

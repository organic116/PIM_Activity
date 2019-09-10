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
    <link rel="stylesheet" href="style4.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> <!-- Css ปุ่ม-->
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
                    <a href="admin_showuser.php">
                    <i class="fas fa-briefcase"></i>
                        นักศึกษาทั้งหมด
                    </a></li>
			<!-- <li>
				<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
				  <i class="fas fa-briefcase"></i>
				เมนูนักศึกษา</a>

                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="admin_showuser.php">นักศึกษาทั้งหมด</a>
                        </li>
                        <li>
                            <a href="admin_showqrcodeuser.php">QR-CODE นักศึกษา</a>
                        </li>
                    </ul>
                </li>-->

            <li class="active">
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

                    <h4>ค้นหาข้อมูลอาจารย์</h4>
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
						if(document.frmfind.re_teacherid.value == "" && document.frmfind.re_teachername.value == "" && document.frmfind.re_teacherlastname.value == ""&& document.frmfind.re_teachermajor.value == "")
							{
							swal("เกิดข้อผิดพลาด!", "กรุณากรอกข้อมูล", "error");
							return false;
							}
						document.frmfind.submit();
						}
						</script>

          <form class="form-inline" name="frmfind" method="GET" onSubmit="JavaScript:return fncSubmit();" action="admin_searchteacher.php">
	รหัสประจำตัว&nbsp;
		<input class="form-control mr-sm-2" type="text" name="re_teacherid" placeholder="กรุณากรอกรหัสอาจารย์" aria-label="Search"  />
	ชื่อ&nbsp;
	<input class="form-control mr-sm-2" type="text" name="re_teachername" placeholder="กรุณากรอกชื่ออาจารย์" aria-label="Search" / >
	นามสกุล&nbsp;
	<input class="form-control mr-sm-2" type="text" name="re_teacherlastname" placeholder="กรุณากรอกนามสกุลอาจารย์" aria-label="Search" / >
		<br>
		</br>
<div class="form-group col-md-2.5">
     <div class="input-group-prepend">

     <label for="re_teachermajor">สาขาวิชา &nbsp;</label>
  </div>
  <select class="custom-select" name="re_teachermajor">
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


	<table></br>
			<tr>
				<td align='left'>
					<a href="admin_showteacher.php">
					<h6> << กลับหน้าแสดงข้อมูลนักศึกษา</h6></a>
				</td>
			</tr>
		</table></br>

	<?php
	$SQL="SELECT * FROM personal WHERE personal_status = '1' ";

	if(!$_GET["re_teacherid"] == ""){
		$SQL .= "AND personal_id = '".$_GET["re_teacherid"]."'";
	}
	if(!$_GET["re_teachername"] == ""){
		$SQL .= "AND personal_name LIKE '%".$_GET["re_teachername"]."%'";
	}
	if(!$_GET["re_teacherlastname"] == ""){
		$SQL .= "AND personal_lastname  LIKE '%".$_GET["re_teacherlastname"]."%'";
	}
	if(!$_GET["re_teachermajor"] == ""){
		$SQL .= "AND major_id = '".$_GET["re_teachermajor"]."'";
	}

	$server=$_SERVER['localhost'];
  $username ="id10717672_organic";
  $password ="Tanakorn1340";
  $db ="id10717672_dbactivities";

	$conn=mysqli_connect($server,$username,$password,$database);

if(!$conn){
die("เกิดข้อผิดพลาดในการเชื่อมต่อกับเครื่องให้บริการฐานข้อมูล!!!!!".mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");
$result=mysqli_query($conn,$SQL) or die("เกิดข้อผิดพลาดในการค้นหา").mysqli_error();
if(mysqli_num_rows($result)==1){
$row=mysqli_fetch_array($result);
$u_id=$row["personal_id"];
$u_name=$row["personal_name"];
$u_lastname=$row["personal_lastname"];
$u_major=$row["major_id"];
echo"<table  border='3' align='center' class='form-group table table-bordered'  >";
echo"<tr align='center' bgcolor='#DCDCDC'>";
echo"<td width='100px'><B>รหัสอาจารย์</B></td>";
echo"<td width='100px'><B>ชื่ออาจารย์</B></td>";
echo"<td width='100px'><B>นามสกุลอาจารย์</B></td>";
echo"<td width='100px'><B>สาขา</B></td>";
echo"</tr>";
echo "<tr width='100px' align='center' bgcolor='#FFFFF0'>";
echo "<td width='100px' align ='center'>$row[personal_id]</td>";
echo "<td width='100px' align ='center'>$row[personal_name]</td>";
echo "<td width='100px' align ='center'>$row[personal_lastname]</td>";
echo "<td width='100px'>" .'<center>';
if ($row["major_id"]=='701')
  echo "วิศวกรรมคอมพิวเตอร์";
    else if($row["major_id"]=="")  "</td> ";

else if ($row["major_id"]=='702')
  echo "เทคโนโลยีสารสนเทศ";
    else if($row["major_id"]=="")  "</td> ";

else if ($row["major_id"]=='703')
  echo "วิศวกรรมอุตสาหการ";
    else if($row["major_id"]=="")  "</td> ";

else if($row["major_id"]=='704')
  echo "วิศวกรรมการผลิตยานยนต์";
    else if($row["major_id"]=="")  "</td> ";

else if($row["major_id"]=='705')
  echo "วิศวกรรมหุ่นยนต์และระบบอัตโนมัติ";
    else if($row["major_id"]=="")  "</td> ";

}else if (mysqli_num_rows($result)>1){
echo"<table  border='3' align='center' class='form-group table table-bordered'  >";
echo"<tr align='center' bgcolor='#DCDCDC'>";
echo"<td width='100px'><B>รหัสอาจารย์</B></td>";
echo"<td width='100px'><B>ชื่ออาจารย์</B></td>";
echo"<td width='100px'><B>นามสกุลอาจารย์</B></td>";
echo"<td width='100px'><B>สาขา</B></td>";
echo"</tr>";
$con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
mysqli_set_charset($con,"utf8");
$queryz = mysqli_query($con, $SQL) or die("เกิดข้อผิดพลาดในการค้นหา").mysqli_error();;
while ($rowz = mysqli_fetch_assoc($queryz)){
$u_id=$rowz["personal_id"];
$u_name=$rowz["personal_name"];
$u_lastname=$rowz["personal_lastname"];
$u_major=$rowz["major_id"];

echo "<tr align='center' bgcolor='#FFFFF0'>";
echo "<td width='100px' align ='center'>$rowz[personal_id]</td>";
echo "<td width='100px' align ='center'>$rowz[personal_name]</td>";
echo "<td width='100px' align ='center'>$rowz[personal_lastname]</td>";
echo "<td>" .'<center>';
if ($row["major_id"]=='701')
  echo "วิศวกรรมคอมพิวเตอร์";
    else if($row["major_id"]=="")  "</td> ";

else if ($row["major_id"]=='702')
  echo "เทคโนโลยีสารสนเทศ";
    else if($row["major_id"]=="")  "</td> ";

else if ($row["major_id"]=='703')
  echo "วิศวกรรมอุตสาหการ";
    else if($row["major_id"]=="")  "</td> ";

else if($row["major_id"]=='704')
  echo "วิศวกรรมการผลิตยานยนต์";
    else if($row["major_id"]=="")  "</td> ";

else if($row["major_id"]=='705')
  echo "วิศวกรรมหุ่นยนต์และระบบอัตโนมัติ";
    else if($row["major_id"]=="")  "</td> ";

	echo"</tr>";

	 }}
	 else{
	echo "ไม่พบข้อมูลนักศึกษที่ต้องการค้นหา";
	exit(0);
	}

	mysqli_close($conn);
 ?>
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

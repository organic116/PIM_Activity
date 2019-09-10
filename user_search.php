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

img:disabled {
  opacity:0.1;
}
a.disabled {
   pointer-events: none;
   cursor: default;

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
						<li >
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
						<li>
							<a href="admin_arreport.php">
								&nbsp;<i class="fas fa-print"></i>
									พิมพ์รายงานกิจกรรมรายปี
							</a>
						</li>
						<li class="active">
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

                    <h4>แสดงข้อมูลนักศึกษา</h4>
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
						if(document.frmfind.emp_Rec.value == "" && document.frmfind.re_username.value == "" && document.frmfind.re_lastname.value == ""&& document.frmfind.re_major.value == "")
							{
							swal("เกิดข้อผิดพลาด!", "กรุณากรอกข้อมูล", "error");
							return false;
							}
						document.frmfind.submit();
						}
						</script>
			<form  class="form-inline" name="frmfind" onSubmit="JavaScript:return fncSubmit();" method="GET" action="user_search.php">
	&nbsp;&nbsp;รหัสประจำตัว&nbsp;
	<input class="form-control mr-sm-1.5" type="text" name="emp_Rec" placeholder="กรอกรหัสนักศึกษา" aria-label="Search" style="width:150px;" />
	&nbsp;&nbsp;ชื่อ&nbsp;
	<input class="form-control mr-sm-1.5" type="text" name="re_username" placeholder="กรอกชื่อนักศึกษา" aria-label="Search" style="width:180px;" / >
	&nbsp;&nbsp;นามสกุล&nbsp;
	<input class="form-control mr-sm-1.5" type="text" name="re_lastname" placeholder="กรอกนามสกุลนักศึกษา" aria-label="Search" style="width:180px;" / >
	<?php
 $conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
 mysqli_query($conn, "SET NAMES UTF8");
?>
<div class="form-group col-md-2.5">
     <div class="input-group-prepend">
     <label for="name_selar">&nbsp;&nbsp;สาขา&nbsp;</label>
  </div>
<select class="custom-select" name="re_major" style="width:400px;"  >
<option value="" >--กรุณาเลือกสาขา--</option>
<?php
$sqlo="SELECT
tb_major.major_id,
tb_major.major_name,
tb_course.course_name
FROM
tb_major
INNER JOIN tb_course ON tb_major.course_id = tb_course.course_id";
   $queryo=mysqli_query($conn,$sqlo);
   while($rowo=mysqli_fetch_array($queryo)){
?>
  <option value="<?php echo $rowo['major_id']?>"><?php echo $rowo['major_name']?>&nbsp;<?php echo $rowo['course_name']?></option>
<?php } ?>
</select>

</div>
  &nbsp;&nbsp;&nbsp;&nbsp;<button id='sidebarCollapse' class='btn btn-info' type="submit" name="find_Emp">
			 <i class='fas fa-search'></i></button>
</form>

		<br>
		<a href='admin_showuser.php'>
			   &nbsp;&nbsp;&nbsp;&nbsp;<button type='button' id='sidebarCollapse' class='btn btn-info'>
			 <i class="fas fa-home"></i>&nbsp;กลับหน้าแสดงข้อมูลนักศึกษา
					</button></a>
		<br>
		</br>
	<?php

$SQL="SELECT
tb_major.major_name,
tb_user.user_id,
tb_user.user_name,
tb_user.user_lastname,
tb_course.course_name,
tb_user.user_room,
tb_user.user_year,
tb_user.user_status,
tb_status.s_name,
tb_user.user_statustype,
tb_user.user_statusqrcode,
tb_user.faculty_id,
tb_user.major_id,
tb_major.major_id
FROM
tb_user
INNER JOIN tb_major ON tb_user.major_id = tb_major.major_id
INNER JOIN tb_course ON tb_major.course_id = tb_course.course_id
INNER JOIN tb_status ON tb_user.user_status = tb_status.s_id
WHERE
user_statustype= '0'";

if(!$_GET["emp_Rec"] == ""){
		$SQL .= "AND user_id = '".$_GET["emp_Rec"]."'";

	}
	if(!$_GET["re_username"] == ""){
		$SQL .= "AND user_name LIKE '".$_GET["re_username"]."%'";

	}
	if(!$_GET["re_lastname"] == ""){
		$SQL .= "AND user_lastname LIKE '%".$_GET["re_lastname"]."%'";

	}
	if(!$_GET["re_major"] == ""){
		$SQL .= "AND tb_user.major_id = '".$_GET["re_major"]."'";
	}
	mysqli_query($conn, "SET NAMES UTF8");

if(!$conn){
die("เกิดข้อผิดพลาดในการเชื่อมต่อกับเครื่องให้บริการฐานข้อมูล!!!!!".mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");
$result=mysqli_query($conn,$SQL) or die("เกิดข้อผิดพลาดในการค้นหา").mysqli_error();
if(mysqli_num_rows($result)==1){
$row=mysqli_fetch_array($result);
echo"<table  border='2' align='center' class='form-group table table-striped' width='100px' style='table-layout:fixed' >";
echo"<tr align='center'>";
echo"<td width='70px' bgcolor='#6495ED'>รหัสนักศึกษา</td>";
echo"<td width='100px' bgcolor='#6495ED'>ชื่อ-นามสกุล</td>";
echo"<td width='150px' bgcolor='#6495ED'>สาขา</td>";
echo"<td width='60px' bgcolor='#6495ED'>สถานะ</td>";
echo"<td width='80px' bgcolor='#6495ED'>การเข้าร่วม</td>";
echo"<td width='100px' bgcolor='#6495ED'>จัดการข้อมูล</td>";
echo"</tr>";
echo "<tr  align='center' bgcolor='#FFFFF0'>";
echo "<td  align ='center'>$row[user_id]</td>";
echo "<td  align ='center'>$row[user_name]&nbsp;$row[user_lastname]</td>";
echo "<td	align ='center'>$row[major_name]</td>";
echo "<td>";?>
<div class="btn-group btn-group-toggle" data-toggle="buttons">
<!--<?php
if ($row["user_statusqrcode"]=='0')
echo "<label class='btn btn-secondary active'><input type='radio'>ยังไม่แจก</label>";
else if ($row["user_statusqrcode"]=='1')
echo "<label class='btn btn-secondary active'><input type='radio'>แจกแล้ว</label>";
else($row["user_statusqrcode"]=="")?>
</div>
<?php
echo "</td>";
echo "<td >";?>-->
<?php
     if ($row["s_name"]=='ปกติ')
		echo "<font color='#00FF33'><b>ปกติ</b></font>";
		else if ($row["s_name"]=='พ้นสภาพ')
		echo "<font color='#FF0000'><b>พ้นสภาพ</b></font>";
		else($row["s_name"]=="") ; ?>
<?php echo "</td>";
echo "<td >";
$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
    mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
    //2. query ข้อมูลจากตาราง :
    $query0 = "SELECT COUNT(activities_id) AS countactivities FROM tb_joinac   " or die(mysql_error());

	$query1 = "SELECT * FROM  tb_joinac INNER JOIN tb_activities ON tb_joinac.activities_id = tb_activities.activities_id WHERE tb_activities.genus_id = '1' AND tb_joinac.user_id = '".$row['user_id']."'";
	$query2 = "SELECT * FROM  tb_joinac INNER JOIN tb_activities ON tb_joinac.activities_id = tb_activities.activities_id WHERE tb_activities.genus_id = '2' AND tb_joinac.user_id = '".$row['user_id']."'";
	$query3 = "SELECT * FROM  tb_joinac INNER JOIN tb_activities ON tb_joinac.activities_id = tb_activities.activities_id WHERE tb_activities.genus_id = '3' AND tb_joinac.user_id = '".$row['user_id']."'";
	$query4 = "SELECT * FROM  tb_joinac INNER JOIN tb_activities ON tb_joinac.activities_id = tb_activities.activities_id WHERE  tb_joinac.user_id = '".$row['user_id']."'";

    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
	$result1 = mysqli_query($conn,$query1);
	$rowcount1=mysqli_num_rows($result1);
	$hour1 = 0;
	while($row1 = mysqli_fetch_array($result1)){
	$hour1 += $row1["activities_hour"];
	}
	$result4 = mysqli_query($conn,$query4);
	$rowcounttole= 0;
	$rowcount4=mysqli_num_rows($result4);
	$hour4 = 0;
	while($row4 = mysqli_fetch_array($result4)){
	$hour4 += $row4["activities_hour"];
	}

	//echo  "เข้าร่วม ".$rowcount4." ครั้ง   รวม ".$hour4." ชั่วโมง";
	//echo  "รวม".$hour4."ชั่วโมง";
	//echo  "<td><center>".$hour4."</center></td>";
	//echo  "</tr>";
	$dis = "";
	  if($rowcount4 != 0)
	  {
			$dis = "disabled";
	  }
echo "<b><a href='admin_showjoinuser.php?stu_id=".$row["user_id"]."'>$rowcount4 &nbsp;ครั้ง<b></a>";
echo "</td>";
echo "<td><a href='admin_showprofiles.php?stu_id=".$row["user_id"]."'>
			  <button type='button' id='sidebarCollapse' class='btn btn-success'>
			<i class='fas fa-user'></i></button></a>

			<a href='user_showedit.php?stu_id=".$row["user_id"]."'>
			   <button type='button' id='sidebarCollapse' class='btn btn-info'>
			<i class='fas fa-user-edit'></i></button></a>


			<a href='admin_deluser.php?stu_id=".$row["user_id"]."'>
			<button type='submit' class='btn btn-danger'  name='submit' id='submit' onclick='return confirm('คุณต้องการลบนักศึกษาใช่หรือไม่ ?')
			  ".$dis."'><i class='fas fa-user-minus disabled'  ></i>
			</button></a>

			<a href='tese_qrcode.php?stu_id=".$row["user_id"]."'>
			<button type='button' id='sidebarCollapse' class='btn btn-info'>
			<i class='fas fa-qrcode'></i></i></button></a></td></tr>";
echo "</table>";
}else if (mysqli_num_rows($result)>1){
echo"<table  border='2' align='center' class='form-group table table-striped' width='100px' style='table-layout:fixed'  >";
echo"<tr align='center'>";
echo"<td width='70px' bgcolor='#6495ED'>รหัสนักศึกษา</td>";
echo"<td width='100px' bgcolor='#6495ED'>ชื่อ-นามสกุล</td>";
echo"<td width='150px' bgcolor='#6495ED'>สาขา</td>";
echo"<td width='60px' bgcolor='#6495ED'>สถานะ</td>";
echo"<td width='80px' bgcolor='#6495ED'>การเข้าร่วม</td>";
echo"<td width='100px' bgcolor='#6495ED'>จัดการข้อมูล</td>";
echo"</tr>";
$con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
mysqli_set_charset($con,"utf8");
$queryz = mysqli_query($con,$SQL) or die("เกิดข้อผิดพลาดในการค้นหา").mysqli_error();
while ($rowz = mysqli_fetch_assoc($queryz)){
echo "<tr  align='center' bgcolor='#FFFFF0'>";
echo "<td  align ='center'>$rowz[user_id]</td>";
echo "<td  align ='center'>$rowz[user_name]&nbsp;$rowz[user_lastname]</td>";
echo "<td	align ='center'>$rowz[major_name]</td>";
echo "<td>";?>
<div class="btn-group btn-group-toggle" data-toggle="buttons">
<!--<?php
if ($rowz["user_statusqrcode"]=='0')
echo "<label class='btn btn-secondary active'><input type='radio'>ยังไม่แจก</label>";
else if ($rowz["user_statusqrcode"]=='1')
echo "<label class='btn btn-secondary active'><input type='radio'>แจกแล้ว</label>";
else($rowz["user_statusqrcode"]=="")?>
</div>
<?php
echo "</td>";
echo "<td >";?>-->
<?php
     if ($rowz["s_name"]=='ปกติ')
		echo "<font color='#00FF33'><b>ปกติ</b></font>";
		else if ($rowz["พ้นสภาพ"]=='1')
		echo "<font color='#FF0000'><b>พ้นสภาพ</b></font>";
		else($rowz["user_status"]=="") ; ?>
<?php echo "</td>";
echo "<td >";
$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
    mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
    //2. query ข้อมูลจากตาราง :
    $query0 = "SELECT COUNT(activities_id) AS countactivities FROM tb_joinac   " or die(mysql_error());

	$query1 = "SELECT * FROM  tb_joinac INNER JOIN tb_activities ON tb_joinac.activities_id = tb_activities.activities_id WHERE tb_activities.genus_id = '1' AND tb_joinac.user_id = '".$rowz['user_id']."'";
	$query2 = "SELECT * FROM  tb_joinac INNER JOIN tb_activities ON tb_joinac.activities_id = tb_activities.activities_id WHERE tb_activities.genus_id = '2' AND tb_joinac.user_id = '".$rowz['user_id']."'";
	$query3 = "SELECT * FROM  tb_joinac INNER JOIN tb_activities ON tb_joinac.activities_id = tb_activities.activities_id WHERE tb_activities.genus_id = '3' AND tb_joinac.user_id = '".$rowz['user_id']."'";
	$query4 = "SELECT * FROM  tb_joinac INNER JOIN tb_activities ON tb_joinac.activities_id = tb_activities.activities_id WHERE  tb_joinac.user_id = '".$rowz['user_id']."'";

    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
	$result1 = mysqli_query($conn,$query1);
	$rowcount1=mysqli_num_rows($result1);
	$hour1 = 0;
	while($row1 = mysqli_fetch_array($result1)){
	$hour1 += $row1["activities_hour"];
	}
	$result4 = mysqli_query($conn,$query4);
	$rowcounttole= 0;
	$rowcount4=mysqli_num_rows($result4);
	$hour4 = 0;
	while($row4 = mysqli_fetch_array($result4)){
	$hour4 += $row4["activities_hour"];
	}

	//echo  "เข้าร่วม ".$rowcount4." ครั้ง   รวม ".$hour4." ชั่วโมง";
	//echo  "รวม".$hour4."ชั่วโมง";
	//echo  "<td><center>".$hour4."</center></td>";
	//echo  "</tr>";
	$dis = "";
	  if($rowcount4 != 0)
	  {
			$dis = "disabled";
	  }
echo "<b><a href='admin_showjoinuser.php?stu_id=".$rowz["user_id"]."'>$rowcount4 &nbsp;ครั้ง<b></a>";
echo "</td>";
echo "<td>
			<a href='admin_showprofiles.php?stu_id=".$rowz["user_id"]."'>
			  <button type='button' id='sidebarCollapse' class='btn btn-success'>
			<i class='fas fa-user'></i></button></a>

			<a href='user_showedit.php?stu_id=".$rowz["user_id"]."'>
			   <button type='button' id='sidebarCollapse' class='btn btn-info'>
			<i class='fas fa-user-edit'></i></button></a>


			<a href='admin_deluser.php?stu_id=".$rowz["user_id"]."'>
			<button type='submit' class='btn btn-danger'  name='submit' id='submit' onclick='return confirm('คุณต้องการลบนักศึกษาใช่หรือไม่ ?')
			  ".$dis."'><i class='fas fa-user-minus disabled'  ></i>
			</button></a>

			<a href='tese_qrcode.php?stu_id=".$rowz["user_id"]."'>
			<button type='button' id='sidebarCollapse' class='btn btn-info'>
			<i class='fas fa-qrcode'></i></i></button></a></td></tr>";

	 }}
	 else{
	echo "ไม่พบข้อมูลนักศึกษาที่ต้องการค้นหา";
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

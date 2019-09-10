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
             <h4> ค้นหานักศึกษา </h4>
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

			<script language="javascript">
					function fncSubmit()
						{
						if(document.frmfind.re_userid.value == "" && document.frmfind.re_username.value == "" && document.frmfind.re_lastname.value == ""  && document.frmfind.re_yearu.value == "")
							{
							swal("เกิดข้อผิดพลาด!", "กรุณากรอกข้อมูล", "error");
							return false;
							}
						document.frmfind.submit();
						}
						</script>

            <form class="form-inline" name="frmfind" method="GET"  onSubmit="JavaScript:return fncSubmit();" action="teacher_searchuser.php">
	&nbsp;&nbsp;&nbsp;&nbsp;รหัสประจำตัว&nbsp;
		<input class="form-control mr-sm-2" type="text" name="re_userid" placeholder="กรอกรหัสนักศึกษา" aria-label="Search" style="width:180px;"  />
	ชื่อ&nbsp;
	<input class="form-control mr-sm-2" type="text" name="re_username" placeholder="กรอกชื่อนักศึกษา" aria-label="Search" style="width:180px;" / >
	นามสกุล&nbsp;
	<input class="form-control mr-sm-2" type="text" name="re_lastname" placeholder="กรอกนามสกุลนักศึกษา" aria-label="Search" style="width:180px;" / >
	<!--ปีที่เข้าศึกษา&nbsp;
	<input class="form-control mr-sm-2" type="text" name="re_yearuser" placeholder="กรุณากรอกปีที่เข้าศึกษา" aria-label="Search" / >-->
	 <div class="form-group col-md-2.5">
     <div class="input-group-prepend">
     <label for="name_month">&nbsp;ชั้นปี &nbsp;</label>
  </div>
  <?php
   $yer =  date('Y')+543;
$Y1 =$yer -1;
$Y2 =$yer -2;
$Y3 =$yer -3;
$Y4 =$yer -4;

  ?>
  <select class="custom-select" name="re_yearu">
    <option value="" selected>กรุณาเลือก</option>
    <option value="<?php echo $Y1 ;?>">1</option>
	<option value="<?php echo$Y2;?>">2</option>
	<option value="<?php echo$Y3;?>">3</option>
	 <option value="<?php echo$Y4;?>">4</option>

  </select>
 </div>
&nbsp;&nbsp;<button id='sidebarCollapse' class='btn btn-info' type="submit" name="find_Emp">
			 <i class='fas fa-search'></i></button>
</form>
<br>


		<a href=' teacher_showuser.php'>
			   &nbsp;&nbsp;&nbsp;&nbsp;<button type='button' id='sidebarCollapse' class='btn btn-info'>
			 <i class="fas fa-home"></i>&nbsp;กลับหน้าค้นนักศึกษา
					</button></a>
		<br>
		</br>

	<?php
	$major0 = $_SESSION["major_id"];

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

";

if(!$_GET["re_userid"] == ""){
		$SQL .= " AND user_id = '".$_GET["re_userid"]."'";

	}
	if(!$_GET["re_username"] == ""){
		$SQL .= " AND user_name LIKE '".$_GET["re_username"]."%'";

	}
	if(!$_GET["re_lastname"] == ""){
		$SQL .= " AND user_lastname LIKE '%".$_GET["re_lastname"]."%'";

	}

	if(!$_GET["re_yearu"] == ""){
		$SQL .= "AND user_year = '".$_GET["re_yearu"]."'";

  } else {
    $SQL .= "where tb_user.major_id = '".$_SESSION["major_id"]."'";
	if(!$_GET["re_userid"] == ""){
		$SQL .= " AND user_id = '".$_GET["re_userid"]."'";
	}
	if(!$_GET["re_username"] == ""){
		$SQL .= " AND user_name LIKE '".$_GET["re_username"]."%'";
	}
	if(!$_GET["re_lastname"] == ""){
		$SQL .= " AND user_lastname LIKE '%".$_GET["re_lastname"]."%'";
	}

	if(!$_GET["re_yearu"] == ""){
		$SQL .= "AND user_year = '".$_GET["re_yearu"]."'";
	}
	}



	$server=$_SERVER['localhost'];
  $username="id10717672_organic";
  $password="Tanakorn1340";
  $database="id10717672_dbactivities";
	$conn=mysqli_connect($server,$username,$password,$database);

if(!$conn){
die("เกิดข้อผิดพลาดในการเชื่อมต่อกับเครื่องให้บริการฐานข้อมูล!!!!!".mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");
$result=mysqli_query($conn,$SQL) or die("เกิดข้อผิดพลาดในการค้นหา").mysqli_error();
if(mysqli_num_rows($result)==1){
$row=mysqli_fetch_array($result);
echo "<div class='col-lg-12' >";
echo"<table  border='2' align='center' class='form-group table table-striped' width='100px' style='table-layout:fixed'  >";
echo"<tr align='center'>";
echo"<td width='70px' bgcolor='#6495ED'><b>รหัสนักศึกษา</b></td>";
echo"<td width='100px' bgcolor='#6495ED'><b>ชื่อ-นามสกุล</b></td>";
echo"<td width='150px' bgcolor='#6495ED'><b>สาขา</b></td>";
echo"<td width='60px' bgcolor='#6495ED'><b>สถานะ</b></td>";
echo"<td width='70px' bgcolor='#6495ED'><b>การเข้าร่วม</b></td>";
echo"<td width='50px' bgcolor='#6495ED'><b>ชั้นปี</b></td>";
echo"<td width='70px' bgcolor='#6495ED'><b>จัดการข้อมูล</b></td>";
echo"</tr>";
echo "<tr  align='center'>";
echo "<td  align ='center'>$row[user_id]</td>";
echo "<td  align ='center'>$row[user_name]&nbsp;&nbsp;$row[user_lastname]</td>";
echo "<td align ='center'>$row[major_name]</td>";
echo "<td>";?>
<div class="btn-group btn-group-toggle" data-toggle="buttons">
<?php
     if ($row["s_name"]=='ปกติ')
		echo "<font color='#00FF33'><b>ปกติ</b></font>";
		else if ($row["พ้นสภาพ"]=='1')
		echo "<font color='#FF0000'><b>พ้นสภาพ</b></font>";
		else($row["user_status"]=="") ; ?>
<?php echo "</td>";
	?>


	<?php
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

	$dis = "";
	  if($rowcount4 != 0)
	  {
			$dis = "disabled";
	  }

echo "<b><a href='teacher_showjoin.php?stu_id=".$row["user_id"]."'>$rowcount4 &nbsp;ครั้ง<b></a>";
echo "<td>";
		 $yer =  date('Y')+543;
		if ($yer - $row["user_year"]<='1')
		echo "1";
		else if ($yer - $row["user_year"]=='2')
		echo "2";
		else if ($yer - $row["user_year"]=='3')
		echo "3";
		else if ($yer - $row["user_year"]>='4')
		echo "4";
		else($yer - $row["user_year"]=="") ; ?>/<?php echo $row['user_room'];
  echo "</td>";
 echo "<td><a href='teacher_showprofiles.php?stu_id=$row[user_id]'>
			  <button type='button' id='sidebarCollapse' class='btn btn-success'>
			<i class='fas fa-user'></i></button></a></td> ";
echo "</tr>";
echo "</div>";

}else if (mysqli_num_rows($result)>1){
echo "<div class='col-lg-12' >";
echo"<table  border='2' align='center' class='form-group table table-striped' width='100px' style='table-layout:fixed'  >";
echo"<tr align='center'>";
echo"<td width='70px' bgcolor='#6495ED'><b>รหัสนักศึกษา</b></td>";
echo"<td width='100px' bgcolor='#6495ED'><b>ชื่อ-นามสกุล</b></td>";
echo"<td width='150px' bgcolor='#6495ED'><b>สาขา</b></td>";
echo"<td width='60px' bgcolor='#6495ED'><b>สถานะ</b></td>";
echo"<td width='70px' bgcolor='#6495ED'><b>การเข้าร่วม</b></td>";
echo"<td width='50px' bgcolor='#6495ED'><b>ชั้นปี</b></td>";
echo"<td width='70px' bgcolor='#6495ED'><b>จัดการข้อมูล</b></td>";
echo"</tr>";
	$con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
	mysqli_set_charset($con,"utf8");
	 $queryz = mysqli_query($con, $SQL) or die("เกิดข้อผิดพลาดในการค้นหา").mysqli_error();;
	 while ($rowz = mysqli_fetch_assoc($queryz)){
echo "<tr  align='center'>";
echo "<td  align ='center'>$rowz[user_id]</td>";
echo "<td  align ='center'>$rowz[user_name]&nbsp;&nbsp;$rowz[user_lastname]</td>";
echo "<td align ='center'>$rowz[major_name]</td>";
echo "<td>";?>
<div class="btn-group btn-group-toggle" data-toggle="buttons">
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

	$dis = "";
	  if($rowcount4 != 0)
	  {
			$dis = "disabled";
	  }
echo "<b><a href='teacher_showjoin.php?stu_id=".$rowz["user_id"]."'>$rowcount4 &nbsp;ครั้ง<b></a>";
echo "</td>";
echo "<td>";
		 $yer =  date('Y')+543;
		if ($yer - $rowz["user_year"]<='1')
		echo "1";
		else if ($yer - $rowz["user_year"]=='2')
		echo "2";
		else if ($yer - $rowz["user_year"]=='3')
		echo "3";
		else if ($yer - $rowz["user_year"]>='4')
		echo "4";
		else($yer - $rowz["user_year"]=="") ; ?>/<?php echo $rowz['user_room'];
  echo "</td>";

  echo "<td><a href='teacher_showprofiles.php?stu_id=$rowz[user_id]'>
			  <button type='button' id='sidebarCollapse' class='btn btn-success'>
			<i class='fas fa-user'></i></button></a></td> ";
echo "</tr>";
echo "</div>";

	 }}
	 else{

	echo "<center>";
	echo "<H1><font color='red'>ไม่พบข้อมูลนักศึกษาที่ต้องการค้นหา</font></H1>";
	echo "</center>";
	exit(0);
	}

	mysqli_close($conn);
 ?>

</body>


</html>

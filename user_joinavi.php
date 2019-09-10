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

             <li  class="active">
                    <a href="user_joinavi.php">
                        <i class="fas fa-briefcase"></i>
                        การเข้าร่วมกิจกรรม
                    </a></li>
			<li>
                    <a href="user_profileshow.php">
                       <i class="fas fa-address-card" ></i>
                        ประวัตินักศึกษา
                    </a></li>

			<!--<li>
					<a href="activities_uimain.php">
                      <i class="fas fa-calendar-alt" ></i>
                        กิจกรรมทั้งหมด
                    </a></li>-->

            <li>
                    <a href="report_ar.php">
                        <i class="fas fa-image"></i>
                       รายงานสรุปรวมกิจกรรม
					 </a></li>

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

                <h4> กิจกรรมที่เข้าร่วม</h4>

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
    mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

    $query0 = "SELECT COUNT(activities_id) AS countactivities FROM tb_joinac   " or die(mysql_error());
	$query4 = "SELECT * FROM  tb_joinac INNER JOIN tb_activities ON tb_joinac.activities_id = tb_activities.activities_id WHERE  tb_joinac.user_id = '".$_SESSION["user_id"]."'";

	$result4 = mysqli_query($conn,$query4);
	$rowcount4=mysqli_num_rows($result4);
	$hour4 = 0;
	while($row4 = mysqli_fetch_array($result4)){
	$hour4 += $row4["activities_hour"];
	}

	echo  "<B>เข้าร่วม ".$rowcount4." ครั้ง   รวม ".$hour4." ชั่วโมง</B>";
  ?>


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

	<div class='col-lg-12' >
	<BR>
<table  border='2' align='center' class='form-group table table-striped' width='100px' style='table-layout:fixed' >
<tr align='center'>
 <h6>
 <th width='100px' bgcolor='#00aae1'>ชื่อกิจกรรม</th>
 <th width='100px' bgcolor='#00aae1'>กลุ่มกิจกรรม</th>
 <th width='100px' bgcolor='#00aae1'>วันที่จัดกิจกรรม</th>
  <th width='100px' bgcolor='#00aae1'>ชั่วโมงกิจกรรม</th>
 <th width='100px' bgcolor='#00aae1'>เวลาที่เข้าร่วมกิจกรรม</th>
 </h6></tr>
 </thead>
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
 <tr align="center">
 <td><?php echo $aaa ["activities_name"]; ?></td>
 <td><?php echo  $rowgenus ["type_name"];?></td>
 <td><?php echo  DateThai( $aaaza ["activities_startdate"]);?></td>
 <td><?php echo   $aaaza ["activities_hour"];?></td>
 <td><?php echo  date('H:i',strtotime($row ["time_joinar"]));?>&nbsp;น.</td>
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
</div>

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
</body>


</html>

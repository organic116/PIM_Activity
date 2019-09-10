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

                    <h4>แก้ไขข้อมูลกิจกรรม</h4>
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
		$sql="select * from tb_activities where activities_id='$ar_id' ";
		echo "<form name='frmeditAR' method='POST' action='user_editadmin.php?ar_id=$ar_id' enctype='multipart/form-data'>";
		$result=mysqli_query($conn,$sql) or die ("ไม่สามารถค้นหาข้อมูลได้").mysql_error();
		if(mysqli_num_rows($result) == 1)
		{
			while($row = mysqli_fetch_array($result)){
			echo"<br>";
			echo "<div class='form-row'>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;<div  class='form-group col-md-3'>";
			echo "<label for='activities_year'>ปีการศึกษา</label>";
			echo "<input type='number' class='form-control'  id='activities_year' name='activities_year' value='$row[activities_year]' readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-3'>";
			echo "<label for='activities_year'>กลุ่ม</label>";
			if ($row["genus_id"]=='1'){
			echo "<input  class='form-control' value='กิจกรรมบังคับ' readonly>";}
			else if ($row["genus_id"]=='2'){
			echo "<input  class='form-control' value='กิจกรรมเลือก' readonly>";}
			else if ($row["genus_id"]=='3'){
			echo "<input  class='form-control' value='กิจกรรมอื่นๆ' readonly>";}
			else if($row["genus_id"]=='0'){
			echo "<input  class='form-control'  id='genus_id' name='genus_id' value='$row[genus_id]' readonly>";
			}
			echo "</div>";

			echo "<div  class='form-group col-md-3'>";
			echo "<label for='activities_year'>ประเภทกิจกรรม</label>";
      if ($row["type_id"]=='10'){
        echo "<input  class='form-control' value='ปฐมนิเทศ' readonly>";}
      else if ($row["type_id"]=='11'){
        echo "<input  class='form-control' value='อบรม' readonly>";}
      else if ($row["type_id"]=='12'){
        echo "<input  class='form-control' value='ทดสอบ' readonly>";}
      else if ($row["type_id"]=='13'){
        echo "<input  class='form-control' value='แข่งขันกีฬา' readonly>";}
      else if ($row["type_id"]=='14'){
        echo "<input  class='form-control' value='ศึกษาดูงาน' readonly>";}
      else if ($row["type_id"]=='15'){
        echo "<input  class='form-control' value='เข้าค่าย' readonly>";}
      else if ($row["type_id"]=='16'){
        echo "<input  class='form-control' value='งานแสดง' readonly>";}
      else if ($row["type_id"]=='17'){
        echo "<input  class='form-control' value='ปัจฉิมนิเทศ' readonly>";}
			else if($row["type_id"]=='0'){
			echo "<input  class='form-control'  id='type_id' name='type_id' value='$row[type_id]' readonly>";
			}
			echo "</div>";
			echo "</div>";

			echo "<div class='form-row'>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;<div  class='form-group col-md-4'>";
			echo "<label for='activities_year'>ชื่อกิจกรรม</label>";
			echo "<input type='hidden' class='form-control'  id='activities_id' name='activities_id' value='$row[activities_id]' readonly>";
			echo "<input type='text' class='form-control'  id='activities_name' name='activities_name' value='$row[activities_name]' >";
			echo "</div>";

			echo "<div  class='form-group col-md-2'>";
			echo "<label for='activities_place'>สถานที่จัดกิจกรรม</label>";
			if ($row["activities_place"]=='Hall') {
					echo "<select class='custom-select' id='activities_place' name='activities_place'>
					<option value='Hall' selected>Hall</option>
					<option value='หอประชุมชั้นล่าง'>หอประชุมชั้นล่าง</option>
					<option value='ลานหูกระจง'>ลานหูกระจง</option>
					<option value='ห้อง auditorium'>ห้อง auditorium</option>
					<option value='หน้าตึก CP ALL Academy'>หน้าตึก CP ALL Academy</option>
					<option value='ลานกิจกรรมชั้น L ตึก CP ALL Academy'>ลานกิจกรรมชั้น L ตึก CP ALL Academy</option>
					<option value='สนามกีฬา'>สนามกีฬา</option>
					<option value='ลานจอดรถหน้าสถาบัน'>ลานจอดรถหน้าสถาบัน</option>
					</select>";

			}
			else if ($row["activities_place"]=='หอประชุมชั้นล่าง'){
					echo "<select class='custom-select' id='activities_place' name='activities_place'>
          <option value='หอประชุมชั้นล่าง'selected>หอประชุมชั้นล่าง</option>
          <option value='Hall'>Hall</option>
          <option value='ลานหูกระจง'>ลานหูกระจง</option>
          <option value='ห้อง auditorium'>ห้อง auditorium</option>
          <option value='หน้าตึก CP ALL Academy'>หน้าตึก CP ALL Academy</option>
          <option value='ลานกิจกรรมชั้น L ตึก CP ALL Academy'>ลานกิจกรรมชั้น L ตึก CP ALL Academy</option>
          <option value='สนามกีฬา'>สนามกีฬา</option>
          <option value='ลานจอดรถหน้าสถาบัน'>ลานจอดรถหน้าสถาบัน</option>
          </select>";
			}
			else if ($row["activities_place"]=='ลานหูกระจง'){
					echo "<select class='custom-select' id='activities_place' name='activities_place'>
          <option value='ลานหูกระจง'selected>ลานหูกระจง</option>
          <option value='Hall'>Hall</option>
          <option value='หอประชุมชั้นล่าง'>หอประชุมชั้นล่าง</option>
          <option value='ห้อง auditorium'>ห้อง auditorium</option>
          <option value='หน้าตึก CP ALL Academy'>หน้าตึก CP ALL Academy</option>
          <option value='ลานกิจกรรมชั้น L ตึก CP ALL Academy'>ลานกิจกรรมชั้น L ตึก CP ALL Academy</option>
          <option value='สนามกีฬา'>สนามกีฬา</option>
          <option value='ลานจอดรถหน้าสถาบัน'>ลานจอดรถหน้าสถาบัน</option>
          </select>";
			}
			else if ($row["activities_place"]=='ห้อง auditorium'){
					echo "<select class='custom-select' id='activities_place' name='activities_place'>
          <option value='ห้อง auditorium'selected>ห้อง auditorium</option>
          <option value='Hall'>Hall</option>
					<option value='หอประชุมชั้นล่าง'>หอประชุมชั้นล่าง</option>
					<option value='ลานหูกระจง'>ลานหูกระจง</option>
					<option value='หน้าตึก CP ALL Academy'>หน้าตึก CP ALL Academy</option>
					<option value='ลานกิจกรรมชั้น L ตึก CP ALL Academy'>ลานกิจกรรมชั้น L ตึก CP ALL Academy</option>
					<option value='สนามกีฬา'>สนามกีฬา</option>
					<option value='ลานจอดรถหน้าสถาบัน'>ลานจอดรถหน้าสถาบัน</option>
					</select>";
			}
			else if ($row["activities_place"]=='หน้าตึก CP ALL Academy'){
					echo "<select class='custom-select' id='activities_place' name='activities_place'>
          <option value='หน้าตึก CP ALL Academy'selected>หน้าตึก CP ALL Academy</option>
          <option value='Hall'>Hall</option>
          <option value='หอประชุมชั้นล่าง'>หอประชุมชั้นล่าง</option>
          <option value='ลานหูกระจง'>ลานหูกระจง</option>
          <option value='ห้อง auditorium'>ห้อง auditorium</option>
          <option value='ลานกิจกรรมชั้น L ตึก CP ALL Academy'>ลานกิจกรรมชั้น L ตึก CP ALL Academy</option>
          <option value='สนามกีฬา'>สนามกีฬา</option>
          <option value='ลานจอดรถหน้าสถาบัน'>ลานจอดรถหน้าสถาบัน</option>
          </select>";
			}
			else if ($row["activities_place"]=='ลานกิจกรรมชั้น L ตึก CP ALL Academy'){
					echo "<select class='custom-select' id='activities_place' name='activities_place'>
          <option value='ลานกิจกรรมชั้น L ตึก CP ALL Academy'selected>ลานกิจกรรมชั้น L ตึก CP ALL Academy</option>
          <option value='Hall'>Hall</option>
					<option value='หอประชุมชั้นล่าง'>หอประชุมชั้นล่าง</option>
					<option value='ลานหูกระจง'>ลานหูกระจง</option>
					<option value='ห้อง auditorium'>ห้อง auditorium</option>
					<option value='หน้าตึก CP ALL Academy'>หน้าตึก CP ALL Academy</option>
					<option value='สนามกีฬา'>สนามกีฬา</option>
					<option value='ลานจอดรถหน้าสถาบัน'>ลานจอดรถหน้าสถาบัน</option>
					</select>";
			}
			else if ($row["activities_place"]=='สนามกีฬา'){
					echo "<select class='custom-select' id='activities_place' name='activities_place'>
          <option value='สนามกีฬา'selected>สนามกีฬา</option>
          <option value='Hall'>Hall</option>
					<option value='หอประชุมชั้นล่าง'>หอประชุมชั้นล่าง</option>
					<option value='ลานหูกระจง'>ลานหูกระจง</option>
					<option value='ห้อง auditorium'>ห้อง auditorium</option>
					<option value='หน้าตึก CP ALL Academy'>หน้าตึก CP ALL Academy</option>
					<option value='ลานกิจกรรมชั้น L ตึก CP ALL Academy'>ลานกิจกรรมชั้น L ตึก CP ALL Academy</option>
					<option value='ลานจอดรถหน้าสถาบัน'>ลานจอดรถหน้าสถาบัน</option>
					</select>";
			}
      else if ($row["activities_place"]=='ลานจอดรถหน้าสถาบัน'){
          echo "<select class='custom-select' id='activities_place' name='activities_place'>
          <option value='ลานจอดรถหน้าสถาบัน'selected>ลานจอดรถหน้าสถาบัน</option>
          <option value='Hall'>Hall</option>
          <option value='หอประชุมชั้นล่าง'>หอประชุมชั้นล่าง</option>
          <option value='ลานหูกระจง'>ลานหูกระจง</option>
          <option value='ห้อง auditorium'>ห้อง auditorium</option>
          <option value='หน้าตึก CP ALL Academy'>หน้าตึก CP ALL Academy</option>
          <option value='ลานกิจกรรมชั้น L ตึก CP ALL Academy'>ลานกิจกรรมชั้น L ตึก CP ALL Academy</option>
          <option value='สนามกีฬา'>สนามกีฬา</option>
          </select>";
      }

			else if($row["activities_place"]=='0'){
			}

			echo "</div>";

			echo "</div>";

			echo "<div class='form-row'>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;<div  class='form-group col-md-2'>";
			echo "<label for='activities_year'>วันเพิ่มกิจกรรม</label>";
			echo "<input type='text' class='form-control'  id='activities_addstart' name='activities_addstart'
			value='".DateThai($row["activities_startdate"])."' readonly >";
			echo "</div>";
				echo "<div  class='form-group col-md-2'>";
			echo "<label for='activities_valueuser'>จำนวนนักศึกษา</label>";
			echo "<input type='text' class='form-control'  id='activities_valueuser' name='activities_valueuser' value='$row[activities_valueuser]'>";
			echo "</div>";

			echo "<div  class='form-group col-md-2'>";
			echo "<label for='activities_hour'>ชั่วโมงกิจกรรม</label>";
			echo "<input type='text' class='form-control'  id='activities_hour' name='activities_hour' value='$row[activities_hour]' >";
			echo "</div>";
			echo "</div>";

			echo "<div class='form-row'>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;<div class='form-group col-md-8'>";
			echo "<label for='activities_detail'>รายละเอียดกิจกรรม</label>";
			echo  "<textarea rows='4' cols='150' class='form-control' id='activities_detail' name='activities_detail'>$row[activities_detail]</textarea>";
			echo  "</div>";
			echo "</div>";

			echo "<div class='form-row'>";

			echo "&nbsp;&nbsp;&nbsp;&nbsp;<div  class='form-group col-md-2'>";
			echo "<label for='activities_startdate'>วันเดือนปีที่เริ่มกิจกรรม</label>";
			echo "<input type='date' class='form-control'  id='activities_startdate'  name='activities_startdate' value='".$row["activities_startdate"]."' >";
			echo "</div>";

			echo "<div  class='form-group col-md-2'>";
			echo "<label for='activities_enddate'>วันเดือนปีที่สิ้นสุดกิจกรรม</label>";
			echo "<input type='date' class='form-control'  id='activities_enddate' name='activities_enddate' value='".$row["activities_enddate"]."' >";
			echo "</div>";

			echo "<div  class='form-group col-md-1'>";
			echo "<label for='activities_starttime'>เวลาที่เริ่ม</label>";
			echo "<input type='time' class='form-control'  id='activities_starttime' name='activities_starttime' value='$row[activities_starttime]' >";
			echo "</div>";

			echo "<div  class='form-group col-md-1'>";
			echo "<label for='activities_endtime'>เวลาที่สิ้นสุด</label>";
			echo "<input type='time' class='form-control'  id='activities_endtime' name='activities_endtime' value='$row[activities_endtime]' >";
			echo "</div>";

			echo "<div  class='form-group col-md-3'>";
			echo "<label for='activities_admin'>ผู้ดูแลกิจกรรม</label>";
			if ($row["activities_admin"]=='อดิศร แขกซอง') {
					echo "<select class='custom-select' id='activities_admin' name='activities_admin'>
					<option value= 'อดิศร แขกซอง' selected>อดิศร แขกซอง</option>
					<option value='พรศักดิ์ ปรีเลขา'>พรศักดิ์ ปรีเลขา</option>
					</select>";
			}
			else if ($row["activities_admin"]=='พรศักดิ์ ปรีเลขา'){
					echo "<select class='custom-select' id='activities_admin' name='activities_admin'>
					<option value='พรศักดิ์ ปรีเลขา' selected>พรศักดิ์ ปรีเลขา</option>
					<option value='อดิศร แขกซอง'>อดิศร แขกซอง</option>
					</select>";
			}
			else if($row["activities_admin"]=='0'){
			}

			echo "</div>";
			echo "</div>";

			echo "<div>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;<button type='submit' class='btn btn-primary' name='submit' id='submit'>แก้ไขข้อมูลกิจกรรม</button>";
			echo "</div>";
			echo "</form>&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "</td></tr></table>";
			}
		}
		else{
			echo "ไม่พบข้อมูลกิจรรมที่ต้องการแก้ไข";

		}
		mysqli_close($conn);
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

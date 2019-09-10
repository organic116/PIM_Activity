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
						<li >
							<a href="admin_uishowar.php">
								&nbsp;<i class="fas fa-calendar-alt" ></i>
									กิจกรรมปัจจุบัน
							</a>
						</li>
						<li class="active">
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

                    <h4>กิจกรรมที่ผ่านมาแล้ว</h4>
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
						if(document.frmfind.name_ar.value == "" && document.frmfind.name_selar.value == "" && document.frmfind.name_month.value == "")
							{
							swal("เกิดข้อผิดพลาด!", "กรุณากรอกข้อมูล", "error");
							return false;
							}
						document.frmfind.submit();
						}
						</script>
<table width="100%" cellpadding="4" cellspacing="0" ><tr id="rcorners2"><td>
	<form class="form-inline" name="frmfind" method="get"  onSubmit="JavaScript:return fncSubmit();" action="ar_searchlast.php">
	&nbsp;&nbsp;&nbsp;&nbsp;ชื่อกิจกรรม&nbsp;
		<input class="form-control mr-sm-2" type="text" name="name_ar" placeholder="กรุณากรอกชื่อกิจกรรม" aria-label="Search"  />
<div class="form-group col-md-2.5">
     <div class="input-group-prepend">

     <label for="name_selar">กลุ่มกิจกรรม &nbsp;</label>
  </div>
  <select class="custom-select" name="name_selar">
    <option value="" selected>กรุณาเลือก</option>
    <option value="1">กิจกรรมบังคับ </option>
	<option value="2">กิจกรรมเลือก </option>
	<option value="3">กิจกรรมอื่นๆ </option>
  </select>
 </div>
 <div class="form-group col-md-2.5">
     <div class="input-group-prepend">
     <label for="name_month">&nbsp;เดือนที่จัดกิจกรรม &nbsp;</label>
  </div>
  <select class="custom-select" name="name_month">
    <option value="" selected>กรุณาเลือก</option>
    <option value="-01-">มกราคม </option>
	<option value="-02-">กุมภาพันธ์ </option>
	<option value="-03-">มีนาคม </option>
	 <option value="-04-">เมษายน </option>
	<option value="-05-">พฤษภาคม </option>
	<option value="-06-">มิถุนายน </option>
	 <option value="-07-">กรกฎาคม </option>
	<option value="-08-">สิงหาคม </option>
	<option value="-09-">กันยายน </option>
	 <option value="-10-">ตุลาคม </option>
	<option value="-11-">พฤศจิกายน </option>
	<option value="-12-">ธันวาคม </option>
  </select>
 </div>


		<br></br> &nbsp;&nbsp;&nbsp;&nbsp;<button id='sidebarCollapse' class='btn btn-info' type="submit" name="find_Emp">
			 <i class='fas fa-search'></i></button>
</form>
<!--<form class="form-inline" name="frmfind" method="get"  onSubmit="JavaScript:return fncSubmit();" action="ar_search.php">
	สรุปโครงการประจำปี &nbsp;

		<input class="form-control mr-sm-2" type="year" name="year_print" placeholder="กรุณากรอกชื่อกิจกรรม" aria-label="Search"  />
		<br></br>&nbsp;<input class="btn btn-outline-success my-2 my-sm-0"   type="submit" name="find_Emp" value="ค้นหา">
</form>-->
<?php
 $con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
 mysqli_query($con, "SET NAMES UTF8");
 $fitdate = date("Y-m-d");
 $perpage = 20;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 $start = ($page - 1) * $perpage;
 $sql = "select * from tb_activities WHERE activities_startdate < '".$fitdate."'   AND activities_startdate ORDER BY activities_addstart  DESC limit {$start} , {$perpage} ";
 $query = mysqli_query($con,$sql);
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
   $conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
    mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
    //2. query ข้อมูลจากตาราง :
    $query0 = "SELECT COUNT(activities_id) AS countactivities FROM tb_activities WHERE activities_startdate <  '".$fitdate."'   AND activities_startdate ORDER BY activities_addstart  " or die(mysql_error());
    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
	$result0 = mysqli_query($conn,$query0);
	$row = mysqli_fetch_array($result0,MYSQLI_ASSOC);
	$count = $row["countactivities"];
	echo "<div  align='right' >";
	echo  "<B>จำนวนกิจกรรม ".$count." กิจกรรม&nbsp;&nbsp;&nbsp;&nbsp;</B>";
	echo "</div>";
 ?>
<?php

    $conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
    mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

    $query1 = "SELECT * FROM tb_activitiesc" or die(mysql_error());
    $result = mysqli_query($conn,$query1);

    echo"<div class='col-lg-12'>";
    echo "<table  border='2' align='center' class='form-group table table-striped' width='100px' style='table-layout:fixed' >";
    echo "<tr align='center'>


	<td width='100px' bgcolor='#00aae1' align ='center'><B>ชื่อกิจกรรม</B></td>
    <td width='100px' bgcolor='#00aae1' align ='center'><B>วันจัดกิจกรรม</B></td>
    <td width='100px' bgcolor='#00aae1' align ='center'><B>เวลาจัด-สิ้นสุดกิจกรรม</B></td>

    <td width='30px' bgcolor='#00aae1' align ='center'><B>ชั่วโมง</B></td>
    <td width='80px' bgcolor='#00aae1' align ='center'><B>จำนวนผู้เข้าร่วม</B></td>
    <td width='100px' bgcolor='#00aae1' align ='center'><B>จัดการข้อมูล</B></td>";
	while($row = mysqli_fetch_array($query)){

	$query0 = "SELECT COUNT(activities_id) AS countjoin FROM tb_joinac WHERE activities_id = '".$row["activities_id"]."'" or die(mysql_error());
    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
	$result0 = mysqli_query($conn,$query0);
	$row1 = mysqli_fetch_array($result0,MYSQLI_ASSOC);
	$count = $row1["countjoin"];
	$dis = "";
	  if($count != 0)
	  {
			$dis = "disabled";
	  }

	echo "<tr align='center'>";


      echo "<td   >" .'<center>'.$row["activities_name"] .  "</td> ";

      echo "<td >".DateThai ($row["activities_startdate"])."</td> ";
      echo "<td>".date('H:i',strtotime($row["activities_starttime"]))."&nbsp;น. - ".date('H:i',strtotime($row["activities_endtime"]))."&nbsp;น.</td> ";

      echo "<td>" .'<center>'.$row["activities_hour"] .  "</td> ";
      echo "<td>" .'<center>'.$count.'/'.$row["activities_valueuser"] .  "&nbsp;คน</td> ";

     echo "<td>
			<a href='join_arlast.php?ar_id=".$row["activities_id"]."'>
			  <button type='button' id='sidebarCollapse' class='btn btn-success'>
			 <i class='fas fa-info-circle'></i></button></a></td>";
      echo "</tr>";
    }
        echo "</table>";
        echo"</div>";
        ?><?php
 $sql2 = "select * from tb_activities ";
 $query2 = mysqli_query($con, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>

<nav aria-label="Page navigation example">
 <div class="clearfix">
                    <div class="hint-text">&nbsp;&nbsp;&nbsp;&nbsp;แสดง <b><?php echo  $perpage; ?></b> จาก <b><?php echo $total_page; ?></b> รายการ</div>
                  <ul class="pagination">
</div>
  <ul class="pagination">
 &nbsp;&nbsp;&nbsp;&nbsp;<li class="page-item">
      <a class="page-link" href="admin_uishowarlast.php?page=1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
	<?php for($i=1;$i<=$total_page;$i++){ ?>
    <li class="page-item"><a class="page-link" href="admin_uishowarlast.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php } ?>
    <li class="page-item">
      <a class="page-link" href="admin_uishowarlast.php?page=<?php echo $total_page;?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>&nbsp;&nbsp;&nbsp;&nbsp;
  </ul>
</nav>
    </div>
	</h6>
    </div>
    </div>
	</td></tr></table>
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

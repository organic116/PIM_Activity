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
			<li>
                    <a href="user_profileshow.php">
                       <i class="fas fa-address-card" ></i>
                        ประวัตินักศึกษา
                    </a></li>

			<!--<li  class="active">
					<a href="activities_uimain.php">
                       <i class="fas fa-calendar-alt" ></i>
                        กิจกรรมทั้งหมด
                    </a></li>-->

             <li>
                    <a href="user_joinavi.php">
                        <i class="fas fa-briefcase"></i>
                        การเข้าร่วมกิจกรรม
                    </a></li>
            <!-- <li>
                    <a href="report_ar.php">
                        <i class="fas fa-image"></i>
                       รายงานสรุปรวมกิจกรรม
					 </a></li>-->

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

                <h4>กิจกรรม</h4>

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
<script language="javascript">
					function fncSubmit()
						{
						if(document.frmfind.name_selar.value == "")
							{
							swal("เกิดข้อผิดพลาด!", "กรุณากรอกข้อมูล", "error");
							return false;
							}
						document.frmfind.submit();
						}
						</script>
	<form class="form-inline" name="frmfind" method="get"  onSubmit="JavaScript:return fncSubmit();" action="user_searchar.php">
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

		<br></br>&nbsp;<input class="btn btn-outline-success my-2 my-sm-0"   type="submit" name="find_Emp" value="ค้นหา">
</form>
<!-- <form class="form-inline" name="frmfind" method="POST" action="user_search.php">
			<input class="form-control mr-sm-2" type="text" name="emp_Rec" placeholder="กรุณากรอกรหัสกิจกรรม" aria-label="Search" required >
			<input class="btn btn-outline-success my-2 my-sm-0"   type="submit" name="find_Emp" value="ค้นหา">
			</form>-->
<h6>
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
 $con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
 mysqli_query($con, "SET NAMES UTF8");
 $perpage = 20;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 $start = ($page - 1) * $perpage;
 $sql = "select * from tb_activities  ORDER BY genus_id DESC,activities_addstart DESC  limit {$start} , {$perpage} ";
 $query = mysqli_query($con,$sql);
 ?>
<?php

    //1. เชื่อมต่อ database:
    $conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
    mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

    //2. query ข้อมูลจากตาราง :
    $query1 = "SELECT * FROM tb_activities ORDER BY activities_id ASC" or die(mysql_error());
    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
    $result = mysqli_query($conn,$query1);

    //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
	echo "<div style='overflow-x:auto;' class='col-lg-13' >";
	echo "<table  border='3' align='center' class='form-group table table-bordered'>";
   echo "<td width='100px'  bgcolor='#F0F8FF'><B><center>กลุ่มกิจกรรม</B></td>
   <td width='100px'  bgcolor='#F0F8FF'><B><center>ชื่อกิจกรรม</B></td>
   <td  width='100px' bgcolor='#F0F8FF'><B><center>วันเริ่มกิจกรรม</B></td>
   <td  width='100px' bgcolor='#F0F8FF'><B><center>เวลาเริ่มกิจกรรม</B></td>
   <td  width='100px' bgcolor='#F0F8FF'><B><center>รายละเอียด</B></td></tr> ";

        while($row = mysqli_fetch_array($query)){
     echo "<tr>";
      //echo "<td width='10' >" .'<center>'.$row["activities_id"] .  "</td> ";
      echo "<td bgcolor='#FFFAFA'>" .'<center>';
     if ($row["genus_id"]=='1')
       echo "กิจกรรมบังคับ";
       else if ($row["genus_id"]=='2')
       echo "กิจกรรมเลือก";
       else if ($row["genus_id"]=='3')
       echo "กิจกรรมอื่นๆ";
      ($row["genus_id"]=='0')
      .  "</td> ";

	  echo "<td bgcolor='#FFFAFA' >" .'<center>'.$row["activities_name"].  "</td> ";
     echo "<td bgcolor='#FFFAFA' >" .'<center>'.DateThai ($row["activities_startdate"]).  "</td> ";
       echo "<td bgcolor='#FFFAFA'>" .'<center>'.date('H:i',strtotime($row["activities_starttime"]))."&nbsp;น.<br></td> ";
     echo "<td bgcolor='#FFFAFA'><div><center><a href='detail_ar.php?ar_id=".$row["activities_id"]."'><img src='img/icon-a.png' width= '50' height= '50'></a></div></td>";
     echo "</tr>";
    }
        echo "</table>";
        echo"</div>";

        ?>
		<?php
 $sql2 = "select * from tb_activities ";
 $query2 = mysqli_query($con, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
 <?php
   $conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
    mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
    //2. query ข้อมูลจากตาราง :
    $query0 = "SELECT COUNT(activities_id) AS countactivities FROM tb_activities  " or die(mysql_error());
    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
	$result0 = mysqli_query($conn,$query0);
	$row = mysqli_fetch_array($result0,MYSQLI_ASSOC);
	$count = $row["countactivities"];
	echo "<div  align='right' >";
	echo  "<B>จำนวนกิจกรรมทั้ง ".$count." กิจกรรม</B>";
	echo "</div>";

  ?>
 <nav>
 <div class="clearfix">
                    <div class="hint-text">แสดง <b><?php echo  $perpage; ?></b> จาก <b><?php echo $total_page; ?></b> รายการ</div>
                  <ul class="pagination">
 <li>
 <a href="activities_uimain.php?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li  class="page-item"><a href="activities_uimain.php?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
 <?php } ?>
 <li >
 <a href="activities_uimain.php?page=<?php echo $total_page;?>" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
                </div>

 </nav>
    </div><!--/row-->
	</h6>
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

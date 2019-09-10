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
 $con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
 mysqli_query($con, "SET NAMES UTF8");
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
   $queryo=mysqli_query($con,$sqlo);
   while($rowo=mysqli_fetch_array($queryo)){
?>
  <option value="<?php echo $rowo['major_id']?>"><?php echo $rowo['major_name']?>&nbsp;<?php echo $rowo['course_name']?></option>
<?php } ?>
</select>

</div>
  &nbsp;&nbsp;&nbsp;&nbsp;<button id='sidebarCollapse' class='btn btn-info' type="submit" name="find_Emp">
			 <i class='fas fa-search'></i></button>
</form>
<script language="javascript">
					function fncSubmit1()
						{
						if(document.qrcode_S.re_major.value == "" && document.qrcode_S.user_year.value == "")
							{
							swal("เกิดข้อผิดพลาด!", "กรุณากรอกข้อมูล", "error");
							return false;
							}
						document.qrcode_S.submit();
						}
						</script>

<br>

<form class="form-inline" name="qrcode_S"  onSubmit="JavaScript:return fncSubmit1();" method="GET" action="showqrcode.php">
<div class="form-group col-md-2.5">
     <div class="input-group-prepend">
     <label for="re_major">&nbsp;&nbsp;พิมพ์ QR-CODE ตามสาขาวิชา &nbsp;</label>
  </div>
<?php
 $con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
 mysqli_query($con, "SET NAMES UTF8");
?>
<select class="custom-select" name="re_major" style="width:500px;">
<option value="" >--กรุณาเลือกสาขา--</option>
<?php
$sqloption="SELECT
tb_major.major_id,
tb_major.major_name,
tb_course.course_name
FROM
tb_major
INNER JOIN tb_course ON tb_major.course_id = tb_course.course_id";
   $queryoption=mysqli_query($con,$sqloption);
   while($rowoption=mysqli_fetch_array($queryoption)){
?>
  <option value="<?php echo $rowoption['major_id']?>"><?php echo $rowoption['major_name']?>&nbsp;<?php echo $rowoption['course_name']?></option>
<?php } ?>
</select>
</div>
 &nbsp;ปีการศึกษา&nbsp;
		<input class="form-control mr-sm-2"  type="text" name="user_year" placeholder="ปีการศึกษา" aria-label="Search"  style="width:150px;" />
&nbsp;&nbsp;&nbsp;&nbsp;<button id='sidebarCollapse' class='btn btn-info' type="submit" name="find_Emp">
			 <i class="fas fa-print"></i></button>
</form>
<br>

&nbsp;&nbsp;พิมพ์  QR-CODE นักศึกษาทั้งหมด&nbsp;<button id='sidebarCollapse' class='btn btn-info' type="submit"><a href="qrcodeall.php" >
			 <i class="fas fa-print"></i></a></button>
<!--<a href="admin_adduser.php" ><img src="img/add-icon.png" width= "40" height= "40" align="right"></a>-->


<!--<?php
 $con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
 mysqli_query($con, "SET NAMES UTF8");

 $sqlc = "SELECT
tb_user.major_id,
tb_major.major_id,
tb_major.major_name
FROM
tb_major
INNER JOIN tb_user ON tb_user.major_id = tb_major.major_id AND tb_major.major_name = tb_user.major_id WHERE tb_user.major_id = tb_major.major_id";
 $queryc = mysqli_query($con,$sqlc);
 ?>-->
<?php
 $con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
 mysqli_query($con, "SET NAMES UTF8");
 $perpage = 50;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 $start = ($page - 1) * $perpage;
 $sql = "SELECT
tb_user.major_id,
tb_major.major_id,
tb_major.major_name,
tb_user.user_id,
tb_user.user_name,
tb_user.user_lastname,
tb_major.course_id,
tb_course.course_id,
tb_course.course_name,
tb_user.user_room,
tb_user.user_year,
tb_user.user_status,
tb_status.s_name,
tb_user.user_statusqrcode
FROM
tb_user
INNER JOIN tb_major ON tb_user.major_id = tb_major.major_id
INNER JOIN tb_course ON tb_major.course_id = tb_course.course_id
INNER JOIN tb_status ON tb_user.user_status = tb_status.s_id
 limit {$start} , {$perpage} ";
 $query = mysqli_query($con,$sql);
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
	echo "<div  align='right' >";
	echo  "<B>จำนวนนักศึกษาทั้งหมด ".$count." คน</B>";
	echo "</div>";

  ?>
 </br>
 <div class='col-lg-12' style=" border-radius: 1em;" >
 <table  border='2' align='center' class='form-group table table-striped' width='100px' style='table-layout:fixed' >
 <tr align='center'>
 <h6><th width='70px' bgcolor='#6495ED'>รหัสนักศึกษา</th>
 <th width='100px' bgcolor='#6495ED'>ชื่อ-นามสกุล</th>
 <th width='150px' bgcolor='#6495ED'>สาขา</th>
 <th width='60px' bgcolor='#6495ED'>สถานะ</th>
 <th width='80px' bgcolor='#6495ED'>การเข้าร่วม</th>
 <th width='100px' bgcolor='#6495ED'>จัดการข้อมูล</th>
 </h6></tr>
 </thead>
 <tbody>
 <?php
 //while ($row = mysqli_fetch_assoc($query))
 while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
 {

 ?>
 <tr align="center" bgcolor='#FFFFF0'>
 <td  ><?php echo $row['user_id']; ?></td>
 <td  ><?php echo $row['user_name']; ?>&nbsp;<?php echo $row['user_lastname']; ?></td>


	<td  width='20px'><?php echo $row['major_name']; ?></td>
		<td width='100px' ><?php
		 if ($row["s_name"]=='ปกติ')
		echo "<font color='#00FF33'><b>ปกติ</b></font>";
		else if ($row["s_name"]=='พ้นสภาพ')
		echo "<font color='#FF0000'><b>พ้นสภาพ</b></font>";
		else($row["s_name"]=="") ; ?></td>
		<?php
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

  ?>
<td  width='100px'><b><?php echo "<a href='admin_showjoinuser.php?stu_id=".$row["user_id"]."'>$rowcount4 &nbsp;ครั้ง<b></a>"; ?></td>
<!--<td><?php echo "<a href='admin_showprofiles.php?stu_id=".$row["user_id"]."' ><img src='img/seeuser.png' width= '30' height= '30' align='center' ></a>
	<a href='user_showedit.php?stu_id=".$row["user_id"]."'><img src='img/edit_user.png' width= '30' height= '30' align='center'></a>
	<a href='tese_qrcode.php?stu_id=".$row["user_id"]."'><img src='img/QR_code.png' width= '30' height= '30' align='center'  ></a>";
	?>
	<form method = "get" action = "admin_deluser.php">
	<input type = "hidden" name = "stu_id" value = "<?php echo $row["user_id"] ?>" >
	<button  class="btn btn-danger"  type = "submit" onclick="return confirm('คุณต้องการบันทึกนักศึกษาใช่หรือไม่ ?')" <?php echo $dis; ?>>
	<i class="icon-trash icon-large"></i>ลบ
	</button>-->
	 <td>
			<a href='admin_showprofiles.php?stu_id=<?php echo $row["user_id"];?>'>
			  <button type='button' id='sidebarCollapse' class='btn btn-success'>
			<i class="fas fa-user"></i></button></a>

			 <a href='user_showedit.php?stu_id=<?php echo $row["user_id"];?>'>
			   <button type='button' id='sidebarCollapse' class='btn btn-info'>
			<i class="fas fa-user-edit"></i></button></a>

			 <a href='admin_deluser.php?stu_id=<?php echo $row["user_id"];?>'>

			 <button type="submit" class="btn btn-danger"  name="submit" id="submit" onclick="return confirm('คุณต้องการลบนักศึกษาใช่หรือไม่ ?')"
			 <?php echo $dis; ?>><i class="fas fa-user-minus disabled"  ></i>
			</button></a>

			<a href='tese_qrcode.php?stu_id=<?php echo $row["user_id"];?>'>
			<button type='button' id='sidebarCollapse' class='btn btn-info'>
			<i class='fas fa-qrcode'></i></i></button></a>
	</td>
      </tr>
	</form>
	</td>
 </tr>
 <?php  } ?>
 </tbody>
 </table>
 <?php
 $sql2 = "select * from tb_user ";
 $query2 = mysqli_query($con, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>

<nav aria-label="Page navigation example">
 <div class="clearfix">
                    <div class="hint-text">แสดง <b><?php echo  $perpage; ?></b> จาก <b><?php echo $total_page; ?></b> รายการ</div>
                  <ul class="pagination">
</div>
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="admin_showuser.php?page=1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
	<?php for($i=1;$i<=$total_page;$i++){ ?>
    <li class="page-item"><a class="page-link" href="admin_showuser.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php } ?>
    <li class="page-item">
      <a class="page-link" href="admin_showuser.php?page=<?php echo $total_page;?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
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

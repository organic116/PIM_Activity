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
                    <a href="user_joinavi.php">
                        <i class="fas fa-briefcase"></i>
                        การเข้าร่วมกิจกรรม
                    </a></li>
			<li class="active">
                    <a href="user_profileshow.php">
                       <i class="fas fa-address-card" ></i>
                        ประวัตินักศึกษา
                    </a></li>
					<li >
                    <a href="report_ar.php">
                        <i class="fas fa-image"></i>
                       รายงานสรุปรวมกิจกรรม
					 </a></li>

		<!--	<li>
					<a href="activities_uimain.php">
                       <i class="fas fa-calendar-alt" ></i>
                        กิจกรรมทั้งหมด
                    </a></li>-->


            <!-- <li>
                    <a href="report_ar.php">
                        <i class="fas fa-image"></i>
                       รายงานสรุปรวมกิจกรรม
					 </a></li>-->

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

                <h4> ข้อมูลนักศึกษา</h4>

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
		mysqli_query($conn, "SET NAMES UTF8");
		//$sql=" select * from tb_user where user_id='".$_SESSION['user_id']."' ";
		$sql="SELECT
tb_user.user_id,
tb_user.user_prefix,
tb_user.user_name,
tb_user.user_lastname,
tb_user.major_id,
tb_user.faculty_id,
tb_user.user_room,
tb_user.user_year,
tb_user.user_status,
tb_major.major_name,
tb_major.course_id,
tb_faculty.faculty_id,
tb_faculty.faculty_name,
tb_course.course_name,
tb_user.user_statusqrcode,
tb_user.user_imgqrcode,
tb_user.user_status,
tb_status.s_name,
tb_user.image,
tb_user.user_date,
tb_user.user_address,
tb_user.user_tel,
tb_user.user_email,
tb_user.user_club
FROM
tb_user
INNER JOIN tb_major ON tb_user.major_id = tb_major.major_id
INNER JOIN tb_faculty ON tb_user.faculty_id = tb_faculty.faculty_id
INNER JOIN tb_course ON tb_major.course_id = tb_course.course_id
INNER JOIN tb_status ON tb_user.user_status = tb_status.s_id
 where user_id='".$_SESSION['user_id']."' ";
		$result=mysqli_query($conn,$sql) or die ("ไม่สามารถค้นหาข้อมูลได้").mysql_error();
		$row=mysqli_fetch_assoc($result);

 echo "<center><a href='user_editprofiles.php?stu_id=". $_SESSION["user_id"]."'>
 <button class='btn btn-primary' style='float:right;' >แก้ไขข้อมูล</button></a>"; ?>
 <!--<?php echo "<center><a href='testqrcode.php?stu_id=". $_SESSION["user_id"]."'>
 <button class='btn btn-primary' style='float:right;' >ปริน QRCODE</button></a>"; ?>-->

</br></br><div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">รูปนักศึกษา</label>
      <div class="text-center">
		<!--<img src="myfile/<?php echo  $row['image']; ?> "  width="200"  height="200">-->
		<?php
		echo "<br>";
			if($row["image"] == "http://ssl.gstatic.com/accounts/ui/avatar_2x.png"){
			echo "<img src= '$row[image]' name=\"image\" width='200'  height='200' / >";
			} else {
			echo "<img src= 'myfile/$row[image]' name=\"image\" width='200'  height='200' / >";
			}

		?>
	</div>

     </br></br></br> <label for="inputEmail4">QR CODE</label>
      <div class="text-center">
		<img src="<?php echo   $row["user_imgqrcode"]; ?>"   alt="Voucher 1" >
	 </div>
</div>

    <div class="form-group col-md-8">
    <table class="table table-bordered" align="left" style="width:80% !important;" border="0" >

    <tr><th bgcolor='#A4C8F0' width="200"><h6 align="right"  >รหัสนักศึกษา : </th>
    <th align="center" ><?php echo  $row["user_id"];?></h6></th></tr>

    <tr><th bgcolor='#A4C8F0' width="200"><h6 align="right">ชื่อ : </th>
    <td scope="row"><?php echo  $row["user_name"];?></h6></td></tr>

    <tr><th bgcolor='#A4C8F0' width="200"><h6 align="right">นามสกุล : </th>
    <td scope="row"><?php echo  $row["user_lastname"];?></h6></td></tr>

    <tr><th bgcolor='#A4C8F0' width="200"><h6 align="right">คณะ : </th>
    <td scope="row"><?php  echo $row["faculty_name"];?></h6></td></tr>

    <tr><th bgcolor='#A4C8F0' width="200"><h6 align="right">สาขาวิชา : </th>
    <td scope="row"><?php echo $row["major_name"];?></h6></td></tr>

    <tr><th bgcolor='#A4C8F0' width="200"><h6 align="right">หลักสูตร : </th>
    <td scope="row"><?php echo $row["course_name"];?></h6></td></tr>

    <tr><th bgcolor='#A4C8F0' width="200"><h6 align="right">ห้อง : </th>
    <td scope="row"><?php echo $row["user_room"];?></h6></td></tr>

    <tr><th bgcolor='#A4C8F0' width="200"><h6 align="right">ปีที่เข้าศึกษา : </th>
    <td scope="row"><?php echo $row["user_year"];?></h6></td></tr>
    <?php function DateThai($strDate)
{
	$strYear = date("Y",strtotime($strDate))+543;
	$strMonth= date("n",strtotime($strDate));
	$strDay= date("j",strtotime($strDate));
	$strMonthCut = Array("","มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน","พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม","กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
	$strMonthThai=$strMonthCut[$strMonth];
	return "$strDay $strMonthThai $strYear";

}
?>
<tr><th bgcolor='#A4C8F0' width="200"><h6 align="right">วันเดือนปีเกิด : </th>
<td scope="row"><?php echo DateThai( $row["user_date"]);?></h6></td></tr>

<tr><th bgcolor='#A4C8F0' width="200"><h6 align="right">ที่อยู่ : </th>
<td scope="row"><?php echo $row["user_address"];?></h6></td></tr>

<tr><th bgcolor='#A4C8F0' width="200"><h6 align="right">เบอร์โทรศัพท์ : </th>
<td scope="row"><?php echo $row["user_tel"];?></h6></td></tr>

<tr><th bgcolor='#A4C8F0' width="200"><h6 align="right">E-MAIL : </th>
<td scope="row"><?php echo $row["user_email"];?></h6></td></tr>

<tr><th bgcolor='#A4C8F0' width="200"><h6 align="right">ชมรม : </th>
<td scope="row"><?php echo $row["user_club"];?></h6></td></tr>
</div></div>


  </div>


</table>
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

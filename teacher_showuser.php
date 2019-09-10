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
						if(document.frmfind.re_userid.value == "" && document.frmfind.re_username.value == "" && document.frmfind.re_lastname.value == "" && document.frmfind.re_yearu.value == "")
							{
							swal("เกิดข้อผิดพลาด!", "กรุณากรอกข้อมูล", "error");
							return false;
							}
						document.frmfind.submit();
						}
						</script>
						<table width='100%' cellpadding='4' cellspacing='0' ><tr id='rcorners2'><td>
           <form class="form-inline" name="frmfind" method="GET" onSubmit="JavaScript:return fncSubmit();" action="teacher_searchuser.php">
	 &nbsp;&nbsp; &nbsp; &nbsp;<b>รหัสประจำตัว</b>&nbsp;
		<input class="form-control mr-sm-2" type="text" name="re_userid" placeholder="กรอกรหัสนักศึกษา" aria-label="Search"  style="width:180px;"  />
	<b>ชื่อ</b>&nbsp;
	<input class="form-control mr-sm-2" type="text" name="re_username" placeholder="กรอกชื่อนักศึกษา" aria-label="Search"  style="width:180px;" / >
	<b>นามสกุล</b>&nbsp;
	<input class="form-control mr-sm-2" type="text" name="re_lastname" placeholder="กรอกนามสกุลนักศึกษา" aria-label="Search"  style="width:180px;" / >
	<!--ปีที่เข้าศึกษา&nbsp;
	<input class="form-control mr-sm-2" type="text" name="re_yearuser" placeholder="กรุณากรอกปีที่เข้าศึกษา" aria-label="Search" / >-->
	 <div class="form-group mr-sm-2">
     <div class="input-group-prepend">
     <label for="re_yearu">&nbsp;<b>ค้นหาจากชั้นปี </b>&nbsp;</label>
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
<center>
<H1><font color="red">กรุณากรอกข้อมูลนักศึกษาที่ต้องการค้นหา</font></H1>
</center>
</td></tr></table>



	<!--<div class='col-lg-12' >
 <table  border='3' align='center' class='form-group table table-bordered'  >
 <tr align='center' bgcolor='FFDAB9'>
 <h6><th width='100px'>รหัสนักศึกษา</th>
 <th width='100px'>ชื่อ</th>
 <th width='100px'>นามสกุล</th>
 <th width='100px'>สาขา</th>
 <th width='100px'>ปีที่เข้าศึกษา</th>
 <th width='100px'>ชั้นปี</th>
 <th width='100px'>รายละเอียด</th>
 </h6></tr>
 </thead>
 <tbody>
 <?php while($row = mysqli_fetch_array($query)) { ?>
 <tr align="center" bgcolor='FFF0F5'>

 <td><?php echo $row['user_id']; ?></td>
 <td><?php echo $row['user_name']; ?></td>
 <td><?php echo $row['user_lastname']; ?></td>
 <td><?php
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

    echo "<td>" .$row["user_year"] .  "</td> "; ?>
	<td><?php
		 $yer =  date('Y')+543;
		if ($yer - $row["user_year"]<='1')
		echo "1";
		else if ($yer - $row["user_year"]=='2')
		echo "2";
		else if ($yer - $row["user_year"]=='3')
		echo "3";
		else if ($yer - $row["user_year"]>='4')
		echo "4";
		else($yer - $row["user_year"]=="") ; ?>/<?php echo $row['user_room']; ?></td>
 <td><?php echo "<a href='teacher_showprofiles.php?stu_id=".$row["user_id"]."' ><img src='img/seeuser.png' width= '30' height= '30' align='center' ></a><br>"; ?></td>

 </tr>
 <?php } ?>
 </tbody>
 </table>
 <?php
 $sql2 = "select * from tb_user WHERE major_id = '".$major0."'  ";
 $query2 = mysqli_query($conn,$sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
 <?php
   $conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
    mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
    //2. query ข้อมูลจากตาราง :
    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
	$result0 = mysqli_query($conn,$query0);
	$row = mysqli_fetch_array($result0,MYSQLI_ASSOC);
	$count = $row["countuser_major"];
	echo "<div  align='right' >";
	echo  "<B>จำนวนนักศึกษาทั้งหมดในสาขา ".$count." คน</B>";
	echo "</div>";

  ?>
 <nav>
 <div class="clearfix">
                    <div class="hint-text">แสดง <b><?php echo  $perpage; ?></b> จาก <b><?php echo $total_page; ?></b> รายการ</div>
                  <ul class="pagination">
 <li>
 <a href="teacher_showuser.php?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li  class="page-item"><a href="teacher_showuser.php?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
 <?php } ?>
 <li >
 <a href="teacher_showuser.php?page=<?php echo $total_page;?>" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
                </div>


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

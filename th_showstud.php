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
            <li class="active">
                    <a href="teacher_showuser.php">
                        <i class="fas fa-briefcase"></i>
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
				</div>
            </ul>

                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
        </nav>

        <!-- Page Content  -->
        <div id="content">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                  <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-right"></i>

                    </button>
               &nbsp;&nbsp; &nbsp; &nbsp; <h4> รายชื่อนักศึกษา </h4>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                       <B>ผู้ใช้งาน  : &nbsp;</B><?php echo $_SESSION["personal_name"];?>
                        &nbsp;<B>สถานะผู้ใช้งาน : &nbsp;</B><?php

									$a=$_SESSION["dep_id"];
													if ($a>1)
													echo "อาจารย์";
													else($a=="")


									?>
						 &nbsp;<B>สาขา : &nbsp;</B><?php

									$major=$_SESSION["major_id"];
											if ($major=='701' )
												echo "วิศวกรรมคอมพิวเตอร์";
												else if ($major=='702' )
												echo "เทคโนโลยีสารสนเทศ";
												else if($major=='703')
												echo "วิศวกรรมอุตสาหการ";
												else if($major=='704')
												echo "วิศวกรรมการผลิตยานยนต์";
												else if ($major=='705')
												echo "วิศวกรรมหุ่นยนต์และระบบอัตโนมัติ";
												else($major=="")

									?>
                        </ul>
                    </div>
                </div>
            </nav>
           <form class="form-inline" name="frmfind" method="GET" action="teacher_searchuser.php">
	รหัสประจำตัว&nbsp;
		<input class="form-control mr-sm-2" type="text" name="re_userid" placeholder="กรุณากรอกรหัสนักศึกษา" aria-label="Search"  />
	ชื่อ&nbsp;
	<input class="form-control mr-sm-2" type="text" name="re_username" placeholder="กรุณากรอกชื่อนักศึกษา" aria-label="Search" / >
	นามสกุล&nbsp;
	<input class="form-control mr-sm-2" type="text" name="re_lastname" placeholder="กรุณากรอกนามสกุลนักศึกษา" aria-label="Search" / >
	ปีที่เข้าศึกษา&nbsp;
	<input class="form-control mr-sm-2" type="text" name="re_yearuser" placeholder="กรุณากรอกปีที่เข้าศึกษา" aria-label="Search" / >


		<br></br>&nbsp;<input class="btn btn-outline-success my-2 my-sm-0"   type="submit" name="find_Emp" value="ค้นหา">
</form>

<br></br>

	<?php
	$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
    mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
	$major0 = $_SESSION["major_id"];
	if($major0 == "164" || $major0 == "154"){
    $query = "SELECT * FROM tb_user where major_id = '164' OR major_id = '154' ORDER BY user_id ASC" or die(mysql_error());
		$query0 = "SELECT COUNT(user_id) AS countuser_major FROM tb_user where major_id = '164' OR major_id = '154'  ORDER BY user_id ASC" or die(mysql_error());
	} elseif($major0 == "064" || $major0 == "062") {
	$query = "SELECT * FROM tb_user where major_id = '062' OR major_id = '064' ORDER BY user_id ASC" or die(mysql_error());
		$query0 = "SELECT COUNT(user_id) AS countuser_major FROM tb_user where major_id = '062' OR major_id = '064' ORDER BY user_id ASC" or die(mysql_error());

	} else {
    $query = "SELECT * FROM tb_user where major_id = '".$_SESSION["major_id"]."' ORDER BY user_id ASC" or die(mysql_error());
	$query0 = "SELECT COUNT(user_id) AS countuser_major FROM tb_user where major_id = '".$_SESSION["major_id"]."' ORDER BY user_id ASC" or die(mysql_error());

	}
 $result = mysqli_query($conn,$query);

 $perpage = 50;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 $start = ($page - 1) * $perpage;
 if($major0 == "164" || $major0 == "154"){
	 $sql = "select * from tb_user where major_id = '164' OR major_id = '154' limit {$start} , {$perpage} ";
 } elseif($major0 == "064" || $major0 == "062") {
	 $sql = "select * from tb_user  where major_id = '062' OR major_id = '064' limit {$start} , {$perpage} ";
 } else {
	 $sql = "select * from tb_user WHERE major_id = '".$major0."'  limit {$start} , {$perpage} ";
 }
 $query = mysqli_query($conn,$sql);
 //$query = mysqli_query($con, $sql);
  //$row_cnt = mysqli_num_rows($query);
//	echo $row_cnt;
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


 </br>
 </br><div class='col-lg-12' >
 <table  border='3' align='center' class='form-group table table-bordered'  >
 <tr align='center' bgcolor='FFDAB9'>
 <h6><th width='100'>รหัสนักศึกษา</th>
 <th width='100'>ชื่อ</th>
 <th width='100'>นามสกุล</th>
 <th width='100'>สาขา</th>
 <th width='100'>ปีที่เข้าศึกษา</th>
 <th width='100'>ชั้นปี</th>
 <th width='100'>จัดการข้อมูล</th>
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

 <nav>
 <div class="clearfix">
                    <div class="hint-text">แสดง <b><?php echo  $perpage; ?></b> จาก <b><?php echo $total_page; ?></b> รายการ</div>
                  <ul class="pagination">
 <li>
 <a href="th_showstud.php?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li  class="page-item"><a href="th_showstud.php?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
 <?php } ?>
 <li >
 <a href="th_showstud.php?page=<?php echo $total_page;?>" aria-label="Next">
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

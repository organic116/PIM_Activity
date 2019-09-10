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
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> <!-- Css ปุ่ม-->
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
            <li>
                    <a href="admin_activesuimain.php" >
                    <i class="fas fa-paper-plane"></i>
                        เพิ่มกิจกรรม
                    </a></li>

            <li>
                    <a href="admin_uishowar.php">
                    <i class="fas fa-paper-plane"></i>
                        กิจกรรมทั้งหมด
                    </a></li>
					 <li>
                    <a href="admin_showuser.php">
                    <i class="fas fa-briefcase"></i>
                        นักศึกษาทั้งหมด
                    </a></li>
			<!-- <li>
				<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
				  <i class="fas fa-briefcase"></i>
				เมนูนักศึกษา</a>

                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="admin_showuser.php">นักศึกษาทั้งหมด</a>
                        </li>
                        <li>
                            <a href="admin_showqrcodeuser.php">QR-CODE นักศึกษา</a>
                        </li>
                    </ul>
                </li>-->

            <li class="active">
                    <a href="admin_showteacher.php">
                    <i class="fas fa-briefcase"></i>
                        อาจารย์
                    </a></li>
					<li>
                <a href="logout_admin.php" onclick="return confirm('คุณต้องการออกจากระบบใช่หรือไม่ ?')">
                        <i class="fas fa-paper-plane"></i>
                        ออกจากระบบ
                    </a></li>
            </ul>

          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
            </button>
 </div>
        </nav>
        <!-- Page Content  -->

        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-right"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;

                    <h4>ข้อมูลอาจารย์</h4>
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
						if(document.frmfind.re_teacherid.value == "" && document.frmfind.re_teachername.value == "" && document.frmfind.re_teacherlastname.value == ""&& document.frmfind.re_teachermajor.value == "")
							{
							swal("เกิดข้อผิดพลาด!", "กรุณากรอกข้อมูล", "error");
							return false;
							}
						document.frmfind.submit();
						}
						</script>




	<form class="form-inline" name="frmfind" method="GET" onSubmit="JavaScript:return fncSubmit();" action="admin_searchteacher.php">
	รหัสประจำตัว&nbsp;
		<input class="form-control mr-sm-2" type="text" name="re_teacherid" placeholder="กรุณากรอกรหัสอาจารย์" aria-label="Search"  />
	ชื่อ&nbsp;
	<input class="form-control mr-sm-2" type="text" name="re_teachername" placeholder="กรุณากรอกชื่ออาจารย์" aria-label="Search" / >
	นามสกุล&nbsp;
	<input class="form-control mr-sm-2" type="text" name="re_teacherlastname" placeholder="กรุณากรอกนามสกุลอาจารย์" aria-label="Search" / >
		<br>
		</br>
<div class="form-group col-md-2.5">
     <div class="input-group-prepend">

     <label for="re_teachermajor">สาขาวิชา &nbsp;</label>
  </div>
  <select class="custom-select" name="re_teachermajor">
    <option value="" selected>กรุณาเลือก</option>
      <option value="701">วิศวกรรมคอมพิวเตอร์ </option>
	    <option value="702">เทคโนโลยีสารสนเทศ </option>
	    <option value="703">วิศวกรรมอุตสาหการ </option>
	    <option value="704">วิศวกรรมการผลิตยานยนต์ </option>
	    <option value="705">วิศวกรรมหุ่นยนต์และระบบอัตโนมัติ </option>
  </select>
 </div>


		<br></br>&nbsp;<input class="btn btn-outline-success my-2 my-sm-0"   type="submit" name="find_Emp" value="ค้นหา">
</form>


	<?php
 $con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
 mysqli_query($con, "SET NAMES UTF8");
 $perpage = 25;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 $start = ($page - 1) * $perpage;
 $sql = "select * from personal limit {$start} , {$perpage} ";
 $query = mysqli_query($con, $sql);
 ?>
  </br><div class='col-lg-12' >
   <table  border='3' align='center' class='form-group table table-bordered'>
 <tr align='center' bgcolor='#DCDCDC'>
 <h6><th width='100'>รหัสนักอาจารย์</th>
 <th width='100'>ชื่อ</th>
 <th width='100'>นามสกุล</th>
 <th width='100'>สาขา</th>
 </h6></tr>
 </thead>
 <tbody>
 <?php while ($row = mysqli_fetch_assoc($query)) { ?>
 <tr align="center" bgcolor='#FFFFF0'>
 <td><?php echo $row['personal_id']; ?></td>
 <td><?php echo $row['personal_name']; ?></td>
 <td><?php echo $row['personal_lastname']; ?></td>
  <td><?php
     if ($row["major_id"]=='701')
			 echo "วิศวกรรมคอมพิวเตอร์ ";
		else if($row["major_id"]=="")  "</td> ";

	 else if ($row["major_id"]=='702')
		echo "เทคโนโลยีสารสนเทศ ";
		else if($row["major_id"]=="")  "</td> ";

	else if ($row["major_id"]=='703')
		echo "วิศวกรรมอุตสาหการ ";
	else if($row["major_id"]=="")  "</td> ";

	else if($row["major_id"]=='704')
		echo "วิศวกรรมการผลิตยานยนต์ ";
	else if($row["major_id"]=="")  "</td> ";

	else if($row["major_id"]=='705')
		echo "วิศวกรรมหุ่นยนต์และระบบอัตโนมัติ ";
	else if($row["major_id"]=="")  "</td> ";

	 else if ($row["major_id"]=='1')
		echo "เจ้าหน้าที่ ";
	else if($row["major_id"]=="")  "</td> ";?></td>


 </tr>
 <?php } ?>
 </tbody>
 </table>
 <?php
 $sql2 = "select * from personal ";
 $query2 = mysqli_query($con, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>

 <nav>
 <div class="clearfix">
                    <div class="hint-text">แสดง  <b><?php echo  $perpage; ?></b> จาก <b><?php echo $total_page; ?></b> รายการ</div>
                  <ul class="pagination">
 <li>
 <a href="admin_showteacher.php?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li  class="page-item"><a href="admin_showteacher.php?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
 <?php } ?>
 <li >
 <a href="admin_showteacher.php?page=<?php echo $total_page;?>" aria-label="Next">
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

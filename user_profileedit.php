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

    <title>Collapsible sidebar using Bootstrap 4</title>

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
            </div>

            <ul class="list-unstyled components">
			<li class="active">
                    <a href="user_profile.php">
                        <i class="fas fa-briefcase"></i>
                        ประวัตินักศึกษา
                    </a></li>

                <li>
                <a href="activities_uimain.php">
                        <i class="fas fa-home"></i>
                        กิจกรรม
                </a></li>

                <li>
                    <a href="#">
                        <i class="fas fa-briefcase"></i>
                        การเข้าร่วมกิจกรรม
                </a></li>

                <li>
                    <a href="#">
                        <i class="fas fa-image"></i>
                       รายงานสรุปรวมกิจกรรม

                </a></li>

                <li>
                <a href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบใช่หรือไม่ ?')">
                        <i class="fas fa-paper-plane"></i>
                        ออกจากระบบ
                </a></li></ul>

                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">&nbsp;&nbsp;&nbsp;&nbsp;
                <h4>ประวัตินักศึกษา </h4>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                            <B>ผู้ใช้งาน :</B><?php echo $_SESSION["user_name"];?>
									<B>สถานะ :</B><?php

									$a=$_SESSION["user_status"];
													if ($a==0)
													echo "นักศึกษา";
													else($a==1)
									?>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


<form action="user_profileupdate.php" method="POST"  >
<div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">รูปนักศึกษา</label>
      <div class="text-center">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
		 <h6></h6>
      </div></hr><br>
    </div>
    <div class="form-group col-md-4">
    <label for="inputEmail4">QR-CODE</label>
      <div class="text-center">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
		 <h6></h6>
      </div></hr><br>
    </div>
  </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputAddress">รหัสนักศึกษา</label>
            <input type="text" class="form-control" name="stuid" id="stuid" value="<?php echo $_SESSION["user_id"];?>" readonly>
        </div>
    </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">ชื่อ</label>
      <input type="text" class="form-control" name="first_name" id="first_name"value="<?php echo $_SESSION["user_name"];?>" readonly >
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">นามสกุล</label>
      <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $_SESSION["user_lastname"];?>" readonly >
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">คณะ</label>
      <input type="text"  class="form-control" name="faculty" id="faculty"
      value="<?php  $_SESSION["faculty_id"];
                    if ($_SESSION["faculty_id"]=='105')
                    echo "วิศวกรรมศาสตร์และเทคโนโลยี";
                    else($_SESSION["faculty_id"]==""); ?>" readonly >
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">สาขาวิชา</label>
      <input type="text" class="form-control" name="Branch" id="Branch"
      value="<?php  $_SESSION["major_id"];
                if ($_SESSION["major_id"]=='701')
                  echo "วิศวกรรมคอมพิวเตอร์";
                  else if ($_SESSION["major_id"]=='702')
                  echo "เทคโนโลยีสารสนเทศ";
                  else if($_SESSION["major_id"]=='703')
                  echo "วิศวกรรมอุตสาหการ";
                  else if($_SESSION["major_id"]=='704')
                  echo "วิศวกรรมการผลิตยานยนต์";
                  else if ($_SESSION["major_id"]=='705')
                  echo "วิศวกรรมหุ่นยนต์และระบบอัตโนมัติ";
                    else($_SESSION["major_id"]=="");  ?>" readonly >
    </div>
    <div class="form-group col-md-2">
      <label for="inputEmail4">ปีที่เข้าศึกษา</label>
      <input type="text" class="form-control" name="yearstudy" id="yearstudy" value="<?php echo $_SESSION["user_year"];?>" readonly >
    </div>
    <div class="form-group col-md-1">
      <label for="inputEmail4">ห้อง</label>
      <input type="text" class="form-control" name="classroom" id="classroom" value="<?php echo $_SESSION["user_room"];?>" readonly >
    </div>
  </div>


  <div class="form-group">
    <label for="inputAddress">ที่อยู่</label>
    <input type="text" class="form-control" name="address" id="address" value="<?php echo $_SESSION["user_address"];?>">

  </div>
  <div class="form-row">
  <div class="form-group col-md-2">
      <label for="inputEmail4">วันเดือนปีเกิด</label>
      <input type="date" class="form-control" name="birthday" id="birthday" value="<?php echo $_SESSION["user_date"];?>" >
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">เบอร์โทรศัพท์</label>
      <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $_SESSION["user_tel"];?>" >
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">E-MAIL</label>
      <input type="text" class="form-control" name="email" id="email" value="<?php echo $_SESSION["user_email"];?>" >
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">รหัสผ่าน</label>
      <input type="password" class="form-control" name="user_password" id="user_password" value="<?php echo $_SESSION["user_password"];?>">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">บันทึกข้อมูลข้อมูลนักศึกษา</button>

</form>

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

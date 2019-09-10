<?php
session_save_path("session/");
session_start();
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
          <meta charset="UTF-8">
	<!doctype html>
         <meta charset="UTF-8">
		<meta charset="UTF-8">
		 <meta name="Generator" content="EditPlus®">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>สำหรับพนักงาน</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="Content-Type" content="text/html; charset=tis - 620">
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css.css" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" id="bootstrap">
		<style type="text/css">
		body {
		background-image: url('https://i.imgur.com/ZOcLM7h.jpg');}
		</style>

		</head>
    <body style ="font-family: 'Kanit', sans-serif;">
		<?php

		//------------------ตรวจสอบไอดี
									if($_SESSION["user_name"] == "")
									{
									 echo "<script>";
									 echo "alert('กรุณาเข้าสู่ระบบ');";
										echo "window.location='login.php'";
										echo "</script>"; }
										else { ?>
                <div class="container">
                        <div class="col-md-18 col-md-offset--2 col-sm-20 text-right">
                           			<br>
									<B>ผู้ใช้งาน :</B><?php echo $_SESSION["user_id"];?>
									<B>ตำแหน่ง :</B><?php echo $_SESSION["user_name"];?>
                </div>
            </div>

            <div class="main_menu_bg">
                <div class="container">
                    <div class="row">
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style ="font-family: 'Kanit', sans-serif;">

                                    <ul class="nav navbar-nav navbar-right">
                                       <?php
									if($_SESSION["user_name"] == "หัวหน้างานวิทยบริการ")
									{
									?>
                                        <li><a href="form1.php">ระบบแจ้งซ่อม</a></li>
										<li><a href="form2_manage.php">ระบบเบิก</a></li>
										<li><a href="form3.php">รายงานเบิก</a></li>
                                        <li><a href="form4.php">ประวัติอุปกรณ์</a></li>
										<li><a href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบใช่หรือไม่ ?')"><font color="red">ออกจากระบบ</font></a></li>

									<?php } else { ?>

									    <li><a href="form1.php">ระบบแจ้งซ่อม</a></li>
                                        <li><a href="form2.php">เบิกสิ่งของ</a></li>
										<li><a href="form3.php">รายงานเบิก</a></li>
                                        <li><a href="form4.php">ประวัติอุปกรณ์</a></li>
										<li><a href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบใช่หรือไม่ ?')"><font color="red">ออกจากระบบ</font></a></li>



									<?php } ?>
                                        <!--<li><a href="#" class="booking">Table Booking</a></li>-->
                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </div>
            </div>


		<!--body -->
<div class= "text">
<center>
 <table cellpadding = "200" style ="font-family: 'Kanit', sans-serif;" cellpadding = "10" width = "500">
  <tr><td colspan="9"><center><img src="images/mr.fix.png" height="150"><br><font size="6">ระบบแจ้งซ่อมสำหรับผู้ดูแล</font><br><hr></center></td></tr>



   <?php
									if($_SESSION["user_name"] == "หัวหน้างานวิทยบริการ")
									{
									?>
                                          <tr><td><center><a href="form1.php"><img src="images/iconfirstadmin.png" height="100"><br>ระบบแจ้งซ่อม</center></a></td><td>	</td> <td><a href="form2_manage.php"><center><img src="images/11112.png" height="100"><br>ระบบเบิก</center></a></td></td><td><td>	</td>
  <td><center><a href="form3.php"><img src="images/report.png" height="100"><br>รายงานเบิก</center></a></td></td>	<td> <td><a href="form4.php"><center><img src="images/his.png" height="100"><br>ประวัติอุปกรณ์</center></a></td></tr>

									<?php } else { ?>
  <tr><td><center><a href="form1.php"><img src="images/iconfirstadmin.png" height="100"><br>ระบบแจ้งซ่อม</center></a>	</td>   <td><a href="form2.php"><center><img src="images/11112.png" height="100"><br>เบิกอุปกรณ์</center></a>	  </td>
  <td><center><a href="form3.php"><img src="images/report.png" height="100"><br>รายงานเบิก</center></a>	</td> <td><a href="form4.php"><center><img src="images/his.png" height="100"><br>ประวัติอุปกรณ์</center></a>	</td></tr>



									<?php } ?>










  </table>
  </center>
<div>

    	<?php } ?>
 </body>

</html>

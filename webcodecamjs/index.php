<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>สแกน QRCDODE เข้าร่วมกิจกรรม</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body style="padding-top: 0px;">
   <?php
$id_ac = $_GET["ar_id"];
?>
       <form align="center" action="adduser_toar.php" id="frmMain" name="frmMain"  method="post">
           <input type="hidden" value = "<?php echo $id_ac; ?>" name = "activities_join">

        <div class="container" id="QR-Code">
	 <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="navbar-form navbar-left">
                    </div>
					 <?php echo "<button type='submit'  class='btn btn-default'><a href='../join_ar.php?ar_id=" . $id_ac . "'>กลับหน้ากิจกรรม</a></button>"; ?><h4>ระบบสแกน QRCODE สำหรับการเข้าร่วมกิจกรรม</h4>

                    <div class="navbar-form navbar-right">
                        <select class="form-control" id="camera-select"></select>
                        <div class="form-group">
                            <input id="image-url" type="text" class="form-control" placeholder="Image url">
                            <button title="Decode Image" class="btn btn-default btn-sm" id="decode-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-upload"></span></button>
                            <button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-picture"></span></button>
                            <button title="Play" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-play"></span></button>
                            <button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-pause"></span></button>
                            <button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-stop"></span></button>
                        </div>
                    </div>
                </div>

                <div class="panel-body text-center">
                    <div class="col-md-6">
                        <div class="well" style="position: relative;display: inline-block;">
                            <canvas width="320" height="240" id="webcodecam-canvas"></canvas>
                            <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="thumbnail" id="result">
                            <div class="well" style="overflow: hidden;">
                                <img width="320" height="240" id="scanned-img" src="../img/sern.png">
                            </div>
                            <div class="caption" >
                                <h3>ผลการสแกน</h3>
                                <textarea id="scanned-QR" name="scanned-QR" readonly></textarea>
								</div>

								<div class="on" >
                                    <!-- Trigger the modal with a button -->
                                    <button type="button" id="open_modal" class="btn btn-warning" data-toggle="modal" data-target="#myModal">ตรวจสอบ</button>
                                    <button type='submit' class='btn btn-primary' name='submit' id='submit' class="on">ยืนยัน</button>
							   </div>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">ตรวจสอบ</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="profile-sidebar">
                                                <div class="profile-userpic" style="display:flex;">
                                                    <img id="stu_image" class="img-responsive" alt="">

                                                    <div class="profile-usertitle-name" style="text-align: left;padding-left: 20px;">
                                                        <p id="stu_name">
                                                        <p id="stu_lastname">
                                                        <p id="stu_id">
                                                    </div>
                                                </div>
                                            </div>
                                            <script type="text/javascript">
                                                    $(document).ready(function() {
                                                        $("#open_modal").click(function() {
                                                                $.ajax({
                                                                type: "POST",
                                                                url: "post.php",
                                                                data: $("#scanned-QR").serialize(),
                                                                success: function(result) {
                                                                    if(JSON.parse(result).image.includes("http")){
                                                                        $("#stu_image").attr("src",JSON.parse(result).image);
                                                                    }else{
                                                                        $("#stu_image").attr("src", "../img/"+JSON.parse(result).image);
                                                                    }
                                                                    $("#stu_name").html("ชื่อ :&nbsp"+JSON.parse(result).user_name);
                                                                    $("#stu_lastname").html("นามสกุล :&nbsp"+JSON.parse(result).user_lastname);
                                                                    $("#stu_id").html("รหัสนักศึกษา :&nbsp"+JSON.parse(result).user_id);
                                                                }
                                                            });
                                                        });
                                                    });
                                            </script>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
             </form>
		</div>
  <br>
  <center>
<?php
$con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
mysqli_query($conn, "SET NAMES UTF8"); //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//2. query ข้อมูลจากตาราง :
$query0 = "SELECT COUNT(activities_id) AS countjoin FROM tb_joinac WHERE activities_id = '" . $_GET["ar_id"] . "' " or die(mysql_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result0 = mysqli_query($conn, $query0);
$row = mysqli_fetch_array($result0, MYSQLI_ASSOC);
$count = $row["countjoin"];
?>
			 <nav class="navbar navbar-expand-lg navbar-light bg-primary" style="width:900px;">
                <div class="container-fluid" >

                <B>รายชื่อผู้เข้าร่วมกิจกรรมโครงการ  <div align="center">จำนวนผู้เข้าร่วมกิจกรรม : <?php echo $count; ?></B></div>

                </div>
            </nav>
			<?php

//1. เชื่อมต่อ database:
$con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
mysqli_query($conn, "SET NAMES UTF8"); //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//2. query ข้อมูลจากตาราง :
$query = "SELECT * FROM tb_joinac WHERE activities_id = '" . $_GET["ar_id"] . "'" or die(mysql_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($conn, $query);
?>
	 <nav style="width:900px;">
	<table border='2' align='center' class='form-group table table-striped'  style='table-layout:fixed' >
  <tr>
	<th > <div align="center">ลำดับ </div></th>
    <th> <div align="center" >รหัสนักศึกษา </div></th>
    <th> <div align="center">ชื่อ-นามสกุล </div></th>
    <th > <div align="center">สาขา </div></th>
    <th> <div align="center" >เวลาที่สแกน </div></th>
  </tr>
    <?php
$i = 1;
while ($row = mysqli_fetch_array($result)) {

    $query_user = "SELECT * FROM tb_user WHERE user_id = '" . $row["user_id"] . "' " or die(mysql_error());
    $result_user = mysqli_query($conn, $query_user);
    while ($aaa = mysqli_fetch_array($result_user)) {

        $query_userq = "SELECT * FROM tb_user WHERE user_id = '" . $aaa["user_id"] . "' " or die(mysql_error());
        $result_userq = mysqli_query($conn, $query_userq);
        while ($aaaq = mysqli_fetch_array($result_userq)) {

            $query_userz = "SELECT * FROM tb_major WHERE major_id = '" . $aaa["major_id"] . "' " or die(mysql_error());
            $result_userz = mysqli_query($conn, $query_userz);
            while ($aaaz = mysqli_fetch_array($result_userz)) {

                $query_userza = "SELECT * FROM tb_faculty WHERE faculty_id = '" . $aaa["faculty_id"] . "' " or die(mysql_error());
                $result_userza = mysqli_query($conn, $query_userza);
                while ($aaaza = mysqli_fetch_array($result_userza)) {

                    ?>
 <tr>
	<td><div align="center"><?php echo $i; ?></div></td>
    <td><div align="center"><?php echo $row["user_id"]; ?></div></td>
	<td><div align="center"><?php echo $aaa["user_name"]; ?>&nbsp;&nbsp;&nbsp;<?php echo $aaaq["user_lastname"]; ?></div></td>

	<td><div align="center"><?php echo $aaaz["major_name"]; ?></div></td>
	<!--<td><div align="center"><?php echo $aaaza["faculty_name"]; ?></div></td>-->
	<td><div align="center"><?php echo date('H:i', strtotime($row["time_joinar"])); ?></div></td>


  </tr>
<?php
$i++;
                }
            }
        }
    }
}
?>
</table>
</nav>
</center>
        <script type="text/javascript" src="js/filereader.js"></script>

            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript" src="js/qrcodelib.js"></script>
            <script type="text/javascript" src="js/webcodecamjquery.js"></script>
            <script type="text/javascript" src="js/mainjquery.js"></script>

        <script type="text/javascript" src="js/qrcodelib.js"></script>
        <script type="text/javascript" src="js/webcodecamjs.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>

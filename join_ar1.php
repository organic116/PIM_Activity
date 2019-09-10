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
            </div>
            <ul class="list-unstyled components">
            <li>
                    <a href="admin_activesuimain.php" >
                        <i class="fas fa-home"></i>
                        เพิ่มกิจกรรม
                    </a></li>

			<li >
                    <a href="admin_uishowar.php">
                    <i class="fas fa-home"></i>
                        กิจกรรมทั้งหมด
                    </a></li>

			<li>
                    <a href="admin_showuser.php">
                    <i class="fas fa-briefcase"></i>
                        นักศึกษาทั้งหมด
                    </a></li>

            <li>
                    <a href="#">
                    <i class="fas fa-briefcase"></i>
                        อาจารย์
                    </a></li>

			<li>
                    <a href="#">
                    <i class="fas fa-briefcase"></i>
                        เจ้าหน้าที่
                    </a></li>

            <li>
               	 	<a href="logout_admin.php" onclick="return confirm('คุณต้องการออกจากระบบใช่หรือไม่ ?')">
                    <i class="fas fa-paper-plane"></i>
                        ออกจากระบบ
                    </a></li>
            </ul>

            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i></button>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">


			<button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-right"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;

            <h4>ข้อมูลกิจกรรม</h4>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                        <B>ผู้ใช้งาน :&nbsp;</B><?php echo $_SESSION["admin_username"];?>
                        &nbsp;<B>สถานะ :&nbsp;</B><?php

									$a=$_SESSION["admin_status"];
													if ($a==0)
													echo "เจ้าหน้าที่";
													else($a==1)
									?>
                        </ul>
                    </div>
                </div>
            </nav>

 <form name="frmAdd" method="post">
 <?php
		$conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
		mysqli_query($conn, "SET NAMES UTF8");
		$ar_id = $_GET["ar_id"];
		$sql="select * from tb_activities where activities_id='$ar_id' ";
		echo "<form name='frmeditteacher' method='POST' action='b03-update.php' enctype='multipart/form-data'>";
		$result=mysqli_query($conn,$sql) or die ("ไม่สามารถค้นหาข้อมูลได้").mysql_error();
		if(mysqli_num_rows($result) == 1)
		{
			while($row = mysqli_fetch_array($result)){
			echo "<div class='form-row'>";
			echo "<div  class='form-group col-md-3'>";
			echo " <label for='activities_year'>ปีการศึกษา</label>";
			echo "<input type='number' class='form-control'  id='activities_year' name='activities_year' value='$row[activities_year]' readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-3'>";
			echo "<label for='activities_year'>กลุ่ม</label>";
			if ($row["genus_id"]=='1'){
			echo "<input  class='form-control' value='กิจกรรมบังคับ' readonly>";}
			else if ($row["genus_id"]=='2'){
			echo "<input  class='form-control' value='กิจกรรมเลือก' readonly>";}
			else if ($row["genus_id"]=='3'){
			echo "<input  class='form-control' value='กิจกรรมอื่นๆ' readonly>";}
			else if($row["genus_id"]=='0'){
			echo "<input  class='form-control'  id='genus_id' name='genus_id' value='$row[genus_id]' readonly>";
			}
			echo "</div>";

			echo "<div  class='form-group col-md-3'>";
			echo "<label for='activities_year'>ประเภทกิจกรรม</label>";
      if ($row["type_id"]=='10'){
        echo "<input  class='form-control' value='ปฐมนิเทศ' readonly>";}
      else if ($row["type_id"]=='11'){
        echo "<input  class='form-control' value='อบรม' readonly>";}
      else if ($row["type_id"]=='12'){
        echo "<input  class='form-control' value='ทดสอบ' readonly>";}
      else if ($row["type_id"]=='13'){
        echo "<input  class='form-control' value='แข่งขันกีฬา' readonly>";}
      else if ($row["type_id"]=='14'){
        echo "<input  class='form-control' value='ศึกษาดูงาน' readonly>";}
      else if ($row["type_id"]=='15'){
        echo "<input  class='form-control' value='เข้าค่าย' readonly>";}
      else if ($row["type_id"]=='16'){
        echo "<input  class='form-control' value='งานแสดง' readonly>";}
      else if ($row["type_id"]=='17'){
        echo "<input  class='form-control' value='ปัจฉิมนิเทศ' readonly>";}
			else if($row["type_id"]=='0'){
			echo "<input  class='form-control'  id='type_id' name='type_id' value='$row[type_id]' readonly>";
			}
			echo "</div>";
			echo "</div>";

			echo "<div class='form-row'>";
			echo "<div  class='form-group col-md-2'>";
			echo "<label for='activities_year'>รหัสกิจกรรม</label>";
			echo "<input type='text' class='form-control'  id='activities_id' name='activities_id' value='$row[activities_id]' readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-4'>";
			echo "<label for='activities_year'>ชื่อกิจกรรม</label>";
			echo "<input type='text' class='form-control'  id='activities_name' name='activities_name' value='$row[activities_name]' readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-2'>";
			echo "<label for='activities_year'>วันเพิ่มกิจกรรม</label>";
			echo "<input type='text' class='form-control'  id='activities_addstart' name='activities_addstart' value='$row[activities_addstart]' readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-2'>";
			echo "<label for='activities_valueuser'>จำนวนนักศึกษา</label>";
			echo "<input type='text' class='form-control'  id='activities_valueuser' name='activities_valueuser' value='$row[activities_valueuser]' readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-2'>";
			echo "<label for='activities_hour'>ชั่วโมงกิจกรรม</label>";
			echo "<input type='text' class='form-control'  id='activities_hour' name='activities_hour' value='$row[activities_hour]' readonly>";
			echo "</div>";
			echo "</div>";

			echo "<div class='form-row'>";
			echo "<div class='form-group'>";
			echo "<label for='activities_detail'>รายละเอียดกิจกรรม</label>";
			echo  "<textarea readonly rows='4' cols='150' class='form-control' id='activities_detail' name='activities_detail'>$row[activities_detail]</textarea>";
			echo  "</div>";
			echo "</div>";

			echo "<div class='form-row'>";
			echo "<div  class='form-group col-md-2'>";
			echo "<label for='activities_startdate'>วันเดือนปีที่เริ่มกิจกรรม</label>";
			echo "<input type='text' class='form-control'  id='activities_startdate' name='activities_startdate' value='$row[activities_startdate]' readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-2'>";
			echo "<label for='activities_enddate'>วันเดือนปีที่สิ้นสุดกิจกรรม</label>";
			echo "<input type='text' class='form-control'  id='activities_enddate' name='activities_enddate' value='$row[activities_enddate]' readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-1'>";
			echo "<label for='activities_starttime'>เวลาที่เริ่ม</label>";
			echo "<input type='text' class='form-control'  id='activities_starttime' name='activities_starttime' value='$row[activities_starttime]' readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-1'>";
			echo "<label for='activities_endtime'>เวลาที่สิ้นสุด</label>";
			echo "<input type='text' class='form-control'  id='activities_endtime' name='activities_endtime' value='$row[activities_endtime]' readonly>";
			echo "</div>";
			echo "<div  class='form-group col-md-3'>";
			echo "<label for='activities_admin'>ผู้ดูแลกิจกรรม</label>";
			echo "<input type='text' class='form-control'  id='activities_admin' name='activities_admin' value='$row[activities_admin]' readonly>";
			echo "</div>";
			echo "</div>";

			echo "<div>";
			echo "<button type='submit' class='btn btn-primary' name='submit' id='submit'><a href='webcodecamjs/index.php?ar_id=".$row["activities_id"]."'>สแกน QR-CODE นักศึกษา</a></button>";
			echo "</div>";

			echo "</form>";
			}
		}
		else{
			echo "ไม่พบข้อมูลกิจรรมที่ต้องการแก้ไข";

		}
		mysqli_close($conn);
	?><?php
   $conn = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
    mysqli_query($conn, "SET NAMES UTF8");  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

    //2. query ข้อมูลจากตาราง :
    $query0 = "SELECT COUNT(activities_id) AS countjoin FROM tb_joinac WHERE activities_id = '".$_GET["ar_id"]."' " or die(mysql_error());
    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
	$result0 = mysqli_query($conn,$query0);
	$row = mysqli_fetch_array($result0,MYSQLI_ASSOC);
		$count = $row["countjoin"];
	 echo $count;



  ?>

	<br>
 <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                <div class="container-fluid">

                รายชื่อผู้เข้าร่วมกิจกรรมโครงการ
                   <div align="center"><?php echo $count;?></div>
                </div>
            </nav>

	<table width="585" border="1" class="table">
  <tr>
	<th width="42"> <div align="center">ลำดับ </div></th>
    <th width="102"> <div align="center">รหัสนักศึกษา </div></th>
    <th width="350"> <div align="center">ชื่อ-นามสกุล </div></th>
    <th width="118"> <div align="center">สาขา </div></th>
    <th width="94"> <div align="center">คณะ </div></th>
    <th width="55"> <div align="center">เวลาที่สแกน </div></th>
  </tr>

    <?php
$i = 1;
while($row = mysqli_fetch_array($result)){

$query_user = "SELECT * FROM tb_user WHERE user_id = '".$row ["user_id"]."' " or die(mysql_error());
	$result_user = mysqli_query($conn,$query_user);
while($aaa = mysqli_fetch_array($result_user)){

$query_userq = "SELECT * FROM tb_user WHERE user_id = '".$aaa ["user_id"]."' " or die(mysql_error());
	$result_userq = mysqli_query($conn,$query_userq);
while($aaaq = mysqli_fetch_array($result_userq)){


	$query_userz = "SELECT * FROM tb_major WHERE major_id = '".$aaa ["major_id"]."' " or die(mysql_error());
	$result_userz = mysqli_query($conn,$query_userz);
while($aaaz = mysqli_fetch_array($result_userz)){

	$query_userza = "SELECT * FROM tb_faculty WHERE faculty_id = '".$aaa ["faculty_id"]."' " or die(mysql_error());
	$result_userza = mysqli_query($conn,$query_userza);
while($aaaza = mysqli_fetch_array($result_userza)){


?>
 <tr>
	<td><div align="center"><?php echo $i;?></div></td>
    <td><div align="center"><?php echo $row ["user_id"];?></div></td>
	<td><div align="center"><?php echo $aaa ["user_name"]; ?>&nbsp;&nbsp;&nbsp;<?php echo $aaaq ["user_lastname"];?></div></td>

	<td><div align="center"><?php echo $aaaz ["major_name"];?></div></td>
	<td><div align="center"><?php echo $aaaza ["faculty_name"];?></div></td>
	<td><div align="center"><?php echo $row ["time_joinar"];?></div></td>


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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

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
    <!-- นำเข้า Javascript jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
</body>


</html>

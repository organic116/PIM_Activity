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
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ระบบเข้าร่วมกิจกรรมนักศึกษา</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style4.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> <!-- Css ปุ่ม-->

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <style>
/* Popup container - can be anything you want */
.popup {
    position: relative;
    display: inline-block;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* The actual popup */
.popup .popuptext {
    visibility: hidden;
    width: 160px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.popup .show {
    visibility: visible;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
    from {opacity: 0;}
    to {opacity: 1;}
}

@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity:1 ;}
}
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
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
                    <a href="teacher_showuser.php">
                        <i class="fas fa-briefcase"></i>
                        นักศึกษา
                    </a>
            </li>
                 <li class="active">
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

             <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                  <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-right"></i>

                    </button>
                &nbsp; &nbsp; &nbsp; &nbsp;<h4> กิจกรรมทั้งหมด </h4>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                       <B>ผู้ใช้งาน : &nbsp;</B><?php echo $_SESSION["personal_name"];?>
                        &nbsp;<B>สถานะผู้ใช้งาน : &nbsp;</B><?php

								$a=$_SESSION["dep_id"];
													if ($a>1)
													echo "อาจารย์";
													else($a=="")


									?>
						 &nbsp;<B>สาขา : &nbsp;</B><?php

									$major=$_SESSION["major_id"];
											if ($major=='701')
												echo "วิศวกรรมคอมพิวเตอร์";
												else if ($major=='702')
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
			   </nav>
			<script language="javascript">
					function fncSubmit()
						{
						if(document.frmfind.name_ar.value == "" && document.frmfind.name_selar.value == "" && document.frmfind.name_month_joine.value == "")
							{
							swal("เกิดข้อผิดพลาด!", "กรุณากรอกข้อมูล", "error");
							return false;
							}
						document.frmfind.submit();
						}
						</script>
			<form class="form-inline" name="frmfind" method="get" onSubmit="JavaScript:return fncSubmit();" action="teacher_arsearch.php">
	ชื่อกิจกรรม&nbsp;
		<input class="form-control mr-sm-2" type="text" name="name_ar" placeholder="กรุณากรอกชื่อกิจกรรม" aria-label="Search"  />
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
  <div class="form-group col-md-2.5">
     <div class="input-group-prepend">
     <label for="name_month_joine">&nbsp;ค้นหาจากเดือนที่จัดกิจกรรม&nbsp;</label>
  </div>
  <select class="custom-select" name="name_month_joine">
    <option value="" selected>กรุณาเลือก</option>
    <option value="-01-">มกราคม </option>
	<option value="-02-">กุมภาพันธ์ </option>
	<option value="-03-">มีนาคม </option>
	 <option value="-04-">เมษายน </option>
	<option value="-05-">พฤษภาคม </option>
	<option value="-06-">มิถุนายน </option>
	 <option value="-07-">กรกฎาคม </option>
	<option value="-08-">สิงหาคม </option>
	<option value="-09-">กันยายน </option>
	 <option value="-10-">ตุลาคม </option>
	<option value="-11-">พฤศจิกายน </option>
	<option value="-12-">ธันวาคม </option>
  </select>
 </div>

		<br></br>&nbsp;<input class="btn btn-outline-success my-2 my-sm-0"   type="submit" name="find_Emp" value="ค้นหา">
</form>
            	<br>


                <td align='left'>
					<a href="teacher_mainui.php">
					<h6> < < กลับหน้าแสดงกิจกรรม </h6></a></br>
				</td>

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
$SQL="SELECT * FROM tb_activities WHERE activities_status  = '0' ";

	if(!$_GET["name_ar"] == ""){
		$SQL .= "AND activities_name LIKE '%".$_GET["name_ar"]."%'";
	}
	if(!$_GET["name_selar"] == ""){
		$SQL .= "AND genus_id  = '".$_GET["name_selar"]."'";
	}

	if(!$_GET["name_month_joine"] == ""){
		$SQL .= "AND activities_startdate LIKE '%".$_GET["name_month_joine"]."%'";

	}
	$server=$_SERVER['localhost'];
  $username="id10717672_organic";
  $password="Tanakorn1340";
  $database="id10717672_dbactivities";
	$conn=mysqli_connect($server,$username,$password,$database);

if(!$conn){
die("เกิดข้อผิดพลาดในการเชื่อมต่อกับเครื่องให้บริการฐานข้อมูล!!!!!".mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");
$result=mysqli_query($conn,$SQL) or die("เกิดข้อผิดพลาดในการค้นหา").mysqli_error();
if(mysqli_num_rows($result)==1){
$row=mysqli_fetch_array($result);
$c_id=$row["activities_id"];
$c_name=$row["activities_name"];
$c_detail=$row["activities_detail"];
$c_year=$row["activities_year"];
$c_genus=$row["genus_id"];
$c_startdate=$row["activities_startdate"];
$c_starttime=$row["activities_starttime"];
$c_admin=$row["activities_admin"];
$c_enddate=$row["activities_enddate"];
$c_endtime=$row["activities_endtime"];
$c_addstart=$row["activities_addstart"];
$c_valueuser=$row["activities_valueuser"];
$c_hour=$row["activities_hour"];
$c_type=$row["type_id"];
echo "<div class='col-lg-12' >";
echo"<table  border='3' align='center' class='form-group table table-bordered'  >";
echo"<tr align='center' bgcolor='FFDAB9'>";
echo"<td ><center><B>กลุ่มกิจกรรม</B></center></td>";
echo"<td><center><B>ชื่อกิจกรรม</B></center></td>";
echo"<td ><center><B>วันเริ่มกิจกรรม</B></center></td>";
echo"<td ><center><B>เวลาเริ่มกิจกรรม</B></center></td>";
//echo"<td width='100' align ='center'>ชั่วโมง</td>";
//echo"<td width='100' align ='center'>จำนวนผู้เข้าร่วม</td>";
echo"<td ><center><B>จัดการข้อมูล</B></center></td>";
echo"</tr>";
echo "<tr align='center' bgcolor='FFF0F5'>";
 echo "<td  align='center' bgcolor='FFF0F5' >" .'<center>';
      if ($row["genus_id"]=='1')
       echo "กิจกรรมบังคับ";
       else if ($row["genus_id"]=='2')
       echo "กิจกรรมเลือก";
       else if ($row["genus_id"]=='3')
       echo "กิจกรรมอื่นๆ";
       else($row["genus_id"]=='0')
      .  "</td> ";
echo "<td    bgcolor='FFF0F5'><center>$row[activities_name]</center></td>";
 echo "<td   bgcolor='FFF0F5'>" .'<center>'.DateThai ($row["activities_startdate"])."</td> ";
 echo "<td   bgcolor='FFF0F5'>" .'<center>'.date('H:i',strtotime($row["activities_starttime"]))."&nbsp;น.</td> ";
 //echo "<td>" .'<center>'.$row["activities_hour"] .  "</td> ";
 //echo "<td>" .'<center>'.$row["activities_valueuser"] .  "</td> ";
echo "<td    bgcolor='FFF0F5'><div><center><a href='teacher_detailar.php?ar_id=".$row["activities_id"]."'><img src='img/icon-a.png' width= '50' height= '50'></a></div></td>";
     echo "</tr>";
	 echo "</div>";
}else if (mysqli_num_rows($result)>1){
echo"<table  border='3' align='center' class='form-group table table-bordered'  >";
echo"<tr align='center' bgcolor='FFDAB9'>";
echo"<td width='100px'><center><B>กลุ่มกิจกรรม</B></center></td>";
echo"<td  width='100px'><center><B>ชื่อกิจกรรม</B></center></td>";
echo"<td  width='100px'><center><B>วันเริ่มกิจกรรม</B></center></td>";
echo"<td  width='100px'><center><B>เวลาเริ่มกิจกรรม</B></center></td>";
echo"<td  width='100px'><center><B>จัดการข้อมูล</B></center></td>";
echo"</tr>";
$con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
mysqli_set_charset($con,"utf8");
$queryz = mysqli_query($con, $SQL) or die("เกิดข้อผิดพลาดในการค้นหา").mysqli_error();;
while ($rowz = mysqli_fetch_assoc($queryz)){
$c_id=$rowz["activities_id"];
$c_name=$rowz["activities_name"];
$c_detail=$rowz["activities_detail"];
$c_year=$rowz["activities_year"];
$c_genus=$rowz["genus_id"];
$c_startdate=$rowz["activities_startdate"];
$c_starttime=$rowz["activities_starttime"];
$c_admin=$rowz["activities_admin"];
$c_enddate=$rowz["activities_enddate"];
$c_endtime=$rowz["activities_endtime"];
$c_addstart=$rowz["activities_addstart"];
$c_valueuser=$rowz["activities_valueuser"];
$c_hour=$rowz["activities_hour"];
$c_type=$rowz["type_id"];
echo "<div class='col-lg-12' >";
echo "<tr  align='center' bgcolor='FFF0F5'>";
echo "<td bgcolor='FFF0F5' >" .'<center>';
      if ($rowz["genus_id"]=='1')
       echo "กิจกรรมบังคับ";
       else if ($rowz["genus_id"]=='2')
       echo "กิจกรรมเลือก";
       else if ($rowz["genus_id"]=='3')
       echo "กิจกรรมอื่นๆ";
       else($rowz["genus_id"]=='0')
      .  "</td> ";
echo "<td   bgcolor='FFF0F5'><center>$rowz[activities_name]</center></td>";
 echo "<td  bgcolor='FFF0F5'><center>" .'<center>'.DateThai ($rowz["activities_startdate"])."</center></td> ";
 echo "<td  bgcolor='FFF0F5'><center>" .'<center>'.date('H:i',strtotime($rowz["activities_starttime"]))."&nbsp;น.</center></td> ";
 //echo "<td>" .'<center>'.$rowz["activities_hour"] .  "</td> ";
// echo "<td>" .'<center>'.$rowz["activities_valueuser"] .  "</td> ";
echo "<td  bgcolor='FFF0F5'><div><center><a href='teacher_detailar.php?ar_id=".$rowz["activities_id"]."'><img src='img/icon-a.png' width= '50' height= '50'></a></div></td>";
     echo "</tr>";
	 echo "</div>";
}
}else{
	echo "ไม่พบกิจกรรมที่ต้องการค้นหา";
	exit(0);
	}
	mysqli_close($conn);


 ?>
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

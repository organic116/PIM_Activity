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
		<nav id="sidebar">
		<div  class="sidebar-header">
				<h3><center><b>Activities</b></center></h3>
					<strong>AT</strong>
				</div>
					<ul class="list-unstyled components">
					<li class="active">
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
						<li>
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
						<li>
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

                    <h4>เพิ่มนักศึกษา</h4>
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

							if(document.getElementById('user_prefix').value  == "0"  )
							{
							 alert('กรุณาเลือกคำนำหน้า');
							 return false;
							}
							 if(document.getElementById('major_id').value  == "0"  )
							{
							 alert('กรุณาเลือกสาขาวิชา');
							 return false;
							}
							 if(document.getElementById('course_id').value  == "0"  )
							{
							 alert('กรุณาเลือกหลักสูตร');
							 return false;
							}
							if(document.formadduser.user_id.value == "")
							{
							alert('กรุณากรอกรหัสนักศึกษา');
							document.formadduser.user_id.focus();
							return false;
							}
							if(document.formadduser.user_name.value == "")
							{
							alert('กรุณากรอกชื่อนักศึกษานักศึกษา');
							document.formadduser.user_name.focus();
							return false;
							}
							if(document.formadduser.user_lastname.value == "")
							{
							alert('กรุณากรอกนามสกุลนักศึกษานักศึกษา');
							document.formadduser.user_lastname.focus();
							return false;
							}
							if(document.formadduser.user_room.value == "")
							{
							alert('กรุณากรอกห้อง');
							document.formadduser.user_room.focus();
							return false;
							}
							if(document.formadduser.user_year.value == "")
							{
							alert('กรุณากรอกปีการศึกษา');
							document.formadduser.user_year.focus();
							return false;
							}
						document.formadduser.submit();
						}
						</script>
<table width="100%" cellpadding="4" cellspacing="0" ><tr id="rcorners2"><td>
 <form action="admin_addusercomplete.php" name="formadduser" method="post" enctype="multipart/form-data"  onSubmit="JavaScript:return fncSubmit();"  role="form">

 <script language="JavaScript">
	function chkNumber(ele)
	{
	var vchar = String.fromCharCode(event.keyCode);
	if (vchar<'0' || vchar>'9') return false;

	ele.onKeyPress=vchar;
	}
</script>
<br>
<center>
 <label for="user_id"><h5><B>รูปนักศึกษา</B></h5></label>
  <script>
		 var loadFile = function(event) {
		 var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
			};
		</script>
	   <!--<img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail"  alt="avatar" >-->
	   <br>

	   <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" id="output" width="200"  height="200" />
	   <br>
	    <br>

	  <input type="file" name="filUpload" accept="image/*" onchange="loadFile(event)"   data-validation="required" data-validation-allowing="jpg, png" >
</center>
 <div class="form-row">
 &nbsp;&nbsp;&nbsp;<div class="form-group col-md-3">

      <label for="user_id"><B>รหัสนักศึกษา</B></label>

	  <script language="javascript">
function Numeric(sText,obj)
{
var ValidChars = "0123456789.";
var IsNumber=true;
var Char;
for (i = 0; i < sText.length && IsNumber == true; i++)
{
Char = sText.charAt(i);
if (ValidChars.indexOf(Char) == -1)
{
IsNumber = false;
}
}
if(IsNumber==false){
alert("ตัวเลขเท่านั้น");
obj.value=sText.substr(0,sText.length-1);
}
}
</script>

	  <input type="text" class="form-control"  id="user_id" name="user_id"   maxlength="13" onKeyUp="Numeric(this.value,this)">
 </div>

  <div class="form-group col-md-1.5">
     <div class="input-group-prepend">
     <label for="user_prefix"><B>คำนำหน้า</B></label>
  </div>
  <select class="custom-select" id="user_prefix" name="user_prefix">
    <option value="0" selected>กรุณาเลือก</option>
    <option value="นาย">นาย</option>
    <option value="นางสาว">นางสาว</option>
  </select>
 </div>

<div class="form-group col-md-3">
      <label for="user_name"><B>ชื่อ</B></label>
	<script language="javascript">
function IsNumeric(sText,obj)
{
var ValidChars = "ภถ ูุึคตจขชไำฎพฑะธ ัี๊รณนญยฐบลฟฤหฆกฏดโเฌ ้็่๋าษสศวซงผปฉแอฮ ิ์ืทมฒฬใฦฝ";
var IsNumber=true;
var Char;
for (i = 0; i < sText.length && IsNumber == true; i++)
{
Char = sText.charAt(i);
if (ValidChars.indexOf(Char) == -1)
{
IsNumber = false;
}
}
if(IsNumber==false){
alert("อักษรไทยเท่านั้น");
obj.value=sText.substr(0,sText.length-1);
}
}
</script>
	  <input type="text" class="form-control"  id="user_name" name="user_name" onKeyUp="IsNumeric(this.value,this)">
 </div>

 <div class="form-group col-md-3">
      <label for="user_lastname">นามสกุล</label>
<script language="javascript">
function IsNumeric(sText,obj)
{
var ValidChars = "ภถ ูุึคตจขชไำฎพฑะธ ัี๊รณนญยฐบลฟฤหฆกฏดโเฌ ้็่๋าษสศวซงผปฉแอฮ ิ์ืทมฒฬใฦฝ";
var IsNumber=true;
var Char;
for (i = 0; i < sText.length && IsNumber == true; i++)
{
Char = sText.charAt(i);
if (ValidChars.indexOf(Char) == -1)
{
IsNumber = false;
}
}
if(IsNumber==false){
alert("อักษรไทยเท่านั้น");
obj.value=sText.substr(0,sText.length-1);
}
}
</script>
	  <input type="text" class="form-control"  id="user_lastname" name="user_lastname" onKeyUp="IsNumeric(this.value,this)">
 </div>
</div>
<?php
  $con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
 mysqli_query($con, "SET NAMES UTF8");
 $sql = "SELECT
tb_major.major_id,
tb_major.major_name,
tb_major.faculty_id,
tb_major.course_id,
tb_faculty.faculty_name,
tb_faculty.faculty_id,
tb_course.course_id,
tb_course.course_name
FROM
tb_major
INNER JOIN tb_faculty ON tb_major.faculty_id = tb_faculty.faculty_id
INNER JOIN tb_course ON tb_major.course_id = tb_course.course_id";
$result=mysqli_query($con,$sql) or die ("ไม่สามารถค้นหาข้อมูลได้").mysql_error();
$row = mysqli_fetch_array($result);
?>
<div class="form-row">
&nbsp;&nbsp;&nbsp;<div class="form-group col-md-1.5">
     <div class="input-group-prepend">
     <label for="faculty_id">&nbsp;<B>คณะ</B></label>
  </div>
   <input type="text" class="form-control" value="<?php echo $row['faculty_name'];  ?>" readonly>
   <input type="hidden" class="form-control"  id="faculty_id" name="faculty_id" value="<?php echo $row['faculty_id'];  ?>">
 </div>

 <div class="form-group col-md-2">
     <div class="input-group-prepend">
     <label for="re_major"><B>สาขาวิชา </B>&nbsp;</label>
  </div>
<?php
 $con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
 mysqli_query($con, "SET NAMES UTF8");
?>
<select class="custom-select" name="major_id">
<option value="0" >--กรุณาเลือกสาขา--</option>
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
<div class="form-group col-md-2">
     <div class="input-group-prepend">
     <label for="re_major"><B>หลักสูตร</B> &nbsp;</label>
  </div>
<?php
 $con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
 mysqli_query($con, "SET NAMES UTF8");
?>
<select class="custom-select" name="course_id">
<option value="" >--กรุณาเลือกหลักสูตร--</option>
<?php
$sqlco="SELECT
tb_course.course_id,
tb_course.course_name
FROM
tb_course";
   $queryco=mysqli_query($con,$sqlco);
   while($rowco=mysqli_fetch_array($queryco)){
?>
  <option value="<?php echo $rowco['course_id']?>"><?php echo $rowco['course_name']?></option>
<?php } ?>
</select>
</div>
  <div class="form-group col-md-2">
	  <label for="user_room"><B>ห้อง</B></label>
	  <input type="text" class="form-control"  id="user_room" name="user_room">
 </div>

 <div class="form-group col-md-2">
	  <label for="user_year"><B>ปีการศึกษา</B></label>
	  <input type="text" class="form-control"  id="user_year" name="user_year">
 </div> </div>

 <div class="form-row">
 &nbsp;&nbsp;&nbsp;<div class="form-group col-md-1.5">
     <div class="input-group-prepend">
     <label for="user_area">&nbsp;<B>พื้นที่</B></label>
  </div>
  <input type="text" class="form-control" id="user_area" name="user_area" value="นนทบุรี" readonly>
 </div>
 <!--<div class="form-group col-md-1.5">
     <div class="input-group-prepend">
     <label for="user_status">สถานะ</label>
  </div>
  <?php
 $con = mysqli_connect('localhost', 'id10717672_organic', 'Tanakorn1340', 'id10717672_dbactivities');
 mysqli_query($con, "SET NAMES UTF8");
?>
<select class="custom-select" name="user_status">
<option value="" selected >--กรุณาเลือกสถานะ--</option>
<?php
$sqlstatus="SELECT
tb_status.s_id,
tb_status.s_name
FROM
tb_status";
   $resultstatus=mysqli_query($con,$sqlstatus);
   while($rowstatus=mysqli_fetch_array($resultstatus)){
?>
  <option value="<?php echo $rowstatus['s_id']?>"><?php echo $rowstatus['s_name']?></option>
<?php } ?>
</select>

  </select>
 </div>-->
 </div>



<!--<div class="form-row-md-4">
  <div class="form-group">
    <label for="user_address">&nbsp;ที่อยู่</label>
    <textarea rows="4" cols="50" class="form-control" id="user_address" name="user_address"></textarea>
  </div>
    </div>-->

  &nbsp;&nbsp;&nbsp;<center><button type="submit" class="btn btn-primary"  name="submit" id="submit" onclick="return confirm('คุณต้องการบันทึกนักศึกษาใช่หรือไม่ ?')">เพิ่มนักศึกษา</button></center>
</form>&nbsp;&nbsp;&nbsp;
 </td></tr></table>


</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


    <!-- นำเข้า Javascript jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

    <script>

            $(function(){

                //เรียกใช้งาน Select2
                $(".select2-single").select2();

                //ดึงข้อมูล province จากไฟล์ get_data.php
                $.ajax({
                    url:"get_data.php",
                    dataType: "json", //กำหนดให้มีรูปแบบเป็น Json
                    data:{show_province:'show_province'}, //ส่งค่าตัวแปร show_province เพื่อดึงข้อมูล จังหวัด
                    success:function(data){

                        //วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data
                        $.each(data, function( index, value ) {
                            //แทรก Elements ใน id province  ด้วยคำสั่ง append
                              $("#type_id").append("<option value='"+ value.id + "'> " + value.name + "</option>");
                        });
                    }
                });


                //แสดงข้อมูล อำเภอ  โดยใช้คำสั่ง change จะทำงานกรณีมีการเปลี่ยนแปลงที่ #province
                $("#type_id").change(function(){

                    //กำหนดให้ ตัวแปร province มีค่าเท่ากับ ค่าของ #province ที่กำลังถูกเลือกในขณะนั้น
                    var type_id = $(this).val();

                    $.ajax({
                        url:"get_data.php",
                        dataType: "json",//กำหนดให้มีรูปแบบเป็น Json
                        data:{type_id:type_id},//ส่งค่าตัวแปร province_id เพื่อดึงข้อมูล อำเภอ ที่มี province_id เท่ากับค่าที่ส่งไป
                        success:function(data){

                            //กำหนดให้ข้อมูลใน #amphur เป็นค่าว่าง
                            $("#genus_id").text("");

                            //วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data
                            $.each(data, function( index, value ) {

                                //แทรก Elements ข้อมูลที่ได้  ใน id amphur  ด้วยคำสั่ง append
                                  $("#genus_id").append("<option value='"+ value.id +"'> " + value.name + "</option>");
                            });
                        }
                    });

                });


            });

    </script>
	 <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

</body>


</html>

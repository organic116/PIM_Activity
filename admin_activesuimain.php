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
		<div class="sidebar-header">
				<h3><center><b>Activities</b></center></h3>
					<strong>AT</strong>
				</div>
					<ul class="list-unstyled components">
					<li >
							<a href="admin_adduser.php" >
								&nbsp;<i  class="fas fa-plus"></i>
									เพิ่มนักศึกษา
							</a>
						</li>
						<li class="active">
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

                    <h4>เพิ่มกิจกรรม</h4>
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
							 if(document.getElementById('type_id').value  == "0"  )
							{
							swal("เกิดข้อผิดพลาด!", "กรุณาเลือกกลุ่มกิจกรรม", "error");
							return false;
							}
							 if(document.getElementById('genus_id').value  == "0"  )
							{
							swal("เกิดข้อผิดพลาด!", "กรุณาเลือกประเภทกิจกรรม", "error");
							return false;
							}
							if(document.getElementById('activities_place_id').value  == "0"  )
							{
							swal("เกิดข้อผิดพลาด!", "กรุณาเลือกสถานที่จัดกิจกรรม", "error");
							return false;
							}
							 if(document.getElementById('activities_admin').value  == ""  )
							{
							swal("เกิดข้อผิดพลาด!", "กรุณาเลือกผู้ดูแลกิจกรรม", "error");
							return false;
							}
							if(document.frmAdd.activities_name.value == "")
							{
							swal("เกิดข้อผิดพลาด!", "กรุณากรอกชื่อกิจกรรม", "error");
							document.frmAdd.activities_name.focus();
							return false;
							}
							if(document.frmAdd.activities_valueuser.value == "")
							{
							swal("เกิดข้อผิดพลาด!", "กรุณากรอกจำนวนนักศึกษา", "error");
							document.frmAdd.activities_valueuser.focus();
							return false;
							}
							if(document.frmAdd.activities_hour.value == "")
							{
							swal("เกิดข้อผิดพลาด!", "กรุณากรอกชั่วโมงกิจกรรม", "error");
							document.frmAdd.activities_hour.focus();
							return false;
							}
							if(document.frmAdd.activities_startdate.value == "")
							{
							swal("เกิดข้อผิดพลาด!", "กรุณาเลือกวันจัดกิจกรรม", "error");
							document.frmAdd.activities_startdate.focus();
							return false;
							}
							if(document.frmAdd.activities_enddate.value == "")
							{
							swal("เกิดข้อผิดพลาด!", "กรุณาเลือกวันสิ้นสุดกิจกรรม", "error");
							document.frmAdd.activities_enddate.focus();
							return false;
							}
							if(document.frmAdd.activities_starttime.value == "")
							{
							swal("เกิดข้อผิดพลาด!", "กรุณากรอกเวลาเริ่มกิจกรรม", "error");
							document.frmAdd.activities_starttime.focus();
							return false;
							}
							if(document.frmAdd.activities_endtime.value == "")
							{
							swal("เกิดข้อผิดพลาด!", "กรุณากรอกเวลาสิ้นสุดกิจกรรม", "error");
							document.frmAdd.activities_endtime.focus();
							return false;
							}

						document.frmAdd.submit();

						}
</script>
<table width="100%" cellpadding="4" cellspacing="0" ><tr id="rcorners2"><td>
<form action="admin_activesadd.php" name="frmAdd"  method="post" onSubmit="JavaScript:return fncSubmit();"  role="form" >
	&nbsp;&nbsp;
<?php
$date1=date("Y-m-d"); // วันปัจจุบัน
$date2=date("Y-07-1"); // จัดเก็บแบบ date มีค่า 2009-01-31

if($date1>=$date2)
{
$dateset = date('Y')+543;
}
else
{
 $dateset = date('Y')+543-1;
}

?>

		<div class="form-row">
			  &nbsp;&nbsp;&nbsp;&nbsp;<div class="form-group col-md-1">
				<label for="activities_year">ปีการศึกษา</label>
					<input type="number" class="form-control"  id="activities_year" name="activities_year" value="<?php echo $dateset ?>" style="width:100px;" readonly>
			 </div>

			<div class="form-group col-md-3">
				<label for="activitiesselect">กลุ่มกิจกรรม <font color = "FF0000" >* กรุณาเลือกกลุ่มกิจกรรม</font></label>
					<select class="form-control" id="type_id" name="province_list" >
						<option id="province_list" name="province_list1" value  = "0"  > -- กรุณาเลือก -- </option>
					</select>
			</div>

			<div class="form-group col-md-3">
				<label for="activitiesselect">ประเภทกิจกรรม <font color = "FF0000">* กรุณาเลือกประเภทกิจกรรม</font></label>
					<select class="form-control " id="genus_id" name="amphur_list" >
						<option id="amphur_list" name="amphur_list1"  value  = "0"> -- กรุณาเลือก --</option>
					</select>
			</div>
		</div>
<?php $length = 5;
$randomString = substr(str_shuffle(str_repeat($x='0123456789', ceil($length/strlen($x)) )),1,$length);
?>
<div class="form-row">
	&nbsp;&nbsp;&nbsp; &nbsp;<div class="form-group col-md-4">
		<label for="activities_name">ชื่อกิจกรรม</label>
			<input type="hidden" class="form-control" id="activities_place" name="activities_place" value="0" readonly >
			<input type="hidden" class="form-control" id="activities_status" name="activities_status" value="0" readonly >
			<input type="hidden" class="form-control" id="activities_id" name="activities_id" value="<?php echo $randomString ?>" readonly >
			<input type="text" class="form-control" id="activities_name" name="activities_name"  >
	</div>
	<div class="form-group col-md-3">
		<label for="activities_place">สถานที่จัดกิจกรรม</label>
			<select name="activities_place"  id="activities_place_id" class="form-control">
				<option value="0">--เลือกสถานที่--</option>
				<option value="Hall ชั้น 3">Hall ชั้น3</option>
				<option value="หอประชุมชั้นล่าง">หอประชุมชั้นล่าง</option>
				<option value="ลานหูกระจง">ลานหูกระจง</option>
				<option value="ห้อง auditorium">auditorium</option>
				<option value="หน้าตึก CP ALL Academy">หน้าตึก CP ALL Academy</option>
				<option value="ลานกิจกรรมชั้น L ตึก CP ALL Academy">ลานกิจกรรมชั้น L ตึก CP ALL Academy</option>
				<option value="สนามกีฬา">สนามกีฬา</option>
				<option value="ลานจอดรถหน้าสถาบัน">ลานจอดรถหน้าสถาบัน</option>
			</select>
	</div>
</div>

<div class="form-row">
	&nbsp;&nbsp;&nbsp; &nbsp;<div class="form-group col-md-2">
		<label for="activities_addstart">วันที่เพิ่มกิจกรรม</label>
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
		<input type="datetime" class="form-control" id="activities_addstart" name="activities_addstart" value="<?php echo DateThai(date("d-m-Y")) ?>"  readonly>
	</div>
	<div class="form-group col-md-1.5">
		<label for="activities_valueuser">จำนวนผู้เข้าร่วม</label>
			<input type="text" class="form-control" id="activities_valueuser" name="activities_valueuser" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" style="width:100px;" >
	</div>

	<div class="form-group col-md-1.5">
		<label for="activities_hour">ชั่วโมงกิจกรรม</label>
			<input type="text" class="form-control" id="activities_hour" name="activities_hour" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"  style="width:100px;" >
	</div>

	<div class="form-group col-md-2">
		<label for="activities_admin">ผู้ดูแลกิจกรรม</label>
			<select name="activities_admin" id="activities_admin" class="form-control">
				<option value="" select >--เลือกผู้ดูกิจกรรม--</option>
				<option value="พรศักดิ์ ปรีเลขา">พรศักดิ์ ปรีเลขา</option>
				<option value="อดิศร แขกซอง">อดิศร แขกซอง</option>
			</select>
	</div>

</div>

<div class="form-row">

	&nbsp;&nbsp;&nbsp; &nbsp;<div class="form-group col-md-8">
		<label for="activities_detail">รายละเอียดกิจกรรม</label>
			<textarea rows="4" cols="50" class="form-control" id="activities_detail" name="activities_detail"></textarea>
	</div>
</div>

<div class="form-row">
	&nbsp;&nbsp;&nbsp;&nbsp;<div class="form-group col-md-1.5">
		<label for="activities_startdate">วันที่จัดกิจกรรม</label>
			<input type="date" class="form-control" id="activities_startdate" name="activities_startdate" style="width:170px;">
	</div>
	<div class="form-group col-md-1.5">
		<label for="activities_enddate">สิ้นสุด</label>
			<input type="date" class="form-control" id="activities_enddate" name="activities_enddate" style="width:170px;">
	</div>
	<div class="form-group col-md-1.5">
		<label for="activities_starttime">เวลาที่เริ่ม</label>
			<input id="appt-time" type="time" class="form-control"  name="activities_starttime" value="08:30" style="width:100px;">

	</div>
	<div class="form-group col-md-1.5">
		<label for="activities_endtime">สิ้นสุด</label>
			<input type="time" class="form-control" id="activities_endtime" name="activities_endtime" style="width:100px;">
	</div>

</div>

	&nbsp;&nbsp;&nbsp; &nbsp;<button type="submit" class="btn btn-primary"  name="submit" id="submit" onclick="return confirm('คุณต้องการบันทึกกิจกรรมใช่หรือไม่ ?')"  >เพิ่มกิจกรรม</button>


</form>
&nbsp;&nbsp;&nbsp; &nbsp;
</td></tr></table>
	</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
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
</body>

</html>

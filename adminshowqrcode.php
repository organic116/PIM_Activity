<?php
session_save_path("session/");
session_start();
?>
<!DOCTYPE html>  <html>  <title>SYS2U Template</title>  <meta charset="UTF-8">  <meta name="viewport" content="width=device-width, initial-scale=1">  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">    <script src="http://www.sys2u.com/qrcode/jquery.min.js" type="text/javascript"></script>  <script src="http://www.sys2u.com/qrcode/jquery.qrcode.min.js" type="text/javascript"></script>    <style>  body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}                @page {                  size: A4;                  margin: 0;              }              @media print {                  html, body {                      width: 210mm;                      height: 297mm;                      margin-left: auto;                      margin-right: auto;                  }              }              @media screen {                  html, body {                      width: 800px;                  }              }              body              {                  padding: 5mm;                  margin:0;                  margin-left: auto;                  margin-right: auto;              }                #main-wrap {                  background-color: #fff;                  border: solid;                  border-width: 1px;                  display: inline-block;              }                  #main-wrap {                  overflow: hidden;                  width: 60%;              }                #leftside {                  display: inline-block;                  width: 50%;     }                #rightside {                  display: inline-block;                  width: 45%;              }       </style>  <body><div id="main-wrap">

 <header class="w3-container w3-red">
   <h4>บัตรเข้าร่วมกิจกรรม</h4>
 </header>


 <div id="leftside" class="w3-container w3-white">
   รหัสนักศึกษา :<?php echo $_SESSION["user_id"] ?>
   <br>
   ชื่อ : <b><?php echo $_SESSION["user_name"] ?></b>  <b><?php echo $_SESSION["user_lastname"] ?></b>
   <br><br><br>
 </div>

    <div id="rightside" class="w3-container w3-white" align="right">
        <div class="qrcode" id="5h6ii" ></div>
		 <img src="<?php echo  $_SESSION["user_imgqrcode"]; ?>" width="100"   alt="Voucher 1"      >

 </div>

 <footer class="w3-container w3-red">
   <h5>งานกิจกรรมนักศึกษา</h5>
<h5>สถาบันการจัดการปัญญาภิวัฒน์</h5>
 </footer>


</div></div> <!-- end of <div class="w3-row-padding"> -->
</body>
</html>

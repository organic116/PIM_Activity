<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Consignment Form</title>

    <!-- Icons font CSS-->
    <link href="colorlib-regform-2/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="colorlib-regform-2/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="colorlib-regform-2/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="colorlib-regform-2/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="colorlib-regform-2/css/main.css" rel="stylesheet" media="all">


</head>

<body>
<div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
    <div class="wrapper wrapper--w960">
        <div class="card card-2">
            <div class="card-heading"></div>
                <div class="card-body"><h2 class="title">Register Completed</h2>
<?php
function genuser($length = 4) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return "USR_".$randomString;
}

function genpass($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
<?php
$serverName = "localhost";
$username="id10717672_organic";
$password="Tanakorn1340";
$database="id10717672_dbactivities";

$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
mysqli_set_charset($objCon,"utf8");
if(trim($_POST["activities_id"]) == "")
{
echo "กรุณากรอกรหัสกิจกรรม!<br>";
echo "<a href=souvenir.php>Back</a>";
exit();
}

mysqli_query($objCon,"SET NAMES UTF8");

$strSQL = "SELECT * FROM tb_activities WHERE activities_id = '".trim($_POST['activities_id'])."' ";
$objQuery = mysqli_query($objCon,$strSQL);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
if($objResult)
{
echo "มีรหัสกิจกรรมนี้อยู่แล้ว!";
}
else
{
$user = genuser();
$pass = genpass();
mysqli_query($objCon,"SET NAMES UTF8");

$strSQL1 = "INSERT INTO tb_activities (user,pass,activities_id,activities_name) VALUES ('".$user."',
'".$pass."','".$_POST["activities_id"]."','".$_POST["activities_name"]."')";
$objQuery1 = mysqli_query($objCon,$strSQL1);



echo "Register Completed!<br>"."รหัส QR-CODE : ".$user."<br>รหัส QR-CODE : ".$pass."<br>QRCODE สำหรับข้าสู่ระบบ<br>";
$qrCode = "susaku.freetzi.com/projectz/ByQr.php?user=".$user."%26pass=".$pass;

?>
กรุณากดคลิกขวาเพื่อบันทึกรูปลงในเครื่องและนำไปอัพโหลดในกิจกรรมที่สร้างขึ้น
<?php
$qrcodelink = "https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=http%3A%2F%2F".$qrCode."&choe=UTF-8"
?>
<img src=<?php echo $qrcodelink ?>title="QRCode" name="qrcode" />
<form  name ="form1" method="post" action="saveQRcode.php">
<input type="hidden" value=<?php echo $qrcodelink; ?> name="qrcodelink" />
<input type="hidden" value=<?php echo $user ?> name = "user" />
<?php
echo "<input type=\"submit\" value = \"กลับหน้าหลัก\" />";

}
mysqli_close($objCon);
?>
</form>
            </div>
        </div>
    </div>
</div>
    <!-- Jquery JS-->
    <script src="colorlib-regform-2/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="colorlib-regform-2/vendor/select2/select2.min.js"></script>
    <script src="colorlib-regform-2/vendor/datepicker/moment.min.js"></script>
    <script src="colorlib-regform-2/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="colorlib-regform-2/js/global.js"></script>

</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->

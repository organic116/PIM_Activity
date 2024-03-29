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
<script language="JavaScript">
    function chkNumber(ele)
    {
        var vchar = String.fromCharCode(event.keyCode);
        if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
        ele.onKeyPress=vchar;
    }

    function not_number(e) {
        if(window.event){ // IE
            keynum = e.keyCode;
        }
        else if(e.which){ // Netscape/Firefox/Opera
            keynum = e.which;
        }
        if ((keynum== 13 || keynum== 110) && (keynum > 48) || (keynum< 57)) {
            event.returnValue = false;
            }
    }
</script>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">แบบฟอร์มในการขอฝากขาย</h2>
                    <form name ="form1" method="post" action="souvenir_register.php" >
                        <div class="form-group col-md-2">
                           <input type="text" class="form-control" id="activities_id" name="activities_id" >
                        </div>
                        <div class="row row-space">
                        </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="activities_name" name="activities_name" >
                                </div>

                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit">Confirm</button>
                            <button style="margin:0px 60px" class="btn btn--radius btn--green" type="cancel" onclick="window.location='login.php';return false;">Cancel</button>
                        </div>
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

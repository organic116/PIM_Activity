<!DOCTYPE html>
<html>
<title>PRINT VOUCHER</title>
<head>
    <script type="text/javascript">
        function VoucherSourcetoPrint(source) {
            return "<html><head><script>function step1(){\n" +
                    "setTimeout('step2()', 10);}\n" +
                    "function step2(){window.print();window.close()}\n" +
                    "</scri" + "pt></head><body onload='step1()'>\n" +
                    "<img src='" + source + "' /></body></html>";
        }
        function VoucherPrint(source) {
            Pagelink = "about:blank";
            var pwa = window.open(Pagelink, "_new");
            pwa.document.open();
            pwa.document.write(VoucherSourcetoPrint(source));
            pwa.document.close();
        }
    </script>
    <style type="text/css">
        .myButton
        {
            background-color: #77b55a;
            border: 1px solid #4b8f29;
            display: inline-block;
            cursor: pointer;
            color: #f0ebf0;
            font-family: arial;
            font-size: 13px;
            font-weight: bold;
			margin: 5px;
            padding: 7px 35px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div style="width: 400px; float: left;">
        <center>
            <span style="color: Blue; font-size: 30px;">Voucher 1</span>
        </center>
        <br />
        <img src="http://dreduardogong.contactme.ph/images/dr_eduardo_ongjpg.jpg" style="width: 400px; height: 200px;" alt="Voucher 1" />
        <center>
            <a href="#" onclick="VoucherPrint('http://dreduardogong.contactme.ph/images/dr_eduardo_ongjpg.jpg'); return false;" class="myButton">
                Print Voucher</a></center>
    </div>
    <div style="width: 30px; float: left;">
        &nbsp;</div>
    <div style="width: 400px; float: left;">
        <center>
            <span style="color: Blue; font-size: 30px;">Voucher 2</span>
        </center>
        <br />
        <img src="2.jpg" style="width: 400px; height: 200px;" alt="Voucher 2" />
        <center>
            <a href="#" onclick="VoucherPrint('2.jpg'); return false;" class="myButton">
                Print Voucher</a></center>
    </div>
    <div style="clear: both; height: 20px;">
    </div>
    <hr style="width: 830px; margin: 0;" />
    <div style="clear: both; height: 20px;">
    </div>
    <div style="width: 400px; float: left;">
        <center>
            <span style="color: Blue; font-size: 30px;">Voucher 3</span>
        </center>
        <br />
        <img src="3.jpg" style="width: 400px; height: 200px;" alt="Voucher 1" />
        <center>
            <a href="#" onclick="VoucherPrint('3.jpg'); return false;" class="myButton">
                Print Voucher</a></center>
    </div>
    <div style="width: 30px; float: left;">
        &nbsp;</div>
    <div style="width: 400px; float: left;">
        <center>
            <span style="color: Blue; font-size: 30px;">Voucher 4</span>
        </center>
        <br />
        <img src="4.jpg" style="width: 400px; height: 200px;" alt="Voucher 2" />
        <center>
            <a href="#" onclick="VoucherPrint('4.jpg'); return false;" class="myButton">
                Print Voucher</a></center>
    </div>
</body>

</html>

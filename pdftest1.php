<html>
<head>
<title>ThaiCreate.Com PHP PDF</title>
</head>
<body>
<?php
	require('fpdf.php');

	define('FPDF_FONTPATH','font/');

	class PDF extends FPDF
	{
		function Header(){

			$this->AddFont('angsa','','angsa.php');
			$this->SetFont('angsa','',15);
	 		$this->Cell(0,0,iconv( 'UTF-8','TIS-620','หน้าที่... '.$this->PageNo()),0,1,"R");
			$this->Image('myfile/logo.png',10,12,25,0,'');
			$this->Ln(15);


		}

		function Footer(){
			$this->AddFont('angsa','','angsa.php');
			$this->SetFont('angsa','',10);
			$this->SetY(-15);
	 		$this->Cell(0,0,iconv( 'UTF-8','TIS-620','งานกิจกรรม คณะวิศวกรรมศาสตร์และเทคโนโลยี '),0,1,"L");
			$this->Cell(0,0,iconv( 'UTF-8','TIS-620','Create date : '.date("Y-m-d")),0,1,"R");
		}

	}

	$pdf=new PDF('P','mm','A4');
	$pdf->SetMargins( 5,5,5 );
	$pdf->AddPage();
	$pdf->AddFont('cordiab','','cordiab.php');
	$pdf->SetFont('cordiab','',17);

$pdf->AliasNbPages();//จำนวนหน้าทั้งหมด
$pdf->Cell(0,10,iconv('UTF-8','TIS-620','ใบรับรองการเข้าร่วมกิจกรรมเสริมหลักสูตร'), 0 , 1 ,'C' );
$pdf->AddFont('angsa','','angsa.php');
$pdf->SetFont('angsa','',15);
$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620','สถาบันการจัดการปัญญาภิวัฒน์'),0,1,"C");
$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620','85/1 หมู่ 2 ถ.แจ้งวัฒนะ ต.บางตลาด อ.ปากเกร็ด จังหวัด นนทบุรี 11120'),0,1,"C");

$pdf->SetLeftMargin(5);
$pdf->Ln();
$pdf->Cell(0,7,iconv( 'UTF-8','cp874' , 'รหัสนักศึกษา :'),0,1,'L',$pdf->Cell(0,-7,iconv( 'UTF-8','cp874' , 'ชื่อ-สกุล :' ) , 0, 1,'C' ));
$pdf->Cell(0,7,iconv( 'UTF-8','cp874' , 'หลักสูตร :') , 0, 1 ,'L',$pdf->Cell(0,7,iconv( 'UTF-8','cp874' , 'คณะ : ' ) , 0, 1,'C' ),$pdf->Cell(0,-7,iconv( 'UTF-8','cp874' , 'พื้นที่ : นนทบุรี ' ) , 0, 1,'R' )  );
$pdf->Cell(0,8,iconv( 'UTF-8','cp874' , 'สาขาวิชา :' ) , 0, 1 ,'L');
$pdf->SetFillColor(240,231,155);
$pdf->Cell(200,7,iconv('UTF-8','TIS-620','กิจกรรม  '),1,0,'C',true);
$pdf->Ln();
$pdf->SetFillColor(224,235,255);
$pdf->Cell(80,7,iconv('UTF-8','TIS-620','ชือกิจกรรม'),1,0,'C',true);
$pdf->Cell(40,7,iconv('UTF-8','TIS-620','ปีการศึกษา'),1,0,'C',true);
$pdf->Cell(50,7,iconv('UTF-8','TIS-620','กลุ่ม'),1,0,'C',true);
$pdf->Cell(30,7,iconv('UTF-8','TIS-620','ชั่วโมง'),1,0,'C',true);
$pdf->Ln();

$pdf->SetLeftMargin( 108 );
$pdf->Ln(130);
$pdf->AddFont('cordiab','','cordiab.php');
$pdf->SetFont('cordiab','',9);
$pdf->SetFillColor(240,231,155);
$pdf->Cell(100,4,iconv('UTF-8','TIS-620','สรุปผลการเข้าร่วมกิจกรรม'),1,0,'C',true);
$pdf->Ln();
$pdf->SetFillColor(224,235,255);
$pdf->Cell(70,4,iconv('UTF-8','TIS-620','ประเภทกิจกรรม'),1,0,'C',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620','ครั้ง'),1,0,'C',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620','ชั่วโมง'),1,0,'C',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620','ผล'),1,0,'C',true);
$pdf->Ln();
$pdf->Cell(70,4,iconv('UTF-8','TIS-620','กิจกรรมบังคับ'),1,0,'L',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'L',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'L',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'L',true);
$pdf->Ln();
$pdf->Cell(70,4,iconv('UTF-8','TIS-620','กลุ่มกิจกรรมวิชาการและวิชาชีพ'),1,0,'L',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Ln();
$pdf->Cell(70,4,iconv('UTF-8','TIS-620','กลุ่มกิจกรรมกีฬาและนันทนาการ'),1,0,'L',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Ln();
$pdf->Cell(70,4,iconv('UTF-8','TIS-620','กลุ่มกิจกรรมบำเพ็ญประโยชน์ หรือรักษาสิ่งแวดล้อม'),1,0,'L',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Ln();
$pdf->Cell(70,4,iconv('UTF-8','TIS-620','กลุ่มกิจกรรมเสริมสร้างคุณธรรม จริยธรรม'),1,0,'L',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Ln();
$pdf->Cell(70,4,iconv('UTF-8','TIS-620','กลุ่มกิจกรรมอนุรักษ์ศิลปวัฒนธรรม'),1,0,'L',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Ln();
$pdf->Cell(70,4,iconv('UTF-8','TIS-620','กลุ่มกิจกรรมส่งเสริมคุณธรรมจริยธรรม'),1,0,'L',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Ln();
$pdf->Cell(70,4,iconv('UTF-8','TIS-620','กลุ่มกิจกรรมส่งเสริมทักษะพลเมืองและการปกครองระบอบประชาธิปไตย'),1,0,'L',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Ln();
$pdf->Cell(70,4,iconv('UTF-8','TIS-620','กิจกรรมสภานักศึกษา องค์การนักศึกษา'),1,0,'L',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Ln();
$pdf->Cell(70,4,iconv('UTF-8','TIS-620','กิจกรรมที่ร่วมกับหน่วยงานภายนอกสถาบัน'),1,0,'L',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Ln();
$pdf->Cell(70,4,iconv('UTF-8','TIS-620','การดำรงตำแหน่งในหน่วยงานกิจกรรมนักศึกษาและการเป็นสมาชิกชมรมกิจกรรมนักศึกษา'),1,0,'L',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Cell(10,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Ln();
$pdf->Cell(70,4,iconv('UTF-8','TIS-620','สรุปผลการเข้าร่วมกิจกรรม'),1,0,'L',true);
$pdf->Cell(30,4,iconv('UTF-8','TIS-620',''),1,0,'C',true);
$pdf->Ln();
$pdf->SetLeftMargin( 90 );


	$pdf->Output("MyPDF/MyPDF.pdf","F");
?>
	PDF Created Click <a href="MyPDF/MyPDF.pdf">here</a> to Download
</body>

</html>

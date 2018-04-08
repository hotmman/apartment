<?php  
include('..\hf\array.php');
include("../../../data/config.php");
require('..\fpdf\fpdf.php');
define('FPDF_FONTPATH','../fpdf/font/');

$pdf=new FPDF();		// สร้าง object ชื่อ pdf จากคลาส FPDF
$pdf->AddFont('regular','','angsa.php');  // เพิ่ม Font angsa ในรูปแบบปกติสำหรับใช้งาน
$pdf->AddPage();  	// การสร้างไฟล์เอกสาร PDF
$pdf->SetFont('regular','',16); 	// ใช้ Font angsa แบบปกติ ขนาด 16
$datem = date('m');
$datey = date('y');
$lastmonth = date('my', strtotime('-1 months'));
$datenow = date('my');
$day = date('j');
		// query ข้อมูล					 	
$page = 1 ;				// กำหนดบรรทัดเริ่มต้นแสดงข้อมูลในฐานข้อมูล
date_default_timezone_set('Asia/Bangkok');
for ($i=0; $i < 26 ; $i++) { 
    $sql = "SELECT table1.waterunit oldw ,table1.electricityunit olde,table2.waterunit ,table2.electricityunit ,table2.roomrate,table2.net,table2.total FROM a_$lastmonth table1,a_$datenow table2 WHERE table2.numroom=table1.numroom AND table2.numroom = $room[$i]";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $waterold = $row['oldw'];
        $electricityold= $row['olde'];
        $waternew= $row['waterunit'];
        $electricitynew= $row['electricityunit']; 
        $roomrate= $row['roomrate'];
        $net= $row['net'];
        $total= $row['total'];
        $pointw = $waternew-$waterold;
        $pointe = $electricitynew-$electricityold;
    }
    if ($net == '200'){
        $pnet = 1 ;
        }else{
        $pnet = 0 ;
        }
    $sql = "SELECT w ,e FROM unit WHERE id=1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $water=$row['w']; 
        $entro=$row['e'];
    }
    //------------------------------------------------------------------------
    if ($page == 1){ 
        $line = 0 ;
          //PDF
        $pdf->SetFont('regular','',30);
        $pdf->Text(85,16+$line,iconv( 'UTF-8','TIS-620','ใบเสร็จรับเงิน'));
        $pdf->SetFont('regular','',27);
        $pdf->Text(12,33+$line,iconv( 'UTF-8','TIS-620','เลขที่ห้อง'));
        $pdf->Text(40,33+$line,iconv( 'UTF-8','TIS-620',$room[$i]));
		$pdf->Text(145,33+$line,iconv( 'UTF-8','TIS-620',date(" j ")));
	    $pdf->Text(155,33+$line,iconv( 'UTF-8','TIS-620',$strMonthCut[date("m")-1]));
	    $pdf->Text(170,33+$line,iconv( 'UTF-8','TIS-620',date("Y")+543));
	    $pdf->SetFont('regular','',18);
	    $pdf->Text(10,55+$line,iconv( 'UTF-8','TIS-620','ลำดับ'));
	    $pdf->Text(36,55+$line,iconv( 'UTF-8','TIS-620','รายการ'));
	    $pdf->Text(62,55+$line,iconv( 'UTF-8','TIS-620','ราคาต่อหน่วย'));
	    $pdf->Text(95,50+$line,iconv( 'UTF-8','TIS-620','เลขมิเตอร์'));
        $pdf->Text(123,50+$line,iconv( 'UTF-8','TIS-620','เลขมิเตอร์'));
        $pdf->SetFont('regular','',14);
        $pdf->Text(93,55+$line,iconv( 'UTF-8','TIS-620','29'));
        $pdf->Text(99,55+$line,iconv( 'UTF-8','TIS-620',$strMonthCut[date("m")-2]));
        $pdf->Text(106,55+$line,iconv( 'UTF-8','TIS-620',date("Y")+543));
        
        $pdf->Text(121,55+$line,iconv( 'UTF-8','TIS-620',date(" j ")));
        $pdf->Text(127,55+$line,iconv( 'UTF-8','TIS-620',$strMonthCut[date("m")-1]));
        $pdf->Text(134,55+$line,iconv( 'UTF-8','TIS-620',date("Y")+543));
        $pdf->SetFont('regular','',18);
        $pdf->Text(152,55+$line,iconv( 'UTF-8','TIS-620','จำนวนที่ใช้'));
        $pdf->Text(183,55+$line,iconv( 'UTF-8','TIS-620','รวมเงิน')); 	// พิมพ์ชื่อรายงาน
    $pdf->Line(5,56+$line,205,56+$line);
        $pdf->Text(13,65+$line,iconv( 'UTF-8','TIS-620','1'));
        $pdf->Text(30,65+$line,iconv( 'UTF-8','TIS-620','ค่าเช้าห้อง'));

        $pdf->Text(68,65+$line,iconv( 'UTF-8','TIS-620',$roomrate));
        $pdf->Text(160,65+$line,iconv( 'UTF-8','TIS-620','1'));
        $pdf->Text(187,65+$line,iconv( 'UTF-8','TIS-620',$roomrate));
    $pdf->Line(5,66+$line,205,66+$line);
        $pdf->Text(13,75+$line,iconv( 'UTF-8','TIS-620','2'));
        $pdf->Text(30,75+$line,iconv( 'UTF-8','TIS-620','ค่าน้ำ'));
        $pdf->Text(68,75+$line,iconv( 'UTF-8','TIS-620',$water));
        $pdf->Text(97,75+$line,iconv( 'UTF-8','TIS-620',$waterold));
        $pdf->Text(126,75+$line,iconv( 'UTF-8','TIS-620',$waternew));
        $pdf->Text(160,75+$line,iconv( 'UTF-8','TIS-620',$pointw));
        $pdf->Text(187,75+$line,iconv( 'UTF-8','TIS-620',$pointw*$water));
    $pdf->Line(5,76+$line,205,76+$line);
        $pdf->Text(13,85+$line,iconv( 'UTF-8','TIS-620','3'));
        $pdf->Text(30,85+$line,iconv( 'UTF-8','TIS-620','ค่าไฟ'));
        $pdf->Text(68,85+$line,iconv( 'UTF-8','TIS-620',$entro));
        $pdf->Text(97,85+$line,iconv( 'UTF-8','TIS-620',$electricityold));
        $pdf->Text(126,85+$line,iconv( 'UTF-8','TIS-620',$electricitynew));
        $pdf->Text(160,85+$line,iconv( 'UTF-8','TIS-620',$pointe));
        $pdf->Text(187,85+$line,iconv( 'UTF-8','TIS-620',$pointe*$entro));

        $pdf->Line(5,86+$line,205,86+$line);
        $pdf->Text(13,95+$line,iconv( 'UTF-8','TIS-620','4'));
        $pdf->Text(30,95+$line,iconv( 'UTF-8','TIS-620','ค่าขยะ'));
        $pdf->Text(68,95+$line,iconv( 'UTF-8','TIS-620','20'));
        $pdf->Text(160,95+$line,iconv( 'UTF-8','TIS-620','1'));
        $pdf->Text(187,95+$line,iconv( 'UTF-8','TIS-620','20'));
    $pdf->Line(5,96+$line,205,96+$line);
        $pdf->Text(13,105+$line,iconv( 'UTF-8','TIS-620','5'));
        $pdf->Text(30,105+$line,iconv( 'UTF-8','TIS-620','ค่าอินเตอร์เน็ต'));
        $pdf->Text(68,105+$line,iconv( 'UTF-8','TIS-620','200'));
        $pdf->Text(160,105+$line,iconv( 'UTF-8','TIS-620',$net));
        $pdf->Text(187,105+$line,iconv( 'UTF-8','TIS-620',$net));
    $pdf->Line(5,106+$line,205,106+$line);
    $pdf->SetFont('regular','',30);
    $pdf->Text(150,120+$line,iconv( 'UTF-8','TIS-620','รวมเงิน'));
    $pdf->SetFont('regular','',40);
    $pdf->Text(182,120+$line,iconv( 'UTF-8','TIS-620',$total));
    
    $pdf->SetFont('regular','',16);
    $pdf->Text(35,135+$line,iconv( 'UTF-8','TIS-620','ผู้รับเงิน............................'));
    $pdf->Text(110,135+$line,iconv( 'UTF-8','TIS-620','วันที่...........................'));
    
    $pdf->Line(45,148.5+$line,65,148.5+$line);
    $page = $page +1 ;
    }else{
        
    $line = 148.5 ;
    
    $pdf->SetFont('regular','',30);
    $pdf->Text(85,16+$line,iconv( 'UTF-8','TIS-620','ใบเสร็จรับเงิน'));
    $pdf->SetFont('regular','',27);
    $pdf->Text(12,33+$line,iconv( 'UTF-8','TIS-620','เลขที่ห้อง'));
    $pdf->Text(40,33+$line,iconv( 'UTF-8','TIS-620',$room[$i]));
    $pdf->Text(145,33+$line,iconv( 'UTF-8','TIS-620',date(" j ")));
    $pdf->Text(155,33+$line,iconv( 'UTF-8','TIS-620',$strMonthCut[date("m")-1]));
    $pdf->Text(170,33+$line,iconv( 'UTF-8','TIS-620',date("Y")+543));
    $pdf->SetFont('regular','',18);
    $pdf->Text(10,55+$line,iconv( 'UTF-8','TIS-620','ลำดับ'));
    $pdf->Text(36,55+$line,iconv( 'UTF-8','TIS-620','รายการ'));
    $pdf->Text(62,55+$line,iconv( 'UTF-8','TIS-620','ราคาต่อหน่วย'));
    $pdf->Text(95,50+$line,iconv( 'UTF-8','TIS-620','เลขมิเตอร์'));
    $pdf->Text(123,50+$line,iconv( 'UTF-8','TIS-620','เลขมิเตอร์'));
    $pdf->SetFont('regular','',14);
    $pdf->Text(93,55+$line,iconv( 'UTF-8','TIS-620','29'));
    $pdf->Text(99,55+$line,iconv( 'UTF-8','TIS-620',$strMonthCut[date("m")-2]));
    $pdf->Text(106,55+$line,iconv( 'UTF-8','TIS-620',date("Y")+543));
    
    $pdf->Text(121,55+$line,iconv( 'UTF-8','TIS-620',date(" j ")));
    $pdf->Text(127,55+$line,iconv( 'UTF-8','TIS-620',$strMonthCut[date("m")-1]));
    $pdf->Text(134,55+$line,iconv( 'UTF-8','TIS-620',date("Y")+543));
    $pdf->SetFont('regular','',18);
    $pdf->Text(152,55+$line,iconv( 'UTF-8','TIS-620','จำนวนที่ใช้'));
    $pdf->Text(183,55+$line,iconv( 'UTF-8','TIS-620','รวมเงิน')); 	// พิมพ์ชื่อรายงาน
$pdf->Line(5,56+$line,205,56+$line);
    $pdf->Text(13,65+$line,iconv( 'UTF-8','TIS-620','1'));
    $pdf->Text(30,65+$line,iconv( 'UTF-8','TIS-620','ค่าเช้าห้อง'));

    $pdf->Text(68,65+$line,iconv( 'UTF-8','TIS-620',$roomrate));
    $pdf->Text(160,65+$line,iconv( 'UTF-8','TIS-620','1'));
    $pdf->Text(187,65+$line,iconv( 'UTF-8','TIS-620',$roomrate));
$pdf->Line(5,66+$line,205,66+$line);
    $pdf->Text(13,75+$line,iconv( 'UTF-8','TIS-620','2'));
    $pdf->Text(30,75+$line,iconv( 'UTF-8','TIS-620','ค่าน้ำ'));
    $pdf->Text(68,75+$line,iconv( 'UTF-8','TIS-620',$water));
    $pdf->Text(97,75+$line,iconv( 'UTF-8','TIS-620',$waterold));
    $pdf->Text(126,75+$line,iconv( 'UTF-8','TIS-620',$waternew));
    $pdf->Text(160,75+$line,iconv( 'UTF-8','TIS-620',$pointw));
    $pdf->Text(187,75+$line,iconv( 'UTF-8','TIS-620',$pointw*$water));
$pdf->Line(5,76+$line,205,76+$line);
    $pdf->Text(13,85+$line,iconv( 'UTF-8','TIS-620','3'));
    $pdf->Text(30,85+$line,iconv( 'UTF-8','TIS-620','ค่าไฟ'));
    $pdf->Text(68,85+$line,iconv( 'UTF-8','TIS-620',$entro));
    $pdf->Text(97,85+$line,iconv( 'UTF-8','TIS-620',$electricityold));
    $pdf->Text(126,85+$line,iconv( 'UTF-8','TIS-620',$electricitynew));
    $pdf->Text(160,85+$line,iconv( 'UTF-8','TIS-620',$pointe));
    $pdf->Text(187,85+$line,iconv( 'UTF-8','TIS-620',$pointe*$entro));

    $pdf->Line(5,86+$line,205,86+$line);
    $pdf->Text(13,95+$line,iconv( 'UTF-8','TIS-620','4'));
    $pdf->Text(30,95+$line,iconv( 'UTF-8','TIS-620','ค่าขยะ'));
    $pdf->Text(68,95+$line,iconv( 'UTF-8','TIS-620','20'));
    $pdf->Text(160,95+$line,iconv( 'UTF-8','TIS-620','1'));
    $pdf->Text(187,95+$line,iconv( 'UTF-8','TIS-620','20'));
$pdf->Line(5,96+$line,205,96+$line);
    $pdf->Text(13,105+$line,iconv( 'UTF-8','TIS-620','5'));
    $pdf->Text(30,105+$line,iconv( 'UTF-8','TIS-620','ค่าอินเตอร์เน็ต'));
    $pdf->Text(68,105+$line,iconv( 'UTF-8','TIS-620','200'));
    $pdf->Text(160,105+$line,iconv( 'UTF-8','TIS-620',$net));
    $pdf->Text(187,105+$line,iconv( 'UTF-8','TIS-620',$net));
$pdf->Line(5,106+$line,205,106+$line);
$pdf->SetFont('regular','',30);
$pdf->Text(150,120+$line,iconv( 'UTF-8','TIS-620','รวมเงิน'));
$pdf->SetFont('regular','',40);
$pdf->Text(182,120+$line,iconv( 'UTF-8','TIS-620',$total));

$pdf->SetFont('regular','',16);
$pdf->Text(35,135+$line,iconv( 'UTF-8','TIS-620','ผู้รับเงิน............................'));
$pdf->Text(110,135+$line,iconv( 'UTF-8','TIS-620','วันที่...........................'));

$pdf->Line(45,148.5+$line,65,148.5+$line);
    if($i!=25){
    $pdf->AddPage();
    }
    $page = $page -1 ;
    }



}
$pdf->Output("keep/1.pdf","F");
$pdf->Output();  
?>   

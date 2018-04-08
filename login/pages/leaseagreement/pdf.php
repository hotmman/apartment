<?php  
require('..\fpdf\fpdf.php');

    define('FPDF_FONTPATH','../fpdf/font/');
    $t_name = $_GET['t_name'];
    $id = $_GET['id'];
    $f_name = $_GET['name'];
    $l_name = $_GET['l_name'];
    $day = 1;
    $month = $_GET['month'];
    $year = $_GET['year'];
    $a_1 = $_GET['a_1'];
    $a_2 = $_GET['a_2'];
    $a_3 = $_GET['a_3'];
    $a_4 = $_GET['a_4'];
    $a_5 = $_GET['a_5'];
    $a_6 = $_GET['a_6'];
    if($t_name =="" or $f_name =="" or $l_name =="" or $a_1 =="" or $a_2 =="" or $a_3 =="" or $a_4 =="" or $a_5 =="" or $a_6 ==""){
        echo "<script language=\"JavaScript\">";
        echo "alert('กรุณากรอกข้อมูลให้ครบถ้วน');";
        echo "window.location.href = 'index.php?id=".$id."'";
        echo "</script>";
        echo "<script language='javascript'>";
    //     ob_start();
    //     $ht = "Location:index.php?id=".$id;
    //     echo $ht;
    // header('Location:index.php?id='.$id);
    // ob_end_flush();
    }
    $name = $t_name." ".$f_name."  ".$l_name;
    $roomprice = $_GET['roomprice'];
    $roomnumber = $_GET['roomnum'];
    if(strlen($roomnumber)==3){
    $building = 1;
    $floor = substr($roomnumber,0,1) ;
    }else{
    $building = substr($roomnumber,0,1);
    $floor = substr($roomnumber,1,1) ;
    }
    $en_price = 8;
    $wa_price = 20;
    $thainumber=array("ศูนย์","หนึ่ง","สอง","สาม","สี่","ห้า","หก","เจ็ด","แปด","เก้า");
    $num1 = $thainumber[substr($roomprice,0,1)];
    $num2 = $thainumber[substr($roomprice,1,1)];
    $num1_1 = substr($roomprice,0,1);
    $num2_all = substr($roomprice,1,4);
    $priceprint =$num1_1.",".$num2_all." บาท ("."$num1"."พัน"."$num2"."ร้อยบาทถ้วน)";
	$pdf=new FPDF();
    $pdf->AddPage();
    $pdf->Image('from/1.jpg',0,0,210);
    $pdf->AddFont('angsa','','angsa.php');
    $pdf->AddFont('cordia','','cordia.php');
    $pdf->SetFont('cordia','',22);
    $pdf->Text(125,58.5,iconv( 'UTF-8','TIS-620',$day));
    $pdf->Text(143.5,58.5,iconv( 'UTF-8','TIS-620',$month));
    $pdf->Text(180,58.5,iconv( 'UTF-8','TIS-620',$year));
    $pdf->SetFont('cordia','',20);
    $pdf->Text(84,83.5,iconv( 'UTF-8','TIS-620',$name));
    $pdf->Text(44,93.25,iconv( 'UTF-8','TIS-620',$a_1));
    $pdf->Text(67,93.25,iconv( 'UTF-8','TIS-620',$a_2));
    $pdf->Text(86,93.25,iconv( 'UTF-8','TIS-620',$a_3));
    $pdf->Text(145,93.25,iconv( 'UTF-8','TIS-620',$a_4));
    $pdf->Text(42,103,iconv( 'UTF-8','TIS-620',$a_5));
    $pdf->Text(97,103,iconv( 'UTF-8','TIS-620',$a_6));
    $pdf->Text(144,126.25,iconv( 'UTF-8','TIS-620',$roomnumber));
    $pdf->Text(161,126.25,iconv( 'UTF-8','TIS-620',$floor));
    $pdf->Text(169,126.25,iconv( 'UTF-8','TIS-620',$building));
    $pdf->Text(57,136,iconv( 'UTF-8','TIS-620',$day));
    $pdf->Text(73,136,iconv( 'UTF-8','TIS-620',$month));
    $pdf->Text(109,136,iconv( 'UTF-8','TIS-620',$year));
    $pdf->Text(19.5,183,iconv( 'UTF-8','TIS-620',$priceprint));
    $pdf->Text(26,250.5,iconv( 'UTF-8','TIS-620',$en_price));
    $pdf->Text(116,241,iconv( 'UTF-8','TIS-620',$wa_price));
    $pdf->AddPage();
    $pdf->Image('from/2.jpg',0,0,210);
    $pdf->Text(26,238,iconv( 'UTF-8','TIS-620',"( ".$name." )"));
    $pdf->Output("keepData/$roomnumber.pdf","F");
    $pdf->Output();
?>   

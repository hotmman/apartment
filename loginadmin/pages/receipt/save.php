<?php
include('..\hf\array.php');
include("../../../data/config.php");
$lastmonth = date('my', strtotime('-1 months'));
$datenow = date('my');
$id = $_GET['id'];
for ($i=0; $i < 26; $i++) { 

    $lastmonth = date('my', strtotime('-1 months'));
    $roomrate = $_GET['p_room_'.$room[$i]];
    $net = $_GET['net_room_'.$room[$i]];
    $wunit = $_GET['w_room_'.$room[$i]];
    $eunit = $_GET['e_room_'.$room[$i]];
    $sql = "SELECT waterunit ,electricityunit FROM a_$lastmonth WHERE numroom=$room[$i]";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
       $row = $result->fetch_assoc();
       $lastwater = $row['waterunit'];
       $lastele = $row['electricityunit'];
    }

    $sql = "SELECT w ,e FROM unit WHERE id=1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      
       $row = $result->fetch_assoc();
       $p_unit_w = $row['w'];
       $p_unit_e = $row['e'];
    }
    $unitw = $wunit-$lastwater;
    $unite = $eunit-$lastele;
    $total = $roomrate+$net+20+($unitw*$p_unit_w)+($unite*$p_unit_e);



    $sql = "UPDATE a_$datenow SET roomrate='$roomrate',waterunit='$wunit',electricityunit='$eunit',net='$net', total='$total' WHERE numroom=$room[$i]";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
 
}
echo "<script language=\"JavaScript\">";
echo "alert('บันทึกสำเร็จ');";
echo "window.location.href = 'index.php?id=".$id."'";
echo "</script>";
echo "<script language='javascript'>";
?>
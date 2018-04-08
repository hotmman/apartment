<?php

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname="new_dormitory";
// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
$datenow = date('my');
// $lastmonth = date('my', strtotime('-1 months'));
$lastmonth = '0218';


// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 
// mysqli_query($conn, "SET NAMES UTF8");
$room=array("101","102","103","104","105","106","107","201","202","203","204","205","206","207","2101","2102","2103","2104","2105","2106","2201","2202","2203","2204","2205","2206");
$sql = "show tables";
$result = $conn->query($sql);
$check =false;
if ($result->num_rows > 0) {
    // if(){
        while($row = $result->fetch_assoc()) {
            $name_data = $row["Tables_in_new_dormitory"];
            if ($name_data=="a_$datenow"){
                $check =true;
                break;
            }else{
            }
        }
        if($check==true){
        }else{
        $sql = "CREATE TABLE  `a_$datenow` (
            `id` INT NULL AUTO_INCREMENT PRIMARY KEY ,
            `numroom` VARCHAR( 4 ) NOT NULL ,
            `roomrate` VARCHAR( 4 ) NOT NULL ,
            `waterunit` TEXT NOT NULL ,
            `electricityunit` TEXT NOT NULL ,
            `net` VARCHAR( 3 ) NOT NULL ,
            `total` VARCHAR( 4 ) NOT NULL,
            FOREIGN KEY (id) REFERENCES a_$lastmonth(id)
           )ENGINE = MYISAM ";
          if ($conn->query($sql) === TRUE) {
        } else {
            echo "Error creating table: " . $conn->error;
        }
        
        $sql = "INSERT INTO a_$datenow (numroom,roomrate, net) SELECT numroom, roomrate, net FROM a_$lastmonth";
          if ($conn->query($sql) === TRUE) {
        } else {
            echo "Error creating table: " . $conn->error;
        }

        }
}else{
    
}


mysqli_close($conn);
?>
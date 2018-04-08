

<?php  //Start the Session
session_start();
require("data/config.php");
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_GET['username']) and isset($_GET['password'])){
//3.1.1 Assigning posted values to variables.
$username = $_GET['username'];
$password = $_GET['password'];
if($username==""||$password==""){
echo "<script language=\"JavaScript\">";
echo "alert('กรุณากรอกข้อมูลให้ครบทุกช่อง');";
echo "window.location.href = 'index.html'";
echo "</script>";
echo "<script language='javascript'>";
}
//3.1.2 Checking the values are existing in the database or not
$sql = "SELECT USERNAME,PASSWORD,STATUS,ID FROM `user` WHERE USERNAME='$username' and PASSWORD='$password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row["ID"];
    echo $id;
    if($row["STATUS"]==1 ){
        ob_start();
        $ht = "Location:login/pages/index/index.php?id=".$id;
        echo $ht;
    header('Location:login/pages/index/index.php?id='.$id);
    ob_end_flush();
//     echo "<script language='javascript'>
//     window.location.href = 'login/index.php?id=".$row['ID']."
// </script>";	
    }elseif($row["STATUS"]==2){
        ob_start();
        $ht = "Location:loginadmin/pages/index/index.php?id=".$id;
        echo $ht;
    header('Location:loginadmin/pages/index/index.php?id='.$id);
    ob_end_flush();
    }else{
        echo "<script language=\"JavaScript\">";
        echo "alert('Login ผิดพลาด โปรดลองใหม่อีกครั้ง');";
        echo "window.location.href = 'index.html'";
        echo "</script>";
        echo "<script language='javascript'>";
    }
}else{
    
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
 echo "<script language=\"JavaScript\">";
echo "alert('Login ผิดพลาด โปรดลองใหม่อีกครั้ง');";
echo "window.location.href = 'index.html'";
echo "</script>";
echo "<script language='javascript'>";
}
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.

}
//3.1.4 if the user is logged in Greets the user with message

?>
<?php
include("../../../data/config.php");
$id =$_GET['id'];
switch ($_GET['signup']) {
    case "Add":
    if ($_GET['txt_user_add']!="" and $_GET['txt_pass_add']!="" and $_GET['txt_title_add']!="" and $_GET['txt_name_add']!="" and $_GET['txt_surname_add']!="" and $_GET['status_add']!="") {
        $date = date('Y-m-d');
        $txt_user_add = $_GET['txt_user_add'];
        $txt_pass_add = $_GET['txt_pass_add'];
        $txt_title_add = $_GET['txt_title_add'];
        $txt_name_add = $_GET['txt_name_add'];
        $txt_surname_add = $_GET['txt_surname_add'];
        $status_add = $_GET['status_add'];
        $sql = "INSERT INTO `user`(`NAME_TITLE`, `NAME`, `LASTNAME`, `USERNAME`, `PASSWORD`,`DATE_CHECKIN`, `STATUS`) VALUES ('$txt_title_add','$txt_name_add','$txt_surname_add','$txt_user_add','$txt_pass_add','$date','$status_add')";

        if ($conn->query($sql) === TRUE) {
            echo "<script language=\"JavaScript\">";
            echo "alert('เพิ่มรายการสำเร็จ');";
            echo "window.location.href = 'index.php?id=".$id."'";
            echo "</script>";
            echo "<script language='javascript'>";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    } else {
        echo "<script language=\"JavaScript\">";
        echo "alert('กรุณากรอกข้อมูลให้ครบถ้วน');";
        echo "window.location.href = 'index.php?id=".$id."'";
        echo "</script>";
        echo "<script language='javascript'>";
    }
        break;
    case "RePassword":
    if ($_GET['txt_id_edit']!="") {
        $getid = $_GET['txt_id_edit'];
        $sql = "UPDATE user SET PASSWORD='123456' WHERE ID=$getid";

        if ($conn->query($sql) === TRUE) {
            echo "<script language=\"JavaScript\">";
            echo "alert('Repassword สำเร็จ');";
            echo "window.location.href = 'index.php?id=".$id."'";
            echo "</script>";
            echo "<script language='javascript'>";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    } else {
        echo "<script language=\"JavaScript\">";
        echo "alert('กรุณากรอกข้อมูลให้ครบถ้วน');";
        echo "window.location.href = 'index.php?id=".$id."'";
        echo "</script>";
        echo "<script language='javascript'>";
    }
        break;
    case "Edit":
    if ($_GET['txt_id_edit']!="") {
        $getid = $_GET['txt_id_edit'];
        $getstatus = $_GET['edit_status'];
        $sql = "UPDATE user SET STATUS='$getstatus' WHERE ID=$getid";

        if ($conn->query($sql) === TRUE) {
            echo "<script language=\"JavaScript\">";
            echo "alert('Status Update สำเร็จ');";
            echo "window.location.href = 'index.php?id=".$id."'";
            echo "</script>";
            echo "<script language='javascript'>";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    } else {
        echo "<script language=\"JavaScript\">";
        echo "alert('กรุณากรอกข้อมูลให้ครบถ้วน');";
        echo "window.location.href = 'index.php?id=".$id."'";
        echo "</script>";
        echo "<script language='javascript'>";
    }
        break;
    case "Del":
        if ($_GET['txt_id_del']!="") {
            $getid = $_GET['txt_id_del'];
            $sql = "DELETE FROM user WHERE ID=$getid";

            if ($conn->query($sql) === TRUE) {
                echo "<script language=\"JavaScript\">";
                echo "alert('ลบสำเร็จ');";
                echo "window.location.href = 'index.php?id=".$id."'";
                echo "</script>";
                echo "<script language='javascript'>";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
        } else {
            echo "<script language=\"JavaScript\">";
            echo "alert('กรุณากรอกข้อมูลให้ครบถ้วน');";
            echo "window.location.href = 'index.php?id=".$id."'";
            echo "</script>";
            echo "<script language='javascript'>";
        }
        
        break;
    default:
        echo "Your favorite color is neither red, blue, nor green!";
}
?>
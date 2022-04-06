<?php 

include 'config.php';

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

if ($_SESSION['status']="user") {
    header("Location: form_user.php");
} else if ($_SESSION['status']="admin"){
    header("Location: form_admin.php");
}
?>


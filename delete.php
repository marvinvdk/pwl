<?php
//including the database connection file
include("config.php");
session_start();

if ($_SESSION['status']=="user") {
    header("Location: form_user.php");
}

//getting id of the data from url
$kode_barang = $_GET['kode_barang'];

//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM barang WHERE kode_barang=$kode_barang");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>


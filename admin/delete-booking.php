<?php
session_start();
include_once 'include/connection.php';
$id=$_GET['id'];
//echo $id;
$sql = "DELETE FROM booking WHERE bid= $id";
if(mysqli_query($conn, $sql)){
    $_SESSION['success'] = "Booking Record Deleted";
    header('location: list-booking.php');
}
mysqli_close($conn);
?>
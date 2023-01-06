<?php
session_start();
include_once 'include/connection.php';
$id=$_GET['id'];
//echo $id;
$sql = "DELETE FROM rooms WHERE roomId= $id";
if(mysqli_query($conn, $sql)){
    $_SESSION['success'] = "Room Record Deleted";
    header('location: list-rooms.php');
}
mysqli_close($conn);
?>
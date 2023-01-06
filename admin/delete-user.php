<?php
session_start();
include_once 'include/connection.php';
$id=$_GET['id'];
//echo $id;
$sql = "DELETE FROM users WHERE id= $id";
if(mysqli_query($conn, $sql)){
    $_SESSION['success'] = "User Record Deleted";
    header('location: list-user.php');
}
mysqli_close($conn);
?>
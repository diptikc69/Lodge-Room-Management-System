<?php

include_once 'include/connection.php';
session_start();
$id=$_GET['id'];
//echo $id;
$sql = "DELETE FROM ldg_customer WHERE id= $id";
if(mysqli_query($conn, $sql)){
    $_SESSION['success'] = "Customer Record Deleted.";
    header('location: list-customer.php');
}
mysqli_close($conn);
?>
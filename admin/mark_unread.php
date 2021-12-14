<?php
session_start();

include("db.php");

$id = $_GET['id'];


$query = "UPDATE users SET read_status = 0 WHERE id = $id";


if(mysqli_query($conn, $query)) {
    // $_SESSION['deleted_successfully'] = "Deleted";
    header('location: users.php');
}



?>
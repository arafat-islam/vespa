<?php
session_start();

include("db.php");

$id = $_GET['id'];


$query = "UPDATE users SET delete_status = 0 WHERE id = $id";


if(mysqli_query($conn, $query)) {
    $_SESSION['restored_success'] = "Restored Successfully!";
    header('location: trash_users.php');
}



?>
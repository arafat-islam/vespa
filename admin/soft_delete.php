<?php
session_start();

include("db.php");

$id = $_GET['id'];


$query = "UPDATE users SET delete_status = 1 WHERE id = $id";


if(mysqli_query($conn, $query)) {
    $_SESSION['moved_to_trash'] = "Moved To Trash!";
    header('location: users.php');
}



?>
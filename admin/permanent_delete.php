<?php
session_start();

include("db.php");

$id = $_GET['id'];

$select_img = "SELECT profile_photo FROM users WHERE id = $id";

$get_image = mysqli_query($conn, $select_img);

$image = mysqli_fetch_assoc($get_image);


$delete_path = "./uploads/images/" . $image['profile_photo'];

unlink($delete_path);


$query = "DELETE FROM users WHERE id = $id";




if(mysqli_query($conn, $query)) {
    $_SESSION['permanent_delete'] = "Permanently Deleted!";
    header('location: trash_users.php');
}



?>
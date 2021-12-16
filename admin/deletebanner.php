<?php
session_start();
    include "../config/config.php";
    include "../lib/Database.php";
    include "../lib/Session.php";

    $db = new Database();
?>
<?php


if(Session::get('userid') == $row['id'] || (Session::get('role') == 0) || (Session::get('userid') == $row['userId'])) {



$id = $_GET['id'];


$query = "DELETE FROM banners WHERE id = $id";


if($db->delete($query)) {
    $_SESSION['banner_deleted'] = "Banner Deleted!";
    header('location: banners.php');
}

} else {
    header("location: banners.php");
}

?>
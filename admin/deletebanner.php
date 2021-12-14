<?php
session_start();
    include "../config/config.php";
    include "../lib/Database.php";

    $db = new Database();
?>
<?php

$id = $_GET['id'];


$query = "DELETE FROM banners WHERE id = $id";


if($db->delete($query)) {
    $_SESSION['banner_deleted'] = "Banner Deleted!";
    header('location: banners.php');
}



?>
<?php
session_start();
    include "../config/config.php";
    include "../lib/Database.php";

    $db = new Database();
?>
<?php

$id = $_GET['id'];


$query = "DELETE FROM news WHERE id = $id";


if($db->delete($query)) {
    $_SESSION['news_deleted'] = "News Deleted!";
    header('location: news.php');
}



?>
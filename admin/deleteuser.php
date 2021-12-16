<?php
session_start();
    include "../config/config.php";
    include "../lib/Database.php";

    $db = new Database();
?>
<?php

$id = $_GET['id'];


$query = "DELETE FROM users WHERE id = $id";


if($db->delete($query)) {
    $_SESSION['user_deleted'] = "User Deleted!";
    header('location: users.php');
}



?>
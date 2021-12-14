<?php
session_start();
    include "../config/config.php";
    include "../lib/Database.php";

    $db = new Database();
?>
<?php

$id = $_GET['id'];


$query = "DELETE FROM skill WHERE id = $id";


if($db->delete($query)) {
    $_SESSION['skill_deleted'] = "Trust Deleted!";
    header('location: skill.php');
}



?>
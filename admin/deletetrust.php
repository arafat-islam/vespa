<?php
session_start();
    include "../config/config.php";
    include "../lib/Database.php";

    $db = new Database();
?>
<?php

$id = $_GET['id'];


$query = "DELETE FROM trust WHERE id = $id";


if($db->delete($query)) {
    $_SESSION['trust_deleted'] = "Trust Deleted!";
    header('location: trust.php');
}



?>
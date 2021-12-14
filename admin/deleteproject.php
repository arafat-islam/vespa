<?php
session_start();
    include "../config/config.php";
    include "../lib/Database.php";

    $db = new Database();
?>
<?php

$id = $_GET['id'];


$query = "DELETE FROM projects WHERE id = $id";


if($db->delete($query)) {
    $_SESSION['projects_deleted'] = "projects Deleted!";
    header('location: projects.php');
}



?>
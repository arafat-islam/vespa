<?php
session_start();
    include "../config/config.php";
    include "../lib/Database.php";

    $db = new Database();
?>
<?php

$id = $_GET['id'];


$select = "SELECT * FROM logo WHERE status = 1";

if($post = $db->select($select)) {
    $result = $post->fetch_assoc();

    $oldId = $result['id'];

    if($oldId == $id) {
        $_SESSION['active_logo'] = "Cannot Delete Active Logo Deleted!";
        header('location: logo.php');
    } else {
        $query = "DELETE FROM logo WHERE id = $id";


        if($db->delete($query)) {
            $_SESSION['logo_deleted'] = "Logo Deleted!";
            header('location: logo.php');
        }
        
    }


}


?>
<?php
session_start();
    include "../config/config.php";
    include "../lib/Database.php";

    $db = new Database();
?>
<?php

$id = $_GET['id'];

$deactive_current_active_banner =  "UPDATE logo SET status = 0 WHERE status = 1";

if($db->update($deactive_current_active_banner)) {
    $_SESSION['d'] = "Banner Activated!";
    // header("location: banners.php");
} 

$active = "UPDATE logo SET status = 1 WHERE id = $id";

if($db->update($active)) {
    $_SESSION['logo_activated'] = "Logo Activated!";
    header("location: logo.php");
} 



// $rand = "SELECT id FROM banners
// ORDER BY RAND()
// LIMIT 1;";

// $maxId = "SELECT max(id) as max_id FROM banners";
// $minId = "SELECT min(id) as min_id FROM banners";

// $post = $db->select($maxId);
// $postMin = $db->select($minId);
// $postRand = $db->select($rand);

// $randId = $postRand->fetch_assoc();
// $maxId = $post->fetch_assoc();
// $minId = $postMin->fetch_assoc();

// $maxId =  $maxId['max_id'];
// $minId =  $minId['min_id'];
// $randId = $randId['id'];
// if ($id != $randId) {
//     $active = "UPDATE banners SET status = 1 WHERE id = $randId";
// } elseif($id != $maxId) {
//     $active = "UPDATE banners SET status = 1 WHERE id = $maxId";
// } else {
//     $active = "UPDATE banners SET status = 1 WHERE id = $minId";
// }

// if($db->update($active)) {
//     $_SESSION['d'] = "Banner Deleted!";
//     header('location: banners.php');
// }



?>
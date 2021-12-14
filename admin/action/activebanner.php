<?php
session_start();
    include "../config/config.php";
    include "../lib/Database.php";

    $db = new Database();
?>
<?php

$id = $_GET['id'];
$query = "SELECT * FROM banners WHERE status = 1";
$post = $db->select($query);

$result = $post->fetch_assoc();

$old_active = $result['id'];

$deactive = "UPDATE banners SET status = 0 WHERE id = $old_active";

if($db->update($deactive)) {
    $_SESSION['d'] = "Banner Deleted!";
    // header("location: banners.php");
}


$deactive = "UPDATE banners SET status = 1 WHERE id = $id";

if($db->update($deactive)) {
    $_SESSION['d'] = "Banner Deleted!";
    header("location: banners.php");
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
//     $active = "UPDATE banners SET status = 0 WHERE id = $randId";
// } elseif($id != $maxId) {
//     $active = "UPDATE banners SET status = 0 WHERE id = $maxId";
// } else {
//     $active = "UPDATE banners SET status = 0 WHERE id = $minId";
// }

// if($db->update($active)) {
//     $_SESSION['d'] = "Banner Deleted!";
//     header('location: banners.php');
// }



?>
<?php
    include "../../lib/Session.php";
    include "../../config/config.php";
    include "../../lib/Database.php";
    include "../functions.php";

    Session::init();

    $db = new Database();
    if((Session::get('role') == 0)) {

    if(isset($_POST['submit'])) {
     
        $facebook = $_POST['facebook'];
        $twitter = $_POST['twitter'];
        $linkedin = $_POST['linkedin'];
        $instagram = $_POST['instagram'];
 
        $query = "UPDATE social SET facebook = '$facebook', twitter = '$twitter', linkedin  = '$linkedin', instagram = '$instagram'";
   
        $db->update($query);
        $_SESSION['social_updated'] = "Social Links Updates"; 
        header("location: ../socials.php");
 
    }
    }

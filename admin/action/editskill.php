<?php
    include "../../lib/Session.php";
    include "../../config/config.php";
    include "../../lib/Database.php";
    include "../functions.php";

    Session::init();

    $db = new Database();

    $id = $_GET['id'];

    if(isset($_POST['submit'])) {
     
        $title = $_POST['title'];
        $percentage = $_POST['percentage'];
        $name = $_POST['name'];
  


        if(empty($name) || empty($percentage)) {
            $_SESSION['empty'] = "Fields Must not Be empty!";
            header("location: ../editskill.php?id=" . $id);
        } else {
            $query = "UPDATE skill SET name = '$name', percentage = '$percentage' WHERE id = $id";
                $db->update($query);
                
                header("location: ../skill.php");
 
        }

    }

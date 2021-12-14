<?php
    
    include "../../lib/Session.php";
    include "../../config/config.php";
    include "../../lib/Database.php";
    include "../functions.php";

    Session::init();

    $db = new Database();

    if(isset($_POST['submit'])) {
        $title = $_POST['title'];
   
        $percentage = $_POST['percentage'];
        $name = $_POST['name'];

        if(empty($name) || empty($percentage)) {
            $_SESSION['empty'] = "Fields Must not Be empty!";
            header("location: ../addskill.php");
        } else {
          
                $query = "INSERT INTO skill (name, percentage) VALUES ('$name', '$percentage')";
                $db->insert($query);
                $_SESSION['skill_added'] = "New Skill Addedd!";
                header("location: ../addskill.php");

        }

    }
<?php
    
    include "../../lib/Session.php";
    include "../../config/config.php";
    include "../../lib/Database.php";
    include "../functions.php";

    Session::init();

    $db = new Database();

    if(isset($_POST['submit'])) {
        $title = $_POST['title'];
   
        $description = $_POST['description'];
        $experience = $_POST['experience'];

        if(empty($title) || empty($description)) {
            $_SESSION['empty'] = "Fields Must not Be empty!";
            header("location: ../addtrust.php");
        } else {
          
                $query = "INSERT INTO trust (title, description, experience) VALUES ('$title', '$description', '$experience')";
                $db->insert($query);
                $_SESSION['trust_added'] = "New Trust Addedd!";
                header("location: ../addtrust.php");

        }

    }
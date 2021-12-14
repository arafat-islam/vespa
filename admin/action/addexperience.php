<?php
    
    include "../../lib/Session.php";
    include "../../config/config.php";
    include "../../lib/Database.php";
    include "../functions.php";

    Session::init();

    $db = new Database();

    if(isset($_POST['submit'])) {
        $name = $_POST['title'];
        $description = $_POST['description'];
        $designation = $_POST['designation'];
        $date = $_POST['date'];
       

        if(empty($name) || empty($description) || empty($designation)) {
            $_SESSION['empty'] = "Fields Must not Be empty!";
            header("location: ../addexperience.php");
        } else {
            if(true) {
                $query = "INSERT INTO experience (title, description, designation, date) VALUES ('$name', '$description', '$designation','$date')";
          
                $db->insert($query);
                    $_SESSION['experience_added'] = "Experience Added!";
                    header("location: ../experience.php");
             
            } 
        }

    }
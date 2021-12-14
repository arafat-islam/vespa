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
        $description = $_POST['description'];
        $designation = $_POST['designation'];
  


        if(empty($designation) || empty($description)) {
            $_SESSION['empty'] = "Fields Must not Be empty!";
            header("location: ../editexperience.php?id=" . $id);
        } else {
            $query = "UPDATE experience SET designation = '$designation', description = '$description' WHERE id = $id";

    
                $db->update($query);
                
                $_SESSION['ex_updated'] = "Experience Updated";
                header("location: ../experience.php");
 
        }

    }

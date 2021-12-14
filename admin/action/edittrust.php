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
        $experience = $_POST['experience'];
  


        if(empty($title) || empty($description) || empty($experience)) {
            $_SESSION['empty'] = "Fields Must not Be empty!";
            header("location: ../edittrust.php?id=" . $id);
        } else {
            $query = "UPDATE trust SET title = '$title', description = '$description' , experience = '$experience' WHERE id = $id";
                $db->update($query);
                header("location: ../trust.php");
 
        }

    }

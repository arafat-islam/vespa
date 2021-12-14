<?php
    
    include "../../lib/Session.php";
    include "../../config/config.php";
    include "../../lib/Database.php";
    include "../functions.php";

    Session::init();

    $db = new Database();

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $filename = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $extension = explode('.', $filename);
        $extension = end($extension);
        $allowed_extension = array("jpg", "png", "jpeg", "webp");

        if(empty($name) || empty($description) || empty($filename)) {
            $_SESSION['empty'] = "Fields Must not Be empty!";
            header("location: ../addservices.php");
        } else {
            if(in_array($extension, $allowed_extension)) {
                $query = "INSERT INTO services (name, description) VALUES ('$name', '$description')";
                $db->insert($query);
                $id = mysqli_insert_id($db->link);
                $newfilename = $id .'.'. $extension;
                $update = "UPDATE services SET image = '$newfilename' WHERE id = $id";
                if($db->update($update)) {
                    move_uploaded_file($tmp_name, "../../img/services/$newfilename");
                    $_SESSION['service_added'] = "Service Added!";
                    header("location: ../services.php");
                }
            } 
        }

    }
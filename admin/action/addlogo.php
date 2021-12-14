<?php
    
    include "../../lib/Session.php";
    include "../../config/config.php";
    include "../../lib/Database.php";
    include "../functions.php";

    Session::init();

    $db = new Database();

    if(isset($_POST['submit'])) {
        $filename = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $extension = explode('.', $filename);
        $extension = end($extension);
        $allowed_extension = array("jpg", "png", "jpeg", "webp");

        if(empty($filename)) {
            $_SESSION['empty'] = "Fields Must not Be empty!";
            header("location: ../addlogo.php");
        } else {
            if(in_array($extension, $allowed_extension)) {
                $query = "INSERT INTO logo (image) VALUES ('$filename')";
                $db->insert($query);
                $id = mysqli_insert_id($db->link);
                $newfilename = $id .'.'. $extension;
                $update = "UPDATE logo SET image = '$newfilename' WHERE id = $id";
                if($db->update($update)) {
                    move_uploaded_file($tmp_name, "../../img/logo/$newfilename");
                    $_SESSION['logo_added'] = "Logo Added!";
                    header("location: ../logo.php");
                }
            }
        }

    }

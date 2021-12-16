<?php
    
    include "../../lib/Session.php";
    include "../../config/config.php";
    include "../../lib/Database.php";
    include "../functions.php";

    Session::init();

    $db = new Database();

    if(isset($_POST['submit'])) {
        $title = $_POST['title'];
        $button = $_POST['button'];
        $description = $_POST['description'];
        $userID = $_POST['userId'];
        $filename = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $extension = explode('.', $filename);
        $extension = end($extension);
        $allowed_extension = array("jpg", "png", "jpeg", "webp");

        if(empty($title) || empty($description) || empty($filename) || empty($button)) {
            $_SESSION['empty'] = "Fields Must not Be empty!";
            header("location: ../addbanner.php");
        } else {
            if(in_array($extension, $allowed_extension)) {
                $query = "INSERT INTO banners (title, description, button, userId) VALUES ('$title', '$description', '$button', '$userID')";
                $db->insert($query);
                $id = mysqli_insert_id($db->link);
                $newfilename = $id .'.'. $extension;
                $update = "UPDATE banners SET image = '$newfilename' WHERE id = $id";
                if($db->update($update)) {
                    move_uploaded_file($tmp_name, "../../img/banners/$newfilename");
                    $_SESSION['banner_added'] = "Banner Added!";
                    header("location: ../addbanner.php");
                }
            }
        }

    }

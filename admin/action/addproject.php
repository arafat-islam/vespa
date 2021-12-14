<?php
    
    include "../../lib/Session.php";
    include "../../config/config.php";
    include "../../lib/Database.php";
    include "../functions.php";

    Session::init();

    $db = new Database();

    if(isset($_POST['submit'])) {
        $title = $_POST['title'];
        $branding = $_POST['branding'];
        $filename = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $extension = explode('.', $filename);
        $extension = end($extension);
        $allowed_extension = array("jpg", "png", "jpeg", "webp");

        if(empty($title) || empty($branding) || empty($filename)) {
            $_SESSION['empty'] = "Fields Must not Be empty!";
            header("location: ../addproject.php");
        } else {
            if(in_array($extension, $allowed_extension)) {
                $query = "INSERT INTO projects (title, branding) VALUES ('$title', '$branding')";
                $db->insert($query);
                $id = mysqli_insert_id($db->link);
                $newfilename = $id .'.'. $extension;
                $update = "UPDATE projects SET image = '$newfilename' WHERE id = $id";
                if($db->update($update)) {
                    move_uploaded_file($tmp_name, "../../img/projects/$newfilename");
                    $_SESSION['projects_added'] = "Projects Added!";
                    header("location: ../addproject.php");
                }
            }
        }

    }

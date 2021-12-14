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
        $branding = $_POST['branding'];
        $filename = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $extension = explode('.', $filename);
        $extension = end($extension);
        $allowed_extension = array("jpg", "png", "jpeg", "webp");

        if(empty($filename)) {
        if(empty($title) || empty($branding)) {
            $_SESSION['empty'] = "Fields Must not Be empty!";
            header("location: ../editproject.php?id=" . $id);
        } else {
            $query = "UPDATE projects SET title = '$title', branding = '$branding' WHERE id = $id";
                $db->update($query);
                header("location: ../projects.php");
 
        }
    } else {

        if(in_array($extension, $allowed_extension)) {

            $newfilename = $id . '.' . $extension;

            $oldPath = "../../img/projects/$newfilename";

            unlink($oldPath);

            $query = "UPDATE projects SET title = '$title', branding = '$branding' , image = '$newfilename' WHERE id = $id";
            $db->update($query);
            move_uploaded_file($tmp_name, "../../img/projects/$newfilename");
            header("location: ../projects.php");
        }

    }

    }
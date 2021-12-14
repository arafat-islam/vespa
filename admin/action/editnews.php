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
        $filename = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $extension = explode('.', $filename);
        $extension = end($extension);
        $allowed_extension = array("jpg", "png", "jpeg", "webp");

        if(empty($filename)) {
        if(empty($title) || empty($description)) {
            $_SESSION['empty'] = "Fields Must not Be empty!";
            header("location: ../editbanner.php?id=" . $id);
        } else {
            $query = "UPDATE news SET title = '$title', description = '$description'  WHERE id = $id";
                $db->update($query);
                header("location: ../news.php");
 
        }
    } else {

        if(in_array($extension, $allowed_extension)) {

            $newfilename = $id . '.' . $extension;

            $oldPath = "../../img/news/$newfilename";

            unlink($oldPath);

            $query = "UPDATE news SET title = '$title', description = '$description', image = '$newfilename' WHERE id = $id";
            $db->update($query);
            move_uploaded_file($tmp_name, "../../img/news/$newfilename");
            header("location: ../news.php");
        } else {
        
        }

    }

    }
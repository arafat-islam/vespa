<?php
    include "../lib/Database.php";
    include "../config/config.php";

    $db = new Database();

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $filename = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $extension = explode('.', $filename);
        $extension = end($extension);
        $allowed_extension = array("jpg", "png", "jpeg", "webp");


        if (empty($name) || empty($email) || empty($message)) {
            header("location: ../index.php?empty='empty'");
        } else {
            if(in_array($extension, $allowed_extension)) {
            $query = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";
            $db->insert($query);
            $id = mysqli_insert_id($db->link);
            $newfilename = $id .'.'. $extension;
            $update = "UPDATE contact SET image = '$newfilename' WHERE id = $id";
            if($db->update($update)) {
                
                move_uploaded_file($tmp_name , "../img/contact/$newfilename");
                header("location: ../index.php");
            }
        }
        }
      
    }
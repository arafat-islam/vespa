<?php
    include "../lib/Database.php";
    include "../config/config.php";

    $db = new Database();

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        if (empty($name) || empty($email) || empty($message)) {
            header("location: ../index.php?empty='empty'");
        } else {
            $query = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

            if($db->insert($query)) {
                header("location: ../index.php");
            }
        }
      
    }
<?php

    include "../../lib/Session.php";
    include "../../config/config.php";
    include "../../lib/Database.php";
    include "../functions.php";

    Session::init();

    $db = new Database();

    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        $role = $_POST['role'];
        $filename = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $extension = explode('.', $filename);
        $extension = end($extension);
        $allowed_extension = array("jpg", "png", "jpeg", "webp");
        if (!checkUserExist($email, $username, $db)) {
        if(empty($username) || empty($name) || empty($email) || empty($password)) {
            $_SESSION['empty'] = "Fields Must not Be empty!";
            header("location: ../adduser.php");
        } else {
            if(in_array($extension, $allowed_extension)) {
                $query = "INSERT INTO users (username, name, email, password, role) VALUES ('$username', '$name', '$email', '$password', $role)";
                $db->insert($query);
                $id = mysqli_insert_id($db->link);
                $newfilename = $id .'.'. $extension;
                $update = "UPDATE users SET image = '$newfilename' WHERE id = $id";
                if($db->update($update)) {
                    move_uploaded_file($tmp_name, "../../img/users/$newfilename");
                    $_SESSION['user_added'] = "User Added!";
                    header("location: ../adduser.php");
                }
            }
        }
    } else {
        $_SESSION['user_exist'] = "User Already Exist!";
        header('location: ../adduser.php');
    }
    }

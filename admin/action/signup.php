<?php
    
    include "../../lib/Session.php";
    include "../../config/config.php";
    include "../../lib/Database.php";
    include "../functions.php";


    $db = new Database();
    Session::init();

    if(isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($db->link, $_POST['username']);
        $password = mysqli_real_escape_string($db->link, $_POST['password']);
        $cpassword = mysqli_real_escape_string($db->link, $_POST['cpassword']);
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        $email = mysqli_real_escape_string($db->link, $_POST['email']);

        $empty = [];

        $field_names = ['username' => "Username Required", 'email' => 'Email Required', 'password' => 'Password Required', 'cpassword' => 'Confirm Password Required!'];

        foreach($field_names as $field_name => $message) {
            if(empty($_POST[$field_name])) {
                $empty[$field_name] = $message;
            }
        }

        if(count($empty) == 0) {
            if($password == $cpassword) {
                $password = password_hash($password, PASSWORD_DEFAULT);

                if(!checkUserExist($email, $username, $db)) {
                    $query = "INSERT INTO users (username, password, name, email) VALUES ('$username', '$password', '$name', '$email')";
     
                    $post = $db->insert($query);
    
                    if($post) {
                        $_SESSION['signup_successfully'] = "Successfully Signed Up";
                        header("location: ../signup.php");
                    } else {
                        $_SESSION['signup_failed'] = "SIGNUP Failed!";
                        header("location: ../signup.php");
                    }
                } else {
                    $_SESSION['user_exist'] = "User Already Exist!";
                        header("location: ../signup.php");
                }

            } else {
                $_SESSION['password_mitchmatch'] = "Password mismatch!";
                header("location: ../signup.php"); 
            }
        } else {
            $_SESSION['empty_field'] = "Fields Must Not Be empty!";
            header("location: ../signup.php"); 
        }
    }


?>
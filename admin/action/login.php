<?php
          
        include "../../lib/Session.php";
        Session::init();
    
        include "../../config/config.php";
        include "../../lib/Database.php";
        include "../functions.php";

        $db = new Database();
        

        $empty = [];

        $field_names = ['username' => "Username Required", 'password' => 'Password Required'];

        foreach($field_names as $field_name => $message) {
            if(empty($_POST[$field_name])) {
                $empty[$field_name] = $message;
            }
        }


    if(count($empty) == 0) {
        if(isset($_POST['submit'])) {
            $username = mysqli_real_escape_string($db->link, $_POST['username']);
            $email = mysqli_real_escape_string($db->link, $_POST['username']);
            $password = mysqli_real_escape_string($db->link, $_POST['password']);
     
            if($post = checkUserExist($email, $username, $db)) { 
               $result = $post->fetch_assoc();
               $db_password = $result['password'];

               if(password_verify($password, $db_password)) {
                   echo "Logged In";
                    Session::set("login", true);
                    Session::set("userid", $result['id']);
                    Session::set("username", $result['username']);
                    Session::set("name", $result['name']);
                    Session::set("image", $result['image']);
                    Session::set("role", $result['role']);
                    $_SESSION['login_successfully'] = "Login Successfully";
                    // print_r($_SESSION);
                    header("location: ../index.php"); 
               } else {
                    $_SESSION['wrong_password'] = "Incorrect Password!";
                    header("location: ../login.php"); 
               }

            } else {
                $_SESSION['user_not_found'] = "User Not Found!";
                header("location: ../login.php"); 
            }

        }
    }    
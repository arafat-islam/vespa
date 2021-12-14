<?php
include "session.php";
require "db.php";
    $errors = [];
    $date = date_default_timezone_set('Asia/Dhaka');
    $created_at = date('d-m-y h:i:s');

    $username = $_POST['username'];
    
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $year = $_POST['year'];
    $country = $_POST['country'];
    $dob = $year. '-' .$month. '-' .$day;
    $user_role = $_POST['user_role'];
    
    $field_names = ['username' => "Name Required", 'email' => 'Email Required', 'password' => 'Password Required', 'confirm_password' => 'Confirm Password Required!', 'month' => 'Month required', 'day'=> 'Day required', 'year' => 'Year required', 'country' => 'Country required'];

    foreach($field_names as $field_name => $message){
        if(empty($_POST[$field_name])) {
            $errors[$field_name] = $message;
        }
    }

    $_SESSION['errors'] = $errors;



    if(count($errors) == 0) {
    
        if($password == $confirm_password) {
            
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $profile_image = $_FILES['profile_photo'];
            $explode = explode('.' , $profile_image['name']);
       
            $extension = end($explode);
          
            $allowed_extension = array("jpg", "jpeg", "png", "gif", "webp", "jfif");
    
            if(in_array($extension, $allowed_extension)) {
                if($profile_image['size'] > 200000) {
                    $_SESSION['file_size_limit'] = 'File size is too large!';
                    header("location: register.php");
                } else {
    
                    $select_user_name_password = "SELECT COUNT(*) AS email_row FROM users where email = '$email' OR username = '$username';";
    
                    $reslut = mysqli_query($conn,$select_user_name_password);
            
                    $row = mysqli_fetch_assoc($reslut);
    
                    if($row['email_row'] <= 0) {
                        $query = "INSERT INTO `users`(`username`, `email`, `password`, `created_at`, `dob`, `country`, `user_role`) ";
                        $query .= " VALUES('$username', '$email', '$hashedPassword', '$created_at', '$dob', '$country', '$user_role')";
                       
                       
                        mysqli_query($conn, $query);
                
                        $_SESSION['signup_success_message'] = "You have successfully signed up!";
                        header('location: register.php');
    
                    } else {
                        $_SESSION['user_already_exist'] = "Username or Email Already Exist";
                        header("location: register.php");
                    }
    
                    $image_id = mysqli_insert_id($conn);
                    $file_name = $image_id . '.' . $extension;
                    $new_path = "./uploads/images/" . $file_name;
    
                    move_uploaded_file($profile_image['tmp_name'], $new_path);
    
                    $update_image = "UPDATE users SET profile_photo = '$file_name' WHERE id = $image_id";
                    
                    mysqli_query($conn, $update_image);
    
                    header("Location: register.php");
    
                }
            } else {
                $_SESSION['unsupported_file_format'] = "Unsupported File Fromat!";
                header("location: register.php");
            }

            $select_user_name_password = "SELECT COUNT(*) AS email_row FROM users where email = '$email' OR username = '$username';";

        
            $reslut = mysqli_query($conn,$select_user_name_password);
    
            $row = mysqli_fetch_assoc($reslut);
    
            if($row['email_row'] > 0) {
                $_SESSION['user_already_exist'] = "Username or Email Already Exist";
                echo "Username Exist!";
                // header('location: index.php');
            } else {
                if (mysqli_query($conn, $query)) {
                    $_SESSION['signup_success_message'] = "You have successfully signed up!";
                header("location: register.php");
                }
            }
    
            



        } else {
            $_SESSION['password_missmatch'] = "Password Wrong!";

            header("location: register.php");
        }

        // header("location: index.php");
    } else if(count($errors) > 0){
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['confirm_password'] = $_POST['confirm_password'];
    
        header("location: register.php");
    }


  



?>
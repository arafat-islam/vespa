<?php
include "session.php";
require "db.php";

        $id = $_GET['id'];
        $username = $_POST['username'];
        $user_role = $_POST['user_role'];

        // $username = mysqli_real_escape_string($username);
        $email = $_POST['email'];

        $select_img = "SELECT profile_photo FROM users WHERE id = $id";

        $get_image = mysqli_query($conn, $select_img);

        $image = mysqli_fetch_assoc($get_image);


        $file = $_FILES['profile_photo'];


       $after_explode = explode(".", $file['name']);

       $extension = end($after_explode);

        $allowed_extension = array('jpg', 'png', 'jpeg', 'gif', 'webp');


        if($file['name'] != '') {
            if(in_array($extension, $allowed_extension)) {
                if($file['size'] > 200000) {
                    $_SESSION['file_size_limit'] = 'File size limit exceeded!';
                    header('location: update.php?id='. $id);
                    echo "File Size Limit Exceed!";
                } else {
    
                    
                    $delete_path = "./uploads/images/" . $image['profile_photo'];
    
                    unlink($delete_path);
    
    
                    $file_name = $id . '.' . $extension;
                    $new_path = "./uploads/images/" . $file_name;
    
                    move_uploaded_file($file['tmp_name'], $new_path);
    
                    $update_image = "UPDATE users SET profile_photo = '$file_name' WHERE id = $id";
                    if(mysqli_query($conn, $update_image)) {
                        $_SESSION['update_with_image'] = 'Updated Successfully With Image';
                        header("location: users.php");
                    }

                }
            } else {
                $_SESSION['unsupported_file_size'] = "Unsupported File Format!";
                header("location: index.php");
            }
        } else {

            $date = date_default_timezone_set('Asia/Dhaka');
            $updated_at = date('d-m-y h:i:s');
        
            $query = "UPDATE users SET username = '$username', email = '$email', user_role = '$user_role' WHERE id = $id";
           
       
            if(mysqli_query($conn,$query)) {
                $_SESSION['update_without_image'] = 'Updated Successfully Without Image';
                header("location: users.php");
            } else {
                die(mysqli_connection_error());
            }

        }

        

?>
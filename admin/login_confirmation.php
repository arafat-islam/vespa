<?php
session_start();
    require "db.php";


    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['username'];
 
    $select = "SELECT * FROM users WHERE (username = '$username' OR email = '$email') AND delete_status = 0";

    $result = mysqli_query($conn, $select);

    $row =  mysqli_fetch_assoc($result);

 
    if($row) {
        $password_from_database = $row['password'];
    }


    if(mysqli_num_rows($result) && password_verify($password, $password_from_database)) {
        $_SESSION['login_success_message'] = 'Log In Successfully';
        $_SESSION['logged_in'] = '';
       
        $_SESSION['username'] = $_POST['username'];

        $_SESSION['logged_id'] = $row['id'];

        header("location: admin.php");
    } 
    
    else if(mysqli_num_rows($result) && !password_verify($password, $password_from_database)) {
        $_SESSION['password_mitchmatch'] = "Incorrect Password!";
        header('location: login.php');
    } 

    else if(!mysqli_num_rows($result)) {
        $_SESSION['login_failed'] = "Email Or Username Not Found!";
        header('location: login.php');
    }
?>




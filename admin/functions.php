<?php

    function checkUserExist($email, $username, $db) {

        $query = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";

        $post = $db->select($query);

        if ($post) {
           return $post;
        } else {
            return false;
        }
    }
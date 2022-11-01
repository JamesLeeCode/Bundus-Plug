<?php

    function login($conn, $username, $password){
        $sql = "SELECT * FROM users WHERE email = '$username'";
        $query = mysqli_query($conn, $sql);
        return $query;
    }

?>

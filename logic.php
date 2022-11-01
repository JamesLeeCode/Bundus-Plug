<?php

    if(isset($_REQUEST['login'])){
        $results = login($conn, $username, $password);

        foreach($results as $r){

            $pwd_check = password_verify($password, $r['password']);

            if($pwd_check){
                $_SESSION['username'] = $r['email'];
                $_SESSION['first_name'] = $r['user_name'];
                
                header("Location: index.php");
                exit();
            }

        }


    }

    if(isset($_REQUEST['logout'])){
        session_destroy();
        header("Location: index.php");
        exit();
    }

?>

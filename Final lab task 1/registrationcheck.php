<?php
    session_start();
    if(isset($_REQUEST['submit'])){
        
        $name = trim($_POST['name']);
        $password = trim($_REQUEST['password']);
        $email = trim($_REQUEST['email']);

        if($name == null || empty($password )|| empty($email)){
            echo "Null username/password/email!";

        }else {
            $user = ['name'=> $name, 'password'=> $password, 'email'=> $email, 'number'=>$number];
            $_SESSION['user'] = $user;
            header('location: login.html');
        }
    }else{
        header('location: reg.html');
    }

?>
<?php
session_start();
if(isset($_REQUEST['submit'])){
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);
    
    if($name == null || empty($password)){
        echo "Null username/ password";
    
    }else if ($_SESSION['user']['name'] == $name && $_SESSION['user']['password']== $password) {
            setcookie('status', 'true', time()+3000, '/');
            header('location: home.php');
    }else {
        echo "invalid user";
    }

}else{
    header('location: login.html');
}
?>
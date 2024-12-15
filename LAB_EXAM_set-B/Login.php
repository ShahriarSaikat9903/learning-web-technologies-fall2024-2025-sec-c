<?php 
?>

<form method="POST">
    <fieldset>
        <legend><b>LOGIN</b></legend>
        User Id </br>
        <input type="text" name="id" id=""> </br>
        Password <br>
        <input type="password" name="password" id=""> <hr><br>

        <input type="submit" name="" value="Login">
        <a href="">Register</a>

        </fieldset>
</form>

<?php 
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = htmlspecialchars($_POST['id']);
    $password = htmlspecialchars($_POST['password']);

    $users = file("users.txt",FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
    $authenticated = false;

    foreach ($users as $user) 
    {
    list($sid,$spassword,$type) = explode('|',$user);
    if ($id===$sid && $password===$spassword){
        $authenticated = true;
        $_SESSION['id'] = $id;
        $_SESSION['usertype'] = $usertype;
        break;
    }
    }
}
if ($authenticated){
    if($_SESSION['usertype']==='Admin'){
        header("Location : admin_home.php");
    }else{
        header("Location : user_home.php");
    }
    exit();

}else{
    echo "Invalid"
}
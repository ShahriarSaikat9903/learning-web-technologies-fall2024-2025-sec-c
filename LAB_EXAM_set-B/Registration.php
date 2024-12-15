<?php
?>

<form method="POST" action = "">
    <fieldset>
        <legend><b>REGISTRATION</b></legend>
        Id </br>
        <input type="text" name="id" id=""> </br>
        Password <br>
        <input type="password" name="password" id=""> <br>
        Confirm Password <br>
        <input type="password" name="c_password" id=""> <br>
        Name <br>
        <input type="text" name="username" id=""> </br>

        User Type <hr><br>
        <input type="radio" name="usertype" value="User"> User
        <input type="radio" name="usertype" value="Admin"> Admin <hr><br>

        <input type="submit" name="" value="Sign Up">
        <a href="Login.php">Sign In</a>





    </fieldset>
</form>

<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $id = htmlspecialchars($_POST['id']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $c_password = htmlspecialchars($_POST['c_password']);
    $usertype = htmlspecialchars($_POST['usertype']); 

    if (!empty($id)&& !empty($username)&& !empty($password)&& !empty($usertype)&& !empty($c_password)){
        $data = "$id|$username|$password|$c_password|$usertype\n";
        file_put_contents("users.txt",$data,FILE_APPEND);
        echo "Registration successfull!";
    }
    else{
        echo "All fields are required.";

    }


}
?>
<?php
$conn = new mysqli('localhost', 'root', '', 'employee db');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$empName = $_POST['empName'];
$companyName = $_POST['companyName'];
$number = $_POST['number'];
$userName = $_POST['userName'];
$password =$_POST['password'];

if (empty($empName) || empty($companyName) || empty($number) || empty($userName) || empty($password)) {
    echo 'All fields are required!';
    exit;
}

$sql = "INSERT INTO users (empName, companyName, contactNo, userName, password) 
        VALUES ('$empName', '$companyName', '$number', '$userName', '$password')";

if ($conn->query($sql) === TRUE) {
 
    header("Location: login.html");
    exit();
} else {
    echo 'Error: ' . $conn->error;
}

$conn->close();

?>

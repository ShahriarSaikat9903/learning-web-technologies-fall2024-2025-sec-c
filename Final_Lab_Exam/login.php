<?php

$conn = new mysqli('localhost', 'root', '', 'employee db');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$name = $_POST['name'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE userName = '$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        echo "Login successful!";
    } else {
        echo "Invalid password!";
    }
} else {
    echo "No user found with that username!";
}

$conn->close();

?>


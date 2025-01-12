<?php
$conn = new mysqli('localhost', 'root', '', 'l_f_db');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'updateEmployee') {
        $empId = $_POST['empId'];
        $empName = $_POST['empName'];
        $companyName = $_POST['companyName'];
        $contactNo = $_POST['contactNo'];
        $userName = $_POST['userName'];

        $sql = "UPDATE users SET empName='$empName', companyName='$companyName', contactNo='$contactNo', userName='$userName' WHERE id='$empId'";

        if ($conn->query($sql) === TRUE) {
            echo "Employee updated successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
} elseif (isset($_GET['action'])) {
    if ($_GET['action'] == 'load') {
        
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['empName'] . "</td>
                    <td>" . $row['companyName'] . "</td>
                    <td>" . $row['contactNo'] . "</td>
                    <td>" . $row['userName'] . "</td>
                    <td><button onclick='updateEmployee(" . $row['id'] . ")'>Update</button></td>
                    <td><button onclick='deleteEmployee(" . $row['id'] . ")'>Delete</button></td>
                </tr>";
        }
    } elseif ($_GET['action'] == 'getEmployee') {
        
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id='$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        echo $row['empName'] . '|' . $row['companyName'] . '|' . $row['contactNo'] . '|' . $row['userName'];
    } elseif ($_GET['action'] == 'deleteEmployee') {
        

        $id = $_GET['id'];
        $sql = "DELETE FROM users WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo "Employee deleted successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    } elseif ($_GET['action'] == 'searchSuggestions') {

        $q = $_GET['q'];
        $sql = "SELECT * FROM users WHERE empName LIKE '%$q%' LIMIT 5";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div onclick='selectSuggestion(\"" . $row['empName'] . "\")'>" . $row['empName'] . "</div>";
            }
        } else {
            echo "No results found";
        }
    }
}

$conn->close();
?>
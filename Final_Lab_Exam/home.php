<html>
<head>
    <title>Employee CRUD</title>
</head>
<body>
    <h1>Employee CRUD Operations</h1>
     
    <form id="employeeForm">
        <input type="hidden" id="empId">
        <label for="empName">Employee Name: </label>
        <input type="text" id="empName"><br><br>
        
        <label for="companyName">Company Name: </label>
        <input type="text" id="companyName"><br><br>
        
        <label for="contactNo">Contact No: </label>
        <input type="text" id="contactNo"><br><br>
        
        <label for="userName">User Name: </label>
        <input type="text" id="userName"><br><br>
        
        <button type="button" id="submitBtn" onclick="updateEmployeeSubmit()">Register Employee</button>
    </form>
    <br>
    
    <input type="text" id="search" onkeyup="searchEmployees()" placeholder="Search for employees">
    <div id="suggestions"></div>
    
    <h2>Employee List</h2>
    <table id="employeeTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Company</th>
                <th>Contact</th>
                <th>User Name</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script src="crude.js"></script>
    <script>
        
        loadEmployees();
    </script>
</body>
</html>
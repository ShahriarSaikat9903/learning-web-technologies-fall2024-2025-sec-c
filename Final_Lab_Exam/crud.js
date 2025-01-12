function loadEmployees() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "crude.php?action=load", true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('employeeTable').getElementsByTagName('tbody')[0].innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

function updateEmployee(id) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "crude.php?action=getEmployee&id=" + id, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            var response = xhr.responseText.split('|');
            document.getElementById('empName').value = response[0];
            document.getElementById('companyName').value = response[1];
            document.getElementById('contactNo').value = response[2];
            document.getElementById('userName').value = response[3];
            document.getElementById('empId').value = id;
            document.getElementById('submitBtn').innerText = "Update Employee"; 
        }
    };
    xhr.send();
}

function updateEmployeeSubmit() {
    var formData = new FormData(document.getElementById('employeeForm'));
    formData.append('action', 'updateEmployee');

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "crude.php", true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            alert(xhr.responseText);
            loadEmployees(); 
            clearForm(); 
        }
    };
    xhr.send(formData);
}

function deleteEmployee(id) {
    var confirmDelete = confirm("Are you sure you want to delete this employee?");
    if (confirmDelete) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "crude.php?action=deleteEmployee&id=" + id, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                alert(xhr.responseText);
                loadEmployees(); 
            }
        };
        xhr.send();
    }
}

function searchEmployees() {
    var query = document.getElementById('search').value;
    if (query.length > 0) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "crude.php?action=searchSuggestions&q=" + query, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                document.getElementById('suggestions').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    } else {
        document.getElementById('suggestions').innerHTML = '';
    }
}

function clearForm() {
    document.getElementById('employeeForm').reset();
    document.getElementById('submitBtn').innerText = "Register Employee"; 
}
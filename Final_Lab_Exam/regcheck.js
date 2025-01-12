function validateForm() {
    var empName = document.regForm.empName.value;
    var companyName = document.regForm.companyName.value;
    var number = document.regForm.number.value;
    var userName = document.regForm.userName.value;
    var password = document.regForm.password.value;

    if (empName == "" || companyName == "" || number == "" || userName == "" || password == "") {
        alert("All fields must be filled out!");
        return false;
    }
    return true;

}

function validateLogin() {
    var name = document.getElementById("name").value;
    var password = document.getElementById("password").value;

    if (name == "" || password == "") {
        alert("Username and password must be filled out");
        return false;
    }
    return true;
}

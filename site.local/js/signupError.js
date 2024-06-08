
function validateForm() {
    var password = document.getElementById('password').value;
    var login = document.getElementById('login').value;
    var name = document.getElementById('name').value;

    var isPasswordValid = checkPassword(password);
    var isLoginValid = checkLogin(login);
    var isNameValid = checkName(name);
   
    if (!isPasswordValid || !isLoginValid || !isNameValid) {
        var pError = document.getElementById('Error');
        pError.style.display = 'block';
        return false;
    }
    
    return true;
}

function checkName(name) {
    if (name.length < 3 || name.length > 26) {
        return false
    } 
    return true
}

function checkLogin(login) {
    if (login.length < 5 || login.length > 25) {
        return false;
    }
    return true;
}

function checkPassword(password) {
    if (password.length < 8 || login.length > 32) {
        return false;
    }
    return true;
}

document.getElementById('login').addEventListener('click', function(event){
    formValidations(event); 
})
function formValidations(event) {
    password = document.getElementsByClassName('password')[0].value;
    username = document.getElementsByClassName('username')[0].value;
    if (username.length == 0) {
        alert("Username can't be empty!");
        event.preventDefault();
        return false;
    }
    else if(username.length < 6) {
        alert("Username must be longer than 5 characters!");
        event.preventDefault();
        return false;
    }
    else if(username[0] !== username[0].toUpperCase()){
        alert("First character must be uppercase!");
        event.preventDefault();
        return false;
    }
    else if (password.length == 0) {
        
        alert("Password can't be empty!");
        event.preventDefault();
        return false;
    } 
    else if (password.length < 8) {
        alert("Password must be longer than 8 characters!");
        event.preventDefault();
        return false;
    }
    else if (!hasNumber(password)) {
        alert("Password must have at least a number!");
        event.preventDefault();
        return false;
    }
    else{
        alert("Login successful!");
    }
}
function hasNumber(password) {
    return /\d/.test(password);
}
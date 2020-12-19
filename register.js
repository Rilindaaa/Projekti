document.getElementById('register').addEventListener('click', function(event){
    formValidations(event); 
})
function formValidations(event) {
    password = document.getElementsByClassName('regpassword')[0].value;
    confirmpassword = document.getElementsByClassName('regconfirmpassword')[0].value;
    username = document.getElementsByClassName('regusername')[0].value;
    email = document.getElementsByClassName('regemail')[0].value;
    if (username.length == 0) {
        alert("Username can't be empty!");
        event.preventDefault();
        return false;
    }
    else if(username.length < 6) {
        alert("Username must be longer than 5 characters!!");
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
    else if (password !== confirmpassword){
        alert("Passwords don't match!");
        event.preventDefault();
        return false;
    }
    else if (!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)){
        alert("Email is invalid!");
        event.preventDefault();
        return false;    
    }
    else{
        alert("Registered successful!");
    }
}
function hasNumber(password) {
    return /\d/.test(password);
}
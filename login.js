<<<<<<< HEAD

document.getElementById('login').addEventListener('click', function(event){
    usernameValidations(event);
    passwordValidations(event);
})

function usernameValidations(event) {
=======
document.getElementById('login').addEventListener('click', function(event){
    formValidations(event); 
})

function formValidations(event) {
    password = document.getElementsByClassName('password')[0].value;
>>>>>>> f5bec371b2cc06ab8e2477eeeaf00dc61d842644
    username = document.getElementsByClassName('username')[0].value;
    if (username.length == 0) {
        alert("Username duhet te mbushet!");
        event.preventDefault();
        return false;
    }
    else if(username.length < 6) {
        alert("Username duhet te jete me i gjate se 5 karaktere!");
        event.preventDefault();
        return false;
    }
    else if(username[0] !== username[0].toUpperCase()){
        alert("Shkronja e pare duhet te jete e madhe!");
        event.preventDefault();
        return false;
    }
<<<<<<< HEAD
}

function passwordValidations(event) {
    password = document.getElementsByClassName('password')[0].value;
    
    if (password.length == 0) {
=======
    else if (password.length == 0) {
        
>>>>>>> f5bec371b2cc06ab8e2477eeeaf00dc61d842644
        alert("Password duhet te mbushet!");
        event.preventDefault();
        return false;
    } 
    else if (password.length < 8) {
        alert("Password duhet te jete me i gjate se 7 karaktere!");
        event.preventDefault();
        return false;
    }
    else if (!hasNumber(password)) {
        alert("Password duhet ta permabje se paku nje numer!");
        event.preventDefault();
        return false;
    }
<<<<<<< HEAD
}

=======
    else{
        alert("Jeni kycur me sukses!");
    }
}
>>>>>>> f5bec371b2cc06ab8e2477eeeaf00dc61d842644
function hasNumber(password) {
    return /\d/.test(password);
  }
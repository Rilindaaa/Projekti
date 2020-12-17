document.getElementById('register').addEventListener('click', function(event){
    formValidations(event); 
})

function formValidations(event) {
    password = document.getElementsByClassName('regpassword')[0].value;
    confirmpassword = document.getElementsByClassName('regconfirmpassword')[0].value;
    username = document.getElementsByClassName('regusername')[0].value;
    email = document.getElementsByClassName('regemail')[0].value;
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
    else if (password.length == 0) {
        
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
    else if (password !== confirmpassword){
        alert("Passwodat nuk perputhen!");
        event.preventDefault();
        return false;
    }
    else if (!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)){
        alert("Emaili eshte invalid");
        event.preventDefault();
        return false;    
    }
    else{
        alert("Jeni regjistruar me sukses!");
    }
}
function hasNumber(password) {
    return /\d/.test(password);
  }
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="../CSS/fashion.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body style="background-image: url('../PICS/f67.jpg'); background-repeat: no-repeat; width: 100%; height: 50%;">
        <header>
            <div id="content" style="background-color: white;">
                    <div id ="Header">
                        <div id ="Logo">
                            <ul>
                             <li><a href="index.php"><img class = "foto" src="../PICS/fashion.png"/></a></li>
                            </ul>
                        </div> 
                            <div id = "Elementet">
                            <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="aboutUs.php">About</a></li>
                                    <li><a href="women.php">Women</a></li>
                                    <li><a href="men.php">Men</a></li>
                                    <li><a href="kids.php">Kids</a></li>
                                    <li><a class="login" href="login.php">Log In</a></li>                              
                                </ul>
                           </div> 
                     </div> 
                 </div>                 
        </header>
        <main>
        	<div class ="cont">
                    <form method = "post" action ="../userLogic/loginVerify.php">
                        <h1>Login</h1>
                            <div class ="form-group">
                                <label for ="">Username</label>
                                <input type ="text" name = 'username' class ="form-control username" placeholder="username">
                            </div>
                            <div class ="form-group">
                                <label for ="">Password</label>
                                <input type ="password"  name = 'password' class ="form-control password" placeholder="password">
                            </div>
                            <input type="submit" class ="btn" name='loginButon' value="Login" id="login">

                            <p id="account">Don't have an account? <a href ="register.php">Create one</a></p>
                    </form>
                </div>   
            </div>
        </div>
            </main><script src="../JS/login.js"></script>
<?php
  include '../components/footer.php';
?>
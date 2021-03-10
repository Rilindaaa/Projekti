<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
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
        	<div class ="cont1">
                    <form action ="../userLogic/loginVerify.php" method="POST">
                        <h1>Register</h1>
                            <div class ="form-group1">
                                <label for ="">Username</label>
                                <input type ="text" name="username" class ="form-control1 regusername" placeholder="username" >
                            </div>
                            <div class ="form-group1">
                                <label for ="">Password</label>
                                <input type ="password" name="password" class ="form-control1 regpassword" placeholder="password">
                            </div>
                            <div class ="form-group1">
                                <label for ="">Confirm Password</label>
                                <input type ="password" name="confirmpassword" class ="form-control1 regconfirmpassword" placeholder="confirm password">
                            </div>
                            <div class ="form-group1">
                                <label for ="">Email</label><br>
                                <input type ="email" name="email" class ="form-control1 regemail" placeholder="email">
                            </div>
                            <input type="submit" name="register-btn" class ="bttn" value="Register" id="register">
                            <p id ="rg">Already have an account? <a href ="login.php">Login</a></p>
                    </form>
                </div>
            </main>
        <script src="../JS/register.js"></script>  
           
<?php
  include '../components/footer.php';
?>
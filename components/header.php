<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fashion Trends</title>
        <link href="../CSS/fashion.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
        <header>
            <div id="content">
                    <div id ="Header">
                        <div id ="Logo">
                            <ul>
                                <li><a href="index.php"><img src="../PICS/fashion.png"/></a></li>
                            </ul>
                        </div>  
                            <div id = "Elementet">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="aboutUs.php">About</a></li>
                                    <li><a href="women.php">Women</a></li>
                                    <li><a href="men.php">Men</a></li>
                                    <li><a href="kids.php">Kids</a></li>
                                    <?php
                                    if(isset($_SESSION['role'])&& $_SESSION['role']==1){
                                        echo '<li><a class="login" href="logout.php">Log Out</a></li>';
                                    } 
                                    if(isset($_SESSION['role'])){
                                        echo '<li><a class="login" href="logout.php">Log Out</a></li>';  
                                    }  
                                    if(!isset($_SESSION['role'])){
                                        echo '<li><a class="login" href="login.php">Log In</a></li>';  
                                    }  
                                    ?>                          
                                </ul>
                           </div> 
                     </div> 
                 </div>                 
        </header>
        <body>
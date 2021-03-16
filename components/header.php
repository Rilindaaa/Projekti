<?php 
session_start();

include_once "../buyLogic/buyProductMapper.php";
include_once "../userLogic/userMapper.php";
 
?>
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
                                    if(isset($_SESSION['role'])&& $_SESSION['role']==0){
                                        echo '<li><a onclick= "showDiv()" class="login"><i class="fa fa-shopping-cart"></i></a></li>';

                                    } 
                                    if(isset($_SESSION['role'])&& $_SESSION['role']==1){
                                        echo '<li><a class="login" href="../CONTENT/dashboard.php">Dashboard</a></li>';
                                    } 
                                    if(isset($_SESSION['role'])){
                                        echo '<li><a class="login" href="../userLogic/logout.php">Log Out</a></li>';  
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
        
        <?php
            if(isset($_SESSION['role'])&& $_SESSION['role']==0){
                $mapper1 = new BuyProductMapper();
                $orders = $mapper1 -> getAllOrders();      

                $mapper2 = new UserMapper();
                $user = $mapper2 ->getLogedInUserId($_SESSION['username']);
            
            echo  '<div id = "orders" style="display:none" class="first-Div">'; 
            echo '<h2>ORDERS</h2>';
            foreach($orders as $order){
                if($order['userId']==$user['userID']){       
                echo '<div class = "second-Div">' ;
                echo '<img src="../PICS/'.$order['productPhoto'].'">'; 
                echo '<div class="third-Div">';
                echo '<h3>'.$order['productName'].'</h3>';
                echo '<h4>'.$order['productPrice'].' $</h4>';
                echo '<a href="../buyLogic/deleteBoughtProduct.php?id='.$order['orderId'].' && pageURL='.$_SERVER['PHP_SELF'].'">Delete</a>';
                echo '</div>';
                echo '</div>';
                }
            }
            echo '</div>';
        }
        ?> 
 <body>
 <script>
    
    function showDiv(){
        var orders = document.getElementById('orders');

        
        if(orders.style.display=="block"){
            orders.style.display="none";
        }
        else if( orders.style.display=="none"){
            orders.style.display="block";
           
        } 
    }

 </script>

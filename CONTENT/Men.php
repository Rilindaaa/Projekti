<?php
  include '../components/header.php';
  require_once '../productLogic/productMapper.php';
  require_once '../userLogic/userMapper.php';
?>
        <main>
            <div class="color">
            <div class="sector1">
                <h1>M E N ' S E C T O R</h1>
            </div>
            <div>
                <img id= "m-foto" src="../PICS/f34.jpg">
            </div>
            
                <p class="paragrafi">Whether you want to know the latest men’s fashion trends,what smart casual and <br>business casual actually mean,
                 or just the right colors for your skin tone, expect <br>timeless men’s style advice with a contemporary twist and clear focus on value.</p>
            
                <div class='men'>
                    <div class='m-box'>
                        <img src="../PICS/f31.jpg">
                        <p class="Stili"> We recommend this look if you want an even more regal look.</p>     
                    </div>
                    <div class='m-box'>
                        <img src="../PICS/f32.jpg">
                        <p class="Stili">We recommend this look if you want an even more comfy look.</p>   
                    </div>
                    <div class='m-box'>
                        <img src="../PICS/f33.jpg">
                        <p class="Stili">We recommend this look if you want an even more daily look.</p> 
                    </div>
                </div>
            </div>

         <div class="shopM">
                <h1>SHOP</h1>
         </div>
        <div class ="jeans"> 
                <h1>JEANS</h1>
            </div>
        <div id ="boxes"> 
            <div class='men'>
                <?php 
                $mapper = new ProductMapper();
                $products = $mapper->getAllProducts();
                if(isset ($_SESSION['role'])){
                    $mapper1 = new UserMapper();
                    $user = $mapper1 -> getLogedInUserId($_SESSION['username']);
                }
                foreach($products as $product){
                    if($product['sektori']=='Men' && $product['llojiProduktit']=='Jeans'){

                echo '<div class="w-boxx ">';
                echo '<img src="../PICS/'.$product['fotoProduktit'].'">';
                echo '<h3> '.$product['emriProduktit'].' </h3>';
                echo ' <b><p class = "price">PRICE: '.$product['cmimiProduktit'].'$</p></b>';
                echo ' <a href = "../buyLogic/buyNow.php?userId='.$user['userID'].' && IDProduktit='.$product['produktID'].' && productName='.$product['emriProduktit'].' 
                && productFoto='.$product['fotoProduktit'].' && productPrice='.$product['cmimiProduktit'].' && productSector='.$product['sektori'].'
                && productType='.$product['llojiProduktit'].'"><button class="buynow"> BUY NOW </button></a>';
                echo '</div>';
            }}
            ?>
        </div>
        <div class ="jeans"> 
                <h1>SHOES</h1>
            </div>
        <div id ="boxes"> 
            <div class='men'>
                <?php 
                $mapper = new ProductMapper();
                $products = $mapper->getAllProducts();
                foreach($products as $product){
                    if($product['sektori']=='Men' && $product['llojiProduktit']=='Shoes'){

                echo '<div class="w-boxx ">';
                echo '<img src="../PICS/'.$product['fotoProduktit'].'">';
                echo '<h3> '.$product['emriProduktit'].' </h3>';
                echo ' <b><p class = "price">PRICE: '.$product['cmimiProduktit'].'$</p></b>';
                echo ' <a href = "../buyLogic/buyNow.php?userId='.$user['userID'].' && IDProduktit='.$product['produktID'].' && productName='.$product['emriProduktit'].' 
                && productFoto='.$product['fotoProduktit'].' && productPrice='.$product['cmimiProduktit'].' && productSector='.$product['sektori'].'
                && productType='.$product['llojiProduktit'].'"><button class="buynow"> BUY NOW </button></a>';
                echo '</div>';
            }}
            ?>
        </div>
    
        <div class ="jeans"> 
                <h1>JACKET</h1>
            </div>
        <div id ="boxes"> 
            <div class='men'>
                <?php 
                $mapper = new ProductMapper();
                $products = $mapper->getAllProducts();
                foreach($products as $product){
                    if($product['sektori']=='Men' && $product['llojiProduktit']=='Jacket'){

                echo '<div class="w-boxx ">';
                echo '<img src="../PICS/'.$product['fotoProduktit'].'">';
                echo '<h3> '.$product['emriProduktit'].' </h3>';
                echo ' <b><p class = "price">PRICE: '.$product['cmimiProduktit'].'$</p></b>';
                echo ' <a href = "../buyLogic/buyNow.php?userId='.$user['userID'].' && IDProduktit='.$product['produktID'].' && productName='.$product['emriProduktit'].' 
                && productFoto='.$product['fotoProduktit'].' && productPrice='.$product['cmimiProduktit'].' && productSector='.$product['sektori'].'
                && productType='.$product['llojiProduktit'].'"><button class="buynow"> BUY NOW </button></a>';
                echo '</div>';
            }}
            ?>
                 </div>
                </div>
            </div>
        </div>
        </main>
        <?php
  include '../components/footer.php';
?>
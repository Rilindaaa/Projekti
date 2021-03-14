
 <?php
  include '../components/header.php';
  require_once '../productLogic/productMapper.php';
?>
        <main>
            <div class="sector2">
                <h1>K I D ' S E C T O R</h1>
            </div>
            <div id="k-txt">
                <p>Clothing is an important part of our everyday lives. It keeps us warm and protects us from the weather.</p>
            </div>
            <div id ="bxo">
                <div class='kids'>
                    <div class='k-box'>
                        <img src="../PICS/foto36.png">                    
                    </div>
                    <div class='k-box'>
                        <img src="../PICS/f40.jpg">                           
                    </div>
                    <div class='k-box'>
                        <img src="../PICS/foto35.jpg">           
                    </div>
                </div>
                </div>
                <p class="k-teksti">Do you want your kids to look amazing? <br>
                You're in the right page.</p>
                <div class ="foto-txt">
                    <img id= "k-foto" src="../PICS/foto38.jpg">
                    <p>Dress your child in the right clothing for every activity they’re doing.</p>
                </div>

            </main>

            <div class="shopK">
                <h1>SHOP</h1>
            </div>
            <div class ="dressesK"> 
                <h1>DRESSES</h1>
            </div>
        <div id ="boxes"> 
            <div class='women'>
                <?php 
                $mapper = new ProductMapper();
                $products = $mapper->getAllProducts();
                foreach($products as $product){
                    if($product['sektori']=='Kids' && $product['llojiProduktit']=='Dresses'){

                echo '<div class="w-boxx ">';
                echo '<img src="../PICS/'.$product['fotoProduktit'].'">';
                echo '<h3> '.$product['emriProduktit'].' </h3>';
                echo ' <b><p class = "price">PRICE: '.$product['cmimiProduktit'].'$</p></b>';
                echo ' <button class="buynow"> BUY NOW </button>';
                echo '</div>';
            }}
            ?>
            </div>
            <div class ="dressesK"> 
                <h1>SHOES</h1>
            </div>
        <div id ="boxes"> 
            <div class='women'>
                <?php 
                $mapper = new ProductMapper();
                $products = $mapper->getAllProducts();
                foreach($products as $product){
                    if($product['sektori']=='Kids' && $product['llojiProduktit']=='Shoes'){

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

            <div class ="dressesK"> 
                <h1>JEANS</h1>
            </div>
        <div id ="boxes"> 
            <div class='women'>
                <?php 
                $mapper = new ProductMapper();
                $products = $mapper->getAllProducts();
                foreach($products as $product){
                    if($product['sektori']=='Kids' && $product['llojiProduktit']=='Jeans'){

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

            <div class ="dressesK"> 
                <h1>T-SHIRT</h1>
            </div>
        <div id ="boxes"> 
            <div class='women'>
                <?php 
                $mapper = new ProductMapper();
                $products = $mapper->getAllProducts();
                if(isset ($_SESSION['role'])){
                    $mapper1 = new UserMapper();
                    $user = $mapper1 -> getLogedInUserId($_SESSION['username']);
                }
                foreach($products as $product){
                    if($product['sektori']=='Kids' && $product['llojiProduktit']=='T-Shirt'){

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
<?php
  include '../components/footer.php';
?>
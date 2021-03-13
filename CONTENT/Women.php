<?php
  include '../components/header.php';
  require_once '../productLogic/productMapper.php';
  require_once '../userLogic/userMapper.php';


?>
        <main>
            <div class="sector">
                <h1>W O M E N ' S E C T O R</h1>
            </div>
                <div id ="boxes">
                <div class='women'>
                    <div class='w-box new-box'>
                        <img src="../PICS/f41.jpg">
                        <p class ="p-stili">When choosing a summer dress you want to find something that will keep you cool but also looking good.
                             While each woman will have different opinions on the best summer dress, ultimately it’s up to you to choose what you’re comfortable and confident in... </p>
                             <button class="semore"> <a href ="https://www.google.com/search?q=sherri+hill+dress+red&source=lnms&tbm=isch&sa=X&ved=2ahUKEwiBvpP3jdPtAhXEzKQKHb85AX8Q_AUoAXoECBsQAw&biw=1707&bih=740&dpr=1.13"> SEE MORE &raquo;</a></button>
                    </div>
                    <div class='w-box new-box'>
                        <img src="../PICS/f48.jpg">
                        <p class=" p-stili">When choosing a summer heels you want to find something that will keep you cool but also looking good.
                            While each woman will have different opinions on the best summer heels, ultimately it’s up to you to choose what you’re comfortable and confident in...</p>
                            <button class="semore"> <a href ="https://www.google.com/search?q=heels%20girls&tbm=isch&tbs=rimg:CQfzvoNtMPFpYQCAAZiiRlfK&hl=en&sa=X&ved=0CCYQuIIBahcKEwjop92FjdPtAhUAAAAAHQAAAAAQHQ&biw=1688&bih=803"> SEE MORE &raquo;</a></button>
                    </div>
                    <div class='w-box new-box'>
                        <img src="../PICS/f45.jpg">
                        <p class=" p-stili">When choosing a autumn outfit you want to find something that will keep you cool but also looking good.
                            While each woman will have different opinions on the best autumn outfit, ultimately it’s up to you to choose what you’re comfortable and confident in...</p>
                            <button class="semore"> <a href ="https://www.google.com/search?q=autumn+outfit&tbm=isch&ved=2ahUKEwifxvuQjtPtAhXXgKQKHS6IA1UQ2-cCegQIABAA&oq=autumn+outfit&gs_lcp=CgNpbWcQAzIFCAAQsQMyAggAMgIIADICCAAyAggAMgIIADICCAAyAggAMgIIADICCAA6BAgAEB46BggAEAUQHjoECAAQGDoGCAAQCBAeOggIABCxAxCDAVD_C1i_JGD9KGgBcAB4AIABggGIAbgLkgEEMC4xMpgBAKABAaoBC2d3cy13aXotaW1nwAEB&sclient=img&ei=JE_aX5-kH9eBkgWukI6oBQ&bih=740&biw=1707"> SEE MORE &raquo;</a></button>
                    </div>
                </div>
                </div>
        </main>
        <div id ="boxes"> 
            <div class='women'>
                <div class='w-box new-box' >
                    <img src="../PICS/f49.jpg">
                    <p class ="p-stili">When choosing an everyday bag you want to find something that will keep you cool but also looking good.
                         While each woman will have different opinions on the best everyday bag, ultimately it’s up to you to choose what you’re comfortable and confident in... </p>
                         <button class="semore"> <a href ="https://www.google.com/search?q=model+lady+with+handbag&tbm=isch&hl=en&sa=X&ved=2ahUKEwjjv6yxjdPtAhVGtaQKHREZDzgQrNwCKAJ6BQgBEOgB&biw=1688&bih=740"> SEE MORE &raquo;</a></button>
                </div>
                <div class='w-box new-box' >
                    <img src="../PICS/f46.jpg">
                    <p class=" p-stili">When choosing a autumn outfit you want to find something that will keep you cool but also looking good.
                        While each woman will have different opinions on the best autumn outfit, ultimately it’s up to you to choose what you’re comfortable and confident in...</p>
                        <button class="semore"> <a href ="https://www.google.com/search?q=autumn+outfit&tbm=isch&ved=2ahUKEwifxvuQjtPtAhXXgKQKHS6IA1UQ2-cCegQIABAA&oq=autumn+outfit&gs_lcp=CgNpbWcQAzIFCAAQsQMyAggAMgIIADICCAAyAggAMgIIADICCAAyAggAMgIIADICCAA6BAgAEB46BggAEAUQHjoECAAQGDoGCAAQCBAeOggIABCxAxCDAVD_C1i_JGD9KGgBcAB4AIABggGIAbgLkgEEMC4xMpgBAKABAaoBC2d3cy13aXotaW1nwAEB&sclient=img&ei=JE_aX5-kH9eBkgWukI6oBQ&bih=740&biw=1707"> SEE MORE &raquo;</a></button>
                </div>
                <div class='w-box new-box'>
                    <img src="../PICS/f43.jpg">
                    <p class=" p-stili">When choosing a summer dress you want to find something that will keep you cool but also looking good.
                        While each woman will have different opinions on the best summer dress, ultimately it’s up to you to choose what you’re comfortable and confident in...</p>
                        <button class="semore"> <a href ="https://www.google.com/search?q=dresses&source=lnms&tbm=isch&sa=X&ved=2ahUKEwj2jv6QkdDtAhXGqaQKHXQTCF4Q_AUoAXoECAQQAw&biw=1707&bih=803&dpr=1.13"> SEE MORE &raquo;</a></button>
                </div>
            </div>
        </div>

        <div class="shop">
                <h1>SHOP</h1>
            </div>
            <div class ="dresses"> 
                <h1>DRESSES</h1>
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
                    if($product['sektori']=='Women' && $product['llojiProduktit']=='Dresses'){
                        echo '<div class="w-boxx ">';
                        echo '<img src="../PICS/'.$product['fotoProduktit'].'">';
                        echo '<h3> '.$product['emriProduktit'].' </h3>';
                        echo ' <b><p class = "price">PRICE: '.$product['cmimiProduktit'].'$</p></b>';
                        echo ' <a href = "../buyLogic/buyNow.php?userId = '.$user['userID'].' && IDProduktit ='.$product['produktID'].' && productName = '.$product['emriProduktit'].' 
                        && productFoto ='.$product['fotoProduktit'].' && productPrice = '.$product['cmimiProduktit'].' && productSector = '.$product['sektori'].'
                        && productType = '.$product['llojiProduktit'].'"><button class="buynow"> BUY NOW </button></a>';
                        echo '</div>';
            }}
            ?>
            </div>
       

        <div class ="dresses"> 
                <h1>SHOES</h1>
            </div>
        <div id ="boxes"> 
            <div class='women'>
                <?php 
                $mapper = new ProductMapper();
                $products = $mapper->getAllProducts();
                foreach($products as $product){
                    if($product['sektori']=='Women' && $product['llojiProduktit']=='Shoes'){

                        echo '<div class="w-boxx ">';
                        echo '<img src="../PICS/'.$product['fotoProduktit'].'">';
                        echo '<h3> '.$product['emriProduktit'].' </h3>';
                        echo ' <b><p class = "price">PRICE: '.$product['cmimiProduktit'].'$</p></b>';
                        echo ' <a href = "../buyLogic/buyNow.php?userId = '.$user['userID'].' && IDProduktit ='.$product['produktID'].' && productName = '.$product['emriProduktit'].' 
                        && productFoto ='.$product['fotoProduktit'].' && productPrice = '.$product['cmimiProduktit'].' && productSector = '.$product['sektori'].'
                        && productType = '.$product['llojiProduktit'].'"><button class="buynow"> BUY NOW </button></a>';
                        echo '</div>';
            }}
            ?>
 
        </div> 
        
        <div class ="dresses"> 
                <h1>BAGS</h1>
            </div>
            <div id ="boxes"> 
            <div class='women'>
                <?php 
                $mapper = new ProductMapper();
                $products = $mapper->getAllProducts();
                foreach($products as $product){
                    if($product['sektori']=='Women' && $product['llojiProduktit']=='Bags'){

                        echo '<div class="w-boxx ">';
                        echo '<img src="../PICS/'.$product['fotoProduktit'].'">';
                        echo '<h3> '.$product['emriProduktit'].' </h3>';
                        echo ' <b><p class = "price">PRICE: '.$product['cmimiProduktit'].'$</p></b>';
                        echo ' <a href = "../buyLogic/buyNow.php?userId = '.$user['userID'].' && IDProduktit ='.$product['produktID'].' && productName = '.$product['emriProduktit'].' 
                        && productFoto ='.$product['fotoProduktit'].' && productPrice = '.$product['cmimiProduktit'].' && productSector = '.$product['sektori'].'
                        && productType = '.$product['llojiProduktit'].'"><button class="buynow"> BUY NOW </button></a>';
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
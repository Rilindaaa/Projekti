<?php

include_once "buyProductMapper.php";

if(isset($_GET['userId']) && isset($_GET['IDProduktit']) && isset($_GET['productName']) && isset($_GET['productFoto']) && isset($_GET['productPrice'] ) && isset($_GET['productSector']) && isset($_GET['productType'])) {
   $userID = $_GET['userId'];
   $productID = $_GET['IDProduktit'];
   $productName = $_GET['productName'];
   $productPhoto = $_GET['productFoto'];
   $productPrice = $_GET['productPrice'];
   $productSector = $_GET['productSector'];
   $productType = $_GET['productType'];
   $pageUrl = $_GET['pageURL']; 

    
   $mapper = new BuyProductMapper();
   $mapper -> insertBoughtProduct($userID, $productID, $productName, $productPhoto, $productPrice, $productSector, $productType);

   header("Location:$pageUrl");
}
 




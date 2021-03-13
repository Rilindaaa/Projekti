<?php

include_once 'productMapper.php';


if(isset($_POST['id']) && isset($_POST['emriProduktit']) && isset($_POST['fotoja']) &&  isset($_POST['cmimi']) && isset($_POST['sector'])&& isset($_POST['producttype'])){
    $productID = $_POST['id'];
    $productName = $_POST['emriProduktit'];
    if($_POST['fotoja'] == null){
        $productPhoto = $_POST['fotoja1'];
    }

    else{
        $productPhoto = $_POST['fotoja'];
    }

    $productPrice = $_POST['cmimi'];
    $productSector = $_POST['sector'];
    $productClothes = $_POST['producttype'];

    if(empty($productName)||empty($productPhoto) || empty($productPhoto)  ||  empty($productPrice) || empty($productSector) ||  empty($productClothes)){

        echo '<script type="text/javascript">;';
        echo 'window.location.href="../CONTENT/dashboard.php";';
        echo 'alert("Column can not be empty!");';
        echo '</script>;';
        return true;
    }
    
    $mapper = new ProductMapper();
    $mapper -> updateProduct($productID, $productName, $productPhoto, $productPrice , $productSector, $productClothes);

    header('Location:../CONTENT/dashboard.php');
}



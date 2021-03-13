<?php


include_once 'productMapper.php';

if(isset($_GET['id'])){
    $produktId = $_GET['id'];
    $mapper = new ProductMapper();
    $mapper -> deleteProduct($produktId);
    header('Location:../CONTENT/dashboard.php');
}





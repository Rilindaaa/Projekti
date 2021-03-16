<?php

include_once 'buyProductMapper.php';

if(isset($_GET['id'])){
    $orderId = $_GET['id'];
    $pageUrl = $_GET['pageURL'];
    $mapper = new BuyProductMapper();
    $mapper -> deleteBoughtProduct($orderId);
    header("Location:$pageUrl");
}



<?php
    include_once 'userMapper.php';

    if(isset($_GET['id'])){
        $userId = $_GET['id'];
        $mapper = new UserMapper();
        $mapper -> advancedToAdmin($userId);
        header('Location:../CONTENT/dashboard.php');
    }
















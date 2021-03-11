<?php

include_once 'userMapper.php';

if(isset($_POST['userId'])&&isset($_POST['username'])&&isset($_POST['email'])){

    $userId = $_POST['userId'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    if(empty($username)||empty($email) || !preg_match('/^[A-Z][a-z]{5,}$/',$username)||!preg_match('/^\S+@\S+\.\S+$/',$email)){

        echo '<script type="text/javascript">;';
        echo 'window.location.href="../CONTENT/dashboard.php";';
        echo 'alert("Username or Email unacceptable!");';
        echo '</script>;';
    }
    else{
        $mapper = new UserMapper();
        $users = $mapper->getAllUsersExcept($userId);
        foreach($users as $user){
            if($user['username']==$username || $user['email']==$email){
                echo '<script type="text/javascript">;';
                echo 'window.location.href="../CONTENT/dashboard.php";';
                echo 'alert("Username or Email already exists!");';
                echo '</script>;';
                return true;
            }
        }
        $mapper->updateUser($userId,$username,$email);
        header('Location:../CONTENT/dashboard.php');
    }
}
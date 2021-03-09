<?php

    include_once 'adminClass.php';
    include_once 'simpleUserClass.php';
    require_once 'userMapper.php';



    session_start();

    if(isset($_POST['loginButon'])){
        $login = new Login($_POST);
        $login->verifyData();
    }
    else {
        header('Location:../CONTENT/index.php');
    }
    class Login{
        private $username='';
        private $password = '';

    public function __construct($data){
        $this->username = $data['username'];
        $this-> password = $data['password'];

    }

    public function verifyData(){
        if($this->verifyEmptyData($this->username, $this->password)){
            header('Location:../CONTENT/login.php');
          
        }
        else if($this-> verifyExist($this->username, $this->password)){
            header('Location:../CONTENT/index.php');
        }
        else{
            header('Location:../CONTENT/login.php');

        }


    }

    private function verifyEmptyData($username,$password ){
        if(empty($username) || empty($password)){
            return true;
        }
        return false;
    }

    private function verifyExist($username,$password){
        $mapper = new UserMapper();
        $user = $mapper->getUserByUsername($username);
        
        if($user == null){
            return false;
        }
        else if(password_verify($password,$user['password'])) {
            if($user['role'] == 1){
                $obj = new Admin($user['username'], $user['password'], $user['email'], $user['role']);
                $obj->setSession();
            }
            else{
                $obj = new SimpleUser($user['username'], $user['password'], $user['email'], $user['role']);
                $obj->setSession();
            }
            return true;
        }
            else{
                return false;
         }    
    }
}






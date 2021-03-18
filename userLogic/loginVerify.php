<?php

    include_once 'adminClass.php';
    include_once 'simpleUserClass.php';
    require_once 'userMapper.php';



    session_start();

    if(isset($_POST['loginButon'])){
        $login = new Login($_POST);
        $login->verifyData();
    }
    else if(isset($_POST['register-btn'])){
        $register = new Register($_POST);
        $register->insertData();
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
            $_SESSION['username'] = $this->username;
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
    class Register {

        private $username="";
        private $password="";
        private $confirmpassword="";
        private $email="";
        private $emailRegex ="/^\S+@\S+\.\S+$/";
        private $usernameRegex="/^[A-Z][a-z]{4,}$/";
        private $passwordRegex="/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";


        public function __construct($data){
            $this->username=$data['username'];
            $this->password=$data['password'];
            $this->confirmpassword=$data['confirmpassword'];
            $this->email=$data['email'];
        }
        public function insertData(){
            $user = new SimpleUser($this->username,$this->password, $this->email, 0);
            if($this->emptyData($this->username,$this->password, $this->confirmpassword, $this->email) && $this->verifyExists($this->username,$this->password, $this->confirmpassword, $this->email)){
                $mapper = new UserMapper();

                $mapper->insertUser($user);

                if($this->verifyExist($this->username, $this->password)){
                    $_SESSION['username'] = $this->username;
                    header('Location:../CONTENT/index.php');
                }
            }
        }
        

        private function emptyData($username, $password, $confirmpassword, $email){
            if(empty($username) || empty($password) || empty($confirmpassword) || empty($email)){
                return false;
            }
            return true;
        }

        private function verifyExists($username, $password, $confirmpassword, $email){
            if(!preg_match($this->usernameRegex,$username)){
               return false; 
            }
            else if(!preg_match($this->passwordRegex,$password)){
                return false;
            }
            else if(!preg_match($this->emailRegex,$email)){
                return false;
            }
            else if($password != $confirmpassword){
                return false;
            }
            else{
                return true;
            }
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







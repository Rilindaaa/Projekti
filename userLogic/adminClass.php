<?php

require_once 'personClass.php';

class Admin extends Person {
   public  function __construct($username, $password, $email, $role){
    parent::__construct($username, $password, $email, $role);
   }

   public function setSession(){
       $_SESSION['role']=1;
   }
   public function setCookie(){
    setcookie('username',$this->getUsername(),time()+2*24*60*60);
   }

   public function getUsername(){
       return $this->username;
   }

   public function getPassword(){
       return $this->password;
   }

   public function getEmail(){
       return $this->email;
   }

   public function getRole(){
       return $this->role;
   }
}
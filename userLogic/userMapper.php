<?php

include_once '../databaseConnection/configD.php';

    class UserMapper extends DbConfig{
        private $connection;
        private $query;

       public function __construct(){
            $this->connection = $this->getConnection();
       } 

       public function getUserByUsername($username){
            $this->query = 'select * from user where username = :username';
            $statement = $this-> connection ->prepare($this->query);
            $statement -> bindParam(':username',$username );
            $statement -> execute();
            $result = $statement->fetch (PDO::FETCH_ASSOC);
            return $result;
      }

      public function insertUser($user){
          
          $this->query = 'insert into user(username, password, email, role) values (:username, :password, :email, :role)';
          $statement= $this->connection->prepare($this->query);
          $username = $user->getUsername();
          $password = $user->getPassword();
          $email = $user->getEmail();
          $role = $user->getRole();

          $passwordEncrypted = password_hash($password, PASSWORD_BCRYPT);

          $statement -> bindParam(':username', $username);
          $statement -> bindParam(':password', $passwordEncrypted);
          $statement -> bindParam(':email', $email);
          $statement -> bindParam(':role', $role);
 
          $statement -> execute();
          

      }

}


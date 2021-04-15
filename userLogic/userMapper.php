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

      public function getAllUsers(){
          $this->query = 'select * from user ';
          $statement = $this-> connection ->prepare($this->query);
          $statement -> execute();
          $result = $statement->fetchAll (PDO::FETCH_ASSOC);
            return $result;
      }

      public function advancedToAdmin($userId){
          $this-> query = 'update user set role ="1" where userID =:userId';
          $statement = $this -> connection -> prepare($this->query);
          $statement -> bindParam(':userId', $userId);
          $st11atement -> execute();
      }

      public function deleteUser($userId){
        $this-> query = 'delete from user where userID = :userId';
        $statement = $this -> connection -> prepare($this->query);
        $statement -> bindParam(':userId', $userId);
        $statement -> execute();
    }

    public function getAllUsersExcept($userId){
        $this->query = 'select * from user where userID!=:userId';
        $statement = $this-> connection ->prepare($this->query);
        $statement -> bindParam(':userId', $userId);
        $statement -> execute();
        $result = $statement->fetchAll (PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateUser($userId,$username,$email){

        $this->query='update user set username=:username,email=:email where userID=:userid';
        $statement = $this-> connection ->prepare($this->query);
        $statement -> bindParam(':userid', $userId);
        $statement -> bindParam(':username', $username);
        $statement -> bindParam(':email', $email);
        $statement -> execute();

    }

    public function getLogedInUserId($username){
        $this->query = 'select * from user where username = :userName limit 1';
        $statement = $this-> connection -> prepare($this->query);
        $statement -> bindParam(':userName',$username );
        $statement -> execute();
        $result = $statement->fetch ();
        return $result;
    }

    public function getUsernameById($userId){
        $this->query = 'select username from user where userID = :userID';
        $statement = $this-> connection ->prepare($this->query);
        $statement -> bindParam(':userID',$userId );
        $statement -> execute();
        $result = $statement->fetchColumn();
         return $result;
    }

}






   
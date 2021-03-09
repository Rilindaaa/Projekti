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


}
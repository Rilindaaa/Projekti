<?php

include_once '../databaseConnection/configD.php';


class BuyProductMapper extends DbConfig{
    private $query;
    private $connection;

    public function __construct(){
        $this->connection=$this->getConnection();
    }

    public function insertBoughtProduct($userID, $productID, $productName, $productPhoto, $productPrice, $productSector, $productType){
        $this->query = 'insert into orders (userId, productId, productName, productPhoto, productPrice, productSector, productType) values (:userId, :productId, :productName, :productPhoto, :productPrice, :productSector, :productType)';

        $statement = $this->connection->prepare($this->query);

        $statement -> bindParam(':userId', $userID);
        $statement -> bindParam(':productId', $productID);
        $statement -> bindParam(':productName', $productName);
        $statement -> bindParam(':productPhoto', $productPhoto);
        $statement -> bindParam(':productPrice', $productPrice);
        $statement -> bindParam(':productSector', $productSector);
        $statement -> bindParam(':productType', $productType);
       
        $statement->execute();
    }

    public function getAllOrders(){
        $this->query = 'select * from orders';
        $statement = $this->connection->prepare($this->query);
        $statement -> execute();

        $result = $statement->fetchAll();
        return $result;
    }

    public function deleteBoughtProduct($orderID){
        $this->query = 'delete from orders where orderId = :orderId';
        $statement = $this->connection->prepare($this->query);
        $statement -> bindParam(':orderId', $orderID);
        $statement -> execute();
    }

}
<?php

include_once "../databaseConnection/configD.php";


class ProductMapper extends DbConfig{
    private $query;
    private $connection;

    public function __construct(){
        $this->connection=$this->getConnection();
    }

    public function insertProduct($product){
        $this->query = "insert into produkte (emriProduktit, cmimiProduktit, fotoProduktit, sektori, llojiProduktit) values (:emriProduktit, :cmimiProduktit, :fotoProduktit, :sektori, :llojiProduktit)";
        $statement = $this->connection->prepare($this->query);
        $emri = $product->getName();
        $cmimi = $product->getPrice();
        $foto = $product-> getPhoto();
        $lloji = $product->getType();
        $sektori = $product->getSector();

        $statement -> bindParam(':emriProduktit', $emri);
        $statement -> bindParam(':cmimiProduktit', $cmimi); 
        $statement -> bindParam(':fotoProduktit', $foto);
        $statement -> bindParam(':sektori', $sektori);
        $statement -> bindParam(':llojiProduktit', $lloji);
        
        $statement-> execute();

    }

    public function getAllProducts(){
        $this->query = 'select * from produkte ';
        $statement = $this-> connection ->prepare($this->query);
        $statement -> execute();
        $result = $statement->fetchAll (PDO::FETCH_ASSOC);
        return $result;
        
    }

    public function updateProduct($productID, $productName, $productPhoto, $productPrice , $productSector, $productClothes){
        $this->query ='update produkte set emriProduktit =:productName ,  fotoProduktit = :productPhoto, cmimiProduktit = :productPrice, sektori =:productSector,  llojiProduktit =:productClothes where produktID = :productID';
        $statement = $this-> connection -> prepare($this->query);
        $statement -> bindParam(':productName', $productName );
        $statement -> bindParam(':productPhoto', $productPhoto );
        $statement -> bindParam(':productPrice', $productPrice );
        $statement -> bindParam(':productSector', $productSector );
        $statement -> bindParam(':productClothes', $productClothes);
        $statement -> bindParam(':productID', $productID);

        $statement -> execute();
    }

    public function deleteProduct($produktId){
        $this-> query = 'delete from produkte where produktID = :produkti';
        $statement = $this -> connection -> prepare($this->query);
        $statement -> bindParam(':produkti', $produktId);
        $statement -> execute();
    }
}


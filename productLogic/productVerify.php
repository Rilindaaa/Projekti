<?php

include_once "productClass.php";
include_once "productMapper.php";

    if(isset($_POST['submit-btn'])){
        $register = new RegisterProduct($_POST);
        $register -> insertData();

    }
    else{
        header('Location:../CONTENT/dashboard.php');
    }

    class RegisterProduct {
        private $name="";
        private $price="";
        private $type="";
        private $sector="";
        private $photo="";

        public function __construct($data){
            $this->name=$data['emriProduktit']; 
            $this->price=$data['cmimi'];
            $this->type=$data['producttype'];
            $this->sector=$data['sector'];
            $this->photo=$data['fotoja'];
        }

        public function insertData(){
            $product = new Product($this->name,$this->price, $this->type, $this->sector, $this->photo);
            if($this->emptyData($this->name,$this->price, $this->type, $this->sector, $this->photo) && $this->verifyExists( $this->photo)){
                $mapper = new ProductMapper();

                $mapper->insertProduct($product);

                    header('Location:../CONTENT/index.php');
            }
            else{
                echo '<script type="text/javascript">;';
                echo 'window.location.href="../CONTENT/dashboard.php";';
                echo 'alert("Column can not be empty!");';
                echo '</script>;';
            }
        }
        

        private function emptyData($name, $price, $type, $sector, $photo){
            if(empty($name) || empty($price) || empty($type) || empty($sector) || empty($photo)){
                return false;
            }
            return true;
        }

        private function verifyExists( $photo){
            $mapper = new ProductMapper();
            $products = $mapper->getAllProducts();

            foreach($products as $product){
                if($product['fotoProduktit']==$photo){
                    echo '<script type="text/javascript">;';
                    echo 'window.location.href="../CONTENT/dashboard.php";';
                    echo 'alert("Product already exists!");';
                    echo '</script>;';
                    return false;
                }
            }
            return true;
        }
  
    }
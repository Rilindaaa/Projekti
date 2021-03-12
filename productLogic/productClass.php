<?php

    class Product {
        protected $name;
        protected $price;
        protected $type;
        protected $sector;
        protected $photo;

        function __construct($name, $price, $type, $sector, $photo){
            $this->name=$name;
            $this->price=$price;
            $this->type=$type;
            $this->sector=$sector;
            $this->photo=$photo;
        }

        public function getName(){
            return $this->name;
        }

        public function getPrice(){
            return $this->price;
        }

        public function getType(){
            return $this->type;
        }
        

        public function getSector(){
            return $this->sector;
        }

        public function getPhoto(){
            return $this->photo;
        }

    
    }
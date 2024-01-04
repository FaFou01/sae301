<?php
    class Product{
        public $productName;
        public $productPicture;
        public $productPrice;
        public $productDescription;
        public $productType;

        public function __construct($productName, $productPicture, $productPrice, $productDescription, $productType){
            $this->productName = $productName;
            $this->productPicture = $productPicture;
            $this->productPrice = $productPrice;
            $this->productDescription = $productDescription;
            $this->productType = $productType;
        }
    }
?>
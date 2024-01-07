<?php
    class Product{
        public $productId;
        public $productName;
        public $productPicture;
        public $productPrice;
        public $productDescription;
        public $productType;
        public $productBrand;
        public $productAdvice;
        public $productQuantityAvailable;

        public function __construct($productId, $productName, $productPicture, $productPrice, $productDescription, $productType, $productBrand, $productAdvice, $productQuantityAvailable){
            $this->productId = $productId;
            $this->productName = $productName;
            $this->productPicture = $productPicture;
            $this->productPrice = $productPrice;
            $this->productDescription = $productDescription;
            $this->productType = $productType;
            $this->productBrand = $productBrand;
            $this->productAdvice = $productAdvice;
            $this->productQuantityAvailable = $productQuantityAvailable;
        }
    }
?>
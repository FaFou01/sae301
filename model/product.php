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
        public $productIngredient;
        public $productQuantityAvailable;

        public function __construct($productId, $productName, $productPicture, $productPrice, $productDescription, $productType, $productBrand, $productAdvice, $productIngredient, $productQuantityAvailable){
            $this->productId = $productId;
            $this->productName = $productName;
            $this->productPicture = $productPicture;
            $this->productPrice = $productPrice;
            $this->productDescription = $productDescription;
            $this->productType = $productType;
            $this->productBrand = $productBrand;
            $this->productAdvice = $productAdvice;
            $this->productIngredient = $productIngredient;
            $this->productQuantityAvailable = $productQuantityAvailable;
        }
    }
?>
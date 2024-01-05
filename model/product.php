<?php
    class Product{
        public $productId;
        public $productName;
        public $productPicture;
        public $productPrice;
        public $productDescription;
        public $productType;

        public function __construct($productId, $productName, $productPicture, $productPrice, $productDescription, $productType){
            $this->productId = $productId;
            $this->productName = $productName;
            $this->productPicture = $productPicture;
            $this->productPrice = $productPrice;
            $this->productDescription = $productDescription;
            $this->productType = $productType;
        }
    }
?>
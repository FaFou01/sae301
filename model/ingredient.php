<?php
    class Ingredient{
        public $ingredientName;
        public $productId;

        public function __construct($ingredientName, $productId){
            $this->ingredientName = $ingredientName;
            $this->productId = $productId;
        }
    }
?>
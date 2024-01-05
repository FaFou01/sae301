<?php
    class Advice{
        public $adviceContent;
        public $productId;

        public function __construct($adviceContent, $productId){
            $this->adviceContent = $adviceContent;
            $this->productId = $productId;
        }
    }
?>
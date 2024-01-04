<?php
    include_once("model/bdd.php");
    include_once("model/Model.php");
    class productController {
        public $bdd;
        public $model;

        public function __construct(){
            $this->bdd = new connexionBDD();
        }
        public function addProduct() {

        }
        public function deleteProduct() {

        }
        public function changeProductQuantity() {

        }
        public function changeProductPrice(){

        }
    }
?>
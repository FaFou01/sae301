<?php
    include_once("model/bdd.php");
    include_once("model/Model.php");
    class adviceController {
        public $bdd;
        public $model;

        public function __construct(){
            $this->bdd = new connexionBDD();
        }
        public function addAdvice() {

        }
    }
?>
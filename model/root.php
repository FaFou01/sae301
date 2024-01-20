<?php
    Class Root{

        public $url;

        public function __construct() {
            $this->url = $this->splitURL();
        }

        public function splitURL(){
            if($_SERVER['QUERY_STRING'] != ''){
                return explode("/", $_SERVER['QUERY_STRING']);
            }
            else{
                return '';
            }
        }
    }
?>
<?php
    include_once("model/Model.php");

    class Controller{
        public $model;

        public function __construct()
        {
            $this->model = new Model ();
        }

        public function invoke()
        {
            include('view/viewTemplateTop.php');
            if(isset($_GET['page'])){
                if($_GET['page'] == 'liste_produits'){
                    include('view/viewProductsList.php');
                }
            }
            else{
                include('view/viewIndex.php');
            }
            include('view/viewTemplateBottom.php');
        }
    }
?>
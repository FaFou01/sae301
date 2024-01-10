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
                if($_GET['page'] == 'liste_produits_homme'){
                    $productsList = $this->model->getProductList('Homme');
                    include('view/viewMenProductsList.php');
                }
                else if($_GET['page'] == 'liste_produits_femme'){
                    $productsList = $this->model->getProductList('Femme');
                    include('view/viewWomenProductsList.php');
                }
                else if($_GET['page'] == 'produit'){
                    $product = $this->model->getProduct($_GET['productId']);
                    $ingredients = $this->model->getProductIngredients($_GET['productId']);
                    include('view/viewProduct.php');
                }
                else if($_GET['page'] == 'panier'){
                    if(isset($_COOKIE['panier'])){
                        include('view/viewFullBasket.php');
                    }
                    else{
                        include('view/viewEmptyBasket.php');
                    }
                    
                }
                else if($_GET['page'] == 'livraison'){
                    include('view/viewDelivery.php');
                }
            }
            else{
                include('view/viewIndex.php');
            }
            include('view/viewTemplateBottom.php');
        }
    }
?>
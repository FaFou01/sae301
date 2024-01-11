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
            if(isset($_GET['page'])){
                if($_GET['page'] == 'liste_produits_homme'){
                    $productsList = $this->model->getProductList('Homme');
                    $css = 'productList';
                    $page = 'viewMenProductsList';
                }
                else if($_GET['page'] == 'liste_produits_femme'){
                    $productsList = $this->model->getProductList('Femme');
                    $css = 'productList';
                    $page = 'viewWomenProductsList';
                }
                else if($_GET['page'] == 'produit'){
                    $product = $this->model->getProduct($_GET['productId']);
                    $ingredients = $this->model->getProductIngredients($_GET['productId']);
                    $css = 'product';
                    $page = 'viewProduct';
                }
                else if($_GET['page'] == 'panier'){
                    $css = 'panier';
                    if(isset($_COOKIE['panier'])){
                        $page = 'viewFullBasket';
                    }
                    else{
                        $page = 'viewEmptyBasket';
                    }
                    
                }
                else if($_GET['page'] == 'livraison'){
                    $css = 'delivery';
                    $page = 'viewDelivery';
                }
                else if($_GET['page'] == 'inscription'){
                    $css = 'signin';
                    $page = 'viewSignIn';
                }
                else if($_GET['page'] == 'connexion'){
                    $css = 'connexion';
                    $page = 'viewConnexion';
                }
                else if($_GET['page'] == 'paiement'){
                    $css = 'paiement';
                    $page = 'viewPayment';
                }
                else if($_GET['page'] == 'compte'){
                    $css = 'account';
                    $page = 'viewAccount';
                }
                else if($_GET['page'] == 'contact'){
                    $css = 'contact';
                    $page = 'viewContact';
                }
                else if($_GET['page'] == 'rgpd'){
                    $css = 'rgpd';
                    $page = 'viewRGPD';
                }
                else if($_GET['page'] == 'ml'){
                    $css = 'ml';
                    $page = 'viewML';
                }
            }
            else{
                $page = 'viewIndex';
                $css = 'index';
            }
            include('view/viewTemplateTop.php');
            include('view/'.$page.'.php');
            include('view/viewTemplateBottom.php');
        }
    }
?>
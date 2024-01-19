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
            session_start();
            //partie pour les actions a effectuer dans la BDD
            if(isset($_POST['prenom']) and isset($_POST['nom'])){
                $this->model->addUser($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mdp']);
            }
            else if(isset($_POST['emailConnexion']) and isset($_POST['mdpConnexion'])){
                $this->model->connect($_POST['emailConnexion'], $_POST['mdpConnexion']);
                header('Location: index.php');
            }
            else if(isset($_POST['prenomCompte']) and isset($_POST['nomCompte'])){
                $this->model->updateUser($_SESSION['userId'], $_POST['prenomCompte'], $_POST['nomCompte'], $_POST['mailCompte']);
            }

            //partie pour effectuer des actions
            if(isset($_GET['action'])){
                if($_GET['action'] == 'deconnect'){
                    $this->model->deconnect();
                    header('Location: index.php');
                }
            }

            //partie pour choisir la page à afficher
            if(isset($_GET['page'])){
                if($_GET['page'] == 'liste_produits_homme'){
                    $productsList = $this->model->getProductList('Homme');
                    $css = 'productList';
                    $page = 'viewMenProductsList';
                    if(isset($_GET['action']) and $_GET['action'] == "changeQuantity"){
                        $this->model->updateProductQuantityAvailable( $_GET['article'], $_POST['newQuantity']);
                    }
                }
                else if($_GET['page'] == 'liste_produits_femme'){
                    $productsList = $this->model->getProductList('Femme');
                    $css = 'productList';
                    $page = 'viewWomenProductsList';
                }
                else if($_GET['page'] == 'liste_petit_prix'){
                    $productsList = $this->model->getProductList('PP');
                    $css = 'productList';
                    $page = 'viewSmallPrices';
                }
                else if($_GET['page'] == 'produit'){
                    $product = $this->model->getProduct($_GET['productId']);
                    $noticeList = $this->model->getProductNotices($_GET['productId']);
                    $css = 'product';
                    $page = 'viewProduct';

                    //partie pour gérer le panier
                    if(isset($_POST['finalPrice'])){
                        $this->model->addProductToBasket($product->productPicture,$product->productName, $_POST['price'], $_POST['quantity'], $product->productQuantityAvailable, $_POST['finalPrice']);
                    }
                }
                else if($_GET['page'] == 'panier'){
                    $css = 'panier';
                    if(isset($_GET['action'])){
                        if($_GET['action'] == "supprArticle"){
                            array_splice($_SESSION['panier'], $_GET['article'], 1);
                        }
                        else if($_GET['action'] == "augmenterArticle"){
                            $_SESSION['panier'][$_GET['article']][3]++;
                        }
                        else if($_GET['action'] == "réduireArticle"){
                            $_SESSION['panier'][$_GET['article']][3]--;
                        }
                    }
                    if(isset($_SESSION['panier']) and !empty($_SESSION['panier'])){
                        $page = 'viewFullBasket';
                    }
                    else{
                        $page = 'viewEmptyBasket';
                    }
                    
                }
                else if($_GET['page'] == 'livraison'){
                    $css = 'delivery';
                    $page = 'viewDelivery';
                    if(isset($_POST['promo']) and $_POST['promo'] == "PROMO"){
                        $_SESSION['prixPanier'] = $_SESSION['prixPanier'] - $_SESSION['prixPanier']/10;
                    }
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
                    $orderList = $this->model->getUserOrders($_SESSION['userId']);
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
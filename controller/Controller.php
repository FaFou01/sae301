<?php
    include_once("model/Model.php");
    include_once("model/root.php");

    class Controller{
        public $model;
        public $root;
        public $url;

        public function __construct()
        {
            $this->model = new Model ();
            $this->root = new Root();
            $this->url = $this->root->url;
        }

        public function invoke()
        {
            session_start();
            $root = 'http://127.0.0.1/dashboard/sae301';
            $dossierImg = $root."/assets/img/";
            $dossierJs = $root."/assets/js/";
            $dossierCss = $root."/assets/css/";
            //partie pour les actions a effectuer dans la BDD
            if(isset($_POST['prenom']) and isset($_POST['nom'])){
                $this->model->addUser($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mdp']);
            }
            else if(isset($_POST['emailConnexion']) and isset($_POST['mdpConnexion'])){
                $this->model->connect($_POST['emailConnexion'], $_POST['mdpConnexion']);
                header('Location: '.$root);
            }
            else if(isset($_POST['prenomCompte']) and isset($_POST['nomCompte'])){
                $this->model->updateUser($_SESSION['userId'], $_POST['prenomCompte'], $_POST['nomCompte'], $_POST['mailCompte']);
            }

            //partie pour effectuer des actions
            if(isset($_GET['action'])){
                if($_GET['action'] == 'deconnect'){
                    $this->model->deconnect();
                    header('Location: '.$root);
                }
            }
            //partie pour choisir la page à afficher
            if($this->url != ''){
                if($this->url[0] == 'products'){
                    $css = 'productList';
                    if($this->url[1] == 'men'){
                        $productsList = $this->model->getProductList('Homme');
                        $page = 'viewMenProductsList';
                        if(isset($_GET['action']) and $_GET['action'] == "changeQuantity"){
                            $this->model->updateProductQuantityAvailable( $_GET['article'], $_POST['newQuantity']);
                        }
                    }
                    else if($this->url[1] == 'women'){
                        $productsList = $this->model->getProductList('Femme');
                        $page = 'viewWomenProductsList';
                        if(isset($_GET['action']) and $_GET['action'] == "changeQuantity"){
                            $this->model->updateProductQuantityAvailable( $_GET['article'], $_POST['newQuantity']);
                        }
                    }
                    else if($this->url[1] == 'small_prices'){
                        $productsList = $this->model->getProductList('PP');
                        $page = 'viewSmallPrices';
                        if(isset($_GET['action']) and $_GET['action'] == "changeQuantity"){
                            $this->model->updateProductQuantityAvailable( $_GET['article'], $_POST['newQuantity']);
                        }
                    }
                    if($this->url[2] != ''){
                        if(isset($_GET['action']) and $_GET['action'] == 'addNotice'){
                            $this->model->addNotice($this->url[2], $_SESSION['userId'], $_POST['notice']);
                        }
                        $product = $this->model->getProduct($this->url[2]);
                        $noticeList = $this->model->getProductNotices($this->url[2]);
                        $css = 'product';
                        $page = 'viewProduct';
    
                        if(isset($_POST['finalPrice'])){
                            $this->model->addProductToBasket($product->productPicture,$product->productName, $_POST['price'], $_POST['quantity'], $product->productQuantityAvailable, $_POST['finalPrice']);
                        }
                    }
                }
                else if($this->url[0] == 'basket'){
                    $css = 'panier';
                    $gifts = $this->model->getProductList('Offert');
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
                        header('Location: '.$root.'/basket/');
                    }
                    if(isset($_SESSION['panier']) and !empty($_SESSION['panier'])){
                        $page = 'viewFullBasket';
                    }
                    else{
                        $page = 'viewEmptyBasket';
                    }
                    
                }
                else if($this->url[0] == 'livraison'){
                    $css = 'delivery';
                    $page = 'viewDelivery';
                    if(isset($_POST['promo']) and $_POST['promo'] == "PROMO"){
                        $_SESSION['prixPanier'] = $_SESSION['prixPanier'] - $_SESSION['prixPanier']/10;
                    }
                }
                else if($this->url[0] == 'singin'){
                    $css = 'signin';
                    $page = 'viewSignIn';
                }
                else if($this->url[0] == 'connect'){
                    $css = 'connexion';
                    $page = 'viewConnexion';
                }
                else if($this->url[0] == 'paiement'){
                    $css = 'paiement';
                    $page = 'viewPayment';
                }
                else if($this->url[0] == 'account'){
                    $orderList = $this->model->getUserOrders($_SESSION['userId']);
                    $css = 'account';
                    $page = 'viewAccount';
                }
                else if($this->url[0] == 'contact'){
                    $css = 'contact';
                    $page = 'viewContact';
                }
                else if($this->url[0] == 'rgpd'){
                    $css = 'rgpd';
                    $page = 'viewRGPD';
                }
                else if($this->url[0] == 'ml'){
                    $css = 'ml';
                    $page = 'viewML';
                }
            }
            else{
                $page = 'viewIndex';
                $css = 'index';
                $productSelection = $this->model->getSelection();
            }
            include('view/viewTemplateTop.php');
            include('view/'.$page.'.php');
            include('view/viewTemplateBottom.php');
        }
    }
?>
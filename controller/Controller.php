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
            // $root = 'http://127.0.0.1/dashboard/sae301';
            $root = 'https://sae301.digitalmattprestation.fr';
            $dossierImg = $root."/assets/img/";
            $dossierJs = $root."/assets/js/";
            $dossierCss = $root."/assets/css/";
            //partie pour les actions a effectuer dans la BDD
            if(isset($_POST['prenom']) and isset($_POST['nom'])){
                $this->model->addUser($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mdp']);
            }
            else if(isset($_POST['emailConnexion']) and isset($_POST['mdpConnexion'])){
                $this->model->connect($_POST['emailConnexion'], $_POST['mdpConnexion']);
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
                        $brandList = $this->model->getBrandList('Homme');
                        $typeList = $this->model->getTypeList('Homme');
                        $page = 'viewMenProductsList';
                        if(isset($_GET['action']) and $_GET['action'] == "changeQuantity"){
                            $this->model->updateProductQuantityAvailable( $_GET['article'], $_POST['newQuantity']);
                            header('Location: '.$root.'/products/men/');
                        }
                        else if(isset($_GET['action']) and $_GET['action'] == "retirerProduit"){
                            $this->model->removeProduct($_GET['deleteProductId']);
                            header('Location: '.$root.'/products/men/');
                        }
                    }
                    else if($this->url[1] == 'women'){
                        $productsList = $this->model->getProductList('Femme');
                        $brandList = $this->model->getBrandList('Femme');
                        $typeList = $this->model->getTypeList('Femme');
                        $page = 'viewWomenProductsList';
                        if(isset($_GET['action']) and $_GET['action'] == "changeQuantity"){
                            $this->model->updateProductQuantityAvailable( $_GET['article'], $_POST['newQuantity']);
                            header('Location: '.$root.'/products/women/');
                        }
                        else if(isset($_GET['action']) and $_GET['action'] == "retirerProduit"){
                            $this->model->removeProduct($_GET['deleteProductId']);
                            header('Location: '.$root.'/products/men/');
                        }
                    }
                    else if($this->url[1] == 'small_prices'){
                        $productsList = $this->model->getProductList('PP');
                        $brandList = $this->model->getBrandList('PP');
                        $typeList = $this->model->getTypeList('PP');
                        $page = 'viewSmallPrices';
                        if(isset($_GET['action']) and $_GET['action'] == "changeQuantity"){
                            $this->model->updateProductQuantityAvailable( $_GET['article'], $_POST['newQuantity']);
                            header('Location: '.$root.'/products/small_prices/');
                        }
                        else if(isset($_GET['action']) and $_GET['action'] == "retirerProduit"){
                            $this->model->removeProduct($_GET['deleteProductId']);
                            header('Location: '.$root.'/products/men/');
                        }
                    }
                    if($this->url[2] != ''){
                        $product = $this->model->getProduct($this->url[2]);
                        $noticeList = $this->model->getProductNotices($this->url[2]);
                        $css = 'product';
                        $page = 'viewProduct';
                        if(isset($_GET['action']) and $_GET['action'] == 'addNotice' and isset($_POST['notice'])){
                            $this->model->addNotice($this->url[2], $_SESSION['userId'], $_POST['notice']);
                            header('Location: '.$root.'/products/'.$this->url[1].'/'.$_GET['productId']);
                        }
                        else if(isset($_POST['finalPrice'])){
                            $this->model->addProductToBasket($product->productPicture,$product->productName, $_POST['price'], $_POST['quantity'], $product->productQuantityAvailable, $_POST['finalPrice'], $product->productId);
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
                else if($this->url[0] == 'delivery'){
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
                else if($this->url[0] == 'payment'){
                    if(isset($_POST['adress']) and isset($_POST['city'])){
                        $_SESSION['delivery'] = array($_POST['lastName'], $_POST['firstName'], $_POST['adress'], $_POST['city'], $_POST['cp']);
                    }
                    else if(isset($_POST['point-relais'])){
                        $_SESSION['delivery'] = $_POST['point-relais'];
                    }
                    else if(isset($_POST['crypto']) and isset($_POST['firstNumbers'])){
                        $_SESSION['payment'] = array($_POST['firstNumbers'], 
                        $_POST['secondNumbers'], 
                        $_POST['thirdNumbers'],
                        $_POST['fourthNumbers'],
                        $_POST['expireMonth'],
                        $_POST['expireYear'],
                        $_POST['gender'],
                        $_POST['userName']);
                        $_SESSION['paymentType'] = "CB";
                    }
                    else if(isset($_POST['mailPaypal']) and isset($_POST['mdpPaypal'])){
                        $_SESSION['payment'] = array($_POST['mailPaypal'],
                        $_SESSION['userLastName'],
                        $_SESSION['userFirstName']);
                        $_SESSION['paymentType'] = "Paypal";
                    }
                    else if(isset($_POST['giftCard'])){
                        $_SESSION['payment'] = $_POST['giftCard'];
                        $_SESSION['paymentType'] = "Gift Card";
                    }
                    if(isset($_GET['action']) and $_GET['action'] == 'pay'){
                        $this->model->setOrder($_SESSION['panier'], $_SESSION['delivery'], $_SESSION['payment'], $_SESSION['paymentType'], $_SESSION['userId'], $_SESSION['prixPanier'], $_SESSION['userEmail']);
                        $_SESSION['panier'] = array();
                        $_SESSION['delivery'] = '';
                        $_SESSION['payment'] = '';
                        header('Location: '.$root);
                    }
                    $css = 'paiement';
                    $page = 'viewPayment';
                }
                else if($this->url[0] == 'account'){
                    if($_SESSION['userStatus'] == 'Client'){
                        $orderList = $this->model->getUserOrders($_SESSION['userId']);
                        $page = 'viewClientAccount';
                    }
                    else if($_SESSION['userStatus'] == 'Admin'){
                        if(isset($_POST['orderStatus']) and isset($_POST['orderId'])){
                            $this->model->updateOrderStatus($_POST['orderId'], $_POST['orderStatus']);
                        }
                        $orderList = $this->model->getAllOrders();
                        $page = 'viewAdminAccount';
                    }
                    if(isset($_POST['prenomCompte']) and isset($_POST['nomCompte'])){
                        $this->model->updateUser($_SESSION['userId'], $_POST['prenomCompte'], $_POST['nomCompte'], $_POST['mailCompte']);
                    }
                    
                    $css = 'account';
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
                else if($this->url[0] == 'addProduct'){
                    if(isset($_POST['productName']) and isset($_POST['productPrice'])){
                        if (isset($_FILES['productPicture']) && $_FILES['productPicture']['error'] == 0) {
                            $allowed = ['png', 'jpeg', 'jpg'];
                            $filename = $_FILES['productPicture']['name'];
                            $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                            if (!in_array($file_ext, $allowed)) {
                                die('Type de fichier non autorisé pour le logo.');
                            }

                            $filenameToSave = $_POST['productName'].'_'.$_POST['productType'].'.'.$file_ext;
                            $fullPath = 'assets/img/'.$filenameToSave;
                            if (!move_uploaded_file($_FILES['productPicture']['tmp_name'], $fullPath)) {
                                die('Erreur lors de la sauvegarde du fichier.');
                            }
                        }
                        else {
                            die("Erreur lors du téléchargement de l'image.");
                        }
                        str_replace(' ', '_', $_POST['productBrand']);

                        $this->model->addProduct($_POST['productName'],
                        $filenameToSave,
                        $_POST['productPrice'],
                        $_POST['productDesc'],
                        $_POST['productType'],
                        $_POST['productTarget'],
                        $_POST['productBrand'],
                        $_POST['productAdvice'],
                        $_POST['productIngredient'],
                        $_POST['productQuantity']);
                    }
                    $css = 'addProduct';
                    $page = 'viewAddProduct';
                }
            }
            else{
                $page = 'viewIndex';
                $css = 'index';
                $productSelection = $this->model->getSelection();
            }
            if(isset($page)){
                include('view/viewTemplateTop.php');
                include('view/'.$page.'.php');
                include('view/viewTemplateBottom.php');
            }
            else{
                include('view/view404.php');
            }
        }
    }
?>
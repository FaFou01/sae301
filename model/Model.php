<?php
    include_once('product.php');
    include_once('notice.php');
    include_once('ingredient.php');
    include_once("bdd.php");
    include_once('userOrder.php');

    class Model{
        public function getProductList($condition){
            $bdd = new connexionBDD();
            $db = $bdd->db;
            $req = $db->prepare('SELECT * FROM product WHERE ProductTarget = ?');
            $req->execute([$condition]);
            $productsList = array();
            while($donnees = $req->fetch()){
                array_push($productsList, 
                new Product($donnees['ProductId'], 
                $donnees['ProductName'], 
                $donnees['ProductPicture'], 
                $donnees['ProductPrice'], 
                $donnees['ProductDescription'], 
                $donnees['ProductType'], 
                $donnees['ProductBrand'],
                $donnees['ProductAdvice'],
                $donnees['ProductQuantityAvailable']));
            }
            return $productsList;
        }
    
        public function getProduct($productId){
            $bdd = new connexionBDD();
            $db = $bdd->db;
            $req = $db->prepare('SELECT * FROM product WHERE ProductId = ?');
            $req->execute([$productId]);
            while($donnees = $req->fetch()){ 
                $product = new Product($donnees['ProductId'], 
                $donnees['ProductName'], 
                $donnees['ProductPicture'], 
                $donnees['ProductPrice'], 
                $donnees['ProductDescription'], 
                $donnees['ProductType'], 
                $donnees['ProductBrand'],
                $donnees['ProductAdvice'],
                $donnees['ProductQuantityAvailable']);
            }
            return $product;
        }

        public function getProductIngredients($productId){
            $bdd = new connexionBDD();
            $db = $bdd->db;
            $req = $db->prepare('SELECT IngredientName FROM ingredient WHERE ProductId = ?');
            $req->execute([$productId]);
            $ingredients = array();
            while($donnees = $req->fetch()){ 
                array_push($ingredients, new Ingredient($donnees['IngredientName']));
            }
            return $ingredients;
        }
        
        public function getProductNotices($productId){
            
        }

        public function addUser($nom, $prenom, $email, $mdp){
            $bdd = new connexionBDD();
            $db = $bdd->db;
            $_SESSION['userLastName'] = $prenom;
            $_SESSION['userFirstName'] = $nom;
            $_SESSION['userStatus'] = 'Client';
            $_SESSION['userEmail'] = $email;
            $req = $db->prepare('INSERT INTO user(UserFirstName, UserLastName, UserEmail, UserPassword, UserStatus) VALUES(:var1, :var2, :var3, :var4, "Client")');
            $req->bindParam('var1', $nom, PDO::PARAM_STR);
            $req->bindParam('var2', $prenom, PDO::PARAM_STR);
            $req->bindParam('var3', $email, PDO::PARAM_STR);
            $req->bindParam('var4', hash('sha256', $mdp), PDO::PARAM_STR);
            $req->execute();

            $req = $db->prepare('SELECT UserId FROM user ORDER BY UserId DESC LIMIT 1');
            $req->execute();
            $_SESSION['userId'] = $req->fetch()['UserId'];
        }

        public function updateUser($userId, $userLastName, $userFirstName, $userEmail){
            $bdd = new connexionBDD();
            $db = $bdd->db;
            $_SESSION['userLastName'] = $userLastName;
            $_SESSION['userFirstName'] = $userFirstName;
            $_SESSION['userEmail'] = $userEmail;
            $req = $db->prepare('UPDATE user SET UserLastName = :var1, UserFirstName = :var2, UserEmail = :var4 WHERE UserId= :var4');
            $req->bindParam('var1', $userLastName, PDO::PARAM_STR);
            $req->bindParam('var2', $userFirstName, PDO::PARAM_STR);
            $req->bindParam('var3', $userEmail, PDO::PARAM_STR);
            $req->bindParam('var4', $userId, PDO::PARAM_INT);
            $req->execute();
        }

        public function connect($mail, $mdp){
            $bdd = new connexionBDD();
            $db = $bdd->db;
            $mdpHash = hash('sha256', $mdp);
            $req = $db->prepare('SELECT UserId, UserFirstName, UserLastName, UserStatus FROM user WHERE UserEmail= :var1 AND UserPassword= :var2');
            $req->bindParam('var1', $mail, PDO::PARAM_STR);
            $req->bindParam('var2', $mdpHash, PDO::PARAM_STR);
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            if($result){
                $_SESSION['userId'] = $result[0]['UserId'];
                $_SESSION['userLastName'] = $result[0]['UserLastName'];
                $_SESSION['userFirstName'] = $result[0]['UserFirstName'];
                $_SESSION['userStatus'] = $result[0]['UserStatus'];
                $_SESSION['userEmail'] = $mail;
            }
        }

        public function deconnect(){
            session_destroy();
        }

        public function getUserOrders($userId){
            $bdd = new connexionBDD();
            $db = $bdd->db;
            $req = $db->prepare('SELECT OrderId, OrderPrice, OrderDate, OrderStatus FROM userorder WHERE UserId=? ORDER BY OrderId DESC');
            $req->execute([$userId]);
            $orderList = array();
            while($donnees = $req->fetch()){
                $reponseDate = new DateTime($donnees['OrderDate']);
                $date = $reponseDate->format('d/m/Y');
                array_push($orderList, 
                new userOrder($donnees['OrderId'],
                $donnees['OrderPrice'],
                $date,
                $donnees['OrderStatus']));
            }
            return $orderList;
        }

        public function addProductToBasket($productPicture, $productName, $format, $quantity, $maxQuantity, $price){
            $unitaryPrice = $price/$quantity;
            if(isset($_SESSION['panier'])){
                array_push($_SESSION['panier'], 
                array($productPicture,
                $productName,
                $format,                            
                $quantity,
                $maxQuantity,
                $unitaryPrice));
            }
            else{
                $_SESSION['panier'] = array(array($productPicture,
                $productName,
                $format,                            
                $quantity,
                $maxQuantity,
                $unitaryPrice));
            }
        }
    }

?>
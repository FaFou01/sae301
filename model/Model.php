<?php
    include_once('product.php');
    include_once('notice.php');
    include_once('ingredient.php');
    include_once("bdd.php");

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
            $req = $db->prepare('INSERT INTO user(UserFirstName, UserLastName, UserEmail, UserPassword, UserStatus) VALUES(:var1, :var2, :var3, :var4, "Client")');
            $req->bindParam('var1', $nom, PDO::PARAM_STR);
            $req->bindParam('var2', $prenom, PDO::PARAM_STR);
            $req->bindParam('var3', $email, PDO::PARAM_STR);
            $req->bindParam('var4', hash('sha256', $mdp), PDO::PARAM_STR);
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
                $_SESSION['userName'] = $result[0]['UserLastName'][0].'. '.$result[0]['UserFirstName'];
                $_SESSION['userStatus'] = $result[0]['UserStatus'];
            }
        }
    }

?>
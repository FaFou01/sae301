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
            $req = $db->prepare('INSERT INTO user(UserFirstName, UserLastName, UserEmail, UserPassword, UserStatus) VALUES(:var1, :var2, :var3, :var4, :var5)');
            $req->bindParam('var1', $nom, PDO::PARAM_STR);
            $req->bindParam('var2', $prenom, PDO::PARAM_STR);
            $req->bindParam('var3', $email, PDO::PARAM_STR);
            $req->bindParam('var4', $mdp, PDO::PARAM_STR);
            $req->bindParam('var5', 'Client', PDO::PARAM_STR);
            $req->execute();
        }
    }

?>
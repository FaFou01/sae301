<?php
    include_once('product.php');
    include_once('advice.php');
    include_once('notice.php');
    include_once('ingredient.php');

    class Model{
        public function getProductList($condition){
            include_once("bdd.php");
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
                $donnees['ProductQuantityAvailable']));
            }
            return $productsList;
        }
    
        public function getProduct($productId){
            include_once("bdd.php");
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
                $donnees['ProductQuantityAvailable']);
            }
            return $product;
        }

        public function getProductAdvices($productId){
            include_once("bdd.php");
            $bdd = new connexionBDD();
            $db = $bdd->db;
            $req = $db->prepare('SELECT AdviceContent FROM advice WHERE ProductId = ?');
            $req->execute([$productId]);
            $advices = array();
            while($donnees = $req->fetch()){ 
                array_push($advices, new Advice($donnees['AdviceContent']));
            }
            return $advices;
        }

        public function getProductIngredients($productId){
            include_once("bdd.php");
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
    }

?>
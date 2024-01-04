<?php
    class connexionBDD{
        public $db;

        public function __construct(){
            $hostname = 'localhost';  
            $username = 'root'; 
            $password = '';
            $db = 'mediatheque';
            // Data Source Name
            $dsn = "mysql:host=$hostname;dbname=$db";
            try {
                $bdd = new PDO($dsn, $username, $password);
                $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $this->db = $bdd;
            }
            catch(PDOException $e){
                echo "Erreur de connection ! </br>";
                echo $e->getMessage();
            }
        }
    }
?>
<?php
    class connexionBDD{
        public $db;

        public function __construct(){
            $hostnameLocal = 'localhost';  
            $usernameLocal = 'root'; 
            $passwordLocal = 'root';
            $dbLocal = 'sae301';
            $hostnameHosted = 'localhost';  
            $usernameHosted = 'u961341371_digitalmattpre'; 
            $passwordHosted = 'Mbvl0104!';
            $dbHosted = 'u961341371_sae301';
            // Data Source Name
            $dsnLocal = "mysql:host=$hostnameLocal;dbname=$dbLocal";
            $dsnHosted = "mysql:host=$hostnameHosted;dbname=$dbHosted";
            try {
                $bdd = new PDO($dsnLocal, $usernameLocal, $passwordLocal);
                $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $this->db = $bdd;
            }
            catch(PDOException $e){
                $bdd = new PDO($dsnHosted, $usernameHosted, $passwordHosted);
                $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $this->db = $bdd;
            }
        }
    }
?>
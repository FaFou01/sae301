<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $dossierCss?>navbar.css">
    <link rel="stylesheet" href="<?php echo $dossierCss?>footer.css">
    <link rel="stylesheet" href="<?php echo $dossierCss?>general.css">
    <link rel="stylesheet" href="<?php echo $dossierCss?><?php echo $css?>.css">
    <title>Nuances - Parfumerie en ligne</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="<?php echo $dossierImg?>favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="burger">&#9776;</div>
        <a href="<?php echo $root ?>"><img src="<?php echo $dossierImg?>logo.png" alt="logo du site" id="logoSite"></a>
        <div class="nav-links">
            <ul class="nav-none">
                <li><a href="<?php echo $root?>/products/small_prices/">Petits prix</a></li>
                <li><a href="<?php echo $root?>/products/men/">Produits Homme</a></li>
                <li><a href="<?php echo $root?>/products/women/">Produits Femme</a></li>
                <li><a href="<?php echo $root?>/contact/">Contact</a></li>
            </ul>
            <ul class="icones">
                <li>
                    <a href="<?php echo $root?>/basket/" id="lienPanier">
                        <div id="nombreArticle">
                            <?php 
                            if(isset($_SESSION['panier'])){
                                echo count($_SESSION['panier']);
                            }
                            else{
                                echo 0;
                            } ?>
                        </div>
                        <img src="<?php echo $dossierImg?>panier.png" alt="icône compte" class="icone">
                    </a>
                </li>
                <li>
                    <?php
                        if(isset($_SESSION['userId'])){
                            echo '<a href="'.$root.'/account/"><img src="'.$dossierImg.'compte.png" alt="icône compte" class="icone"> '.$_SESSION['userLastName'][0].'. '.$_SESSION['userFirstName'].'</a>';
                        }
                        else{
                            echo '<a href="'.$root.'/connect/"><img src="'.$dossierImg.'compte.png" alt="icône compte" class="icone"></a>';
                        }
                    ?>
                </li>
            </ul>
        </div>
    </nav>
    <div id="code_promo">
        <p>- 10% avec le code : <b>PROMO</b></p>
    </div>

    <script>
    $(document).ready(function(){
        $(".burger").click(function(){
            $(".nav-none").toggleClass("show");
        });
    });
    </script>
    
    <main>
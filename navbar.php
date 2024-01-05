<img src="assets/img/logo.png" alt="logo du site">
<ul>
    <li>Les produits de la marque</li>
    <li>Contact</li>
    <li>
        <?php
            if(isset($_SESSION['userId'])){
                echo 'Mon Compte';
            }
            else{
                echo 'Connexion';
            }
        ?>
    </li>
    <?php
        if(isset($_SESSION['userId'])){
            echo '<li>Panier</li>';
        }
    ?>
</ul>
<nav>
    <a href="index.php"><img src="assets/img/logo.png" alt="logo du site"></a>
    <ul>
        <li><a href="index.php?page=liste_produits">Les produits de la marque</a></li>
        <li>Contact</li>
        <li>
            <?php
                if($isLoggedIn){
                    echo 'Mon Compte';
                }
                else{
                    echo 'Connexion';
                }
            ?>
        </li>
        <?php
            if($isLoggedIn){
                echo '<li>Panier</li>';
            }
        ?>
    </ul>
</nav>
<nav>
    <a href="index.php"><img src="assets/img/logo.png" alt="logo du site"></a>
    <ul>
        <li><a href="index.php?page=">Petits prix</a></li>
        <li><a href="index.php?page=liste_produits_homme">Produits Homme</a></li>
        <li><a href="index.php?page=liste_produits_femme">Produits Femme</a></li>
        <li><a href="index.php?page=">Contact</a></li>
        <li>
            <?php
                if($isLoggedIn){
                    echo '<a href="index.php?page=">Mon Compte</a>';
                }
                else{
                    echo '<a href="index.php?page=">Connexion</a>';
                }
            ?>
        </li>
        <?php
            if($isLoggedIn){
                echo '<li><a href="index.php?page=">Panier</a></li>';
            }
        ?>
    </ul>
</nav>
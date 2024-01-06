<nav>
    <a href="index.php"><img src="assets/img/logo.png" alt="logo du site"></a>
    <ul>
        <li><a href="">Petits prix</a></li>
        <li><a href="">Produits Homme</a></li>
        <li><a href="">Produits Femme</a></li>
        <li><a href="">Contact</a></li>
        <li>
            <?php
                if($isLoggedIn){
                    echo '<a href="">Mon Compte</a>';
                }
                else{
                    echo '<a href="">Connexion</a>';
                }
            ?>
        </li>
        <?php
            if($isLoggedIn){
                echo '<li><a href="">Panier</a></li>';
            }
        ?>
    </ul>
</nav>
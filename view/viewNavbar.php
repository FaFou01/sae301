<nav>
    <a href="index.php"><img src="assets/img/logo.png" alt="logo du site" id="logoSite"></a>
    <ul>
        <li><a href="index.php?page=">Petits prix</a></li>
        <li><a href="index.php?page=liste_produits_homme">Produits Homme</a></li>
        <li><a href="index.php?page=liste_produits_femme">Produits Femme</a></li>
        <li><a href="index.php?page=">Contact</a></li>
        <li><a href="index.php?page=panier"><img src="assets/img/panier.png" alt="icône compte" class="icone"></a></li>
        <li>
            <?php
                if($isLoggedIn){
                    echo '<a href="index.php?page="><img src="assets/img/compte.png" alt="icône compte" class="icone">Mon Compte</a>';
                }
                else{
                    echo '<a href="index.php?page="><img src="assets/img/compte.png" alt="icône compte" class="icone"></a>';
                }
            ?>
        </li>
    </ul>
</nav>
<div id="code_promo">
    <p>- 10% avec le code : <b>PROMO</b></p>
</div>
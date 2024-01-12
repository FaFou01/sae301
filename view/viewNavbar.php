<nav>
    <div class="burger">&#9776;</div>
    <a href="index.php"><img src="assets/img/logo.png" alt="logo du site" id="logoSite"></a>
    <div class="nav-links">
        <ul class="nav-none">
            <li><a href="?page=">Petits prix</a></li>
            <li><a href="?page=liste_produits_homme">Produits Homme</a></li>
            <li><a href="?page=liste_produits_femme">Produits Femme</a></li>
            <li><a href="?page=contact">Contact</a></li>
        </ul>
        <ul class="icones">
            <li><a href="?page=panier"><img src="assets/img/panier.png" alt="icône compte" class="icone"></a></li>
            <li>
                <?php
                    if($isLoggedIn){
                        echo '<a href="?page=compte"><img src="assets/img/compte.png" alt="icône compte" class="icone">Mon Compte</a>';
                    }
                    else{
                        echo '<a href="?page=connexion"><img src="assets/img/compte.png" alt="icône compte" class="icone"></a>';
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
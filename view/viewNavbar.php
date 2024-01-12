<nav>
    <div class="burger">&#9776;</div>
    <a href="index.php"><img src="assets/img/logo.png" alt="logo du site" id="logoSite"></a>
    <div class="nav-links">
        <ul class="nav-none">
            <li><a href="index.php?page=">Petits prix</a></li>
            <li><a href="index.php?page=liste_produits_homme">Produits Homme</a></li>
            <li><a href="index.php?page=liste_produits_femme">Produits Femme</a></li>
            <li><a href="index.php?page=contact">Contact</a></li>
        </ul>
        <ul class="icones">
            <li><a href="index.php?page=panier"><img src="assets/img/panier.png" alt="icône compte" class="icone"></a></li>
            <li>
                <?php
                    if($isLoggedIn){
                        echo '<a href="index.php?page=compte"><img src="assets/img/compte.png" alt="icône compte" class="icone"> '.$_SESSION['userName'].'</a>';
                    }
                    else{
                        echo '<a href="index.php?page=connexion"><img src="assets/img/compte.png" alt="icône compte" class="icone"></a>';
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
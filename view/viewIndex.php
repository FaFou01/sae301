<img id="img-index" src="assets/img/image-index.jpg" alt="image d'index">
<div id="selection">
    <h1 id="h1index">Notre sélection</h1>
    <div class="NotreSelectionContainer">
        <div class="NotreSelection">
            <?php
                foreach($productSelection as $selection){
                    $onclick = "window.location.href='$root/products/selection/$selection->productId'"; 
                    echo '<div class="itemselection" onclick='.$onclick.'>';
                    echo '<img src="assets/img/'.$selection->productPicture.'" alt="photo du produit">';
                    echo '<p>'.str_replace('_', ' ', $selection->productBrand).'</p>';    
                    echo '<p>'.$selection->productName.'</p>';                 
                    echo '</div>';
                }
            ?>
        </div>
    </div>
</div>
<div id="bandeau">
    <div>
        <p>Découvrez nos petits prix !</p>
        <a href="index.php?page=liste_petit_prix"><button>Je découvre</button></a>
    </div>
</div>
<div id="parfums">
    <div id="produitH" class="parfum" onclick='window.location.href="index.php?page=liste_produits_homme"'>
        <img src="assets/img/parfumH.jpg" alt="parfum pour homme">
        <p>Produits Homme</p>
    </div>
    <div id="produitF" class="parfum" onclick='window.location.href="index.php?page=liste_produits_femme"'>
        <img src="assets/img/parfumF.jpg" alt="parfum pour homme">
        <p>Produits Femme</p>
    </div>
</div>

<div id="listing">
    <div id="tri">
        <p>Marques</p>
        <ul>
            <li class="choixMarque">Dior</li>
            <li class="choixMarque">Hermès</li>
            <li class="choixMarque">Yves Rocher</li>
            <li class="choixMarque">Givenchy</li>
            <li class="choixMarque">Paco Rabanne</li>
            <li class="choixMarque">Jean-Paul Gaultier</li>
            <li class="choixMarque">Yves Saint Laurent</li>
        </ul>
        <p>Prix</p>
        <ul>
            <li class="choixPrix">Prix croissant</li>
            <li class="choixPrix">Prix décroissant</li>
        </ul>
        <p>Quantité</p>
        <ul>
            <li class="choixFormat">50 mL</li>
            <li class="choixFormat">100 mL</li>
            <li class="choixFormat">200 mL</li>
        </ul>
        <p>Type</p>
        <ul>
            <li class="choixType">Eau de Toilette</li>
            <li class="choixType">Eau de Parfum</li>
            <li class="choixType">Eau de Cologne</li>
            <li class="choixType">Parfum</li>
        </ul>
    </div>

    <div id="liste_produits">
        <h1>Produits pour Hommes</h1>
        <img id="illustration" src="assets/img/parfumH.jpg" alt="produit pour homme">
        <div id="products">
            <?php
                foreach($productsList as $product){
                    $onclick = "window.location.href='index.php?page=produit&productId=$product->productId'"; 
                    echo '<div class="product '.$product->productBrand.' '.$product->productType.'" onclick='.$onclick.'>';
                    echo '<img src="assets/img/'.$product->productPicture.'" alt="image du produit '.$product->productName.'">';
                    echo '<div class="productInfos">';
                    echo '<p><b>'.$product->productName.'</b></p>';
                    echo '<p>'.str_replace('_', ' ', $product->productBrand).'</p>';
                    echo '<p>A partir de <b>'.$product->productPrice.' €</b></p>';
                    echo '</div>';
                    if($product->productQuantityAvailable == 0){
                        echo '<div id="rupture">';
                        echo '<div>Rupture de stock</div>';
                        echo '</div>';
                    }
                    echo '</div>';
                }
            ?>
        </div>
    </div>
</div>

<script src="assets/js/productList.js"></script>
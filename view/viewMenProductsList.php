<h1>Produits pour Hommes</h1>

<div id="tri">
    <select name="marque" id="brand_select">
        <option value="">-- Tri par marque --</option>
        <option value="dior">Dior</option>
        <option value="givenchy">Givenchy</option>
        <option value="hermes">Hermès</option>
        <option value="jpg">Jean-Paul Gaultier</option>
        <option value="pc">Paco Rabanne</option>
        <option value="yr">Yves Rocher</option>
        <option value="ysl">Yves Saint Laurent</option>
    </select>
    <select name="type" id="type_select">
        <option value="">-- Tri par type de produit --</option>
        <option value="edc">Eau de Cologne</option>
        <option value="edp">Eau de Parfum</option>
        <option value="edt">Eau de Toilette</option>
        <option value="parfum">Parfum</option>
    </select>
    <select name="prix" id="price_select">
        <option value="">-- Tri par prix --</option>
        <option value="up">Croissant</option>
        <option value="down">Décroissant</option>
    </select>
</div>

<div id="liste_produits">
    <?php
        foreach($productsList as $product){
            echo '<div class="product '.$product->productBrand.' '.$product->productType.'">';
            echo '<img src="assets/img/'.$product->productPicture.'" alt="image du produit '.$product->productName.'">';
            echo '<p><b>'.$product->productName.'</b> par '.$product->productBrand.'</p>';
            echo '<p>A partir de <b>'.$product->productPrice.' €</b></p>';
            echo '<p>'.str_replace('_', ' ', $product->productType ).'</p>';
            echo '<a href="index.php?page=produit&productId='.$product->productId.'"><button>Voir le produit</button></a>';
            if($product->productQuantityAvailable == 0){
                echo '<div>';
                echo '<div>Rupture de stock</div>';
                echo '</div>';
            }
            echo '</div>';
        }
    ?>
</div>
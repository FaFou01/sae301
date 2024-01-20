<div id="listing">
    <div id="tri">
        <p>Marques</p>
        <ul>
            <li class="choixMarque">Cacharel</li>
            <li class="choixMarque">Nuances</li>
            <li class="choixMarque">John Phillips</li>
        </ul>
        <p>Prix</p>
        <ul>
            <li class="choixPrix">Prix croissant</li>
            <li class="choixPrix">Prix décroissant</li>
        </ul>
        <p>Type</p>
        <ul>
            <li class="choixType">Eau de Toilette</li>
            <li class="choixType">Déodorant</li>
            <li class="choixType">Parfum</li>
        </ul>
    </div>

    <div id="liste_produits">
        <h1>Produits à petits prix</h1>
        <img id="illustration" src="<?php echo $dossierImg?>echantillon.jpg" alt="produit pour homme">
        <div id="products">
            <?php
                foreach($productsList as $product){
                    $onclick = "window.location.href='$root/products/small_prices/$product->productId'"; 
                    echo '<div class="product '.$product->productBrand.' '.$product->productType.'">';
                    echo '<img src="'.$dossierImg.$product->productPicture.'" alt="image du produit '.$product->productName.'" onclick='.$onclick.'>';
                    echo '<div class="productInfos" onclick='.$onclick.'>';
                    echo '<p><b>'.$product->productName.'</b></p>';
                    echo '<p>'.str_replace('_', ' ', $product->productBrand).'</p>';
                    echo '<p>A partir de <b>'.$product->productPrice.' €</b></p>';
                    echo '</div>';
                    if(isset($_SESSION['userStatus']) and $_SESSION['userStatus'] == "Admin"){
                        echo '<form action="?page=liste_produits_homme&action=changeQuantity&article='.$product->productId.'" method="post" id="quantiteAdmin">';
                        echo '<p>Quantité : </p>';
                        echo '<input type="number" name="newQuantity" value="'.$product->productQuantityAvailable.'" required>';
                        echo '<input type="submit" value="Valider">';
                        echo'</form>';
                    }
                    if(isset($_SESSION['userStatus']) and $_SESSION['userStatus'] == "Client" and $product->productQuantityAvailable == 0){
                        echo '<div id="rupture">';
                        echo '<div>Rupture de stock</div>';
                        echo '</div>';
                    }
                    echo '</div>';
                }
            ?>
        </div>
        <?php
            if(isset($_SESSION['userStatus']) and $_SESSION['userStatus'] == "Admin"){
                echo '<a href="?page=ajoutProduit"><button id="ajoutProduit">Ajouter un produit</button></a>';
            }
        ?>
    </div>
</div>

<script src="<?php echo $dossierJs?>productList.js"></script>
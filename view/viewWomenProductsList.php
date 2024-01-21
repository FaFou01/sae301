<?php
    if(isset($_POST['deleteProductId'])){
        echo '<div id="popDeleteProduct">';
        echo '<div>';
        echo '<p>Voulez-vous vraiment retirer cet article de la vente ?</p>';
        echo '<div>';
        echo '<a href=""><button id="retourAccueil">Non, j\'ai changé d\'avis</button></a>';
        echo '<a href="?action=retirerProduit&productId='.$_POST['deleteProductId'].'"><button id="validerSuppr">Oui, retirer le produit</button></a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    } 
?>

<div id="listing">
    <div id="tri">
        <p>Marques</p>
        <ul>
            <?php
                foreach($brandList as $brand){
                    echo '<li class="choixMarque">'.str_replace('_', ' ', $brand).'</li>';
                }
            ?>
        </ul>
        <p>Prix</p>
        <ul>
            <li class="choixPrix" id="priceUp">Prix croissant</li>
            <li class="choixPrix" id="priceDown">Prix décroissant</li>
        </ul>
        <p>Type</p>
        <ul>
            <?php
                foreach($typeList as $type){
                    echo '<li class="choixType">'.str_replace('_', ' ', $type).'</li>';
                }
            ?>
        </ul>
    </div>

    <div id="liste_produits">
        <h1>Produits pour Femmes</h1>
        <img id="illustration" src="<?php echo $dossierImg?>parfumF.jpg" alt="produit pour femme">
        <div id="products">
            <?php
                foreach($productsList as $product){
                    $onclick = "window.location.href='$root/products/women/$product->productId'"; 
                    echo '<div class="product '.$product->productBrand.' '.$product->productType.'" data-value="'.$product->productPrice.'">';
                    echo '<img src="'.$dossierImg.$product->productPicture.'" alt="image du produit '.$product->productName.'" onclick='.$onclick.'>';
                    echo '<div class="productInfos" onclick='.$onclick.'>';
                    echo '<p><b>'.$product->productName.'</b></p>';
                    echo '<p>'.str_replace('_', ' ', $product->productBrand).'</p>';
                    echo '<p>A partir de <b>'.$product->productPrice.' €</b></p>';
                    echo '</div>';
                    if(isset($_SESSION['userStatus']) and $_SESSION['userStatus'] == "Admin"){
                        echo '<form action="?action=changeQuantity&article='.$product->productId.'" method="post" id="quantiteAdmin">';
                        echo '<p>Quantité : </p>';
                        echo '<input type="number" name="newQuantity" value="'.$product->productQuantityAvailable.'" required>';
                        echo '<input type="submit" value="Valider">';
                        echo'</form>';
                        echo '<form action="" method="post" id="supprimer">';
                        echo '<input type="number" name="deleteProductId" value="'.$product->productId.'" hidden>';
                        echo '<input type="submit" value="">';
                        echo '</form>';
                    }
                    if(!(isset($_SESSION['userStatus']) and $_SESSION['userStatus'] == "Admin") and $product->productQuantityAvailable == 0){
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
                echo '<a href="'.$root.'/addProduct/"><button id="ajoutProduit">Ajouter un produit</button></a>';
            }
        ?>
    </div>
</div>

<script src="<?php echo $dossierJs?>productList.js"></script>
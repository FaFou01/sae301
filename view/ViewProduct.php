<?php
    if(isset($_POST['finalPrice'])){
        echo '<div id="popProduct">';
        echo '<div>';
        echo '<p>Le produit a été ajouté dans votre panier !</p>';
        echo '<div>';
        echo '<a href="index.php"><button id="retourAccueil">Retourner à laccueil</button></a>';
        echo '<a href="?page=panier"><button id="allerPanier">Voir mon panier</button></a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    } 
?>

<div id="pageProduit">
    <div id="productInfos">
        <img src="assets/img/<?php echo $product->productPicture?>" alt="image du produit">
        <div id="productCustom">
            <h1><?php echo str_replace('_', ' ', $product->productType).' '.$product->productName.' par '.str_replace('_', ' ', $product->productBrand)?></h1>
            <form action="" method="post">
                <div id="formats">
                    <img src="assets/img/parfum.png" alt="icône parfum" id="petit_format">
                    <div class="prix">
                        <input type="radio" name="price" id="50ml" value="50 mL">
                        <p class="format">50 mL</p>
                        <p class="prix_format"><?php echo $product->productPrice?> €</p>
                    </div>
                    <img src="assets/img/parfum.png" alt="icône parfum" id="moyen_format">
                    <div class="prix">
                        <input type="radio" name="price" id="100ml" value="100 mL">
                        <p class="format">100 mL</p>
                        <p class="prix_format"><?php echo $product->productPrice*1.5 ?> €</p>
                    </div>
                    <img src="assets/img/parfum.png" alt="icône parfum" id="grand_format">
                    <div class="prix">
                        <input type="radio" name="price" id="200ml" value="200 mL">
                        <p class="format">200 mL</p>
                        <p class="prix_format"><?php echo $product->productPrice*2 ?> €</p>
                    </div>
                </div>
                <div id="quantity">
                    <label for="quantity">Quantité : </label>
                    <input type="number" name="quantity" id="productQuantity" value="1" min="1" max="<?php echo $product->productQuantityAvailable?>">
                </div>
                <div id="commande">
                    <div id="prix_commande">
                        <div id="trou"></div>
                        <div>
                            <p>Sous-total :</p>
                            <div>
                                <input type="number" name="finalPrice" id="finalPrice" value="0">
                                <p>€</p>
                            </div>  
                        </div>
                    </div>
                    <input type="submit" value="+ Ajouter au panier">
                </div>
            </form>
        </div>
    </div>

    <div id="infos">
        <div id="desc"><p>Description</p></div>
        <div id="avis"><p>Avis</p></div>
        <div id="advice"><p>Conseils</p></div>
        <div id="ingredient"><p>Ingrédients</p></div>
    </div>
    <div id="descContent" class="contenu_infos"><?php echo $product->productDescription?></div>
    <div id="notices" class="contenu_infos"></div>
    <div id="advices" class="contenu_infos"><?php echo $product->productAdvice?></div>
    <div id="ingredientList" class="contenu_infos">
        <ul>
            <?php 
                foreach($ingredients as $ingredient){
                    echo '<li>'.$ingredient->ingredientName.'</li>';
                }
            ?>
        </ul>
    </div>
</div>
<script src="assets/js/product.js"></script>
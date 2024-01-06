<h1>Fiche produit <?php echo $product->productName?></h1>

<img src="assets/img/<?php echo $product->productPicture?>" alt="image du produit">

<div id="desc">Description</div>
<div id="descContent"><?php echo $product->productDescription?></div>
<div id="advice">Conseils</div>
<div id="advices">
    <ul>
        <?php 
            foreach($advices as $advice){
                echo '<li>'.$advice->adviceContent.'</li>';
            }
        ?>
    </ul>
</div>
<div id="ingredient">Ingrédients</div>
<div id="ingredient">
    <ul>
        <?php 
            foreach($ingredients as $ingredient){
                echo '<li>'.$ingredient->ingredientName.'</li>';
            }
        ?>
    </ul>
</div>
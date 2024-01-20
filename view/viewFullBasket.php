<div id="panier">
    <div class="divAvance">
        <svg xmlns="http://www.w3.org/2000/svg" class="svgmargin0" viewBox="0 0 349 61" fill="none">
            <path d="M1 55V6C1 3.23858 3.23857 1 6 1H304.158C305.071 1 305.967 1.25 306.748 1.72288L345.262 25.0417C348.396 26.9397 348.492 31.4537 345.44 33.4826L306.812 59.1638C305.991 59.7091 305.028 60 304.043 60H6C3.23858 60 1 57.7614 1 55Z" fill="#FFA300" stroke="black"/>
            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="white" font-size="28">Panier</text>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" class="svgmargin1"  viewBox="0 0 349 61" fill="none">
            <path d="M1 55V6C1 3.23858 3.23857 1 6 1H304.158C305.071 1 305.967 1.25 306.748 1.72288L345.262 25.0417C348.396 26.9397 348.492 31.4537 345.44 33.4826L306.812 59.1638C305.991 59.7091 305.028 60 304.043 60H6C3.23858 60 1 57.7614 1 55Z" fill="white" stroke="black"/>
            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="black" font-size="28">Connexion</text>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" class="svgmargin2" viewBox="0 0 349 61" fill="none">
            <path d="M1 55V6C1 3.23858 3.23857 1 6 1H304.158C305.071 1 305.967 1.25 306.748 1.72288L345.262 25.0417C348.396 26.9397 348.492 31.4537 345.44 33.4826L306.812 59.1638C305.991 59.7091 305.028 60 304.043 60H6C3.23858 60 1 57.7614 1 55Z" fill="white" stroke="black"/>
            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="black" font-size="28">Livraison</text>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" class="svgmargin3" viewBox="0 0 349 61" fill="none">
            <path d="M1 55V6C1 3.23858 3.23857 1 6 1H304.158C305.071 1 305.967 1.25 306.748 1.72288L345.262 25.0417C348.396 26.9397 348.492 31.4537 345.44 33.4826L306.812 59.1638C305.991 59.7091 305.028 60 304.043 60H6C3.23858 60 1 57.7614 1 55Z" fill="white" stroke="black"/>
            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="black" font-size="28">Paiement</text>
        </svg>
    </div>
    <div id="commande">
        <div id="aPayer">
            <div id="bouchon">
                <div>
                    <div></div>
                </div>
            </div>
            <div id="corps">
                <?php
                    $prixTotal = 0;
                    for($i=0; $i<count($_SESSION['panier']);$i++){
                        $produitPanier = $_SESSION['panier'][$i];
                        $imageProduit = $produitPanier[0];
                        $nomProduit = $produitPanier[1];
                        $format = $produitPanier[2];
                        $quantité = $produitPanier[3];
                        $quantitéMax = $produitPanier[4];
                        $prixUnitaire = $produitPanier[5];
                        $sousTotal = $quantité*$prixUnitaire;
                        echo '<div class="produitPanier">';
                        echo '<img src="'.$dossierImg.$imageProduit.'" alt="photo du produit">';
                            echo '<div>';
                                echo '<p class="nomProduitPanier"><b>'.$nomProduit.'</b></p>';
                                echo '<p class="formatProduit">Format : '.$format.'</p>';
                                echo '<div class="quantité">';
                                    echo '<p class="nombre">Quantité : '.$quantité.'</p>';
                                    if($quantité < $quantitéMax){
                                        echo '<a href="?action=augmenterArticle&article='.$i.'"><button class="plus">+</button></a>';
                                    }
                                    else{
                                        echo '<a href=""><button class="impossible">+</button></a>';
                                    }
                                    echo '<p>/</p>';
                                    if($quantité>1){
                                        echo '<a href="?action=réduireArticle&article='.$i.'"><button class="moins">-</button></a>';
                                    }
                                    else{
                                        echo '<a href=""><button class="impossible">-</button></a>';
                                    }
                                echo '</div>';
                                echo '<p>Prix unitaire : '.$prixUnitaire.' €</p>';
                                echo '<p><b>Sous-total : '. $sousTotal.' €</b></p>';
                            echo '</div>';
                            echo '<a href="?action=supprArticle&article='.$i.'"><button class="supprimer">🗑️</button></a>';
                        echo '</div>';
                        $prixTotal = $prixTotal + $sousTotal;
                    }
                    $_SESSION['prixPanier'] = $prixTotal;
                ?>
            </div>
            <img src="<?php echo $dossierImg?>fil.svg" alt="fil" id="fil">
            <div id="prixTotal">
                <div id="trou"></div>
                <div>
                    <p>Prix Total :</p>
                    <div>
                        <p><?php echo $prixTotal?> €</p>
                    </div>  
                </div>
            </div>
        </div>
        <?php
            if(isset($_SESSION['userId'])){
                $href = '/delivery/';
            }
            else{
                $href = '/connect/';
            }
            ?>
        <form action="<?php echo $root.$href?>" method="post" id="offert">
            <?php
            if($prixTotal>100){
                echo '<div id="produitsOfferts">';
                    echo '<img src="'.$dossierImg.'boucle cadeau.svg" alt="boucle cadeau">';
                    echo '<div id="corpsOffert">';
                            for($i=0; $i<intdiv($prixTotal, 100); $i++){
                                echo '<div class="gift">'; 
                                    echo '<img src="'.$dossierImg.$gifts[$i]->productPicture.'" alt="photo du produit">';
                                    echo '<div>'; 
                                        echo '<p><b>'.$gifts[$i]->productName.'</b></p>';
                                        echo '<p>Offert</p>';
                                    echo'</div>';
                                echo'</div>';
                            }
                        
                    echo '</div>';
                echo '</div>';
            }
            ?>
            <div id="codePromo">
                <label for="promo">Code Promo : </label>
                <input type="text" name="promo" id="promo">
            </div>
            
            <input type="submit" value="Passer la commande">
        </form>
    </div>
</div>
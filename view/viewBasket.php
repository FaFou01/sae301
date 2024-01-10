<div id="panier">
    <div id="etapesPanier">
        <div id="etapePanier">Panier</div>
        <div id="etapeConnexion">Connexion</div>
        <div id="etapeLivraison">Livraison</div>
        <div id="etapePaiement">Paiement</div>
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

                ?>
            </div>
        </div>
        <div id="offert">
            <div>

            </div>
            <?php
                if(isset($_SESSION['userId'])){
                    $href = 'livraison';
                }
                else{
                    $href = 'connexion';
                }
            ?>
            <a href="index.php?page=<?php echo $href?>"><button>Passer Commande</button></a>
        </div>
    </div>
</div>
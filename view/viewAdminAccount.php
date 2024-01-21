<div id="monCompte">
    <h1>Mon Compte</h1>
    <div id="compte">
        <p>Bonjour <?php echo $_SESSION['userLastName']?> !</p>
        <div id="infosPerso">
            <p>Mes informations personnelles</p>
            <form action="" method="post" id="formInfos">
                <label for="">Prénom :</label>
                <input type="text" name="prenomCompte" value=<?php echo $_SESSION['userLastName']?> required>
                <label for="">Nom :</label>
                <input type="text" name="nomCompte" value=<?php echo $_SESSION['userFirstName']?> required>
                <label for="">Email :</label>
                <input type="mail" name="mailCompte" value=<?php echo $_SESSION['userEmail']?> required>
                <input type="submit" value="Enregistrer">
            </form>
        </div>
        <?php
            if(count($orderList)>0){
                echo '<div id="commandePerso">';
                echo '<p>Toutes les commandes en cours</p>';
                echo '<div id="orders">';
                foreach($orderList as $order){
                    echo '<div class="order">';
                    echo '<div>';
                    echo '<p>N° de commande : '.$order->orderId.'</p>';
                    echo '<p>effectuée le : '.$order->orderDate.'</p>';
                    echo '</div>';
                    echo '<form action="" method="post" class="changeOrderStatus">';
                    echo '<input type="number" name="orderId" value="'.$order->orderId.'" hidden>';
                    echo '<select name="orderStatus" class="selectStatus">';
                    if($order->orderStatus == "En cours de traitement"){
                        echo '<option value="En cours de traitement">En cours de traitement</option>';
                        echo '<option value="Expédié">Expédié</option>';
                        echo '<option value="En cours de livraison">En cours de livraison</option>';
                        echo '<option value="Livré">Livré</option>';
                    }
                    else if($order->orderStatus == "Expédié"){
                        echo '<option value="Expédié">Expédié</option>';
                        echo '<option value="En cours de livraison">En cours de livraison</option>';
                        echo '<option value="Livré">Livré</option>';
                    }
                    else if($order->orderStatus == "En cours de livraison"){
                        echo '<option value="En cours de livraison">En cours de livraison</option>';
                        echo '<option value="Livré">Livré</option>';
                    }
                    else if($order->orderStatus == "Livré"){
                        echo '<option value="Livré">Livré</option>';
                    }
                    echo '</select>';
                    echo '<input type="submit" value="Enregister">';
                    echo '</form>';
                    echo '<p class="prix">'.$order->orderPrice.' €</p>';
                    echo '</div>';
                    
                }
                echo '</div>';
                echo '</div>';
            }
        ?>
        <div id="actionCompte">
            <a href="<?php echo $root?>?action=deconnect"><button>Me déconnecter</button></a>
        </div>
    </div>
</div>
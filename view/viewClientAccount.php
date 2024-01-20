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
                echo '<p>Mes dernières commandes</p>';
                echo '<div id="orders">';
                foreach($orderList as $order){
                    echo '<div class="order">';
                    echo '<div>';
                    echo '<p>N° de commande : '.$order->orderId.'</p>';
                    echo '<p>effectuée le : '.$order->orderDate.'</p>';
                    echo '</div>';
                    echo '<p>'.$order->orderStatus.'</p>';
                    echo '<p>'.$order->orderPrice.' €</p>';
                    echo '</div>';
                    
                }
                echo '</div>';
                echo '</div>';
            }
        ?>
        <div id="actionCompte">
            <a href="<?php echo $root?>?action=deconnect"><button>Me déconnecter</button></a>
            <a href=""><button>Supprimer mon compte</button></a>
        </div>
    </div>
</div>
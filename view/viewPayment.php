<?php
    if(isset($_SESSION['payment']) and $_SESSION['payment'] != ''){
        echo '<div id="popPayment">';
        echo '<div>';
        echo '<p>Votre commande a été payée avec succès ! Vous allez recevoir votre facture par mail.</p>';
        echo '<div>';
        echo '<a href="?action=pay"><button id="validerPaiement">OK</button></a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    } 
?>

<section id="paiement">
    <div class="divAvance">
        <svg xmlns="http://www.w3.org/2000/svg" class="svgmargin0" viewBox="0 0 349 61" fill="none">
            <path d="M1 55V6C1 3.23858 3.23857 1 6 1H304.158C305.071 1 305.967 1.25 306.748 1.72288L345.262 25.0417C348.396 26.9397 348.492 31.4537 345.44 33.4826L306.812 59.1638C305.991 59.7091 305.028 60 304.043 60H6C3.23858 60 1 57.7614 1 55Z" fill="white" stroke="black"/>
            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="black" font-size="28">Panier</text>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" class="svgmargin1" viewBox="0 0 349 61" fill="none">
            <path d="M1 55V6C1 3.23858 3.23857 1 6 1H304.158C305.071 1 305.967 1.25 306.748 1.72288L345.262 25.0417C348.396 26.9397 348.492 31.4537 345.44 33.4826L306.812 59.1638C305.991 59.7091 305.028 60 304.043 60H6C3.23858 60 1 57.7614 1 55Z" fill="white" stroke="black"/>
            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="black" font-size="28">Connexion</text>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" class="svgmargin2"  viewBox="0 0 349 61" fill="none">
            <path d="M1 55V6C1 3.23858 3.23857 1 6 1H304.158C305.071 1 305.967 1.25 306.748 1.72288L345.262 25.0417C348.396 26.9397 348.492 31.4537 345.44 33.4826L306.812 59.1638C305.991 59.7091 305.028 60 304.043 60H6C3.23858 60 1 57.7614 1 55Z" fill="white" stroke="black"/>
            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="black" font-size="28">Livraison</text>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" class="svgmargin3" viewBox="0 0 349 61" fill="none">
            <path d="M1 55V6C1 3.23858 3.23857 1 6 1H304.158C305.071 1 305.967 1.25 306.748 1.72288L345.262 25.0417C348.396 26.9397 348.492 31.4537 345.44 33.4826L306.812 59.1638C305.991 59.7091 305.028 60 304.043 60H6C3.23858 60 1 57.7614 1 55Z" fill="#FFA300" stroke="black"/>
            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="white" font-size="28">Paiement</text>
        </svg>
    </div>

    

    <div id="moypaiement">
        <div id="visa">
            <img src="<?php echo $dossierImg?>Visa.png" alt="Visa">
        </div>
        <div id="paypal">
            <img src="<?php echo $dossierImg?>Paypal.png" alt="Paypal">
        </div>
        <div id="cadeau">
            <img src="<?php echo $dossierImg?>cartecadeau.png" alt="Cadeau">
        </div>
    </div>
    
    <p id="prixAPayer">Prix à payer : <?php echo $_SESSION['prixPanier']?> €</p>
    
    <div id="parCarte">
    <form action="" method="post" id="carte_bleu">
        <div class="credit-card-input">
            <input type="text" name="firstNumbers" maxlength="4" placeholder="XXXX" class="input-box" id="num1" required/>
            <input type="text" name="secondNumbers" maxlength="4" placeholder="XXXX" class="input-box" id="num2" required/>
            <input type="text" name="thirdNumbers" maxlength="4" placeholder="XXXX" class="input-box" id="num3" required/>
            <input type="text" name="fourthNumbers" maxlength="4" placeholder="XXXX" class="input-box" id="num4" required/>
        </div>
        <div class="date_expi">
            <h5>Date d'expiration :  &nbsp;&nbsp;</h5>
            <input type="text" name="expireMonth" maxlength="2" placeholder="XX" class="input-expi" id="expi1" required/>
            <h5> / </h5>
            <input type="text" name="expireYear" maxlength="2" placeholder="XX" class="input-expi" id="expi1" required/>
        </div>
        <div class="crypto">
            <h5>Cryptogramme :</h5>
            <input type="text" name="crypto" maxlength="3" placeholder="XXX" class="input-crypto" id="crypto" required/>
        </div>
        <div id="bas_carte">
            <div class="Nom">
                <select name="gender" id="" required>
                    <option value="Monsieur">M.</option>
                    <option value="Madame">Mme.</option>
                </select>
                <input type="text" class="inputNom" name="userName" value="<?php echo $_SESSION['userLastName'].' '.$_SESSION['userFirstName']?>" required>
            </div>
            <img src="<?php echo $dossierImg?>Visa.png" alt="Visa" id="visabas">
        </div>
        <div id="validation">
            <input type="submit" value="Valider et payer">
        </div> 
    </form>
    </div>

    <div id="ParPaypal">
        <h2>Payer par Paypal</h2>
        <div>
            <form action="" method="post">
                <div class="champ">
                    <label for="">Email ou numéro de téléphone</label>
                    <input type="text" name="mailPaypal">
                </div>
                <div class="champ">
                    <label for="">Mot de passe</label>
                    <input type="password" name="mdpPaypal">
                </div>
                <div class="envoyer">
                    <input type="submit" value="">
                </div>
            </form>
        </div>
    </div> 

    <div id="parCadeau">
        <h2>Carte Cadeau</h2>
        <form action="" method="post">
            <div class="champ">
                <label for=""></label>
                <input type="text" value="">
            </div>
            <div class="envoyer">
                <input type="submit" value="">
            </div>
        </form>
    </div>
</section> 
<script src="<?php echo $dossierJs?>paiement.js"></script>

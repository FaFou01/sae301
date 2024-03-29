<div id="livraison">
    <div class="divAvance">
        <svg xmlns="http://www.w3.org/2000/svg" class="svgmargin0"  viewBox="0 0 349 61" fill="none">
            <path d="M1 55V6C1 3.23858 3.23857 1 6 1H304.158C305.071 1 305.967 1.25 306.748 1.72288L345.262 25.0417C348.396 26.9397 348.492 31.4537 345.44 33.4826L306.812 59.1638C305.991 59.7091 305.028 60 304.043 60H6C3.23858 60 1 57.7614 1 55Z" fill="white" stroke="black"/>
            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="black" font-size="28">Panier</text>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" class="svgmargin1" viewBox="0 0 349 61" fill="none">
            <path d="M1 55V6C1 3.23858 3.23857 1 6 1H304.158C305.071 1 305.967 1.25 306.748 1.72288L345.262 25.0417C348.396 26.9397 348.492 31.4537 345.44 33.4826L306.812 59.1638C305.991 59.7091 305.028 60 304.043 60H6C3.23858 60 1 57.7614 1 55Z" fill="white" stroke="black"/>
            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="black" font-size="28">Connexion</text>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" class="svgmargin2" viewBox="0 0 349 61" fill="none">
            <path d="M1 55V6C1 3.23858 3.23857 1 6 1H304.158C305.071 1 305.967 1.25 306.748 1.72288L345.262 25.0417C348.396 26.9397 348.492 31.4537 345.44 33.4826L306.812 59.1638C305.991 59.7091 305.028 60 304.043 60H6C3.23858 60 1 57.7614 1 55Z" fill="#FFA300" stroke="black"/>
            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="white" font-size="28">Livraison</text>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" class="svgmargin3" viewBox="0 0 349 61" fill="none">
            <path d="M1 55V6C1 3.23858 3.23857 1 6 1H304.158C305.071 1 305.967 1.25 306.748 1.72288L345.262 25.0417C348.396 26.9397 348.492 31.4537 345.44 33.4826L306.812 59.1638C305.991 59.7091 305.028 60 304.043 60H6C3.23858 60 1 57.7614 1 55Z" fill="white" stroke="black"/>
            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="black" font-size="28">Paiement</text>
        </svg>
    </div>
    <div id="choixLivraison">
        <div id="domicile"> A domicile</div>
        <div id="point_relais">Point Relai</div>
    </div>
    <div id="infosDomicile">
        <div id="formulaire">
            <h2>Adresse de Livraison</h2>
            <form action="<?php echo $root.'/payment/'?>" method="post" id="formLivraison">
                <div class="input-container" id="input-Name">
                    <div>
                        <label for="lastName">Prénom</label>
                        <input type="text" name="lastName" id="" value="<?php echo $_SESSION['userLastName']?>" required>
                    </div>
                    <div>
                        <label for="firstName">Nom</label>
                        <input type="text" name="firstName" id="" value="<?php echo $_SESSION['userFirstName']?>" required>
                    </div>
                </div>
                <div class="input-container">
                    <label for="adress">Adresse</label>
                    <input type="text" name="adress" id="adress" required>
                </div>
                <div class="input-container">
                    <div>
                        <label for="city">Ville</label>
                        <input type="text" name="city" id="" required>
                    </div>
                    <div>
                        <label for="cp">Code Postal</label>
                        <input type="text" name="cp" id="" required>
                    </div>
                </div>
                <input type="submit" value="Procéder au paiement">
            </form>
        </div>
        <div id="carte">
            <img src="<?php echo $dossierImg?>carte.png" alt="carte de france">
        </div>
    </div>
    <div id="infosPR" hidden>
        <form action="<?php echo $root.'/payment/'?>" method="post" id="choixPR">
            <h2>Points Relais</h2>
            <div class="PR">
                <label for="">Fnac Mayol - 1 km</label>
                <input type="radio" name="point-relais" id="FM" value="Fnac Mayol" required>
            </div>
            <div class="PR">
                <label for="">Micromania Grand Var - 2.3 km</label>
                <input type="radio" name="point-relais" id="MGV" value="Micromania Grand Var" required>
            </div>
            <div class="PR">
                <label for="">Yves Rocher Sanary - 3.2 km</label>
                <input type="radio" name="point-relais" id="YRS" value="Yves Rocher Sanary" required>
            </div>
            <div class="PR">
                <label for="">Carrefour Ollioules - 4.5 km</label>
                <input type="radio" name="point-relais" id="CO" value="Carrefour Ollioules" required>
            </div>
            <input type="submit" value="Procéder au paiement">
        </form>
        <div id="carteReduite">
            <img src="<?php echo $dossierImg?>cartePR.png" alt="carte réduite" id="carteVar">
            <img src="<?php echo $dossierImg?>localisation.svg" alt="localisation" id="localisation">
        </div>
    </div>
</div>
<script src="<?php echo $dossierJs?>delivery.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=VOTRE_CLE_API&callback=initMap" async defer></script>
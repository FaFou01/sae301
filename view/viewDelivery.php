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
        <div id="domicile">A domicile</div>
        <div id="point_relais">Point Relai</div>
    </div>
    <div id="infosDomicile">
        <div id="formulaire">
            <h2>Adresse de Livraison</h2>
            <form action="" method="post" id="formLivraison">
                <div class="input-container">
                    <div>
                        <label for="lastName">Prénom</label>
                        <input type="text" name="lastName" id="">
                    </div>
                    <div>
                        <label for="firstName">Nom</label>
                        <input type="text" name="firstName" id="">
                    </div>
                </div>
                <div class="input-container">
                    <label for="adress">Adresse</label>
                    <input type="text" name="adress" id="adress">
                </div>
                <div class="input-container">
                    <div>
                        <label for="city">Ville</label>
                        <input type="text" name="city" id="">
                    </div>
                    <div>
                        <label for="cp">Code Postal</label>
                        <input type="text" name="cp" id="">
                    </div>
                </div>
                <input type="submit" value="Procéder au paiement">
            </form>
        </div>
        <div id="carte">
            <img src="assets/img/carte.png" alt="carte de france">
        </div>
    </div>
    <div id="infosPR">

    </div>
</div>
<script src="assets/js/delivery.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=VOTRE_CLE_API&callback=initMap" async defer></script>
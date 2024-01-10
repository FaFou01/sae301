<div id="livraison">
    <div id="etapesCommande">
        <div id="etapePanier">Panier</div>
        <div id="etapeConnexion">Connexion</div>
        <div id="etapeLivraison">Livraison</div>
        <div id="etapePaiement">Paiement</div>
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
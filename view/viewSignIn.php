<section id="inscription">
    <h2>Inscrivez-vous</h2>
    <form action="" method="post">
        <div class="nomprenom">
            <div class="labinput">
                <label for="">Prénom :</label>
                <input class="prenom" type="text" name="prenom" id="prenom">
            </div>
            <div class="labinput labinputnom">
                <label for="">Nom :</label>
                <input class="nom" type="text" name="nom" id="nom">
            </div>
        </div>
        <div class="labinput">
            <label for="">Adresse email :</label>
            <input type="mail" name="email" id="email">
        </div>
        <div class="labinput">
            <label for="">Mot de passe :</label>
            <input type="password" name="mdp" id="mdp">
            <img src="assets/img/oeilOuvert.png" alt="oeil" id="voirMdp" class="ouvert">
        </div>
        <div class="labinput">
            <label for="">Confirmer le mot de passe :</label>
            <input type="password" name="mdpConfirm" id="confirm">
            <img src="assets/img/oeilOuvert.png" alt="oeil" id="voirMdpConf" class="ouvert">
        </div>
        <div class="divEnregistre">
            <input type="submit" value="S'enregistrer">
        </div>
    </form>
</section>

<script src="assets/js/singin.js"></script>
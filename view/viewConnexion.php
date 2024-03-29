<section id="connexion">
    <div class="divAvance">
        <svg xmlns="http://www.w3.org/2000/svg" class="svgmargin0" viewBox="0 0 349 61" fill="none">
            <path d="M1 55V6C1 3.23858 3.23857 1 6 1H304.158C305.071 1 305.967 1.25 306.748 1.72288L345.262 25.0417C348.396 26.9397 348.492 31.4537 345.44 33.4826L306.812 59.1638C305.991 59.7091 305.028 60 304.043 60H6C3.23858 60 1 57.7614 1 55Z" fill="white" stroke="black"/>
            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="black" font-size="28">Panier</text>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" class="svgmargin1" viewBox="0 0 349 61" fill="none">
            <path d="M1 55V6C1 3.23858 3.23857 1 6 1H304.158C305.071 1 305.967 1.25 306.748 1.72288L345.262 25.0417C348.396 26.9397 348.492 31.4537 345.44 33.4826L306.812 59.1638C305.991 59.7091 305.028 60 304.043 60H6C3.23858 60 1 57.7614 1 55Z" fill="#FFA300" stroke="black"/>
            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="white" font-size="28">Connexion</text>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" class="svgmargin2"  viewBox="0 0 349 61" fill="none">
            <path d="M1 55V6C1 3.23858 3.23857 1 6 1H304.158C305.071 1 305.967 1.25 306.748 1.72288L345.262 25.0417C348.396 26.9397 348.492 31.4537 345.44 33.4826L306.812 59.1638C305.991 59.7091 305.028 60 304.043 60H6C3.23858 60 1 57.7614 1 55Z" fill="white" stroke="black"/>
            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="black" font-size="28">Livraison</text>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" class="svgmargin3" viewBox="0 0 349 61" fill="none">
            <path d="M1 55V6C1 3.23858 3.23857 1 6 1H304.158C305.071 1 305.967 1.25 306.748 1.72288L345.262 25.0417C348.396 26.9397 348.492 31.4537 345.44 33.4826L306.812 59.1638C305.991 59.7091 305.028 60 304.043 60H6C3.23858 60 1 57.7614 1 55Z" fill="white" stroke="black"/>
            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="black" font-size="28">Paiement</text>
        </svg>
    </div>
    <div class="connclassique">
        <h3>Vous avez un compte ?</h3>
        <h2>Connectez vous</h2>
        <?php
            if(str_contains($_SERVER['HTTP_REFERER'],"basket")){
                $page = '/delivery/';
            }
            else{
                $page = '/';
            }
        ?>
        <form action="<?php echo $root.$page?>" method="post">
            <div>
                <label for="">Email</label>
                <input type="mail" name="emailConnexion">
            </div>
            <div>
                <label for="">Mot de passe</label>
                <input type="password" name="mdpConnexion">
            </div>
            <div>
                <a href="<?php echo $root?>/singin">Vous n’avez pas de compte ? Créez en un !</a>
            </div>
            <div>
                <input type="submit" value="Se connecter">
            </div>
        </form>
    </div>
</section>
<script src="<?php echo $dossierJs?>connexion.js"></script>

window.addEventListener("load", function(){
    prixApayer = document.getElementById('finalPrice');
    petitFormat = document.getElementById('50ml');
    moyenFormat = document.getElementById('100ml');
    grandFormat = document.getElementById('200ml');
    quantite = document.getElementById('productQuantity');
    prixApayer.value = petitFormat.value*quantite.value;
    petitFormat.checked = true;
    casecochee = petitFormat;

    petitFormat.addEventListener('click', getFinalPrice);
    moyenFormat.addEventListener('click', getFinalPrice);
    grandFormat.addEventListener('click', getFinalPrice);
    quantite.addEventListener('input', getFinalPrice);

    function getFinalPrice(){
        if(this.checked){
            casecochee = this;
            prixApayer.value = this.value*quantite.value;
        }
        else{
            prixApayer.value = casecochee.value*quantite.value;
        }
    }

    ongletDesc = document.getElementById('descContent');
    ongletAvis = document.getElementById('notices');
    ongletConseils = document.getElementById('advices');
    ongletIngredients = document.getElementById('ingredientList');
    desc = document.getElementById('desc');
    avis = document.getElementById('avis');
    advice = document.getElementById('advice');
    ingredient = document.getElementById('ingredient');

    onglets = [desc, avis, advice, ingredient];
    contenuOnglets = [ongletDesc, ongletAvis, ongletConseils, ongletIngredients];
    onglets.forEach(e => {
        e.addEventListener('click', displayWindow);
    });

    function displayWindow(){
        this.style.backgroundColor = "#FFA300";
        this.style.color = "white";
        i = onglets.indexOf(this);
        contenuOnglets[i].style.display = "block";
        for(j=0;j<4;j++){
            if(j != i){
                onglets[j].style.backgroundColor = "white";
                onglets[j].style.color = "#FFA300";
                contenuOnglets[j].style.display = "none";
            }
        }
    }
});
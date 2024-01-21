window.addEventListener('load', function(){
    choixMarque = document.getElementsByClassName('choixMarque');
    marqueCochee = [];
    choixPrix = document.getElementsByClassName('choixPrix');
    priceUp = document.getElementById('priceUp');
    priceDown = document.getElementById('priceDown');
    prixCoche = '';
    choixType = document.getElementsByClassName('choixType');
    typeCoche = [];

    box = Array.from(document.querySelectorAll('div.product'));
    newBox = Array.from(document.querySelectorAll('div.product'));
    produits = document.getElementsByClassName('product');

    for(i=0;i<choixMarque.length;i++){
        li = choixMarque[i];
        li.addEventListener('click', function(){
            if(!marqueCochee.includes(this.innerHTML.replaceAll(' ', '_'))){
                this.style.backgroundColor = "#FFA300";
                this.style.color = "white";
                marqueCochee.push(this.innerHTML.replaceAll(' ', '_'));
            }
            else{
                this.style.backgroundColor = "white";
                this.style.color = "black";
                index = marqueCochee.indexOf(this.innerHTML);
                marqueCochee.splice(index, 1);
            }
            if(marqueCochee.length == 0 && typeCoche.length == 0){
                for(j=0;j<produits.length;j++){
                    produits[j].style.display = "block";
                }
            }
            else{
                for(j=0;j<produits.length;j++){
                    flag = false;
                    for(k=0;k<marqueCochee.length;k++){
                        if(produits[j].classList.contains(marqueCochee[k])){
                            flag = true;
                        }
                    }
                    if(flag){
                        produits[j].style.display = "block";
                    }
                    else{
                        produits[j].style.display = "none";
                    }
                }
            }
        });
    }

    for(i=0;i<choixType.length;i++){
        li = choixType[i];
        li.addEventListener('click', function(){
            if(!typeCoche.includes(this.innerHTML.replaceAll(' ', '_'))){
                this.style.backgroundColor = "#FFA300";
                this.style.color = "white";
                typeCoche.push(this.innerHTML.replaceAll(' ', '_'));
            }
            else{
                this.style.backgroundColor = "white";
                this.style.color = "black";
                index = typeCoche.indexOf(this.innerHTML);
                typeCoche.splice(index, 1);
            }
            if(typeCoche.length == 0 && marqueCochee.length == 0){
                for(j=0;j<produits.length;j++){
                    produits[j].style.display = "block";
                }
            }
            else{
                for(j=0;j<produits.length;j++){
                    flag = false;
                    for(k=0;k<typeCoche.length;k++){
                        if(produits[j].classList.contains(typeCoche[k])){
                            flag = true;
                        }
                    }
                    if(flag){
                        produits[j].style.display = "block";
                    }
                    else{
                        produits[j].style.display = "none";
                    }
                }
            }
        });
    }

    function verifPrice(){
        console.log(this.innerHTML);
        if(this.innerHTML == "Prix décroissant"){
            if(prixCoche != this){
                this.style.backgroundColor = "#FFA300";
                this.style.color = "white";
                newBox.sort(function(a, b) {
                    const aPrice = parseInt(a.getAttribute('data-value'));
                    const bPrice = parseInt(b.getAttribute('data-value'));
                    return bPrice - aPrice; // trie en ordre décroissant selon la valeur de l'attribut "numTrace"
                });
                prixCoche = this;
            }
            else{
                this.style.backgroundColor = "white";
                this.style.color = "black";
                prixCoche = '';
            }
        }
        else if(this.innerHTML == "Prix croissant"){
            if(prixCoche != this){
                this.style.backgroundColor = "#FFA300";
                this.style.color = "white";
                newBox.sort(function(a, b) {
                    const aPrice = parseInt(a.getAttribute('data-value'));
                    const bPrice = parseInt(b.getAttribute('data-value'));
                    return aPrice - bPrice; // trie en ordre décroissant selon la valeur de l'attribut "numTrace"
                });
                prixCoche = this;
            }
            else{
                this.style.backgroundColor = "white";
                this.style.color = "black";
                prixCoche = '';
            }
        }
        console.log(box == newBox);
        if(prixCoche != ''){
            newBox.forEach(function(div) {
                div.parentNode.appendChild(div); // réinsère chaque div dans l'ordre trié
            });
        }
        else{
            box.forEach(function(div) {
                div.parentNode.appendChild(div); // réinsère chaque div dans l'ordre trié
            });
        }
        
    }

    priceDown.addEventListener('click', verifPrice);
    priceUp.addEventListener('click', verifPrice);

    
})




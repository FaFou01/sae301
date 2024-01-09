window.addEventListener('load', function(){
    choixMarque = document.getElementsByClassName('choixMarque');
    marqueCochee = [];
    choixPrix = document.getElementsByClassName('choixPrix');
    choixType = document.getElementsByClassName('choixType');
    choixFormat = document.getElementsByClassName('choixFormat');

    produits = document.getElementsByClassName('product');

    for(i=0;i<choixMarque.length;i++){
        li = choixMarque[i];
        li.addEventListener('click', function(){
            if(!marqueCochee.includes(this.innerHTML)){
                this.style.backgroundColor = "#FFA300";
                this.style.color = "white";
                for(j=0;j<produits.length;j++){
                    if(!produits[j].classList.contains(this.innerHTML)){
                        produits[j].style.display = "none";
                    }
                    else{
                        produits[j].style.display = "block";
                    }
                }
                marqueCochee.push(this.innerHTML);
            }
            else{
                this.style.backgroundColor = "white";
                this.style.color = "black";
                index = marqueCochee.indexOf(this.innerHTML);
                marqueCochee.splice(index, 1);
                if(marqueCochee.length == 0){
                    for(j=0;j<produits.length;j++){
                        produits[j].style.display = "block";
                    }
                }
            }
        });
    }
})
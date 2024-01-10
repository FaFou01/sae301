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
            if(marqueCochee.length == 0){
                for(j=0;j<produits.length;j++){
                    produits[j].style.display = "block";
                }
            }
            else{
                for(j=0;j<marqueCochee.length;j++){
                    for(k=0;k<produits.length;k++){
                        if(produits[k].classList.contains(marqueCochee[j])){
                            produits[k].style.display = "block";
                        }
                        else{
                            produits[k].style.display = "none";
                        }
                    }
                }
            }
            console.log(produits);
        });
    }
})
window.addEventListener("load", function(){
    choixDomicile = document.getElementById('domicile');
    choixPR = document.getElementById('point_relais');
    formDomicile = document.getElementById('infosDomicile');
    formPR = document.getElementById('infosPR');
    listePR = document.getElementsByClassName('PR');

    inputFM = document.getElementById('FM');
    inputMGV = document.getElementById('MGV');
    inputYRS = document.getElementById('YRS');
    inputCO = document.getElementById('CO');

    localisation = document.getElementById('localisation');

    choixDomicile.addEventListener('click', function(){
        if(this.style.backgroundColor = "white"){
            this.style.backgroundColor = "#ffa300";
            this.style.color = "white";
            choixPR.style.backgroundColor = "white";
            choixPR.style.color = "#ffa300";
            formDomicile.style.display = "flex";
            formPR.style.display = "none";
        }
    });

    choixPR.addEventListener('click', function(){
        if(this.style.backgroundColor = "white"){
            this.style.backgroundColor = "#ffa300";
            this.style.color = "white";
            choixDomicile.style.backgroundColor = "white";
            choixDomicile.style.color = "#ffa300";
            choixDomicile.style.border = "#ffa300 solid";
            formPR.style.display = "flex";
            formDomicile.style.display = "none";
        }
    });

    for(i=0;i<listePR.length;i++){
        listePR[i].addEventListener('click', function(){
            point = this.lastElementChild.firstElementChild;
            if(point.style.display == 'block'){
                point.style.display = 'none';
            }
            else{
                point.style.display = 'block';
            }
        })
    }

    inputMGV.addEventListener('input', function(){
        if(this.checked){
            localisation.style.display = "block";
            localisation.style.top = "160px";
            localisation.style.right = "50px";
        }
    })
    inputFM.addEventListener('input', function(){
        if(this.checked){
            localisation.style.display = "block";
            localisation.style.top = "210px";
            localisation.style.right = "210px";
        }
    })
    inputYRS.addEventListener('input', function(){
        if(this.checked){
            localisation.style.display = "block";
            localisation.style.top = "210px";
            localisation.style.right = "526px";
        }
    })
    inputCO.addEventListener('input', function(){
        if(this.checked){
            localisation.style.display = "block";
            localisation.style.top = "210px";
            localisation.style.right = "350px";
        }
    })
});
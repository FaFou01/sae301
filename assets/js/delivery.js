window.addEventListener("load", function(){
    choixDomicile = document.getElementById('domicile');
    choixPR = document.getElementById('point_relais');
    formDomicile = document.getElementById('infosDomicile');
    formPR = document.getElementById('infosPR');

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
});
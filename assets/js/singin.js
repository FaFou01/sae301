window.addEventListener('load', function(){
    oeilMdp = document.getElementById('voirMdp');
    oeilMdpConf = document.getElementById('voirMdpConf');
    mdp = document.getElementById('mdp');
    mdpConf = document.getElementById('confirm');
    
    oeilMdp.addEventListener('click', function(){
        if(this.classList.contains('ouvert')){
            this.src = "assets/img/oeilFermé.png";
            this.classList.remove('ouvert');
            this.classList.add('fermé');
            mdp.type = "text";
        }
        else{
            this.classList.remove('fermé');
            this.classList.add('ouvert');
            this.src = "assets/img/oeilOuvert.png";
            mdp.type = "password";
        }
    })

    oeilMdpConf.addEventListener('click', function(){
        if(this.classList.contains('ouvert')){
            this.src = "assets/img/oeilFermé.png";
            this.classList.remove('ouvert');
            this.classList.add('fermé');
            mdpConf.type = "text";
        }
        else{
            this.classList.remove('fermé');
            this.classList.add('ouvert');
            this.src = "assets/img/oeilOuvert.png";
            mdpConf.type = "password";
        }
    })
})


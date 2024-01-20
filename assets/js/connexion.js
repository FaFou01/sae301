window.addEventListener("load", function(){
    etapes = document.getElementsByClassName('divAvance');

    if(document.referrer.indexOf('basket') != -1){
        etapes[0].style.display = 'block';
    }
    else{
        etapes[0].style.display = 'none';
    }
});
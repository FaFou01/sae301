window.addEventListener("load", function(){
    boutonCB = document.getElementById('visa');
    boutonPP = document.getElementById('paypal');
    boutonCC = document.getElementById('cadeau');

    CarteBleu = document.getElementById('parCarte');
    Paypal = document.getElementById('ParPaypal');
    CarteCadeau = document.getElementById('parCadeau');

    CarteBleu.style.display = 'block';
    Paypal.style.display = 'none';
    CarteCadeau.style.display = 'none';

    boutonCB.addEventListener('click', function(){
        CarteBleu.style.display = 'block';
        Paypal.style.display = 'none';
        CarteCadeau.style.display = 'none';

        boutonCB.style.backgroundColor = '#FFA300';
        boutonPP.style.backgroundColor = 'white';
        boutonCC.style.backgroundColor = 'white';

    })
    boutonPP.addEventListener('click', function(){
        CarteBleu.style.display = 'none';
        Paypal.style.display = 'block';
        CarteCadeau.style.display = 'none';

        boutonCB.style.backgroundColor = 'white';
        boutonPP.style.backgroundColor = '#FFA300';
        boutonCC.style.backgroundColor = 'white';
    })
    boutonCC.addEventListener('click', function(){
        CarteBleu.style.display = 'none';
        Paypal.style.display = 'none';
        CarteCadeau.style.display = 'block';

        boutonCB.style.backgroundColor = 'white';
        boutonPP.style.backgroundColor = 'white';
        boutonCC.style.backgroundColor = '#FFA300';
    })
});
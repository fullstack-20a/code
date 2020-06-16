<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
.zone1 {
    width:300px;
    height:300px;
    background-color: green;
}        
    </style>
</head>
<body>
    <button class="action1">ACTION1</button>
    <button class="action2">ACTION2</button>
    <!-- MANIERE HISTORIQUE --> 
    <button class="action3" onclick="faireAction()">ACTION3</button>

    <div class="zone1">

    </div>
    <script>
// ETAPE1: DECLARE LA FONCTION
// => CODE EN ATTENTE 
function faireAction ()
{
    console.log('faireAction');

}     

// EN JS, UNE FONCTION EST UNE VALEUR
var maFonction = function () {
    console.log('maFonction');
};

var toto = maFonction;

// ETAPE2: APPELLE LA FONCTION
faireAction();

// J'UTILISE LE NOM DE LA VARIABLE COMME NOM DE FONCTION
maFonction();
toto();


// ON PEUT LAISSER LE VISITEUR DECLENCHER LA FONCTION
var bouton1 = document.querySelector('button.action1');
bouton1.addEventListener('click', faireAction); // JS VA APPELER LA FONCTION SUR L'EVENEMENT click

// ECRITURE PLUS COMPACTE
var bouton2 = document.querySelector('button.action2');
bouton2.addEventListener('click', function () {
    console.log('faireAction2');
});

// TIMER
// POUR DECLENCHER UNE ACTION PLUS TARD
setTimeout(faireAction, 2000);  // ON ATTEND 2S ET JS APPELLE LA FONCTION
setTimeout(function() {
    console.log('COUCOU');
}, 2000);  // ON ATTEND 2S ET JS APPELLE LA FONCTION

// TIMER REPETITIF
// REPETER L'APPEL DE LA FONCTION TOUTES LES 2S
setInterval(function(){
    console.log('REVEIL MATIN');
}, 2000);



// ON VEUT ESPIONNER QUAND LE VISITEUR PASSE LA SOURIS SUR LA ZONE1
var baliseZone1 = document.querySelector('.zone1');
baliseZone1.addEventListener('mouseover', function(event){
    console.log(event);
})
    </script>
</body>
</html>
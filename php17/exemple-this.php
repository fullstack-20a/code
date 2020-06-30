<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>

console.log(window);    // window EST UNE VARIABLE DE JS QUI CONTIENT TOUT LE RESTE

// ON PEUT DEFINIR DES FONCTIONS
// SYNTAXE CLASSIQUE (ET SIMPLIFIEE)
function faire1 ()
{
    console.log("coucou faire1");
    console.log(this);  // this ??? DANS UNE FONCTION this = window
} 

faire1();               // this = window
window.faire1();        // this = window

// ECRITURE SIMPLIFIEE
// SYNTAXE FONCTION ANONYME COMME VALEUR D'UNE VARIABLE
var faire2 = function ()
{
    console.log("faire2");
}

faire2();

// EN REALITE CE QUE JS FAIT
window.faire3 = function ()
{
    console.log("faire3");
}
window.faire3();
// ECRITURE SIMPLIFIEE
faire3();


var objet = {};
objet.propriete = "ma propriete";
objet.methode = function ()
{
    console.log(this);  // this = objet
    console.log(this.propriete);
}

objet.methode();

var objet2 = 
{
    "nom": "gilberto",              // propriete
    "faireTravail": function () {   // methode
        console.log("faireTravail");
        console.log(this.nom);      // dans une methode, je passe par this pour acceder aux proprietes de l'objet
        console.log(this);
    }
}

objet2.faireTravail();
console.log(objet2.nom);

// ETRANGE MAIS TECHNIQUEMENT OK
objet2.nouvelleMethode = window.faire1;
objet2.nouvelleMethode();           // this = objet2

// this EST L'OBJET QUI A SERVI A APPELER LA METHODE
// COMME LES METHODES PEUVENT ETRE RANGEES DANS PLUSIEURS OBJETS
// => DIFFICILE D'ETRE SUR DE LA VALEUR DE this

    </script>
</body>
</html>
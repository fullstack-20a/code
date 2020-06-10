console.log('JS EN COURS DE CHARGEMENT...');

// ON UTILISE UNE VARIABLE POUR MEMORISER QUE QUELLE MINIATURE ON A CLIQUE
// ON UTILISE UNE VARIABLE POUR MEMORISER QUE QUELLE MINIATURE ON A CLIQUE
var miniActuelle = null;
var imageGrand = document.querySelector('img.grand');

var listeImg = document.querySelectorAll('.mini img');
for(var i=0; i<listeImg.length; i++)
{
    var imageActuelle = listeImg[i];
    imageActuelle.addEventListener('click', function(event){
        imageGrand.src = event.target.src;
        var lightbox = document.querySelector('.lightbox');
        lightbox.classList.add('actif');

        // ICI ON DOIT MEMORISER QUELLE EST L'IMAGE MINI 
        // SUR LAQUELLE ON A CLIQUE
        console.log(event.target);
        miniActuelle = event.target;

        // SI ON VEUT DEFILER AUTOMATIQUEMENT
        setInterval(function(){
            // ON SIMULE UN CLICK SUR LE BOUTON
            boutonSuivant.click();
        }, 2000);
    });
}
var boutonFermer = document.querySelector('button.fermer');
if (boutonFermer != null)
{
    boutonFermer.addEventListener('click', function(event){
        var lightbox = document.querySelector('.lightbox');
        lightbox.classList.remove('actif');
    });    
}

// AJOUTER UNE INTERACTION SUR LES BOUTONS PRECEDENT ET SUIVANT
var boutonPrecedent = document.querySelector('.precedent');
if (boutonPrecedent != null)
{
    boutonPrecedent.addEventListener('click', function(event){
        // DEBUG
        console.log('PRECEDENT');
        // ON VA NAVIGUER DANS LE DOM
        var miniPrecedente = miniActuelle.previousElementSibling;
        console.log(miniPrecedente);
        if (miniPrecedente == null)
        {
            miniPrecedente = listeImg[listeImg.length -1];
        }
        imageGrand.src = miniPrecedente.src;

        miniActuelle = miniPrecedente;
    });
}

var boutonSuivant = document.querySelector('.suivant');
if (boutonSuivant != null)
{
    boutonSuivant.addEventListener('click', function(event){
        // DEBUG
        // ON VA NAVIGUER DANS LE DOM
        var miniSuivant = miniActuelle.nextElementSibling;
        console.log(miniSuivant);
        if (miniSuivant == null)
        {
            miniSuivant = listeImg[0];
        }
        imageGrand.src = miniSuivant.src;

        miniActuelle = miniSuivant;
    });
}


// ON VA AJOUTER SUR CHAQUE BALISE img QUI SERONT DANS LA BALISE .media 
// UN EVENEMENT SUR LE CLICK
// QUAND LE VISITEUR VA CLIQUER ALORS ON VA COPIER L'ATTRIBUT src 
// DANS LE CHAMP INPUT
var listeImg   = document.querySelectorAll(".media img");
var inputPhoto = document.querySelector("form input[name=photo]");
for(var i=0; i < listeImg.length; i++)
{
    var imageEncours = listeImg[i];
    imageEncours.addEventListener('click', function(event){
        // DEBUG
        console.log(event.target);
        // ON VA COPIER L'ATTRIBUT src DE L'IMAGE DANS LE CHAMP INPUT
        inputPhoto.value = event.target.src;
    });
}


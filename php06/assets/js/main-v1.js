// ON UTILISE UNE VARIABLE POUR MEMORISER QUE QUELLE MINIATURE ON A CLIQUE
// ON UTILISE UNE VARIABLE POUR MEMORISER QUE QUELLE MINIATURE ON A CLIQUE
var miniActuelle = null;

var listeImg = document.querySelectorAll('.mini img');
for(var i=0; i<listeImg.length; i++)
{
    var imageActuelle = listeImg[i];
    imageActuelle.addEventListener('click', function(event){
        var imageGrand = document.querySelector('img.grand');
        imageGrand.src = event.target.src;
        var lightbox = document.querySelector('.lightbox');
        lightbox.classList.add('actif');

        // ICI ON DOIT MEMORISER QUELLE EST L'IMAGE MINI 
        // SUR LAQUELLE ON A CLIQUE
        console.log(event.target);
        miniActuelle = event.target;
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
var boutonPrecedent = document.querySelector('button.precedent');
if (boutonPrecedent != null)
{
    boutonPrecedent.addEventListener('click', function(event){
        // DEBUG
        console.log('PRECEDENT');
        // SI ON UTILISE LES INDICES 
        var indiceActuel = Array.from(listeImg).indexOf(miniActuelle);
        console.log(indiceActuel);
        var indicePrecedent = indiceActuel -1;
        // ON DOIT GERER LE CAS DU PREMIER
        // SI ON EST DEJA SUR LE PREMIER ALORS ON PASSE AU DERNIER
        if (indiceActuel == 0)
        {
            indicePrecedent = listeImg.length -1; // DERNIER INDICE
        }
        var imagePrecedente = listeImg[indicePrecedent];
        console.log(imagePrecedente);
        // on change l'image
        var imageGrand = document.querySelector('img.grand');
        imageGrand.src = imagePrecedente.src;
        // on a changé d'image actuell
        miniActuelle = imagePrecedente;
    });
}

var boutonSuivant = document.querySelector('button.suivant');
if (boutonSuivant != null)
{
    boutonSuivant.addEventListener('click', function(event){
        // DEBUG
        console.log('SUIVANT');
        // SI ON UTILISE LES INDICES 
        var indiceActuel = Array.from(listeImg).indexOf(miniActuelle);
        console.log(indiceActuel);
        var indiceSuivant = indiceActuel +1;
        // ON DOIT GERER LE CAS DU DERNIER
        // SI ON EST DEJA SUR LE PREMIER ALORS ON PASSE AU DERNIER
        if (indiceActuel == listeImg.length -1)
        {
            indiceSuivant = 0; // PREMIER INDICE
        }

        var imageSuivante = listeImg[indiceSuivant];
        console.log(imageSuivante);
        // on change l'image
        var imageGrand = document.querySelector('img.grand');
        imageGrand.src = imageSuivante.src;
        // on a changé d'image actuell
        miniActuelle = imageSuivante;
    });
}

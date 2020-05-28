
<section>
    <h2>GALERIE</h2>
    <style>
.lightbox {
    transition: all 1s ease;
    opacity:0;
    position:fixed;
    left:0;
    bottom:-100%;
    background-color: rgba(0,0,0,0.8);
    display:block;
    padding:4rem;
    width:100%;
    height:100%;
}
.lightbox.actif {
    opacity:1;
    z-index:10;
    bottom:0%;
}        
img.grand {
    object-fit: contain;
    height:60vh;
}
    </style>
    <div class="ligne">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur numquam omnis delectus consequatur aut veritatis molestiae dolore, rerum non mollitia explicabo dolorum consequuntur unde optio, deserunt corrupti repellendus eos odit!</p>
        <div class="ligne x3col mini">
            <img src="assets/img/photo1.jpg" alt="photo">
            <img src="assets/img/photo2.jpg" alt="photo">
            <img src="assets/img/photo3.jpg" alt="photo">
        </div>
        <div class="lightbox">
            <img class="grand" src="assets/img/photo1.jpg" alt="photo">
            <button>précédent</button>  
            <button class="fermer">fermer la lightbox</button>  
            <button>suivant</button>  
        </div>
    </div>
    <div class="ligne">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur numquam omnis delectus consequatur aut veritatis molestiae dolore, rerum non mollitia explicabo dolorum consequuntur unde optio, deserunt corrupti repellendus eos odit!</p>
        <div class="ligne x3col mini">
            <img src="assets/img/photo4.jpg" alt="photo">
            <img src="assets/img/photo0.jpg" alt="photo">
            <img src="assets/img/photo3.jpg" alt="photo">
        </div>
    </div>
    <script>
/*        
// ON VEUT QUE SI LE VISITEUR CLIQUE SUR UNE IMAGE MINIATURE
// ALORS L'IMAGE AFFICHEE EN GRAND SERA ACTUALISEE 
// POUR AFFICHER L'IMAGE SUR LAQUELLE ON A CLIQUE

// ON VA RAJOUTER DE L'INTERACTIVITE SUR LE CLICK SUR LES MINIATURES
// => ON DOIT EN JS SELECTIONNER LES BALISES HTML
// .mini img
var listeImg = document.querySelectorAll('.mini img');
console.log(listeImg);
for(var i=0; i<listeImg.length; i++)
{
    console.log(i);
    // ON RECUPERE CHAQUE ELEMENT EN UTILISANT SON INDICE
    var imageActuelle = listeImg[i];
    console.log(imageActuelle);

    // JE VAIS AJOUTER UN EVENT LISTENER SUR LE CLICK
    imageActuelle.addEventListener('click', function(event){
        // QUAND LE VISITEUR VA CLIQUER SUR L'IMAGE
        // CE CODE SERA ACTIVE
        console.log('LE VISITEUR A CLIQUE');
        // POUR SAVOIR SUR QUELLE IMAGE LE VISITEUR A CLIQUE
        // JS VA ME FOURNIR LE PARAMETRE event
        // ET DANS event, IL Y A LA PROPRIETE target
        console.log(event.target);
        // DANS LA BALISE img JE VEUX ACCEDER A L'ATTRIBUT src
        console.log(event.target.src);

        // JE VAIS CHANGER L'IMAGE AFFICHE EN GRAND
        // img.grand
        var imageGrand = document.querySelector('img.grand');
        console.log(imageGrand);
        // JE VAIS CHANGER LA VALEUR SON ATTRIBUT src
        imageGrand.src = event.target.src;

        // POUR ANNULER LE DISPLAY NONE
        // ON VA AJOUTER LA CLASSE actif
        var lightbox = document.querySelector('.lightbox');
        // https://developer.mozilla.org/fr/docs/Web/API/Element/classList
        lightbox.classList.add('actif');
    });
}


// ON VA RAJOUTER UN EVENT LISTENER SUR LE BOUTON FERMER
var boutonFermer = document.querySelector('button.fermer');
boutonFermer.addEventListener('click', function(event){
    // ON ENLEVE LA CLASSE actif POUR CACHER LA LIGHTBOX
    var lightbox = document.querySelector('.lightbox');
    // https://developer.mozilla.org/fr/docs/Web/API/Element/classList  
    lightbox.classList.remove('actif');

});
*/
    </script>
</section>
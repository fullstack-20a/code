var listeImg = document.querySelectorAll('.mini img');
for(var i=0; i<listeImg.length; i++)
{
    var imageActuelle = listeImg[i];
    imageActuelle.addEventListener('click', function(event){
        var imageGrand = document.querySelector('img.grand');
        imageGrand.src = event.target.src;
        var lightbox = document.querySelector('.lightbox');
        lightbox.classList.add('actif');
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

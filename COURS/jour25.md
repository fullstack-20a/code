# JOUR25

## LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?B4CD6CC6DBE85EE1E60942DE17D6AE900C7E

## NEWS / QUESTIONS

## INTERFACES, CLASSES ABSTRAITES ET TRAITS


### INTERFACES

    https://www.php.net/manual/fr/language.oop5.abstract.php

```php

class MaClasse
{
    // PROPRIETES

    // METHODES
    function faireTravail ()
    {
        // AJOUTER NOTRE CODE ICI...
    }

}

$objet = new MaClasse;
$objet->faireTravail();

// CLASSES ABSTRAITES
// IL MANQUE DU CODE DANS LA CLASSE...
// ATTENTION: NE PAS OUBLIER DE RAJOUTER abstract AU DEBUT
abstract class MaClasseAbstraite
{
    // PROPRIETES

    // METHODES
    function faireTravail ()
    {
        // AJOUTER NOTRE CODE ICI...
    }

    // DANS UNE CLASSE ABSTRAITE ON PEUT AJOUTER UNE METHODE
    // SANS {} MAIS IL FAUT AJOUTER AU DEBUT abstract
    abstract function faireTache ();

}

// POUR COMPLETER ON VA CREER UNE CLASSE ENFANT QUI HERITE DE LA CLASSE ABSTRAITE
// ET QUI SURCHARGE LA METHODE ABSTRAITE
class MaClasseEnfant
    extends MaClasseAbstraite
{
    // ON RECREE LA METHODE ABSTRAITE MAIS CETTE FOIS ON FOURNIT LE CODE MANQUANT
    function faireTache ()
    {
        // ICI IL FAUT RAJOUTER LE CODE MANQUANT...
    }

}

// PHP REFUSE DE CREER UN OBJET A PARTIR D'UNE CLASSE ABSTRAITE 
// CAR ELLE EST INCOMPLETE
// $objet2 = new MaClasseAbstraite;    // ERREUR PHP...
// Fatal error: Uncaught Error: Cannot instantiate abstract class MaClasseAbstraite

// => ON NE PEUT PAS UTILISER DIRECTEMENT LE CODE DES METHODES DANS UNE CLASSE ABSTRAITE
// ON PEUT CREER UN OBJET SUR LA CLASSE ENFANT
$objetEnfant = new MaClasseEnfant;
$objetEnfant->faireTravail();       // OK
$objet->faireTache();               // OK


// DEV1 QUI CREE LA CLASSE ABSTRAITE
abstract class ProduitAbstrait
{
    // METHODES
    function faireEtape1 ()
    {
        // ... CODE DU DEV1 ...
    }

    // CODE INCOMPLET
    abstract function faireEtape2 (); // A COMPLETER POUR LE DEV2

}

// DEV2
class Produit
    extends ProduitAbstrait
{
    // COMPLETER LE CODE DE LA METHODE faireEtape2
    function faireEtape2 () // A COMPLETER POUR LE DEV2
    {
        // CODE POUR CETTE ETAPE
    }

}

// MAINTENANT ON PEUT CREER UN OBJET DEPUIS LA CLASSE Produit
$objet = new Produit;
$objet->faireEtape1();  // OK CAR LA CLASSE Produit HERITE DE LA CLASSE ProduitAbstrait
$objet->faireEtape2();  // OK CAR LA CLASSE Produit FOURNIT LE CODE POUR CETTE METHODE


```

### INTERFACES

    https://www.php.net/manual/fr/language.oop5.interfaces.php

    LES INTERFACES NE SONT PAS DES CLASSES
    MAIS ON CODE PAREIL QUE POUR UNE CLASSE
    ET DANS LE BLOC D'ACCOLADES, 
    ON NE MET QUE DES METHODES ABSTRAITES (SANS abstract AU DEBUT)

```php

interface MonInterface
{
    // TOUTES LES METHODES SONT ABSTRAITES
    function faireEtape1 ();

    function faireEtape2 ($param1, $param2);

    // ...
}

// POUR UN DEV EN PRATIQUE: CA SERT A RIEN VU QUE IL N'Y A PAS DE CODE ???
// => UNE INTERFACE EST UN CONTRAT QUE LE DEV S'ENGAGE A RESPECTER

// EN PRATIQUE: LE DEV1 CREE UNE CLASSE POUR AJOUTER SON CODE
class CodeDev1
    implements MonInterface     // DANS LA CLASSE CodeDev1 
                                // ON S'ENGAGE A CODER LES METHODES DE L'INTERFACE MonInterface
{
    function faireEtape1 ()
    {
        // AJOUTER LE CODE ICI...
    }

    function faireEtape2($param1, $param2)
    {
        // AJOUTER LE CODE ICI...
    }

}


```

    EN PRATIQUE: 
    UTILE QUAND UN DEV CODE UNE CLASSE 
    ET D'AUTRES DEV UTILISERONT LES METHODES
    => TOUT LE MONDE SE MET D'ACCORD AU DEBUT 
        SUR LE NOM DES METHODES ET LES PARAMETRES A FOURNIR


    PAUSE JUSQU'A 11H...
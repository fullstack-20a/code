# JOUR 24

## LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?3F71C1B8223C3D4FAFDEAEE4958E01185805

## NEWS / QUESTIONS

## COURS POO

    * namespace et use
    * extends               HERITAGE

## NAMESPACE ET USE

    https://www.php.net/manual/fr/language.namespaces.php

    ORGANISATION LE CODE
    => RANGER DANS DES FONCTIONS                => PROGRAMMATION FONCTIONNELLE
    => RANGER LES FONCTIONS DANS DES CLASSES    => PROGRAMMATION ORIENTE OBJET
    => RANGER DES CLASSES DANS DES NAMESPACES   => PROGRAMMATION ORIENTE OBJET




    namespace MonNameSpace
    {
        class MaClasse
        {
            // METHODES
            function faireTravail ()
            {
                // AJOUTER VOTRE CODE ICI
                // ...
            }

        }

        // ON PEUT RANGER PLUSIEURS CLASSES
        // ...
    }

    EN PRATIQUE: 
    ON RANGE CHAQUE CLASSE DANS SON PROPRE FICHIER
    EXEMPLE: LA CLASSE Model EST DANS LE FICHIER Model.php

    ON VA POUVOIR UTILISER UNE ECRITURE SIMPLIFIEE

```php
<?php

namespace MonNameSpace;

// DANS LE FICHIER MaClasse.php

class MaClasse
{
    // METHODES
    function faireTravail ()
    {
        // AJOUTER VOTRE CODE ICI
        // ...
    }

}


// LA FIN DU FICHIER SERVIRA AUTOMATIQUEMENT DE FERMETURE POUR LE NAMESPACE

```

    ON PEUT REUTILISER LE MEME NAMESPACE POUR PLUSIEURS CLASSES

```php
<?php

namespace MonNameSpace;

// DANS LE FICHIER MaClasse2.php

class MaClasse2
{
    // METHODES
    function faireTravail ()
    {
        // AJOUTER VOTRE CODE ICI
        // ...
    }

}


// LA FIN DU FICHIER SERVIRA AUTOMATIQUEMENT DE FERMETURE POUR LE NAMESPACE

```

    INTERET:
    DANS 2 NAMESPACES DIFFERENTS, ON POURRA REUTILISER LE MEME NOM DE CLASSE
    => POUR POUVOIR TRAVAILLER AVEC PLUSIEURS EQUIPES/ENTREPRISES INDEPENDANTES

    INSPIREE DE JAVA ET DES PACKAGES
    SI ON A COMME NOM DE DOMAINE apple.com
    ON PEUT CREER DES SOUS DOMAINES 
        safari.apple.com
        ipad.appleCom
        ...
    ALORS LE PACKAGE SERA 
        com.apple.safari
        com.apple.ipad


    EN PHP, ON PEUT CREER PLUSIEURS NIVEAUX DE NAMESPACES
    AVEC DES \  (ET PAS / ...)


    https://www.php.net/manual/fr/language.namespaces.nested.php

    EXEMPLE:
    wf3.fr
    ET COMME PROJETS parking ET cookandcool
        parking.wf3.fr
        cookandcool.wf3.fr

    EN JAVA, ON AURAIT COMME PACKAGES 
        fr.wf3.parking
            class Model

        fr.wf3.cookandcool
            class Model

    EN PHP, ON POURRAIT CREER DES NAMESPACES POUR CHAQUE PROJET

```php
<?php
namespace Fr\Wf3\Parking;

// DANS UN FICHIER Model.php
class Model
{
    // ...
}

```

    MAIS DANS UN AUTRE DOSSIER...

```php
<?php
namespace Fr\Wf3\CookAndCool;

// DANS UN FICHIER Model.php
class Model
{
    // ...
}
```

    COMME ON PEUT AVOIR DES CLASSES AVEC LE MEME NOM
    => IL FAUT PRECISER DANS QUEL NAMESPACE ON VA CHERCHER CHAQUE CLASSE
    => use PERMET DE DONNER AU DEBUT LE NAMESPACE DE LA CLASSE QU'ON VA UTILISER

    DANS UN PROJET SYMFONY
    LES NAMESPACES ET CLASSES EXTERNES UTILISEES SONT DANS LE DOSSIER vendor/
    NOTE: NE JAMAIS MODIFIER LE CODE PHP DES CLASSES DANS LE DOSSIER vendor/

    DANS SYMFONY, LE CODE DANS LE DOSSIER src SERA DANS LE NAMESPACE App

    PAUSE JUSQU'A 10H50...


## HERITAGE DE CLASSES ET extends

    https://www.php.net/manual/fr/language.oop5.inheritance.php

    EN POO, ON RANGE NOTRE CODE DANS DES CLASSES

```php
<?php

namespace Fr\WebForce3\Parking;

use Fr\WebForce3\Commun\CodeCommun;

class MaClasse1 extends CodeCommun
{
    // ...
    function faireExtra1 ()
    {
        // ...
    }

}
```

```php
<?php
namespace Fr\WebForce3\CookAndCool;

use Fr\WebForce3\Commun\CodeCommun;
// LE use DOIT BIEN CORRESPONDRE AU NAMESPACE DANS LEQUEL ON A RANGE LA CLASSE CodeCommun

class MaClasse2 extends CodeCommun
{
    // ...
    function faireExtra2 ()
    {
        // ...
    }
}
```

```php
<?php

namespace Fr\WebForce3\Commun;

// ON RESTE EN POO => ON RANGE NOTRE CODE DANS UNE CLASSE
class CodeCommun
{
    // DRY: ON NE DEFINIT LA METHODE QU'UNE FOIS
    function faireTravail ()
    {

    }

}

// DRY: DON'T REPEAT YOURSELF
// => IL FAUT ESSAYER DE CENTRALISER LE CODE COMMUN POUR NE PAS LE REPETER...


$objet1 = new MaClasse1;
$objet1->faireTravail();    // ON PEUT UTILISER LA METHODE faireTravail COMME 

```

    QUAND ON ECRIT
    class MaClasse extends CodeCommun

    => ON FAIT UN HERITAGE ENTRE 2 CLASSES
    => MaClasse EST LA CLASSE ENFANT
    => CodeCommun EST LA CLASSE PARENT
    => LA CLASSE ENFANT PEUT UTILISER LES METHODES ET PROPRIETES DE CLASSE PARENT
        COMME SI C'ETAIT LES SIENNES

    => MALHEUREUSEMENT IL Y A DES SUBTILITES SUPPLEMENTAIRES...

    NOTE: DANS PHP, UNE CLASSE ENFANT NE PEUT HERITER QUE D'UNE SEULE CLASSE PARENT

    NOTE: ON PEUT CREER PLUSIEURS NIVEAUX D'HERITAGES

    class GrandParent
    {

    }

    class MonParent extends GrandParent
    {

    }

    class Enfant extends MonParent
    {

    }

## VISIBILITE ET CLASSES

    https://www.php.net/manual/fr/language.oop5.visibility.php

```php

class MaClasse
{
    // PROPRIETES
    public      $prop1       = "valeur1";
    protected   $prop2       = "valeur2";
    private     $prop3       = "valeur3";

    // METHODES
    function faire1 ()      // PAR DEFAUT public
    {

    }

    public function faire2 ()
    {

    }

    protected function faire3 ()
    {

    }

    private function faire4 ()
    {

    }

}

// ON PEUT UTILISER LES PROPRIETES ET LES METHODES public EN DEHORS DE LA CLASSE MaClasse
$objet = MaClasse;

$objet->prop1 = "nouvelle valeur";  // OK car public
echo $objet->prop1;                 // OK car public

$objet->faire1();                   // OK car public
$objet->faire2();                   // OK car public

$objet->prop2  = "nouvelle valeur"; // ERREUR PHP car protected
$objet->faire3();                   // ERREUR PHP car protected

$objet->prop3  = "nouvelle valeur"; // ERREUR PHP car private
$objet->faire4();                   // ERREUR PHP car private

```

## SURCHARGE DE METHODES ENTRE CLASSES

    https://www.php.net/manual/fr/language.oop5.inheritance.php

    AVEC L'HERITAGE, ON ASSOCIE LE CODE DE 2 CLASSES DIFFERENTES...
    ON SE RETROUVE AVEC DES COMBINAISONS EN PLUS...
    OUVRE DES NOUVELLES POSSIBILITES / NOUVEAUX PROBLEMES...

```php
<?php


class MaClasseParent
{
    // PROPRIETES
    public $prop1 = "VALEUR PARENT";

    // METHODES
    function faireTravail ()
    {
        echo "<h4>MaClasseParent::faireTravail</h4>";
    }
}

class MaClasseEnfant 
        extends MaClasseParent
{
    // PROPRIETES
    public $prop1 = "VALEUR ENFANT";

// METHODES
    function faireTravail ()
    {
        echo "<h4>MaClasseEnfant::faireTravail</h4>";
        // SI ON VEUT APPELER LA METHODE DU PARENT
        parent::faireTravail();
    }

}

$objet = new MaClasseEnfant;
$objet->faireTravail();         // ??? PHP VA APPELER QUELLE METHODE ?
                                // $objet EST DE LA CLASSE MaClasseEnfant
                                // => PHP DONNE LA PRIORITE A MaClasseEnfant
                                // => "<h4>MaClasseEnfant::faireTravail</h4>"

```

    PAUSE DEJEUNER JUSQU'A 13H40


## RESUME DE L'EPISODE PRECEDENT

    https://symfony.com/doc/current/page_creation.html

    https://symfony.com/doc/current/page_creation.html#the-bin-console-command

    https://symfony.com/doc/current/page_creation.html#creating-a-page-route-and-controller

    https://symfony.com/doc/current/page_creation.html#rendering-a-template

    OUVRIR UN TERMINAL DANS LE DOSSIER DE SON INSTALLATION SYMFONY 
    (POUR MOI: cours-symfony)

    VERIFIER QUE LA CONSOLE MARCHE
    php bin/console

    POUR CREER LA BASE DE CODE D'UN CONTROLLER

    php bin/console make:controller

    Choose a name for your controller class (e.g. BravePizzaController):
    > FormulaireController

    created: src/Controller/FormulaireController.php
    created: templates/formulaire/index.html.twig

    => NORMALEMENT, ON A 2 NOUVEAUX FICHIERS
        UN FICHIER PHP src/Controller/FormulaireController.php
        UN FICHIER TWIG templates/formulaire/index.html.twig

    NOTE: LE NOM DE LA CLASSE CONTROLLER EST UTILISE POUR LE SOUS-DOSSIER DANS templates/

## TWIG ET HERITAGE DE TEMPLATES


    TWIG TROUVE L'HERITAGE PHP COOL
    DONC IL REFAIT UN PEU LA MEME CHOSE AVEC LES TEMPLATES TWIG

    DANS LE FICHIER templates/formulaire/index.html.twig
    ON A LA LIGNE
    {% extends 'base.html.twig' %}

    QUI CREE UN HERITAGE 
    ENTRE LE TEMPLATE ENFANT index.html.twig
    ET LE TEMPLATE PARENT base.html.twig


## TWIG ET LES ROUTES POUR LES URLS DE NAVIGATION

    https://symfony.com/doc/current/templates.html#linking-to-pages

    ON VA CREER LES URLS EN PASSANT PAR LE NOM DES ROUTES
    2 FONCTIONS
    path        URL RELATIVE
    url         URL COMPLETE


```twig
        <nav>
            <a href="{{ url('index') }}">accueil</a>
            <a href="{{ url('contact') }}">contact</a>
        </nav>
```

## AJOUTER LES FICHIERS CSS, JS, IMAGES, etc...

    https://symfony.com/doc/current/reference/twig_reference.html#asset

    https://symfony.com/doc/4.2/best_practices/web-assets.html

    ATTENTION: 
    EN SYMFONY5, IL EST CONSEILLE D'UTILISER UN MODULE WEBPACK Encore...
    https://symfony.com/doc/current/best_practices.html#use-webpack-encore-to-process-web-assets


    DANS LE DOSSIER public/
    AJOUTER LE DOSSIER assets
        ET LES SOUS-DOSSIERS css/, js/, img/, etc...

    ET EN TWIG ON PEUT UTILISER LA FONCTION asset QUI CREE L'URL JUSQU'AU DOSSIER public/
    ET IL FAUT COMPLETER LE CHEMIN MANQUANT

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <script src="{{ asset('assets/js/main.js') }}"></script>


    AUTONOMIE JUSQU'A 15H30
    PAUSE JUSQU'A 15H45
    ET ENSUITE CHOIX DES ACTIVITES POUR LE RESTE DE LA JOURNEE...


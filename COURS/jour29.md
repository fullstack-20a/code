# JOUR 29

## LIVESHARE

    https://prod.liveshare.vsengsaas.visualstudio.com/join?96594C76091DA3624B8E555F28FAB009AD6E

## NEWS / QUESTIONS


## INJECTION DE DEPENDANCES

    https://fr.wikipedia.org/wiki/Injection_de_d%C3%A9pendances
    https://www.grafikart.fr/tutoriels/injection-571

    https://symfony.com/doc/current/components/dependency_injection.html

    DEPENDANCE EN POO
    TRES COURANT EN POO

```php
// DANS SON FICHIER Competence.php
class Competence
{

}


// DANS SON FICHIER MaClasseA.php
class FormateurA
{
    // METHODES
    // CONSTRUCTEUR
    function __construct ($objetCompetence)
    {

    }

    function donnerCoursDev ()
    {

    }
}

// DANS SON FICHIER MaClasseB.php
class OrganismeFormation
{
    // METHODES
    function fournirFormation ()
    {
        // POUR EXECUTER CES 2 LIGNES DE CODE DANS LA CLASSE MaClasseB
        // PHP A MAINTENANT BESOIN DU CODE DE MaClasseA
        // => MaClasseB DEPEND DE MaClasseA
        // => SOUS TRAITANCE DANS LE MONDE REEL

        // CETTE PARTIE PEUT ETRE COMPLIQUEE...
        // => MaClasseB NE VEUT PAS FORCEMENT AVOIR A GERER CE CODE
        // ...
        $objetCompetence = new Competence;
        $objetA = new FormateurA($objetCompetence);       // PHP APPELLE __construct

        $objetA->donnerCoursDev();
    }

}

```

    SOLUTION POUR NE PAS AVOIR A GERER LE new DANS MaClasseB
    => INJECTION DE DEPENDANCE

```php

// DANS SON FICHIER MaClasseB.php
class OrganismeFormation
{
    // METHODES
    // $objetA EST FOURNI EN PARAMETRE
    // => INJECTION DE DEPENDANCE
    function fournirFormation (MaClasseA $objetA)
    {
        // POUR EXECUTER CES 2 LIGNES DE CODE DANS LA CLASSE MaClasseB
        // PHP A MAINTENANT BESOIN DU CODE DE MaClasseA
        // => MaClasseB DEPEND DE MaClasseA
        // => SOUS TRAITANCE DANS LE MONDE REEL

        $objetA->donnerCoursDev();
    }

}

```


## INJECTION DE DEPENDANCES DANS SYMFONY

    DANS LES METHODES Controller 
    ON UTILISE BEAUCOUP L'INJECTION DE DEPENDANCE
    ON AJOUTE DES PARAMETRES AUX METHODES 
    ET ON PRECISE LA CLASSE DE CHAQUE PARAMETRE
    => SYMFONY ANALYSE LA LISTE DES PARAMETRES POUR CREER LES OBJETS DEMANDES

    public function annonces(AnnonceRepository $annonceRepository): Response


    PAUSE JUSQU'A 11H...


## EXERCICE SUR ENTITE User

    AJOUTER UNE PROPRIETE codePostal

    AJOUTER LA PROPRIETE DANS User

    php bin/console make:entity User

    php bin/console make:migration



    PAUSE DEJEUNER JUSQU'A 13H40...


## DEBUGGER AVEC dump

    TRES PUISSANT ET PRATIQUE POUR DEBUGGER...
    https://symfony.com/doc/current/components/var_dumper.html

    https://symfony.com/doc/4.1/templating/debug.html

    DANS PHP

            // DEBUG: VA AFFICHER LES INFOS SUR LA VARIABLE DANS LA CONSOLE SYMFONY
            dump($annonce);

    DANS TWIG

        {% dump(app) %}
        {% dump(app.user) %}


## UPLOAD PHOTO

    https://symfony.com/doc/current/reference/forms/types.html

    https://symfony.com/doc/current/reference/forms/types/file.html

    https://symfony.com/doc/current/controller/upload_file.html

## MENU LOGOUT

    {% if (app.user.username ?? false) %}
        <li class="nav-item">
            <a class="nav-link" href="{{ url('app_logout') }}">déconnexion</a>
        </li>
    {% else %}
        <li class="nav-item">
            <a class="nav-link" href="{{ url('app_login') }}">connexion</a>
        </li>
    {% endif %}



    PAUSE JUSQU'A 15H45...

## ACTIVITE POUR LE RESTE DE LA JOURNEE

    ATELIER TENNIS
    ATELIER MASQUES ET TUBAS
    *** ATELIER PISCINE
    ATELIER DESSIN ANIME
    ATELIER SIESTE
    ...


    AVANCER SUR LE PROJET MARKETPLACE
    AVANCER SUR LE PROJET EN EQUIPE
    AJOUTER L'UPLOAD DE FICHIER SUR LE FORMULAIRE ADMIN ANNONCE
    AJOUTER UNE NOUVELLE PROPRIETE SUR ENTITE User
    AJOUTER UNE NOUVELLE PROPRIETE SUR ENTITE Annonce (codePostal, ...)

    
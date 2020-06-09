# JOUR 06

## LIEN LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?37F6957701F8E0FD9AB57428F98A5A7B8F61


## NEWS / QUESTIONS

    EQUIPE DE 3

    EQUIPE A / APPLI DE PARKING
    * MAGALI
    * SABRINA
    * NANS

    EQUIPE B / APPLI POUR LES MENUS ET LES COURSES
    * QUENTIN
    * JEREMY
    * GAETAN

    EQUIPE C / MAREGRAPHE ?
    * MIREILLE
    * LAURENT
    * ANTOINE

    SI VOUS AVEZ DEJA CHOISI LE PROJET
        PERSONA CLIENT
        PERSONA VISITEUR
        USERS STORIES
        MAQUETTAGE


    ALTERNATIVE A PHOTOSHOP
    Affinity Photo
    Affinity Designer
    ...

## RESUME EPISODES PRECEDENTS

    * FRONT
    HTML
    CSS
    JS

    * BACK
    PHP
    SQL

    FORMULAIRE HTML
        => PHP          (DANS TABLEAUX ASSOCIATIFS $_REQUEST, $_POST)
        => PHP VERS SQL (DANS TABLEAU ASSOCIATIF)
        =>  SQL
                DATABASE (BDD)
                    TABLE
                        COLONNES
                        LIGNES

    CREATE
        FORMULAIRE ENVOIE DES INFORMATIONS ET ON LES STOCKE DANS UNE LIGNE SQL

    READ
        DEPUIS SQL, ON RECUPERE LES LIGNES AVEC PHP ET ON CONSTRUIT UNE PAGE HTML 
        POUR AFFICHER LES INFOS DANS LE NAVIGATEUR

    METHODOLOGIE AGILE
    * COMMENCER SIMPLE 
    * ET ENSUITE AMELIORER PROGRESSIVEMENT

## MENU DU JOUR

    * COURS:    PROGRAMMATION PAR CLASSE (DEBUT DE PROGRAMMATION ORIENTE OBJET)
    * EXERCICE: CORRIGES D'EXERCICE SUR LES FONCTIONS
    * PROJET:   CREER LES PAGES PUBLIQUES DU SITE BLOG (accueil, galerie, etc...)

## PROGRAMMATION PAR CLASSE

    AUTOUR DE 100.000 LIGNES DE CODE PAR AN
    50 SEMAINES * 5 JOURS * 400 LIGNES DE CODE PAR JOUR

    PROBLEMATIQUE DES ENTREPRISES AVEC DES EQUIPES DE DEV
    => IL FAUT GERER CE VOLUME GIGANTESQUE DE CODE...

    PROGRAMMATION FONCTIONNELLE
    => LE DEV RANGE SON CODE DANS DES FONCTIONS

```php

// ETAPE 1: CREER / DECLARER LA FONCTION    => CODE EN ATTENTE
function envoyerRequeteSQL ($requeteSQL, $tabAssoToken)  // VALEURS EN ENTREES
{
    // ICI LE DEV DOIT RANGER SON CODE
    // ...

    return $pdoStatement;   // VALEUR EN SORTIE
}

// ETAPE 2: APPELER LA FONCTION => ACTIVER SON CODE
$entree1        = "SELECT * FROM article";
$tabAssoVide    = [];
$sortie         = envoyerRequeteSQL($entree1, $tabAssoVide);   
                    // PHP FAIT $requeteSQL   = $entree1
                    //          $tabAssoToken = $tabAssoVide
    // ET A LA FIN DE LA FONCTION PHP FAIT $sortie = $pdoStatement

$sortie         = envoyerRequeteSQL($entree1, []);   
                    // PHP FAIT $requeteSQL   = $entree1
                    //          $tabAssoToken = []
    // ET A LA FIN DE LA FONCTION PHP FAIT $sortie = $pdoStatement

```

    LIMITES DE LA PROGRAMMATION FONCTIONNELLE
    100 LIGNES DE CODE DANS CHAQUE FONCTION
    100 FONCTIONS * 100 LIGNES DE CODE 
    => 10.000 LIGNES DE CODE POUR UN PROJET

    POUR DES PROJETS PLUS VOLUMINEUX (100.000, 1.000.000)
    => ON AURA PLEIN DE FONCTIONS
    => IL FAUT RANGER NOS FONCTIONS
    => LA PROGRAMMATION ORIENTE OBJET
    => ON VA RANGER NOS FONCTIONS DANS DES CLASSES

```php

// ETAPE 1: CREER UNE CLASSE
class MaClasse
{
    // ON VA RANGER NOS FONCTIONS DANS DES CLASSES
    // VOCABULAIRE => ON APPELLE METHODE UNE FONCTION RANGEE DANS UNE CLASSE
    function afficherTexte ($entree1, $entree2)
    {
        // ... LE CODE EST TOUJOURS ICI
        return $sortie;
    }    

    // UNE METHODE D'OBJET
    function calculerPrix ($entree1, $entree2)
    {
        // ... LE CODE EST TOUJOURS ICI
        return $sortie;
    }    

}

class MaClasse2
{
    // ON PEUT CREER UNE METHODE static
    // => UNE METHODE DE CLASSE
    static function afficherTexte ($entree1, $entree2)
    {
        // ... LE CODE EST TOUJOURS ICI
        return $sortie;
    }    
}


// ETAPE2: COMMENT APPELER LES METHODES ?
// AVEC DES METHODES static DE CLASSE
MaClasse2::afficherTexte("valeur1", "valeur2");

// => EN FAIT C'EST COMME EN PROGRAMMATION FONCTIONNELLE
//      ON NE FAIT QUE RAJOUTER LA CLASSE AU DEBUT

// LA PROGRAMMATION ORIENTE OBJET EST UN PEU PLUS COMPLIQUE
$objet = new MaClasse;      // new SERT A CREER UN OBJET A PARTIR DE LA CLASSE
$objet->afficherTexte("valeur1", "valeur2");

```


    PAUSE JUSQU'A 10H55...


    PAUSE DEJEUNER JUSQU'A 13H35...


## ASTUCES EN PROGRAMMATION

    * SI ON A DES INFOS DANS UN TABLEAU
        => PENSER A UTILISER UNE BOUCLE POUR PARCOURIR LE TABLEAU 
            ET ACCEDER A CHAQUE ELEMENT
                * SI LES ELEMENTS SONT DES VALEURS NOMBRES
                    => PENSER AUX OPERATIONS MATHEMATIQUES 
                        (ADDITION, MULTIPLICATION, etc...)
                    => CREER UNE VARIABLE POUR MEMORISER LES RESULTATS DES OPERATIONS
                * SI LES ELEMENTS SONT DES VALEURS TEXTES
                    => PENSER A LA CONCATENATION
                    => CREER UNE VARIABLE POUR MEMORISER LES RESULTATS DES OPERATIONS
    * SI ON DOIT CHOISIR ENTRE 2 POSSIBILITES (OU PLUS...)
        => PENSER A UTILISER UNE CONDITION (if...else...)

## PAUSE JUSQU'A 15H50

    * REFAIRE LES EXOS PAS REUSSIS DU PREMIER COUP
    * AVANCER SUR LES EXOS NON CORRIGES
    * MODE PROJET BLOG : AJOUTER LA PAGE blog
    * BONUS JS: CLIQUER SUR UNE MINIATURE 
        POUR REMPLIR LE CHAMP photo DU FORMULAIRE




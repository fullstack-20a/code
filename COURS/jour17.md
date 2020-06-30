# JOUR 17

## LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?29924E467446D6E317929834ED0EC8A2A1CE

## NEWS / QUESTIONS


## PLANNING 

    MATIN:      COURS POO
    APRES MIDI: PRATIQUE CMS (LEVEL 4)


## PROGRAMMATION ORIENTE OBJET

    https://www.php.net/manual/fr/language.oop5.php

    PROGRAMMATION PAR CLASSE
    => ASSEZ SIMILAIRE A LA PROGRAMMATION FONCTIONNELLE

```php
<?php

// ETAPE1: DEFINITION DE LA CLASSE
class MaClasse
{
    // PROPRIETES STATIC
    public static $prop1 = "";

    // METHODES STATIC
    static function faireA ()
    {
        // AJOUTER VOTRE CODE ICI...
    }   

}


// ETAPE2: ACTIVER LE CODE D'UNE METHODE
MaClasse::faireA();

```

    PROGRAMMATION ORIENTE OBJET

```php
<?php

// ETAPE1: DEFINITION DE LA CLASSE
class MaClasse
{
 
    // ----------------------------------
    // PROGRAMMATION PAR CLASSE
    // ----------------------------------

    // PROPRIETES STATIC
    public static $prop1 = "";

    // METHODES STATIC
    static function faireA ()
    {
        // AJOUTER VOTRE CODE ICI...
    }   

    // ----------------------------------
    // PROGRAMMATION PAR OBJET (POO)
    // ----------------------------------

    // PROPRIETES D'OBJET
    public $prop2 = "";

    // METHODES D'OBJET
    function faireB ()
    {
        // AJOUTER VOTRE CODE ICI...
    }

}

// EN POO: ON VA AVOIR 2 ETAPES SUPPLEMENTAIRES
// ETAPE2: JE CREE UN OBJET DEPUIS LA CLASSE AVEC L'OPERATEUR new
//          VOCABULAIRE ON INSTANCIE UN OBJET A PARTIR DE LA CLASSE
$monObjet = new MaClasse;       // UN OBJET EST UNE VALEUR
// ETAPE3: JE PASSE PAR L'OBJET POUR APPELER LA METHODE
$monObjet->faireB();

```

BILAN: AVEC LA POO, C'EST UNE ETAPE EN PLUS POUR ACTIVER LE CODE DE LA METHODE

    QUEL INTERET DE CODER EN POO SI ON A UNE ETAPE EN PLUS POUR FAIRE LA MEME CHOSE ?

    => EN POO, LES PROPRIETES D'OBJETS SONT INDIVIDUELLES A CHAQUE OBJET
    => ALORS QUE EN PROGRAMMATION PAR CLASSE, LES PROPRIETES STATIC SONT COLLECTIVES A LA CLASSE


```php

class User
{
    // CLASS STATIC
    public static $nomFamille = "";

    // OBJET
    public $prenom = "";

}

User::$nomFamille = "Macron";

$user1 = new User;              // PHP VA CREER POUR CET OBJET UN JEU DE PROPRIETES INDIVIDUELLES
$user1->prenom = "manu";        // prenom EST UNE PROPRIETE INDIVIDUELLE DE L'OBJET $user1

$user2 = new User;
$user2->prenom = "brigitte";    // prenom EST UNE PROPRIETE INDIVIDUELLE DE L'OBJET $user2

echo $user1->prenom; // "manu"

User::$nomFamille = "Bourdin";

echo User::$nomFamille; // "Bourdin"

echo $user2->prenom; // "brigitte"

// SI ON VEUT CONSERVER LA LISTE DES OBJETS DE LA CLASSE User
$tabUser    = [ $user1, $user2 ];
$tabUser[]  = new User;

$premier = $tabUser[0];
$dernier = $tabUser[2];


```

## METHODES MAGIQUES

    https://www.php.net/manual/fr/language.oop5.magic.php

    IL Y A DES MECANISMES AUTOMATIQUES QUI SE DECLENCHENT SUR CERTAINS EVENEMENTS
    (UN PEU COMME LES CALLBACKS EN JS... MAIS ON RESTE EN SYNCHRONE...)

    * AUTOCHARGEMENT DE CLASSE

    https://www.php.net/manual/fr/language.oop5.autoload.php

    SI PHP A BESOIN DE LA DECLARATION D'UNE CLASSE
    ON PEUT FOURNIR UNE FONCTION DE CALLBACK ET PHP ACTIVERA CETTE FONCTION QUAND PHP A BESOIN D'UNE CLASSE

```php

    // FONCTION DE CALLBACK SUR new
    function chargerCodeClasse ($nomclasse)
    {
        // ON VA FAIRE LE require_once ICI 
        // POUR CHARGER LE FICHIER QUI CONTIENT LE CODE DE LA CLASSE...
    }
    spl_autoload_register("chargerCodeClasse");

    $objet = new MaClasse;  // PHP VA APPELER LA FONCTION chargerCodeClasse("MaClasse");


    class MaClasse
    {
        // METHODES MAGIQUES STATIC

        // METHODES MAGIQUES D'OBJET
        // CONSTRUCTEUR => NOM OBLIGATOIRE __construct
        function __construct ()
        {
            // AJOUTER VOTRE CODE ICI...
        }
    }

    $objet = new MaClasse;  // PHP VA DECLENCHER AUTOMATIQUEMENT L'APPEL AU CONSTRUCTEUR
                            //      $objet->__construct();

```

    PAUSE JUSQU'A 10H50...


    https://www.php.net/manual/fr/language.oop5.decon.php#object.construct




## $this POUR LES OBJETS


    https://www.php.net/manual/fr/language.oop5.properties.php

    $this EST UN PARAMETRE SPECIAL GERE PAR PHP


```php

class MaClasse
{
    // PROPRIETES D'OBJET
    public $prop1 = "";

    // METHODES D'OBJET
    function faireTravail ($param1)
    {
        // A L'INTERIEUR D'UNE METHODE
        // $this REPRESENTE L'OBJET QUI A ETE UTILISE POUR ACTIVER LA METHODE
        // EN PRATIQUE: CELA ME PERMET D'AGIR SUR LES PROPRIETES DE CET OBJET
        $this->prop1 = $param1;
    }

    // METHODES MAGIQUES
    function __construct ()
    {

    }
}

$objet1 = new MaClasse;             // DECLENCHE __construct
// -> OPERATEUR D'ACCES QUI PERMET D'ACCEDER AUX ELEMENTS A L'INTERIEUR D'UN OBJET
$objet1->faireTravail("valeur1");   // $param1 = "valeur1" ET $this = $objet1

echo $objet1->prop1; // "valeur1"

$objet2 = new MaClasse;             // DECLENCHE __construct
$objet2->faireTravail("valeur2");   // $param1 = "valeur2" ET $this = $objet2

echo $objet2->prop1; // "valeur2"


```


## VISION PLUS RELLE DE LA PROGRAMMATION ORIENTE OBJET


    ON PEUT VOIR UNE CLASSE COMME UN METIER
    * MACON
    * FORGERON
    * DEVELOPPEUR

    ON PEUT VOIR LES METHODES COMME LES COMPETENCES DU METIER
    => LE SAVOIR FAIRE PROPRE A CHAQUE METIER

    ON PEUT VOIR UN OBJET COMME UN PROFESSIONNEL QUI EXERCE LE METIER

```php

// ETAPE1: CREER LES CLASSES
class Macon
{
    // METHODES / SAVOIR-FAIRE
    function monterMur ()
    {

    }

    function coulerCiment ()
    {

    }

}

class Forgeron
{
    // METHODES / SAVOIR-FAIRE
    function fondreMetal ()
    {

    }

    function forger ()
    {

    }

}

class Developpeur
{
    // PROPRIETES D'OBJET
    public $nom         = "";
    public $tache       = "";

    public $tabTache    = [];
    public $tache2      = "";

    // METHODES / SAVOIR-FAIRE
    function programmer ()
    {
        // ECRIRE VOTRE CODE ICI...
    }

    function transpirer ()
    {

    }

    // METHODE MAGIQUE
    function __construct ($nom="", $tache="")
    {
        $this->nom = $nom;
        $this->tache = $tache;

    }
}

// ETAPE2: CREER LES OBJETS
$objetDeveloppeur = new Developpeur;    // __construct("", "") ON UTILISE LES VALEURS PAR DEFAUT DES PARAMETRES
$objetDeveloppeur->nom = "bernard";

// ETAPE3: ON ACTIVE LA METHODE EN PASSANT PAR L'OBJET
$objetDeveloppeur->tache = "FAIRE FRONT";
$objetDeveloppeur->programmer();

// $objetDeveloppeur2 = new Developpeur;
// $objetDeveloppeur2->nom = "marcelle";
// $objetDeveloppeur2->tache = "CUIRE BACK";

$objetDeveloppeur2 = new Developpeur("marcelle", "CUIRE BACK");     // __construct("marcelle", "CUIRE BACK")
$objetDeveloppeur2->programmer();
$objetDeveloppeur2->transpirer();

// ON CHANGE LA VALEUR
$objetDeveloppeur2->tache = "DEBUGGER PROD";

// SYNTAXE CHAINEE 
// => BRICOLAGE POUR POUVOIR ECRIRE COMME CA...
// $objetDeveloppeur2
//     ->programmer()
//     ->transpirer();


```


    AVEC LA POO ON PEUT VOIR SON PROGRAMME COMME UNE ENTREPRISE
    CLASSES     LES DIFFERENTS POSTES DANS L'ENTREPRISE
    METHODES    LES DIFFERENTES COMPETENCES / RESPONSABILITES   (FONCTION RANGEE DANS UNE CLASSE...)
    OBJETS      LES DIFFERENTS EMPLOYES DANS CHAQUE SERVICE
    PROPRIETES  LES DIFFERENTS INFOS/TACHES DE CHAQUE EMPLOYE   (VARIABLE RANGEE DANS UNE CLASSE...)


## HISTOIRE INFORMATIQUE

    https://fr.wikipedia.org/wiki/Histoire_de_l%27informatique

    PAUSE DEJEUNER ET REPRISE A 13H50


## PROJET CMS 

    REWRITE RULES
    => REECRITURE D'URL

    https://httpd.apache.org/docs/2.4/mod/mod_rewrite.html


    EN PHP, ON PEUT UTILISER LE MEME FICHIER POUR CREER PLUSIEURS PAGES DE NOTRE SITE
    article.php?id=123      => POUR GOOGLE CHAQUE URL DIFFERENTE REPRESENTE UNE PAGE DIFFERENTE DU SITE
    article.php?id=234
    ...

    AU FINAL => ON N'AURA QU'UN SEUL FICHIER PHP EN POINT D'ENTREE POUR TOUTES LES PAGES DU SITE


    PAR DEFAUT, SI LE NAVIGATEUR DEMANDE UNE URL QUI NE CORRESPOND PAS A UN FICHIER
    http://localhost/wf3/php17cms/skjdfhsdjgsgfshjdj.php
    => APACHE RENVOIE UNE ERREUR 404
    => ET APACHE CREE UNE PAGE D'ERREUR...

    EN AJOUTANT UN FICHIER .htaccess
    AVEC DES PARAMETRES DE RE-ECRITURE D'URL

    ON PREND LA MAIN 
    ET ON DEMANDE A APACHE DE DELEGUER LE TRAVAIL A index.php

```

RewriteEngine On                        # ACTIVATION DU MODULE REWRITE_RULES

# SI LA RACINE DU SITE EST http://localhost/wf3/php17cms/
RewriteBase /wf3/php17cms/

# SUR UN VRAI SITE, LA RACINE EST https://monsite.fr/
# RewriteBase /

# SI LE NAVIGATEUR DEMANDE COMME URL http://localhost/wf3/php17cms/index.php
# ALORS ON LUI FOURNIT index.php
RewriteRule ^index\.php$ - [L]

# SI LE NAVIGATEUR DEMANDE UNE URL QUI N'EXISTE PAS
# !-f VEUT DIRE N'EST PAS UN FICHIER
# !-d VEUT DIRE N'EST PAS UN DOSSIER
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
# ALORS ON DELEGUE A index.php LA CREATION DE LA PAGE
RewriteRule . ./index.php [L]


```

    PREMIER INTERET: 
    TOUTES LES PAGES PASSENT PAR UN SEUL FICHIER index.php

    DEUXIEME INTERET: 
    SECURITE ON CACHE LA PARTIE SERVEUR AU NAVIGATEUR
    LES URLS NE CORRESPONDENT PLUS A DES DOSSIERS/FICHIERS SUR NOTRE SERVEUR


    PROBLEMATIQUE:
    ON A CENTRALISE SUR UN SEUL POINT D'ENTREE, 
    MAIS NOTRE SITE PROPOSE PLEIN DE PAGES
    => IL FAUT DECENTRALISER MAINTENANT
    => ROUTEUR

    PHP DOIT SAVOIR QUELLE EST L'URL DEMANDEE PAR LE NAVIGATEUR 
    POUR POUVOIR CONSTRUIRE LA BONNE PAGE

    ENSUITE QUAND PHP SAIT QUELLE CONTENU IL DEVRAIT AFFICHER
    => AVEC L'INFO DU filename DANS L'URL

    => ON PEUT STOCKER LE CONTENU DES PAGES DANS UNE TABLE SQL

    DATABASE cms   
        AVEC CHARSET utf8mb4_general_ci

        TABLE SQL page
            id          INT             PRIMARY_KEY     A_I
            filename    VARCHAR(160)
            titre       VARCHAR(160)
            contenu     TEXT
            photo       VARCHAR(160)


    ON FAIT UN READ SUR LA TABLE page EN FILTRANT SUR LA COLONNE filename

    EXEMPLE POUR AFFICHER LA PAGE contact.php


    SELECT * FROM page
    WHERE filename = 'contact'


    PAUSE JUSQU'A 15H50

    
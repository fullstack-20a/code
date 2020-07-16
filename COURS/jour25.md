# JOUR25

## LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?B4CD6CC6DBE85EE1E60942DE17D6AE900C7E

## NEWS / QUESTIONS

## INTERFACES, CLASSES ABSTRAITES ET TRAITS


### CLASSE ABSTRAITE

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
    (ON NE POURRA PAS UTILISER new)

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

    C'EST POSSIBLE POUR UNE SEULE CLASSE D'ANNONCER QU'ELLE IMPLEMENTE PLUSIEURS INTERFACES


    ET ON PEUT COMBINER AVEC L'HERITAGE

    class MaClasse
        extends     MaClasseParente
        implements  Interface1, Interface2, Interface3
    {

    }


    PAUSE JUSQU'A 11H...

### TRAITS

    https://www.php.net/manual/fr/language.oop5.traits.php

    AVEC L'HERITAGE, UNE CLASSE ENFANT NE PEUT HERITER QUE D'UNE SEULE CLASSE PARENTE
    UNE AUTRE APPROCHE EST PLUS PRATIQUE => APPROCHE PAR COMPOSITION

    UN TRAIT N'EST PAS UNE CLASSE
    (ON NE POURRA PAS UTILISER new SUR UN TRAIT...)

    DANS UN TRAIT, ON PEUT CODER LA MEME CHOSE QUE DANS UNE CLASSE
    => UN TRAIT EST UN MORCEAU DE CLASSE

    AVANTAGE: ON PEUT COMPOSER UNE CLASSE AVEC PLUSIEURS TRAITS

    SI ON A LE CHOIX: LA COMPOSITION EST PREFEREE PLUTOT QUE L'HERITAGE
    (RETOUR D'EXPERIENCE SUR LE LONG TERME...)

    ATTENTION: IL Y A PLEIN DE SCENARIOS A PROBLEMES... COLLISIONS

```php

trait MonTrait
{
    // PROPRIETES

    // METHODES
    function faireTravail ()
    {
        // AJOUTER CODE ICI...
    }
}

trait MonTrait2
{

}

class MaClasse
{
    // ATTENTION: A L'INTERIEUR DU {}
    // ON COMPOSE LE CODE DE MaClasse AVEC LE CODE DE MonTrait
    // => ON OBTIENT LE MEME RESULTAT QU'AVEC L'HERITAGE extends
    use MonTrait, MonTrait2;
}

// $objet = new MonTrait;  // ERREUR => PHP VA BLOQUER

$objet = new MaClasse;
$objet->faireTravail();


// ON PEUT TOUT COMBINER ENSEMBLE

class MonParent
{

}

interface Interface1
{

}

interface Interface2
{

}

class MonEnfant
    extends     MonParent
    implements  Interface1, Interface2
{
    // COMPOSITION AVEC LES TRAITS
    use MonTrait, MonTrait2;
}

```

## CODE DES CLASSES, INTERFACES, TRAITS

    L'AUTOLOAD DE CLASSE FONCTIONNE PAREIL QUE POUR LES CLASSES
    ET DONC ON RANGE CHAQUE INTERFACE, TRAIT
    DANS UN FICHIER SEPARE AVEC LE NOM CORRESPONDANT


## ENTITES ET BASES DE DONNEES DANS SYMFONY

    DOCTRINE: BUNDLE DANS SYMFONY POUR LA GESTION DE LA BASE DE DONNEES

    https://symfony.com/doc/current/doctrine.html

    DOCTRINE EST UN PROJET A PART
    (ON POURRAIT UTILISER DOCTRINE SANS SYMFONY)
    https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/tutorials/getting-started.html


    CONFIGURER LE FICHIER .env

    # DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7
    # REMETTRE LES INFOS COMME EN PHP DE ZERO...
    DATABASE_URL=mysql://root:@127.0.0.1:3306/dbsymfony?serverVersion=5.7

    AVEC SYMFONY, ON VA CREER LA DATABASE EN LIGNE DE COMMANDE (PAS AVEC PHPMYADMIN...)

    OUVRIR UN TERMINAL DANS LE DOSSIER cours-symfony
    ET LANCER LA LIGNE DE COMMANDE

    php bin/console doctrine:database:create

    => Created database `dbsymfony` for connection named default

## ORM: Object Relationship Mapping

    Relationship    BASE DE DONNEES SQL 
                    => RELATIONNELLES 
                    (RELATIONS: ONE TO ONE, ONE TO MANY, MANY TO MANY)

    Object          PROGRAMMATION ORIENTE OBJET (PHP ORIENTE OBJET)

    Mapping         CORRESPONDANCE / PASSAGE
                    COMMENT CONVERTIR DES TABLES SQL EN PHP ORIENTE OBJET ?


    SQL
            TABLE
                COLONNE
                    LIGNES

    POO
            CLASSE
                PROPRIETE
                    OBJET                

    SQL         POO
    TABLE       CLASSE
    COLONNE     PROPRIETE
    LIGNE       OBJET

    EXEMPLE:
        TABLE SQL   user
            id          INT             INDEX=PRIMARY       A_I
            login       VARCHAR(160)
            email       VARCHAR(160)
            password    VARCHAR(160)
            ...

        LIGNES
        id      login       email           password
        1       jean-pierre jp@mail.me      1234
        2       isabelle    isa@mail.me     abcd
        ...

    EN POO: UNE CLASSE QUI REPRESENTE UNE TABLE SQL EST APPELEE UNE ENTITE

    // ENTITE PHP QUI REPRESENTE LA TABLE SQL user
    class User
    {
        // PROPRIETES DE CHAQUE OBJET
        public $id;
        public $login;
        public $email;
        public $password;
    }    

    // CHAQUE LIGNE DE LA TABLE SQL user EST UN OBJET DE LA CLASSE User
    $user1           = new User;
    $user1->id       = 1;
    $user1->login    = "jean-pierre";
    $user1->email    = "jp@mail.me";
    $user1->password = "1234";

    $user2           = new User;
    $user2->id       = 2;
    $user2->login    = "isabelle";
    $user2->email    = "isa@mail.me";
    $user2->password = "abcd";


    AVEC SYMFONY, ON VA CONCENTRER SUR LES ENTITES PHP
    ET A PARTIR DES ENTITES PHP, SYMFONY VA CREER LES TABLES SQL...

## CREER DES ENTITES PHP POUR GERER LES TABLES SQL

    https://symfony.com/doc/current/doctrine.html#creating-an-entity-class

    EXEMPLE: 
    ENTITE Car
        PROPRIETES  
            marque              string  160
            modele              string  160
            couleur             string  160
            kilometrage         integer
            immatriculation     string  160
            carburant           string  160
            chevaux             integer


    OUVRIR UN TERMINAL DANS LE DOSSIER cours-symfony
    ET LANCER LA COMMANDE EN LIGNE...

    php bin/console make:entity

    REPONDRE AUX QUESTIONS...
    => CELA CREE 2 FICHIERS DANS LES DOSSIERS 
        src/Entity/ et src/Repository/



    PAUSE DEJEUNER JUSQU'A 13H40...


    POUR ENSUITE CREER LES TABLES SQL...
    IL Y A DES ETAPES SUPPLEMENTAIRES...

    php bin/console make:migration

    Next: Review the new migration "src/Migrations/Version20200716114459.php"

    => ET AUSSI UNE TABLE SQL migration_versions
    => CREE UN FICHIER PHP
            QUI CONTIENT LE CODE SQL POUR CREER LA TABLE SQL ET LES COLONNES

            $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, marque VARCHAR(160) NOT NULL, modele VARCHAR(160) NOT NULL, couleur VARCHAR(160) NOT NULL, kilometrage INT NOT NULL, immatriculation VARCHAR(160) NOT NULL, carburant VARCHAR(160) NOT NULL, chevaux INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');


    CETTE COMMANDE make:migration ANALYSE LE CODE PHP DES ENTITES 
    ET AUSSI LES TABLES SQL
    ET CONSTRUIT LE CODE NECESSAIRE POUR SYNCHRONISER LES 2 MONDES

    ET ENFIN LA COMMANDE QUI LANCE LA CREATION DANS SQL...

    php bin/console doctrine:migrations:migrate

    SI TOUT SE PASSE BIEN, ON DOIT RETROUVER LA TABLE SQL DANS PHPMYADMIN...

## CRUD AVEC SYMFONY

    MAINTENANT QU'ON A LA TABLE SQL
    ON PEUT AJOUTER UN CRUD SUR CETTE TABLE

    https://symfony.com/blog/new-and-improved-generators-for-makerbundle

    SI ON VEUT GENERER UN CODE CRUD POUR L'ENTITE Car

    php bin/console make:crud Car

    created: src/Controller/CarController.php
    created: src/Form/CarType.php
    created: templates/car/_delete_form.html.twig
    created: templates/car/_form.html.twig
    created: templates/car/edit.html.twig
    created: templates/car/index.html.twig
    created: templates/car/new.html.twig
    created: templates/car/show.html.twig

    Next: Check your new CRUD by going to /car/

    DANS LE NAVIGATEUR, ON PEUT AFFICHER LES PAGES 
    AVEC L'URL /car/

    EXEMPLE:
    http://localhost/wf3/cours-symfony/public/car/

    COOL ;-p
    ON A LES BASES D'UN CRUD QUI EST DISPONIBLE

## LE CRUD DANS LE DETAIL DU CODE SYMFONY

    src/Controller/CarController.php

    TOUTES LES ROUTES DE LA CLASSE AURONT UN PREFIXE /car

    /**
    * @Route("/car")
    */
    class CarController extends AbstractController


    SYMFONY PRECISE LE TYPE DES PARAMETRES
    $carRepository EST UN OBJET DE LA CLASSE CarRepository
    : Response     PRECISE QUE LA VALEUR RENVOYEE AVEC return SERA UN OBJET DE LA CLASSE Response

    public function index(CarRepository $carRepository): Response

## ROUTES AVEC PARAMETRES

     * @Route("/{id}", name="car_show", methods={"GET"})

    ON PEUT GERER PLUSIEURS URLS 
    AVEC UNE SEULE ROUTE PARAMETREE 
    ET UNE SEULE METHODE PHP



    PAUSE JUSQU'A 15H50

## EXERCICE: CREER UNE ENTITE ET PRODUIRE LE CODE DU CRUD POUR CETTE ENTITE

    (CONTINUER A UTILISER LE MEME PROJET SYMFONY ET AUSSI LA MEME DATABASE...)

    PIOCHER UNE ENTITE ET CREER LES CODES AVEC LA CONSOLE POUR OBTENIR UN CRUD...

    Article
        (id)    GERE PAR SYMFONY
        titre           string 160
        contenu         text
        image           string 160
        signature       string 160
        categorie       string 160
        ...

    Recette
        (id)    GERE PAR SYMFONY
        type            string 160
        nom             string 160
        ingredients     text
        instructions    text
        temps           string 160
        ...

    Pilote
        (id)    GERE PAR SYMFONY
        nom             string 160
        prenom          string 160
        age             integer
        ecurie          string 160
        voiture         string 160
        numero          integer
        nombreCourse    integer
        ...

### POUR ALLER PLUS LOIN DANS LA PERSONNALISATION DES FORMULAIRES

    form_row
    https://symfony.com/doc/current/form/form_customization.html

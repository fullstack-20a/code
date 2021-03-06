# JOUR 05

## LIENS LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?430F2596D7047AC807A3ABAEFB2ACE2F36B0


## NEWS / QUESTIONS

    ATTENTION AUX FONCTIONS SUR LES TABLEAUX:
    CERTAINES S'APPLIQUENT SUR LES TABLEAUX ASSOCIATIFS 
    ET D'AUTRES SUR LES TABLEAUX ORDONNES...

    exemple:
    https://www.php.net/manual/fr/function.asort.php
    https://www.php.net/manual/fr/function.sort.php

    https://www.php.net/manual/fr/array.sorting.php

# PROJET: BLOG

    EST-CE QUE VOUS SAVEZ CE QU'EST UN BLOG ?
    * partie visiteur:
    page des articles (actus/news/blog)
    une page par article
        => LA PAGE DE CHAQUE ARTICLE S'APPUIE SUR LE MEME MODELE DE BASE
        => TEMPLATE
        => LE TRAVAIL DU DEV DE CREER LES TEMPLATES
        => IMPORTANT DE SAVOIR LE NOMBRE DE TEMPLATES A CREER POUR UN PROJET
    * partie administrateur
    page pour publier un nouvel article

    => UN SITE BLOG PEUT AVOIR DES CENTAINES DE PAGES...
    => MAIS IL N'Y PEUT-ETRE QU'UN SEUL TEMPLATE POUR CHAQUE ARTICLE
    => UNE PAGE = COMBINAISON D'UN TEMPLATE COMMUN 
                    + DU CONTENU SPECIFIQUE

    AVEC PHP: MOTEUR DE TEMPLATE
    => ON VA POUVOIR CREER DES TEMPLATES PLUS FACILEMENT AVEC PHP

    GESTION DES DONNEES
    * STOCKER LA LISTE DES ARTICLES
    * IL FAUT ENSUITE EXTRAIRE UNE PARTIE DES INFORMATIONS
        => POUR AFFICHER UNE SEULE ANNONCE
    * IL FAUT AUSSI POUVOIR SUPPRIMER UN ARTICLE EN PARTICULIER ET PAS LES AUTRES
    * IL FAUT AUSSI POUVOIR MODIFIER UN ARTICLE
    * ...
    => ON A BESOIN D'UN OUTIL DE GESTION DE BASE DE DONNEES
    => SQL EXISTE DEPUIS LES ANNEES ANNEES 80 (1974)

    LES BASES DE DONNEES (BDD) SONT DES OUTILS TRES IMPORTANTS DANS LE MONDE INFORMATIQUE
    => LES INFORMATIONS LES PLUS IMPORTANTES DANS LE MONDE ACTUEL SONT DES BDDs...
        (compte bancaire, fiches de paie, cotisations retraites, impots...)


    PHP PEUT SE CONNECTER A UN PROGRAMME DE GESTION DE BASE DE DONNEES
    DANS L'ARCHITECTURE LAMP
    Linux
    Apache
    Php
    MySQL/MariaDB

    NOTE: SUR UN ORDINATEUR, SI ON VEUT STOCKER DES INFORMATIONS CA FINIT DANS UN FICHIER...
    MySQL VA GERER CE FICHIER POUR NOUS ;-p
    => TOUT LE CODE D'UN PROJET SERA REPARTI EN 2 ENDROITS:
        * NOTRE CODE PHP, CSS, JS, etc...
        * MAIS AUSSI LA BASE DE DONNEES GEREE PAR MySQL
            (FICHIERS BINAIRES... NON LISIBLES PAR UN HUMAIN...)


## MySQL ET ORACLE

    ORACLE A SON PRODUIT DE BDD => ORACLE
    ORACLE A RACHETE MySQL POUR COMPLETER SA GAMME (AUTOUR DE 2010...)
    MAIS UNE PARTIE DE LA COMMUNAUTE A FAIT SECESSION... 
    (FORK => FOURCHETTE...)
    => INITIATIVE MARIADB
    => MARIADB ET MYSQL SONT COMPATIBLES
        (ATTENTION: AVEC LE TEMPS, DE PLUS EN PLUS DE DIFFERENCES APPARAISSENT...)


## PHPMYADMIN

    POUR GERER LA BASE DE DONNEES
    DANS LE MONDE PHP, ON A UN PROGRAMME QUI EST PHPMYADMIN ;-p
    (LA PLUPART DES HEBERGEURS LE PROPOSE...)

    DEMARRER UN SERVEUR WEB
    ET VERIFIER DANS LE NAVIGATEUR QUE L'URL FONCTIONNE...
    http://localhost/phpmyadmin/

    (CONSEIL: AJOUTER LA PAGE DANS VOS FAVORIS...)


    PAUSE JUSQU'A 10H50...

## STRUCTURE DES BASES DE DONNEES SQL

    * NIVEAU 1
    DATABASE (BASE DE DONNEES)
        => UNE BDD PAR PROJET
        => DONNER UN NOM POUR DISTINGUER CHAQUE BDD
        => ET BIEN CHOISIR LE CHARSET utf8mb4_general_ci

    * NIVEAU 2
    TABLES  => ON PEUT CREER AUTANT DE TABLES SQL QUE NECESSAIRES...
    PAR EXEMPLE:
        ON AURA UNE TABLE SQL article POUR STOCKER LES ARTICLES
        ON POURRA AVOIR UNE TABLE contact POUR STOCKER LES MESSAGES DU FORMULAIRE DE CONTACT
        ON POURRA AVOIR UNE TABLE user POUR STOCKER LES UTILISATEURS DU SITE
        ...

        DANS UNE TABLE SQL, 
        ON VA SEPARER LES INFORMATIONS DANS DES COLONNES DIFFERENTES
        (TABLEURS... EXCEL...)
        ET ENSUITE CHAQUE LIGNE VA REGROUPER UN JEU DE DONNEES

        ON AURA TOUJOURS UNE COLONNE 
        id              INT     INDEX=PRIMARY   A_I (AUTO_INCREMENT)    (FACILITE TECHNIQUE)

        ENSUITE, ON DECIDE DES INFORMATIONS UTILES A STOCKER

        titre           VARCHAR(160)
        photo           VARCHAR(160)        (ON STOCKE LE CHEMIN VERS LA PHOTO...)
        description     TEXT
        ...
        date
        auteur
        categorie
        resume
        ...


## LANGAGE SQL

    MySQL EST UN PROGRAMME QUI MET EN OEUVRE LE LANGAGE SQL
    MariaDB
    PostgreSQL
    Oracle
    ...

    SQL
    Structured
    Query
    Language

    PHPMYADMIN CREE LE CODE SQL POUR NOUS... ;-p

    * POUR INSERER UNE LIGNE

    INSERT INTO `article` 
    (`id`, `titre`, `photo`, `description`) 
    VALUES 
    (NULL, 'les gateaux', 'assets/img/photo0.jpg', 'baba au rhum...\r\nla recette ec...');

    ATTENTION: SQL UTILISE DES GUILLEMETS INVERSES... ``

    * ON POURRA UTILISER UN CODE SQL SIMPLIFIE
    (SI ON NE MET PAS DE CARACTERES BIZARRES...)

```sql

    INSERT INTO article
    (titre, photo, description) 
    VALUES 
    ('titre1202', 'assets/img/photo2.jpg', 'description de 1202');

```

    ON VA PREPARER DES REQUETES SQL
    QUE PHP VA ENVOYER VERS MySQL
    => IL FAUDRA INTEGRER DANS NOTRE CODE PHP LA PARTIE SQL...


## POUR APPRENDRE SQL EN FRANCAIS

    https://sql.sh/

    INSERT
    https://sql.sh/cours/insert-into

## CYCLE DE VIE DES INFORMATIONS: CRUD

    CREATE      ON CREE DE L'INFORMATION
        => INSERT INTO
    READ        ON VEUT UTILISER L'INFORMATION
        => SELECT * FROM `article`
    UPDATE      ON PEUT MODIFIER L'INFORMATION
        => UPDATE `article` SET `titre` = 'le ciel est bleu et ensoleillé' WHERE `article`.`id` = 2;
    DELETE      ON PEUT DETRUIRE L'INFORMATION
        => DELETE FROM `article` WHERE `article`.`id` = 2

    POUR CHAQUE TABLE SQL
    => IL FAUDRA METTRE EN PLACE UN CRUD...

    => VOTRE VIE DE DEV TOURNE AUTOUR DU CODAGE DE CRUD POUR CHAQUE TABLE SQL...
    => DEVELOPPER UN BACK-OFFICE...

    DANS UN PROJET WEB SANS CMS
    * ON DOIT CODER LA PARTIE PUBLIQUE
    * ET ON DOIT AUSSI CODER LA PARTIE BACK OFFICE


    PAUSE DEJEUNER JUSQU'A 13H35


    PAUSE JUSQU'A 16H00...


## FIN DE JOURNEE

    REPRENDRE LE CODE SUR VOS ORDIS
    POUR METTRE EN PLACE LA PAGE admin.php
    AVEC 2 PARTIES
    * FORMULAIRE POUR AJOUTER UN ARTICLE (SCENARIO CREATE)
    * AFFICHAGE DES ARTICLES (SCENARIO READ)


## PDO: Php Data Objects

    POUR SE CONNECTER A UNE DATABASE MySQL, ON UTILISERA PDO
    (=> PROGRAMMATION ORIENTEE OBJET...)

```php

// ON VA CODER LA PAGE ADMIN QUI PERMETTRA DE CREER UN NOUVEL ARTICLE
// $requeteSQL PEUT AVOIR DES TOKENS
// $tabAssoToken FOURNIRA LES VALEURS DE CES TOKENS
function envoyerRequeteSQL ($requeteSQL, $tabAssoToken)
{
    // POUR CONNECTER PHP A SQL
    // ON VA DEVOIR PASSER PAR PAS MAL D'ETAPES UN PEU LOURD...
    // HISTORIQUEMENT IL Y A PLUSIEURS MOYENS POUR SE CONNECTER
    // => VERSION PREFEREE ACTUELLE AVEC PDO
    // Php Data Objects
    // => PROGRAMMATION ORIENTE OBJET
    // https://www.php.net/manual/fr/book.pdo.php
    // https://www.php.net/manual/fr/class.pdo.php

    $database   = "blog";       // A CHANGER A CHAQUE PROJET

    $host       = "127.0.0.1";
    $user       = "root";
    $password   = "";           // SAUF AVEC MAMP "root" (A VERIFIER...)
    $port       = "3306";       // MAIS PEUT ETRE AUTRE CHOSE "8889"

    // Data Source Name (DSN)
    // ATTENTION: IL FAUT PRECISER charset=utf8 (SANS -)
    $dsn        = "mysql:host=$host;port=$port;dbname=$database;charset=utf8";

    // ON CREE LA CONNEXION ENTRE PHP ET MySQL
    $dbh        = new PDO($dsn, $user, $password);

    // ENSUITE ON VA AJOUTER LA REQUETE DANS LA CONNEXION
    // https://www.php.net/manual/fr/pdo.prepare.php
    // prepare NOUS RENVOIE UN AUTRE OBJET $pdoStatement QUI SERVIRA A EXECUTER LA REQUETE SQL
    $pdoStatement = $dbh->prepare($requeteSQL);

    // ENFIN ON EXECUTE LA REQUETE SQL
    $pdoStatement->execute($tabAssoToken);

    $pdoStatement->debugDumpParams();

    // ON DOIT RAJOUTER UN RETURN POUR LE CAS DE LA LECTURE
    return $pdoStatement;

}

```

## ETAPES DE TRANSMISSION DES INFOS


    FORMULAIRE HTML
        titre
        photo
        description

    => ENVOYE A PHP DANS $_POST
                            titre
                            photo
                            description

    => PHP VA TRANSMETTRE A SQL
        AVEC LA REQUETE INSERT INTO
                        + $tabAssoToken = $_POST        (TEMPORAIRE...)
                                                titre
                                                photo
                                                description

    => SQL LE RANGE DANS UNE LIGNE DE LA TABLE SQL article

    
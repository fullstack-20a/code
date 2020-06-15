# JOUR 10

## LIEN LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?3CC7ACC33EC9082382823A0ED9C1194AC94F


## NEWS / QUESTIONS


## PLANNING DE LA SEMAINE

    CRUD POUR PREPARER L'EXAMEN

    BLOG V2

    HTML
    CSS
    JS
    PHP
    SQL

    SQL
        => DATABASE             blogv2      AVEC CHARSET utf8mb4_general_ci
            => TABLES SQL
        article
            id                  INT             INDEX=PRIMARY A_I
            titre               VARCHAR(160)
            contenu             TEXT
            photo               VARCHAR(160)
            categorie           VARCHAR(160)
            datePublication     DATETIME
        user
            id                  INT             INDEX=PRIMARY A_I
            email               VARCHAR(160)
            login               VARCHAR(160)
            password            VARCHAR(160)
            level               INT
            dateCreation        DATETIME
        newsletter
            id                  INT             INDEX=PRIMARY A_I
            email               VARCHAR(160)
            nom                 VARCHAR(160)
            dateInscription     DATETIME
        contact
            id                  INT             INDEX=PRIMARY A_I
            email               VARCHAR(160)
            nom                 VARCHAR(160)
            message             TEXT
            dateReception       DATETIME



## CODE PHP

    => 1 CRUD PAR TABLE SQL
    PHP
            => FORMULAIRES
                    TRAITEMENT DE FORMULAIRE
                        ApiArticle
                        ApiUser
                        ApiNewsletter
                        ApiContact


    CREER UNE PAGE crud-article.php
        AJOUTER LE CODE HTML DU FORMULAIRE
        (ASTUCE: UTILISER LE NOM DES COLONNES COMME name="...")

    PAUSE JUSQU'A 10H55

## ATTAQUE PAR INJECTION SQL

            /*
            // ASTUCE
            extract($tabAssoToken);
            // => CREE LES VARIABLES A PARTIR DES CLES

            // ICI ON UTILISE DU CODE QUI VIENT DE L'EXTERIEUR
            // ET ON LE CONCATENE POUR CREER NOTRE REQUETE SQL
            // => ATTAQUE PAR CHEVAL DE TROIE (INJECTION SQL)
            // A B C
            // (B EST CE QUI VIENT DE L'EXTERIEUR)
            // UN HACKER PEUT DETOURNER B EN B C X A B
            // A B C X A B C

    INSERT INTO article ( titre, contenu, photo, categorie, datePublication ) 
    VALUES ( 'test1130', 'contenu1130', 'assets/img/photo1.jpg', 'test', '2020-06-15 11:36:33' )

    === A ===
    INSERT INTO article ( titre, contenu, photo, categorie, datePublication ) 
    VALUES ( 'test1130', '

    === B ===
    contenu1130

    === C ===
    ', 'assets/img/photo1.jpg', 'test', '2020-06-15 11:36:33' )


    === ATTAQUE ===
    contenu1130', 'assets/img/photo1.jpg', 'test', '2020-06-15 11:36:33' );
    DELETE FROM article;
    INSERT INTO article ( titre, contenu, photo, categorie, datePublication ) 
    VALUES ( 'test1130', 'contenu1130

            // ADRESSE IP DE L'UTILISATEUR
            $ip = $_SERVER["REMOTE_ADDR"];

            // EN PHP: ON CONCATENE AVEC DES INFOS DANGEREUSES
            $requeteSQL =
    <<<CODESQL

    INSERT INTO article
    ( titre, contenu, photo, categorie, datePublication )
    VALUES
    ( '$titre', '$contenu', '$photo', '$categorie', '$datePublication' )

    CODESQL;
            
            echo $requeteSQL;

            Model::envoyerRequeteSQL($requeteSQL, []);


            */


## SQL DELETE

    https://sql.sh/cours/delete

    COMME DANS SELECT, ON AJOUTE UNE CLAUSE WHERE POUR SELECTIONNER LES LIGNES A SUPPRIMER.
    LA PLUPART DU TEMPS, ON UTILISE LA COLONNE id QUI SERT D'IDENTIFIANT UNIQUE POUR CHAQUE LIGNE.

```sql

DELETE FROM `article`
WHERE id = 15

```

    Attention : s’il n’y a pas de condition WHERE alors toutes les lignes seront supprimées et la table sera alors vide.


    PAUSE DEJEUNER JUSQU'A 13H40


## FRAMEWORK MVC

    ON ESSAIE DE METTRE EN PLACE UN CODE QUI POURRA ETRE REUTILISE POUR LES DIFFERENTS CRUD...


## UPDATE SQL


    https://sql.sh/cours/update

    IMPORTANT: ON UTILISE UNE CLAUSE WHERE POUR SELECTIONNER LA LIGNE A MODIFIER
    SI ON NE MET PAS DE CLAUSE WHERE ON VA MODIFIER TOUTES LES LIGNES...

    EN PRATIQUE, ON UTILISERA LA COLONNE id POUR SELECTIONNER UNE LIGNE PRECISE

```sql


 UPDATE article 
 SET 
 titre = 'modifTITRE', 
 contenu = 'modifCONTENU', 
 photo = 'modifPHOOT', 
 categorie = 'modifCAT', 
 datePublication = '2020-06-15 14:10:04' 
 WHERE id = '14'


UPDATE client
SET 
    rue = '49 Rue Ameline',
    ville = 'Saint-Eustache-la-Forêt',
    code_postal = '76210'
WHERE id = 2
```


## SELECT SQL ET PHP fetchAll

```php
Array
(
    [0] => Array
        (
            [id] => 18
            [titre] => titre1409
            [contenu] => contenu1409
            [photo] => assets/img/photo1.jpg
            [categorie] => test1409
            [datePublication] => 2020-06-15 14:09:22
        )

    [1] => Array
        (
            [id] => 17
            [titre] => titre1409
            [contenu] => contenu1409
            [photo] => assets/img/photo1.jpg
            [categorie] => test1409
            [datePublication] => 2020-06-15 14:09:21
        )

    [2] => Array
        (
            [id] => 16
            [titre] => titre1409
            [contenu] => contenu1409
            [photo] => assets/img/photo1.jpg
            [categorie] => test1409
            [datePublication] => 2020-06-15 14:09:20
        )

    [3] => Array
        (
            [id] => 15
            [titre] => titre1409
            [contenu] => contenu1409
            [photo] => assets/img/photo1.jpg
            [categorie] => test1409
            [datePublication] => 2020-06-15 14:09:20
        )

)
```

## CRUD EN UNE SEULE PAGE

DELETE 

    ASTUCE EN HTML ET JS
    ON PEUT AJOUTER DES ATTRIBUTS data-toto DANS UNE BALISE HTML
    ET CA PASSE AU VALIDATEUR HTML5 ;-p


    PAUSE JUSQU'A 15H45... ;-p

## DRAG DROP UPLOAD FICHIER

    TUTO ASSEZ BIEN DETAILLE:
    https://www.smashingmagazine.com/2018/01/drag-drop-file-uploader-vanilla-js/


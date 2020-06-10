# JOUR 07

LIEN LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?27DA72885129CF70E19B0642B6BAF67DFCC2

## NEWS / QUESTIONS


## SQL

    COURS EN FRANCAIS

    https://sql.sh/

    CYCLE DE VIE => CRUD
    Create Read Update Delete

    * CREATE

    https://sql.sh/cours/insert-into

    INSERT INTO table 
    (nom_colonne_1, nom_colonne_2, ...
    VALUES 
    ('valeur 1', 'valeur 2', ...)

    * READ

    https://sql.sh/cours/select

    REQUETE SQL LA PLUS LARGE POUR SELECTIONNER 
    TOUTES LES COLONNES ET TOUTES LES LIGNES SUR UNE TABLE
    
    SELECT * FROM article

    IMPORTANT: LE RESULTAT D'UNE REQUETE SELECT
                    EST UNE TABLE TEMPORAIRE DE RESULTATS
                    CONSTRUITE AVEC LES COLONNES DEMANDEES ET LES LIGNES SELECTIONNEES

    * TRI SUR LES RESULTATS

    ON PEUT DEMANDER A SQL DE TRIER LES RESULTATS

    https://sql.sh/cours/order-by

    ASC     ORDRE CROISSANT
    DESC    ORDRE DECROISSANT
    (ON PEUT DEMANDER PLUSIEURS TRIS SUR PLUSIEURS COLONNES)

    SELECT * FROM article
    ORDER BY id DESC

    SELECT * FROM article
    ORDER BY id DESC, photo ASC

    * ON PEUT SELECTIONNER SEULEMENT UNE PARTIE DES LIGNES

    https://sql.sh/cours/where

    ON PEUT AJOUTER UNE "CLAUSE WHERE" (VOCABULAIRE)

    SELECT * FROM article
    WHERE
        id = 10
    ORDER BY photo DESC
    
    => LE TEST SERA APPLIQUE SUR TOUTES LES LIGNES
        ET ON GARDE SEULEMENT LES LIGNES QUI ONT PASSE LE TEST
    ATTENTION: LA COMPARAISON SE FAIT AVEC = (...ET PAS ==)    

    C'EST LA FLEXIBILITE DES CLAUSES WHERE 
    QUI FONT LA PUISSANCE DES MOTEURS DE BASE DE DONNEES
    => ON A ENORMEMENT DE POSSIBILITES

    ON PEUT COMBINER LES TESTS AVEC AND ET OR

    https://sql.sh/cours/where/and-or


    SELECT * FROM article
    WHERE
        id = 10 OR id = 11
    ORDER BY photo DESC

    SYNTAXE PLUS SIMPLE AVEC IN
    https://sql.sh/cours/where/in

    SELECT * FROM article
    WHERE
        id IN (10, 11)
    ORDER BY photo DESC

    * POUR SELECTIONNER LES LIGNES 
        DONT LA VALEUR D'UNE COLONNE EST COMPRISE ENTRE 2 VALEURS

    https://sql.sh/cours/where/between

    * RECHERCHE PAR MOT CLE DANS UN TEXTE

    https://sql.sh/cours/where/like

    PRATIQUE: ON PEUT AVOIR UN SELECTEUR UNIVERSEL AVEC %

    REMARQUE: 
        SQL EST TRES PUISSANT SUR LES COMBINAISONS POSSIBLES 
        AVEC LES CLAUSES WHERE
        ET LES PERFORMANCES SONT BONNES SUR DES MILLIONS DE LIGNES...


    PAUSE ET ON REPREND A 10H55...

    * POUR REDUIRE LE NOMBRE DE RESULTATS 

    https://sql.sh/cours/limit

    ATTENTION A LA SYNTAXE COMPACTE

    SELECT *
    FROM article
    LIMIT 10 OFFSET 5

    SELECT *
    FROM article
    LIMIT 5, 10

    POUR PAGINER LES RESULTATS PAR 10
    * LA PREMIERE PAGE => INDICES 0 A 9

    SELECT *
    FROM article
    LIMIT 10 OFFSET 0

    * LA 2E PAGE    => INDICES 10 A 19

    SELECT *
    FROM article
    LIMIT 10 OFFSET 10

    * LA 3E PAGE => INDICES 20 A 29

    SELECT *
    FROM article
    LIMIT 10 OFFSET 20


    SI ON VEUT SEULEMENT LE NOMBRE DE LIGNES SELECTIONNES
    ON DOIT LA MEME REQUETE MAIS EN AJOUTANT count(*)

    https://sql.sh/fonctions/agregation/count

    ET COTE PHP, ON POURRA UTILISER fetchColumn POUR RECUPERER LE NOMBRE DIRECTEMENT
    https://www.php.net/manual/fr/pdostatement.fetchcolumn.php


## FORGER UNE REQUETE GET

    ON PEUT CONSTRUIRE DIRECTEMENT UNE URL EN GET
    ET UTILISER UNE BALISE a AVEC L'ATTRIBUT href POUR ENVOYER DES INFORMATIONS EN GET

    (PLUS SIMPLE QUE DE PASSER PAR UN FORMULAIRE HTML EN GET...)

    POUR GOOGLE, 2 URLS AVEC DES PARAMETRES GET DIFFERENTS 
    SONT CONSIDEREES COMME 2 PAGES DIFFERENTES
    ALORS QUE POUR NOUS, IL Y A UN SEUL FICHIER article.php
    => PHP EST UN MOTEUR DE TEMPLATES
    => ON PEUT FAIRE DES SITES QUE GOOGLE VA CONSIDERER COMME PLEIN DE PAGES DIFFERENTES
        AVEC UN SEUL FICHIER PHP ;-p

    http://localhost/wf3/php06/article.php?id=20
    http://localhost/wf3/php06/article.php?id=32
    ...
    http://localhost/wf3/php06/article.php?id=32345535

    
    PAUSE JUSQU'A 13H30... BON APP ;-p


## EXERCICE SUR LE PROJET BLOG


    DANS LE HEADER, AJOUTER UN FORMULAIRE DE RECHERCHE
    LE VISITEUR POURRA ENTRER UN MOT CLE
    ET QUAND IL APPUIE SUR LE BOUTON RECHERCHER
    ON VA L'ENVOYER VERS UNE NOUVELLE PAGE recherche.php
    ET SUR CETTE ON AFFICHERA LES ARTICLES 
    DONT SOIT LE TITRE SOIT LA DESCRIPTION CONTIENNENT LE MOT CLE

    BONUS: SI AUCUN RESULTAT N'EST TROUVE ALORS AFFICHER UN MESSAGE 
            POUR INFORMER LE VISITEUR
            "Désolé, aucun contenu ne correspond à vos critères..."

    BONUS2: SI ON NE TROUVE RIEN
                AFFICHER UN ARTICLE AU HASARD...

            SELECT * FROM article ORDER BY RAND() LIMIT 1
        



## EXERCICES SUR LES FONCTIONS

    PREPARER LE CODE POUR NOUS AIDER SUR LE CRUD...

    PROGRAMMATION PAR CLASSE
    CREER UNE CLASSE CodeSQL
    ET AJOUTER DES METHODES STATIC DE CLASSE

### DELETE

```php

    function creerDelete ($nomTable)
    {
        // ... COMPLETER LE CODE ICI...

        return $resultat;
    }

```

    EXEMPLE:
    SI ON APPELLE LA FONCTION creerDelete ("article");

    // ON AURA COMME RESULTAT 
    DELETE FROM article
    WHERE id = :id

    SI ON APPELLE LA FONCTION creerDelete ("user");

    // ON AURA COMME RESULTAT 
    DELETE FROM user
    WHERE id = :id

### INSERT

```php

    function creerInsert ($nomTable, $tabAssoToken)
    {
        // ... COMPLETER LE CODE ICI...

        return $resultat;
    }

```

    EXEMPLE:
    SI ON APPELLE LA FONCTION 
    creerInsert ("article", 
                    [ "titre" => "toto", "photo" => "titi", "description" => "tutu"]);

    // ON AURA COMME RESULTAT 
    INSERT INTO article
    ( titre, photo, description )
    VALUES
    ( :titre, :photo, :description )

    SI ON APPELLE LA FONCTION 
    creerInsert ("contact", 
                    [ "email" => "toto", "nom" => "titi", "message" => "tutu" ]);

    // ON AURA COMME RESULTAT 
    INSERT INTO contact
    ( email, nom, message )
    VALUES
    ( :email, :nom, :message )

### READ

```php

    function creerSelect ($nomTable, $colonne)
    {
        // ... COMPLETER LE CODE ICI...

        return $resultat;
    }

```

    SI ON APPELLE LA FONCTION 
    creerSelect ("article", "titre");

    // ON AURA COMME RESULTAT 
    SELECT * FROM article
    WHERE
    titre = :titre

    // SI ON APPELLE LA FONCTION 
    creerSelect ("user", "email");

    // ON AURA COMME RESULTAT 
    SELECT * FROM user
    WHERE
    email = :email


### UPDATE

```php

    function creerUpdate ($nomTable, $tabAssoToken)
    {
        // ... COMPLETER LE CODE ICI...

        return $resultat;
    }

```

    EXEMPLE:
    // SI ON APPELLE LA FONCTION 
    creerUpdate ("article", 
                    [ "titre" => "toto", "photo" => "titi", "description" => "tutu" ]);

    // ON AURA COMME RESULTAT 
    UPDATE article
    SET
    titre = :titre,
    photo = :photo,
    description = :description

    // SI ON APPELLE LA FONCTION 
    creerUpdate ("user", 
                    [ "password" => "toto" ]);

    // ON AURA COMME RESULTAT 
    UPDATE user
    SET
    password = :password


## STATE OF JS

    POUR SUIVRE LES TENDANCES...

    https://2019.stateofjs.com/front-end-frameworks/

    PANNEAU GENERAL DES TENDANCES

    https://2019.stateofjs.com/overview/


## RESUME

    * FRONT
    HTML
    CSS
    JS

    * BACK
    PHP
    SQL

    POUR DEMARRER UN PROJET
    => VOUS ALLEZ COMMCENCER PAR LISTER LES PAGES DU SITE
            accueil     => TEMPLATE ACCUEIL
            blog        => TEMPLATE BLOG
            article POUR CHAQUE ARTICLE
                        => UN SEUL TEMPLATE POUR TOUS LES ARTICLES (COOL)
            admin       => TEMPLATE ADMIN
    => ON VA POUVOIR CREER DES SITES AVEC PLEIN DE PAGES
            MAIS EN UTILISANT DES TEMPLATES
    => DE LA LISTE DES PAGES 
        => DETERMINER LE NOMBRE DE TEMPLATES
        => CAR LES TEMPLATES SONT LA VRAI CHARGE DE TRAVAIL DU DEV
                (ATTENTION: IL NE FAUT PAS OUBLIER LES TEMPLATES DE LA PARTIE ADMIN...)

    => CREER LES MAQUETTES EN HTML, CSS, JS POUR CHAQUE TEMPLATE
            * FRONT (VISITEURS)
            index.html      TEMPLATE ACCUEIL
            boutique.html   TEMPLATE BOUTIQUE
            blog.html       TEMPLATE BLOG
            article.html    TEMPLATE POUR CHAQUE ARTICLE
            * BACK (AVEC ACCES PROTEGE AVEC LOGIN) (CLIENT)
            admin.html      TEMPLATE POUR LA PARTIE ADMIN

            IDENTITE VISUELLE ET CHARTE GRAPHIQUE
            => GENERALEMENT ON A UN HEADER ET UN FOOTER COMMUN ENTRE LES TEMPLATES

            ET ON OBTIENT AUSSI TOUT LE DOSSIER
                assets
                    css/
                    js/
                    fonts/
                    img/

    => SOUVENT ON A DU CODE DUPLIQUE POUR LES HEADERS ET FOOTERS...

    => ON VA PASSER EN PHP POUR DECOUPER NOS TEMPLATES ET CENTRALISER LES FICHIERS COMMUNS

        index.html          =>  index.php
                                    php/view/header.php
                                    php/view/section-index.php
                                    php/view/footer.php
        blog.html           =>  blog.php
                                    php/view/header.php
                                    php/view/section-blog.php
                                    php/view/footer.php
        article.html        =>  article.php
                                    php/view/header.php
                                    php/view/section-article.php
                                    php/view/footer.php
        admin.html          =>  admin.php (Single Page Application / JS + AJAX)


    => ENSUITE, ON VA SE POSER LA QUESTION DU CONTENU DYNAMIQUE
        DANS QUELLES TABLES SQL ON VA STOCKER CE CONTENU DYNAMIQUE ?

        UNE PAGE DU SITE = TEMPLATE PHP + CONTENU DANS UNE LIGNE SQL

        POUR UTILISER SQL
        => ON CREE UNE DATABASE POUR LE PROJET
        => ET ENSUITE ON DETERMINE LA LISTE DES TABLES SQL NECESSAIRES

        EXEMPLE DU BLOG:
        TEMPLATE article.php
            POUR CHAQUE ARTICLE, ON VA AFFICHER
                un titre
                une image
                une description

        => ON VA CREER UNE TABLE article
                ET ON AURA COMME COLONNES
                id
                titre
                image
                description
                ...

        => POUR TESTER, IL FAUT COMMENCER A RAJOUTER DES LIGNES
        => SOIT PAR PHPMYADMIN (ONGLET INSERER...)
        => SOIT PAR VOTRE SITE
            => ON TRAVAILLE SUR LA admin.php POUR RAJOUTER LE FORMULAIRE DE CREATE
                    header.php
                    section-admin.php   => ON TRAVAILLE EN FAIT SUR LA SECTION...
                    footer.php
                    
            => DANS LE FORMULAIRE HTML, ON VA UTILISER LE NOM DES COLONNES SQL
                DANS LES ATTRIBUTS name="" 

            => COMME LE FORMULAIRE HTML ARRIVE DANS UN TABLEAU ASSOCIATIF PHP
                => ON AURA BESOIN DE RECUPERER CES INFOS DANS DES VARIABLES PHP
                => ON VA UTILISER LE NOM DES COLONNES 
                    EXEMPLE:    $titre EN PHP
            => IL FAUT AJOUTER LE CODE PHP POUR TRAITER CE FORMULAIRE 
                    ET ENVOYER LES INFOS DANS SQL

    ENSUITE ON PEUT AFFICHER LES LIGNES DE LA TABLE article
    => READ
    => DANS LA PAGE ADMIN, SOUS LE FORMULAIRE DE CREATE
        ON PEUT AFFICHER LA LISTE DES ARTICLES

    => ET ENSUITE, ON PEUT REUTILISER LE MEME CODE POUR LA PAGE blog

    => ET ENSUITE, JE PEUX REUTILISER LE MEME CODE POUR PAGE D'UN SEUL ARTICLE

    => ET ENSUITE, JE PEUX REUTILISER LE MEME CODE POUR LA RECHERCHE


## PHP COTE TECHNIQUE

    PROGRAMMATION FONCTIONNELLE
    => ON VA CREER DES FONCTIONS POUR RANGER NOTRE CODE
            VARIABLES
            VALEURS
            PARAMETRES
            VALEURS DE RETOUR
            BOUCLES
            CONDITIONS

    PREVIEW
    => LA PROGRAMMATION FONCTIONNELLE N'EST QU'UNE ETAPE
        CAR ACTUELLEMENT LA TECHNIQUE A EVOLUE EN PROGRAMMATION ORIENTE OBJET
            CLASSE
            METHODE STATIQUE DE CLASSE
            METHODE D'OBJET
            ...

## PRINT

    DANS LE NAVIGATEUR, ON PEUT IMPRIMER UNE PAGE
    => ON PEUT AJOUTER DU CSS SPECIALEMENT POUR LE PRINT
    => MEDIA QUERIES print...

    COTE SERVEUR, PHP EST CAPABLE DE CREER DES FICHIERS PDF...
    => ON POURRAIT UTILISER PHP POUR PRODUIRE UN FICHIER PDF AVEC LE CONTENU D'UNE PAGE

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
                    [ "email" => "toto", "nom" => "titi", "message" => "tutu"]);

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

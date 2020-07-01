# JOUR 18

## LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?3006D592432BD96F91CC25E26BF1DF027089

## NEWS / QUESTIONS

## PLANNING DU JOUR

    * SQL: RELATIONS ET JOINTURES
    * PHP: CRUD

    https://sql.sh/cours/jointures

## EVALUATION

    CREER UN NOUVEAU DOSSIER multicrud

### EXERCICE 1: CREER LA DATABASE ET LES TABLES

    TABLES SQL: 2 AU MINIMUM
    UN CRUD PAR TABLE SQL

    DATABASE multicrud
        AVEC LE CHARSET utf8mb4_general_ci

    TABLE1  user
        id              INT             PRIMARY_KEY     A_I
        login           VARCHAR(160)
        password        VARCHAR(160)
        ...

    TABLE2  contenu
        id              INT             PRIMARY_KEY     A_I
        titre           VARCHAR(160)
        description     TEXT
        photo           VARCHAR(160)
        id_user         INT             => (POUR NOUS...) CLE ETRANGERE VERS CLE PRIMAIRE id DE LA TABLE user
        ...


    (PAS BESOIN DE RAJOUTER DE CONTRAINTE DE CLE ETRANGERE AU DEPART => SECURITE SUPPLEMENTAIRE...) 

    RELATION ENTRE LES 2 TABLES 
    POUR UNE LIGNE DE user COMBIEN DE LIGNES DE contenu ?
    => MANY
    => UN UTILISATEUR PEUT CREER PLUSIEURS CONTENUS

    POUR UNE LIGNE DE contenu COMBIEN DE LIGNES DE user ?
    => ONE
    => UN CONTENU N'A QU'UN SEUL AUTEUR

    RELATION ONE-TO-MANY DE user VERS contenu
    => TECHNIQUE: AJOUTER UNE COLONNE DE CLE ETRANGERE DANS LA TABLE MANY contenu

### EXERCICE 2: CREATE SUR LES 2 TABLES

    CREER 2 PAGES AVEC UN FORMULAIRE DE CREATE POUR CHAQUE TABLE

    => SUR LE CREATE: QUAND ON AJOUTE UNE NOUVELLE LIGNE DANS contenu
            IL FAUDRA EN PLUS FOURNIR LA VALEUR POUR LA CLE ETRANGERE id_user
            => IL FAUT CONNAITRE L'AUTEUR AVANT DE CREER LE CONTENU
                (POUR L'EXERCICE, ON AURA UN CHAMP POUR SAISIR id_user...)

            SUR UN VRAI PROJET:
            => CA SE PASSE BIEN DANS LE SCENARIO HABITUEL
                LE MEMBRE S'IDENTIFIE => ON CONNAIT SON id 
                ET ENSUITE IL PEUT CREER UN CONTENU

### EXERCICE 3: READ AVEC JOINTURES

    (SI ON A BLOQUE SUR L'EXERCICE 2... AVEC PHPMYADMIN... AJOUTER DES LIGNES DANS LES 2 TABLES SQL...)

    https://sql.sh/cours/jointures/inner-join
    https://sql.sh/cours/jointures/left-join

    REQUETE AVEC JOINTURE:
    SI JE VEUX AFFICHER LA LISTE DES CONTENUS ET LE login DE L'AUTEUR DE CHAQUE CONTENU

    SELECT *
    FROM contenu
    INNER JOIN user
        ON user.id = contenu.id_user


    * SUR LA PAGE DU MEMBRE 'toto'
    JE VEUX AFFICHER LA LISTE DE SES CONTENUS POUR LE user QUI A login = 'toto' 

    SELECT *
    FROM contenu
    INNER JOIN user
        ON user.id = contenu.id_user
    WHERE user.login = 'toto'

### EXERCICE MANY TO MANY

    https://sql.sh/cours/jointures
    https://sql.sh/cours/jointures/inner-join
    https://sql.sh/cours/jointures/left-join

    TABLE3  categorie
        id              INT             PRIMARY_KEY     A_I
        nom             VARCHAR(160)
        resume          TEXT

    RELATION ENTRE LES TABLES contenu ET categorie
    UN CONTENU PEUT ETRE DANS PLUSIEURS CATEGORIES
    UNE CATEGORIE PEUT RASSEMBLER PLUSIEURS CONTENUS
    => MANY-TO-MANY
    => TABLE TECHNIQUE  contenu_categorie
        id              INT             PRIMARY_KEY     A_I
        id_contenu      INT             => (POUR NOUS...) CLE ETRANGERE VERS CLE PRIMAIRE id DE LA TABLE contenu
        id_categorie    INT             => (POUR NOUS...) CLE ETRANGERE VERS CLE PRIMAIRE id DE LA TABLE categorie


    AJOUTER LE CODE POUR OBTENIR
    * CREATE SUR LES 2 TABLES
    * ET ENSUITE READ

    JE VEUX AFFICHER TOUS LES CONTENUS DANS LA CATEGORIE nom = 'sport'

    SELECT *
    FROM contenu_categorie
    INNER JOIN contenu
        ON contenu.id = contenu_categorie.id_contenu
    INNER JOIN categorie
        ON categorie.id = contenu_categorie.id_categorie
    WHERE
        categorie.nom = 'sport'


## AJOUTER UNE CONTRAINTE DE CLE ETRANGERE

    DANS LA TABLE article AJOUTER UNE COLONNE id_user AVEC PhpMyAdmin
    REMPLIR LA COLONNE AVEC UN id EXISTANT DANS user (FAIRE UNE REQUETE SQL UPDATE...)
    ET ENSUITE LANCER LA COMMANDE SQL POUR AJOUTER LA CONTRAINTE DE CLE ETRANGERE

    ALTER TABLE `article`
    ADD KEY `id_user` (`id_user`),
    ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

    CONSEIL: 
    ATTENDRE LA FIN DU DEV POUR AJOUTER LES CONTRAINTES DE CLE ETRANGERES...

    PAUSE JUSQU'A 11H05


## REDIRECTION EN PHP

    https://www.php.net/manual/fr/function.header.php

    header("Location: url-cible.php");

    EXEMPLE: AU BOUT DU TRAITEMENT DE FORMULAIRE DANS api.php
        ON VA REDIRIGER VERS LA PAGE D'AFFICHAGE affichage.php

    header("Location: affichage.php");

    CONSEIL: 
    FAIRE D'ABORD UN TRAITEMENT QUI FONCTIONNE CORRECTEMENT 
    ET ENSUITE RAJOUTER LA REDIRECTION A LA FIN...


    PAUSE DEJEUNER REPRISE A 13H35...
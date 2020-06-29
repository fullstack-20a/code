# JOUR 16

## LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?7747C4853B33C0FD5D632F09CB407835E41A


## NEWS / QUESTIONS

https://medium.com/lequipe-tech/20-ans-d%C3%A9volutions-techniques-et-de-culture-web-d0c4b201304b


## PLANNING

    LUNDI       SQL ET RELATIONS ET JOINTURES / POO
    MARDI       POO ETC...
    MERCREDI    POO ETC...
    JEUDI       EVALUATION FINALE
    VENDREDI    UX

## SQL ET RELATIONS ET JOINTURES

    EXEMPLE DE RELATIONS ENTRE TABLES
    TABLE user
    TABLE article

    ON A PLUSIEURS AUTEURS QUI REDIGENT DES ARTICLES
    ET ON VEUT SAVOIR POUR CHAQUE ARTICLE QUEL EST SON AUTEUR

    => SI VOUS AVEZ CREE LES MAQUETTES
    => PAR EXEMPLE: LE CLIENT A DEMANDE QUE SUR LA PAGE DE LA LISTE DES ARTICLES
        ON VA AFFICHER POUR CHAQUE ARTICLE LE NOM DE L'AUTEUR

    SI ON A SEPARE LES INFOS DANS 2 TABLES SQL
    => IL FAUT POUVOIR CREER UNE RELATION ENTRE LES 2 TABLES

    DANS SQL, ON VA DISTINGUER 3 TYPES DE RELATION
    * ONE TO ONE
    * ONE TO MANY
    * MANY TO MANY

## ONE TO ONE

    UN POUR UN
    POUR UNE LIGNE DE LA TABLE SQL table1
    ON PEUT ASSOCIER UNE SEULE LIGNE DE LA TABLE SQL table2

    ET DANS L'AUTRE SENS
    POUR UNE LIGNE DE LA TABLE SQL table2
    ON PEUT ASSOCIER UNE SEULE LIGNE DE LA TABLE SQL table1


## ONE TO MANY

    UN POUR PLUSIEURS
    POUR UNE LIGNE DE LA TABLE SQL table1
    ON PEUT ASSOCIER PLUSIEURS LIGNES DE LA TABLE SQL table2

    ET DANS L'AUTRE SENS
    POUR UNE LIGNE DE LA TABLE SQL table2
    ON PEUT ASSOCIER UNE LIGNE DE LA TABLE SQL table1


## MANY TO MANY

    PLUSIEURS VERS PLUSIEURS
    POUR UNE LIGNE DE LA TABLE SQL table1
    ON PEUT ASSOCIER PLUSIEURS LIGNES DE LA TABLE SQL table2

    ET DANS L'AUTRE SENS
    POUR UNE LIGNE DE LA TABLE SQL table2
    ON PEUT ASSOCIER PLUSIEURS LIGNES DE LA TABLE SQL table1



## EXEMPLE ENTRE user ET article

    table1  user
    table2  article

    POUR UNE LIGNE DE user
    COMBIEN DE LIGNES SONT ASSOCIEES DANS article ?
    => UN AUTEUR PEUT CREER PLUSIEURS ARTICLES
    => ONE TO MANY

    * DANS LE SENS INVERSE
    POUR UNE LIGNE DE article
    COMBIEN DE LIGNES SONT ASSOCIEES DANS user ?
    => UN ARTICLE EST REDIGE PAR UN SEUL AUTEUR
    => ONE TO ONE

    ON A UNE RELATION ONE TO MANY ENTRE user ET ARTICLE


    ATTENTION: LA REPONSE A CES QUESTIONS DEPEND DU PROJET
        PAR EXEMPLE POUR WIKIPEDIA: 
            UNE PAGE EST CREEE PAR PLUSIEURS CONTRIBUTEURS
            => MANY TO MANY


## EXEMPLE EN ONE TO ONE

    ON FAIT UN SITE D'ANNONCES (EXEMPLE: LE BON COIN...)
    ET QUAND ON CREE DES ANNONCES, ON PEUT DISTINGUER PLUSIEURS TYPES D'ANNONCES
    * annonce classique:    produit prix
    * annonce voiture:      produit prix    + kilometrage
    * annonce immobiliere:  produit prix    + surface

    TABLES SQL ?
    annonce
        type
        produit
        prix

    voiture
        kilometrage

    immobilier
        surface


    ON A 3 TABLES SQL:
    * QUELLE EST LA RELATION ENTRE annonce ET voiture ?
    POUR UNE LIGNE DE annonce
    COMBIEN DE LIGNES PEUVENT ETRE ASSOCIEES DANS voiture ?
        => ONE TO ONE   UN KILOMETRAGE NE CORRESPOND QUE A UNE SEULE ANNONCE


    ONE TO ONE EST REALISEE DANS LE CAS DE COLONNES COMMUNES ET DE COLONNES COMPLEMENTAIRES

## EXEMPLE EN MANY TO MANY    

    TABLE 1     user
    TABLE 2     discussion

    POUR UNE LIGNE DE user
    COMBIEN DE LIGNES DE discussion ?
    => ONE TO MANY  
    => PARCE QUE UN user PEUT PARTICIPER A PLUSIEURS discussion

    DANS LE SENS INVERSE
    POUR UNE LIGNE DE discussion
    COMBIEN DE LIGNES DE user ?
    => ONE TO MANY
    => PARCE UNE DISCUSSION FAIT INTERVENIR PLUSIEURS user

    AU FINAL, ON A DU MANY TO MANY


## DANS UN PROJET

    ON AURA PLEIN DE TABLES SQL
    ET UNE TABLE PEUT ETRE EN RELATION AVEC PLUSIEURS AUTRES TABLES

    PAUSE JUSQU'A 1OH50

## EN PRATIQUE: QUELLES CONSEQUENCES ONT LES RELATIONS ?

    POUR ETABLIR LES RELATIONS ENTRE LES LIGNES DE 2 TABLES EN RELATION
    => ON VA DEVOIR CREER DES COLONNES SUPPLEMENTAIRES

    * DANS LE CAS ONE TO ONE
        ON VA AJOUTER UNE COLONNE DANS UNE DES 2 TABLES
        => CLE ETRANGERE
        => UNE COLONNE QUI RENVOIE VERS UNE CLE PRIMAIRE DANS UNE AUTRE TABLE

    TABLES SQL ?
    annonce
        id              => CLE PRIMAIRE (PRIMARY KEY)
        type
        produit
        prix
        id_voiture      => CLE ETRANGERE VERS LA TABLE voiture

    voiture
        id              => CLE PRIMAIRE (PRIMARY KEY)
        id_annonce      => CLE ETRANGERE (FOREIGN ETRANGERE) => TYPE INT => QUI VA DONNER id DE LA LIGNE ASSOCIEE DANS LA TABLE annonce
        kilometrage


    annonce
        id      type        produit         prix        id_voiture          id_immobilier
        1       voiture     mini cooper     25.000      1                   NULL
        2       mobilier    bureau          100         NULL => CERTAINES ANNONCES N'ONT PAS D'ASSOCIATION
        3       voiture     4x4             30.000      2                   NULL

    voiture
        id      id_annonce  kilometrage
        1       1           80.000
        2       3           2.500
        3       100         100.000     # SCENARIO QUI NE DEVRAIT JAMAIS SE PRODUIRE...


    immobilier  id_annonce  surface


    TECHNIQUEMENT, ON POURRAIT AJOUTER LA COLONNE DE CLE ETRANGERE DANS UNE TABLE OU L'AUTRE
    => MAIS C'EST PLUS OPTIMISE D'AJOUTER LA COLONNE DE CLE ETRANGERE DANS LA TABLE COMPLEMENTAIRE


## ONE TO MANY

    MEME PRINCIPE: 
        ON AJOUTE UNE COLONNE DE CLE ETRANGERE DANS LA TABLE MANY

    user
        id      login       
        1       julie       
        2       georges     
    
    article
        id      titre    id_user   
        1       foot     2
        2       soldes   1
        3       vacances 1

## MANY TO MANY


    LE PIRE DES 3: IMPORTANT DE LE DETECTER LE PLUS TOT POSSIBLE...

    SOLUTION: IL FAUT CREER UNE TABLE TECHNIQUE SUPPLEMENTAIRE...

    user
        id      login
        1       julie       
        2       georges     
        3       marie

    discussion
        id      titre
        1       vacances
        2       courses
        3       code

    user_discussion
        id      id_discussion       id_user
        1       1                   1
        2       1                   2
        3       2                   2
        4       2                   3
        5       3                   1
        6       3                   2
        7       3                   3

    
    QUI PEUT LE PLUS PEUT LE MOINS
    => ON POURRAIT CREER UNE TABLE TECHNIQUE POUR GERER AUSSI LES ONE TO ONE ET ONE TO MANY
    => ATTENTION: LA COMPLEXITE TECHNIQUE EST PLUS LOURDE A GERER...

    ON CREE UNE TABLE SUPPLEMENTAIRE ET ON AJOUTE 2 COLONNES DE CLE ETRANGERE DANS CETTE TABLE INTERMEDIAIRE...

## CODE SQL EN READ ET JOINTURES

    COMMENT ON CREE UNE REQUETE SQL POUR LIRE SUR PLUSIEURS TABLES EN UNE SEULE REQUETE ?

    RAPPEL: UNE REQUETE SELECT CONSTRUIT UN TABLE (TEMPORAIRE) DE RESULTAT A PARTIR DES TABLES EXISTANTES

    SELECT * FROM article

    => ON CONSTRUIT UNE TABLE DE RESULTATS A PARTIR DE TOUTES LES COLONNES DE article (* FROM ARTICLE...)

    ON PEUT FAIRE UNE REQUETE SELECT SUR PLUSIEURS TABLES EN MEME TEMPS
    => JOINTURES

    https://sql.sh/cours/jointures


    MATHEMATIQUEMENT, IL Y A DES POSSIBILITES DE COMBINAISON ASSEZ NOMBREUSES
    * INNER JOIN
    * LEFT JOIN
    * LEFT JOIN SANS INTERSECTION
    * RIGHT JOIN
    * RIGHT JOIN SANS INTERSECTION
    * FULL JOIN
    * FULL JOIN SANS INTERSECTION

    EN PRATIQUE: LA PLUPART DU TEMPS, ON A BESOIN DU INNER JOIN ET DU LEFT JOIN


## INNER JOIN

    ON NE VEUT QUE LES LIGNES QUI ONT UNE ASSOCIATION ENTRE LES 2 TABLES

    https://sql.sh/cours/jointures/inner-join

    fk_id       EST LA COLONNE DE CLE ETRANGERE

    SELECT *
    FROM table1
    INNER JOIN table2 
        ON table1.id = table2.fk_id


    SELECT *
    FROM annonce
    INNER JOIN voiture 
        ON annonce.id = voiture.id_annonce


    SELECT *
    FROM voiture
    INNER JOIN annonce 
        ON annonce.id = voiture.id_annonce
        # ATTENTION ON NE PEUT PAS INVERSER CAR IL Y A UNE SEULE COLONNE DE CLE ETRANGERE


## LEFT JOIN

    ON VEUT TOUTES LES LIGNES DE LA TABLE1
    ET SI IL Y A UNE ASSOCIATION ALORS CHAQUE ASSOCIATION VA DONNER UNE LIGNE DE RESULTATS
    (ON PEUT AVOIR DES DUPLICATIONS DE LIGNES DE TABLE1...)

    https://sql.sh/cours/jointures/left-join


    SELECT *
    FROM table1
    LEFT JOIN table2 
        ON table1.id = table2.fk_id

## RIGHT JOIN

    etc...


## ATTENTION: LES JOINTURES SONT DES OUTILS MATHEMATIQUES DE COMBINAISON ENTRE TABLES

    SQL NE SE POSE DE QUESTIONS SUR LES JOINTURES
    => IL SE PEUT QUE LES RESULTATS N'AIENT AUCUN SENS REEL
    => C'EST LA RESPONSABILITE DU DEV DE COMPRENDRE LE SENS DE SA JOINTURE

    => SQL NE VA PAS DETECTER D'ERREURS
    => PAR CONTRE LES RESULTATS PEUVENT ETRE COMPLETEMENT FARFELUS...


    EXEMPLES:
    SI JE VEUX AFFICHER LA LISTE DES ARTICLES (article) SUR LA PAGE BLOG
    ET POUR CHAQUE ARTICLE JE VEUX AUSSI AFFICHER LE LOGIN DE L'AUTEUR (user)

    SELECT *
    FROM article
    INNER JOIN user
        ON user.id = article.id_user
        # ATTENTION A LA TABLE OU SE TROUVE LA CLE ETRANGERE...

    SI ON A CREE LES MAQUETTES, ON SAIT QUELLES INFORMATIONS SERONT AFFICHEES SUR CHAQUE TEMPLATE
    => SI ON A SEPARE LES INFOS DANS PLUSIEURS TABLES SQL
    => IL FAUDRA SOUVENT LES RASSEMBLER AVEC DES JOINTURES...
        (ATTENTION: DES FOIS, C'EST PLUS SIMPLE DE FAIRE PLUSIEURS REQUETES SANS JOINTURE ET RASSEMBLER EN PHP...)


    PAUSE DEJEUNER ET ON REPREND A 13H35...


## RESUME DE CE MATIN


    3 TYPES DE RELATIONS ENTRE 2 TABLES SQL
    * ONE TO ONE
    * ONE TO MANY
    * MANY TO MANY

    https://openclassrooms.com/fr/courses/4449026-initiez-vous-a-lalgebre-relationnelle-avec-le-langage-sql/4568771-liez-des-relations-grace-aux-jointures


    POUR DETERMINER LA RELATION, IL FAUT SE POSER 2 QUESTIONS
    * POUR UNE LIGNE DE TABLE1 COMBIEN DE LIGNES SONT ASSOCIEES DANS TABLE2 ?
    * POUR UNE LIGNE DE TABLE2 COMBIEN DE LIGNES SONT ASSOCIEES DANS TABLE1 ?

    TECHNIQUEMENT, ON DOIT RAJOUTER UNE OU PLUSIEURS COLONNES DE CLE ETRANGERE...
    (UNE COLONNE DE CLE ETRANGERE SERT A FAIRE L'ASSOCIATION AVEC UNE COLONNE DE CLE PRIMAIRE DANS UNE AUTRE TABLE...)
    * ONE TO ONE        => ON RAJOUTE UNE COLONNE DE CLE ETRANGERE DANS LA TABLE COMPLEMENTAIRE
    * ONE TO MANY       => ON RAJOUTE UN COLONNE DE CLE ETRANGERE DANS LA TABLE MANY
    * MANY TO MANY      => C'EST LE PIRE SCENARIO
                            ON DOIT CREER UNE TABLE SQL INTERMEDIAIRE (TECHNIQUE...)
                            ET ON DOIT RAJOUTER 2 COLONNES DE CLE ETRANGERE (UNE COLONNE VERS CHAQUE TABLE...)

    => CELA PERMET DE FAIRE LE CREATE POUR REMPLIR LES LIGNES DANS LES TABLES
            (PLUS LOURD, ON VA GERER PLUSIEURS TABLES...)

    * ENSUITE, EN PRATIQUE, POUR LE READ, ON PEUT UTILISER LES JOINTURES SQL 
            POUR ASSOCIER LES INFOS DE PLUSIEURS TABLES EN UNE SEULE REQUETE

    * DANS LE CAS DU ONE-TO-ONE OU ONE-TO-MANY

    SELECT *
    FROM table1
    INNER JOIN table2
        ON table1.id = table2.id_table1

    * DANS LE CAS DU MANY-TO-MANY

    SELECT *
    FROM tableTechnique
    INNER JOIN table1
        ON table1.id = tableTechnique.id_table1
    INNER JOIN table2
        ON table2.id = tableTechnique.id_table2

    IMPORTANT: 
        ON DOIT DETECTER LES CAS DE MANY-TO-MANY RAPIDEMENT
        => COUT IMPORTANT SUR LE CODE

    * UPDATE
        IL Y A AUSI DU CODE A RAJOUTER POUR GERER LES RELATIONS ENTRE TABLE...

    * DELETE
        IL Y A AUSI DU CODE A RAJOUTER POUR GERER LES RELATIONS ENTRE TABLE...


## EXEMPLE PRATIQUE SUR LA MODELISATION SQL

    * blog avec commentaires
    * chat (en ajax)
    * marketplace (le bon coin)
    * app de partage de parking
    * site communautaire pour partager les bons alcools
    * plannificateur de menus avec liste de courses

    * blog avec commentaires
        etape1: liste des pages
                    accueil
                    blog
                    template-article    => pour tous les articles
                        pour chaque article, le visiteur peut laisser un commentaires
                    contact
        etape2: liste des templates
        etape3: maquettage de chaque template
                    accueil         => beaucoup de contenu statique
                    blog            => beaucoup de contenu dynamique
                                            affichage des derniers articles en premier
                                            => contenu à stocker dans une/des tables SQL
                    template-article => beaucoup de contenu dynamique
                                            affichage du contenu de chaque article
                                            => contenu à stocker dans une/des tables SQL
                    contact         => beaucoup de contenu statique


    DANS LE TEMPLATE blog
        ON VA AFFICHER COMME INFOS LA LISTE DES ARTICLES
            titre
            image
            contenu
            datePublication
            auteur

    => A STOCKER DANS UNE/DES TABLES SQL
    => DANS COMBIEN DE TABLES SQL ON VA RANGER TOUTES CES COLONNES ?
            table1 article
                id                  INT     PRIMARY_KEY     A_I
                titre
                image
                contenu
                datePublication
                id_user             INT     => CLE ETRANGERE VERS user

            table2 user
                id                  INT     PRIMARY_KEY     A_I
                auteur
                password


    ON ISOLE LES INFOS DANS 2 TABLES
    => QUELLE EST LA RELATION ENTRE LES 2 TABLES ?

    SE POSER LES 2 QUESTIONS
    * POUR UNE LIGNE DE article COMBIEN DE LIGNE DE user PEUVENT ETRE ASSOCIEES ?
        => ONE
        => POUR UN ARTICLE ON A UN SEUL AUTEUR
    * POUR UNE LIGNE DE user COMBIEN DE LIGNE DE article PEUVENT ETRE ASSOCIEES ?
        => MANY
        => POUR UN AUTEUR ON PEUT AVOIR PLUSIEURS ARTICLE

    RELATION ENTRE user ET article EST ONE-TO-MANY
    TECHNIQUEMENT POUR RETROUVER LES RELATIONS ENTRE LES LIGNES
    => AJOUTER UNE COLONNE DE CLE ETRANGERE

    * DANS LE TEMPLATE POUR CHAQUE ARTICLE
        => CREATE: ON VEUT QUE LE VISITEUR IDENTIFIE PUISSE LAISSER UN COMMENTAIRE
                id_user         => CLE ETRANGERE POUR IDENTIFIER UN USER
                commentaire
                dateCommentaire
        => READ: ON DOIT AFFICHER LES COMMENTAIRES POUR CET ARTICLE

    => A STOCKER DANS UNE/DES TABLES SQL
    => DANS COMBIEN DE TABLES SQL ON VA RANGER TOUTES CES COLONNES ?

        table3  commentaire
                id                  INT     PRIMARY_KEY     A_I
                id_user             INT     => CLE ETRANGERE POUR IDENTIFIER UN USER
                commentaire
                dateCommentaire
                id_article          INT     => CLE ETRANGERE POUR IDENTIFIER UN ARTICLE

    EST-CE QU'IL Y A UNE RELATION ENTRE commentaire ET article ?
    SE POSER LES 2 QUESTIONS
    * POUR UNE LIGNE DE commentaire COMBIEN DE LIGNE DE article PEUVENT ETRE ASSOCIEES ?
    => ONE
    => UN COMMENTAIRE EST POUR UN SEUL ARTICLE
    * POUR UNE LIGNE DE article COMBIEN DE LIGNE DE commentaire PEUVENT ETRE ASSOCIEES ?
    => MANY
    => UN ARTICLE PEUT RECEVOIR PLUSIEURS COMMENTAIRES

    RELATION ENTRE article ET commentaire EST ONE-TO-MANY
    TECHNIQUEMENT POUR RETROUVER LES RELATIONS ENTRE LES LIGNES
    => AJOUTER UNE COLONNE DE CLE ETRANGERE




        table1 article
                id                  INT     PRIMARY_KEY     A_I
                titre
                image
                contenu
                datePublication
                id_user             INT     => CLE ETRANGERE VERS user

        table2 user
                id                  INT     PRIMARY_KEY     A_I
                auteur
                password

        table3  commentaire
                id                  INT     PRIMARY_KEY     A_I
                id_user             INT     => CLE ETRANGERE POUR IDENTIFIER UN USER
                commentaire
                dateCommentaire
                id_article          INT     => CLE ETRANGERE POUR IDENTIFIER UN ARTICLE

    * CREATE PEUT SE FAIRE PAR ETAPES
        LE VISITEUR SE CONNECTE ET DONC ON CONNAIT ENSUITE SON id_user
        => QUAND IL CREE UN ARTICLE, ON PEUT REMPLIR LA CLE ETRANGERE
        => QUAND IL LAISSE UN COMMENTAIRE, ON PEUT REMPLIR LA CLE ETRANGERE id_user
                ET COMME LE FORMULAIRE DE COMMENTAIRE EST SUR LA PAGE D'UN ARTICLE, ON CONNAIT AUSSI id_article

    * READ 
        JE VEUX AFFICHER SUR LA PAGE BLOG LA LISTE DES ARTICLES ET LE NOM DE L'AUTEUR DE CHAQUE ARTICLE

        SELECT * 
        FROM article
        INNER JOIN user
            ON user.id = article.id_user


        JE VEUX AFFICHER LA LISTE DES COMMENTAIRES ET LE NOM DE L'AUTEUR DU COMMENTAIRE

        SELECT *
        FROM commentaire
        INNER JOIN user
            ON user.id = commentaire.id_user

        JE VEUX AFFICHER LA LISTE DES COMMENTAIRES ET LE NOM DE L'AUTEUR DU COMMENTAIRE
            SUR L'ARTICLE QUI A POUR id = 23

        SELECT *
        FROM  commentaire
        INNER JOIN  article
            ON article.id = commentaire.id_article
        INNER JOIN user
            ON user.id = commentaire.id_user
        WHERE 
            article.id = 23

## CHAT (EN AJAX...)

    etape1: liste des pages:
        1 PAGE POUR DISCUTER
    etape2: liste des templates
        1 TEMPLATE POUR DISCUTER
    etape3: maquettage
        LISTE DES MESSAGES ET AUSSI LE NOM DE L'AUTEUR DU MESSAGE
            dateMessage
            nom
            message
        => TOUT LE CONTENU EST DYNAMIQUE
        => DANS COMBIEN DE TABLES SQL ON VA LE STOCKER

        table1  discussion
            id              INT     PRIMARY_KEY     A_I
            dateMessage
            message
            id_user         INT     => CLE ETRANGERE VERS LA TABLE user

        table2  user  
            id              INT     PRIMARY_KEY     A_I
            nom
            password

    QUELLE EST LA RELATION ENTRE CES 2 TABLES ?
    EST-CE QU'IL Y A UNE RELATION ENTRE discussion ET user ?
    SE POSER LES 2 QUESTIONS
    * POUR UNE LIGNE DE discussion COMBIEN DE LIGNE DE user PEUVENT ETRE ASSOCIEES ?
    => ONE
    => UN MESSAGE EST LAISSE PAR UN SEUL AUTEUR
    * POUR UNE LIGNE DE user COMBIEN DE LIGNE DE discussion PEUVENT ETRE ASSOCIEES ?
    => MANY
    => UN AUTEUR PEUT LAISSER PLUSIEURS MESSAGES

    user-discussion RELATION ONE-TO-MANY
    => COLONNE CLE ETRANGERE A RAJOUTER DANS LA TABLE MANY discussion

    * READ
        SI JE VEUX AFFICHER LA LISTE DES MESSAGES TRIE PAR DATE DECROISSANT
        ET AUSSI L'AUTEUR DE CHAQUE MESSAGE

        SELECT *
        FROM discussion
        INNER JOIN user
            ON user.id = discussion.id_user
        ORDER BY discussion.dateMessage desc

        # AUTRES SUGGESTIONS ?
            ON discussion.id = user.id_user     ## ERREUR SQL CAR PAS DE COLONNE id_user DANS user
            ON discussion.id = user.id          ## PIEGE: PAS ERREUR SQL CAR CHAQUE TABLE A UNE COLONNE id
                                                        => AUCUN SENS REEL

            ON discussion.id_user = user.id     ## OK LA COMPARAISON MARCHE DES 2 COTES

## EXEMPLE POUR MARKETPLACE

    etape1: liste de pages
        accueil
        liste des annonces
        template pour chaque annonce
        contact

    etape2: liste des templates
        accueil                             => surtout statique
        template liste des annonces         => surtout dynamique
        template pour chaque annonce        => surtout dynamique
        contact                             => surtout statique

    liste des annonces
        titre
        datePublication
        description
        photo
        prix
        auteur
        codePostal
        ville

    => DANS COMBIEN DE TABLES SQL ?
        table1 annonce
            id              INT     PRIMARY_KEY     A_I
            titre
            datePublication
            description
            photo
            prix
            id_user         INT     => CLE ETRANGERE VERS TABLE user
            id_ville        INT     => CLE ETRANGERE VERS TABLE ville

        table2 user
            id              INT     PRIMARY_KEY     A_I
            auteur
            password
            id_ville        INT     => CLE ETRANGERE VERS TABLE ville

        table3 ville
            id              INT     PRIMARY_KEY     A_I
            codePostal
            nom

    PAUSE JUSQU'A 15H55

    RELATION ENTRE user ET annonce 
    => ONE-TO-MANY
    => UN user PEUT CREER PLUSIEURS ANNONCES
    => UNE annonce EST PUBLIEE PAR UN SEUL user
    => COLONNE CLE ETRANGERE DANS LA TABLE MANY

    RELATION ENTRE ville ET annonce
    POUR UNE annonce ON A UNE SEULE VILLE
    POUR UNE ville ON PEUT AVOIR PLUSIEURS ANNONCES
    => ONE-TO-MANY
    => COLONNE CLE ETRANGERE DANS LA TABLE MANY annonce

    RELATION ENTRE ville ET user ?
    => ONE TO MANY
    => UN user EST DANS UNE SEULE ville
    => UNE ville PEUT AVOIR PLUSIEURS user


    JE VEUX AFFICHER LES user QUI SONT DANS LA VILLE 'marseille'

    SELECT *
    FROM user
    INNER JOIN  ville
        ON ville.id = user.id_ville
    WHERE 
        ville.nom = 'marseille'


    JE VEUX AFFICHER TOUTES LES annonce DU user QUI A id = 123

    SELECT *
    FROM annonce
    INNER JOIN user
        ON annonce.id_user = user.id
    WHERE
        user.id = '123'

## APP DE PARTAGE DE PARKING

    etape1: liste des pages
        accueil                 => surtout statique
        liste des parkings dispo sur une carte avec geolocalisation
                                => surtout dynamique
        contact                 => surtout statique

    etape2: liste des templates
        accueil
        contact
        liste des parkings

    etape3: template parkings
                latitude
                longitude
                heureDispo
                typeVehicule

    DANS COMBIEN DE TABLES SQL ?

        table1  parking
            id              INT     PRIMARY_KEY     A_I
            latitude
            longitude
            heureDispo      DATETIME        => QUALITE A LA RELATION      
            taillePlace

        table2  user
            id              INT     PRIMARY_KEY     A_I
            login
            email
            password
            tailleDefaut


    QUELLE RELATION ENTRE parking ET user ?
    => UN parking PEUT AVOIR PLUSIEURS user
    => UN user PEUT AVOIR UN SEUL parking
    => ONE-TO-MANY entre parking ET user
    => CLE ETRANGERE SUR LE MANY user

    SI ON VEUT AFFICHER LES PLACES DISPONIBLES AUTOUR D'UNE POSITION GPS
    POUR UN TYPE DE VEHICULE

    SELECT *
    FROM parking
    WHERE
        latitude < latmax   AND latitude > latmin
        AND 
        longitude < lonmax   AND longitude > lonmin
        AND 
        heureDispo > (heureactu - 600)
        AND 
        typeVehicule = 'ma taille de voiture'


## PLANNIFICATEUR DE MENUS AVEC LISTE DE COURSES


    etape1: liste des pages
        accueil
        contact
        compte user
        creer menu
        ...

    etape2: liste des templates
        accueil
        contact
        compte user
        creer menu      => surtout dynamique

    etape3: template creer menu   

        formulaire des ingrédients
            nom
            description
            quantité

        formulaire de créer des recettes
            => admin vont publier des listes de recettes
            => quantité de travail pour créer du contenu...
            nom
            durée préparation
            nbPersonne

        formulaire pour créer menu
            nom
            date

        formulaire de liste de courses
            nom


        CREATE
            type        entrée/plat/dessert
            niveau      rapide/gastro
            regime      vegetarien/vegan/sans gluten/hallal
            nbPersonne

        READ
            menu calendrier
            menu hebdo
            menu jours (prochains 2, 3, ...)



    tables SQL:

        user
            id              INT     PRIMARY_KEY     A_I
            login
            password

        ingredient
            id              INT     PRIMARY_KEY     A_I
            nom
            description

        recette
            id              INT     PRIMARY_KEY     A_I
            nom
            nbPersonne

        ingredient_recette
            id              INT     PRIMARY_KEY     A_I
            id_recette      INT     => CLE ETRANGERE VERS recette
            id_ingredient   INT     => CLE ETRANGERE VERS ingredient
            quantite

        menu
            id              INT     PRIMARY_KEY     A_I
            nom
            type            entrée/plat/dessert
            niveau          rapide/gastro
            regime          vegetarien/vegan/sans gluten/hallal
            nbPersonne

        recette_menu
            id              INT     PRIMARY_KEY     A_I
            id_recette      INT     => CLE ETRANGERE VERS recette
            id_menu         INT     => CLE ETRANGERE VERS menu

        agenda
            id              INT     PRIMARY_KEY     A_I
            dateHeure

        
        RELATION ENTRE ingredient ET recette
        => MANY TO MANY
        => UN INGREDIENT PEUT ETRE UTILISE DANS PLUSIEURS RECETTES
        => UNE RECETTE CONTIENT PLUSIEURS INGREDIENTS
        => table technique supplémentaire


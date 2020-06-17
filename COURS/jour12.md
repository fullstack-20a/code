# JOUR 12

## LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?99C13C2AC6F946DF5A9B8E9F953D48EAEC2B


## NEWS / QUESTIONS

## PLANNING

user    CREATE

inscription.php
    sign up

installation.php
    ON NE CREE UN user QUE SI LA TABLE user EST VIDE
    UN FORMULAIRE DE COMPTE ADMIN
    email
    password
    => CREATE DU COMPTE 

login.php
    sign in
    ON DEMANDE AU VISITEUR DE S'IDENTIFIER AVEC UN email ET UN password
    (READ SUR LA TABLE user...)

logout.php

## CREATION DE LA PAGE installation.php

    CREER LA TABLE SQL user

        user
            id                  INT             INDEX=PRIMARY A_I
            email               VARCHAR(160)
            login               VARCHAR(160)
            password            VARCHAR(160)
            level               INT
            dateCreation        DATETIME

    ET ENSUITE CODER LE FORMULAIRE HTML
    => ASTUCE ON UTILISE LE NOM DES COLONNES SQL DANS LES BALISES HTML (name="...")

    PAUSE ET REPRISE A 10H50...

## SECURITE

    NE JAMAIS UTILISER LE MOT DE PASSE DE VOTRE EMAIL SUR UN AUTRE SITE...

    AVEC LE RGPD LE DEVELOPPEUR EST RESPONSABLE LEGALEMENT
    DE LA SECURITE D'UN SITE
    (...CA VA SUREMENT INCITER LES DEVS A PASSER PAR DES FRAMEWORKS ?...)

    => POUR EVITER QUE LE MOT DE PASSE SOIT STOCKE EN CLAIR
    => ON VA HASHER LE MOT DE PASSE ET RAJOUTER UN GRAIN DE SEL EN PLUS


    md5
    sha512

    CRYPTAGE
        CLE DE CRYPTAGE (SECRET...)
    => TRANSFORMER UN TEXTE LISIBLE EN UN TEXTE ILLISIBLE
    => POUR DECRYPTER, IL FAUT CONNAITRE LA CLE DE CRYPTAGE

    SECURITE ACTUELLE:
    SI LE TEMPS POUR DECRYPTER EST TROP LONG POUR ETRE UTILE
    => THEORIQUEMENT, ON POURRAIT TOUT LE TEMPS CASSER UN CRYPTAGE

    HASHAGE
    => AVEC UN HASHAGE ON DETRUIT DE L'INFORMATION
    => BLOQUE LE DECRYPTAGE

    => AUCUN SITE NE DEVRAIT VOUS ENVOYER VOTRE ANCIEN MOT DE PASSE !

    EXEMPLE BASIQUE
    mot     => HASHAGE  => o
    coq     => HASHAGE  => o
    oasis   =>          => oai

    EN REALITE:
    LES MATHEMATIQUES CREENT DES HASHS OU LES SOURCES POSSIBLES SONT INFINIES
    MAIS CHAQUE SOURCE EST DIFFICILEMENT DEVINABLE

    https://fr.wikipedia.org/wiki/Cryptographie

    https://www.latribune.fr/actualites/economie/international/20150220tribfc697b249/quand-les-renseignements-americains-et-britanniques-lisent-dans-les-cartes-sim.html

    IL Y A DIFFERENTS ALGO POSSIBLES
    => CRITERES DE CHOIX SUR LE NIVEAU DE SECURITE
        ET AUSSI LES RESSOURCES CPU ET LE TEMPS

    https://www.zataz.com/

    https://secnumacademie.gouv.fr/


    GRAIN DE SEL => LE GRAIN DE SEL EST PRESENT DANS LE RESULTAT
    admin    $2y$10$QkMWJU.wFYjliP9JVQRWaOA41cS.gPYRCj0ZEoN/bEia6BPfJIJJi
    admin    $2y$10$tp8Kni9wrj/AxOrphDelMOAyyFNCuFS9epm8iHubEaICR28M.Uqiu


## JS: localStorage vs sessionStorage

    https://developer.mozilla.org/fr/docs/Web/API/Window/localStorage

    DANS LE NAVIGATEUR, ON PEUT MEMORISER DES INFOS SOUS LA FORME CLE/VALEUR
    * localStorage      => PAS DE LIMITE DE TEMPS
    * sessionStorage    => DETRUIT A LA FERMETURE DE L'ONGLET

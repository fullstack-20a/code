# JOUR 03

## LIENS

    LIVESHARE

    https://prod.liveshare.vsengsaas.visualstudio.com/join?63FDDF8AF595C51D7CC5B91C05EC11D1E9D9


## QUESTIONS / NEWS


    https://codecombat.com/


    https://animejs.com/documentation


## RESUME DE L'EPISODE PRECEDENT


    PHP
    => SITES DYNAMIQUES
    => COMPOSER UNE PAGE HTML AVEC DES TRANCHES DE FICHIERS PHP
            require_once
    => UTILISATION DE PHP COMME MOTEUR DE TEMPLATE

    AUTRE UTILISATION
    => OUTIL POUR TRAITER DES FORMULAIRES
    => UN PREMIER EXEMPLE: AVEC LE FORMULAIRE DE CONTACT           

    POUR POUVOIR REALISER DES SITES PLUS COMPLEXES
    => PHP COMME LANGAGE DE PROGRAMMATION

    APPROCHE AGILE
    COMMENCER SIMPLE
    ET TOUJOURS ESSAYER DE FAIRE "PROPRE" POUR ETRE DIRECTEMENT UTILISABLE
    ET ENSUITE RAJOUTER PLUS DE CHOSES PROGRESSIVEMENT
    KAIZEN
    => AMELIORATION CONTINUE


## PHP COMME LANGAGE DE PROGRAMMATION    

    VARIABLES
    TYPES DE VALEUR
        TEXTES      (string)
        NOMBRES     (Number/Integer/Decimal)
        BOOLEENS    (boolean true false)
        TABLEAUX    (array ORDONNES/ASSOCIATIFS...)
        OBJETS      (object et classes...)
        ...

## TEXTES EN PHP

    IMPORTANT CAR PHP MANIPULE BEAUCOUP DE TEXTES
    $nom = "julie";
    $nom = 'julie';

    $retourLigne = "\n";        // POUR ALLER A LA LIGNE
    $retourLigne = "\r\n";      // POUR ALLER A LA LIGNE (PLUS ANCIEN...)


## OPERATEUR DE CONCATENATION

    IMPORTANT: ON PASSE SON TEMPS DE DEV WEB A CONCATENER DU TEXTE

    LA PLUPART DU TEMPS, ON VA UTILISER LES ""

```php

    $debut      = "Bonjour";
    $fin        = "Comment ça va ?";
    $aurevoir   = "Au revoir";

    // EN PHP   => ON UTILISE .
    $texteFinal     = $debut . ", " . $fin . "\n". $aurevoir;

    $texteFinal2    = "$debut, $fin\n$aurevoir";
    // EN JS, ON PEUT OBTENIR LA MEME CHOSE AVEC `${debut}, ${fin} \n ${aurevoir}`

    $texteFinal3    = '$debut, $fin\n$aurevoir';

    // https://developer.mozilla.org/fr/docs/Web/HTML/Element/pre
    echo "<pre>";
    echo $texteFinal;
    echo "</pre>";

    echo "<h3>avec guillemets doubles</h3>";
    echo "<pre>";
    echo $texteFinal2;
    echo "</pre>";

    echo "<h3>avec guillemets simples</h3>";
    echo "<pre>";
    echo $texteFinal3;
    echo "</pre>";

    // https://developer.mozilla.org/fr/docs/Web/HTML/Element/pre

```

    ASTUCE EN PHP:

    AVEC LES GUILLEMETS "" ON PEUT CONCATENER DIRECTEMENT DES VARIABLES DEDANS


## DU TEXTE AVEC DE BLOCS HEREDOC

    https://www.php.net/manual/fr/language.types.string.php

    ON CHOISIT SA BALISE ET ON AJOUTE <<< POUR LA BALISE OUVRANTE

```php
<?php

$texte = 
<<<MABALISE
mon texte
MABALISE;

echo $texte;

```

    EN RESUME
    * GUILLEMETS DOUBLES SI PAS "" DANS LE TEXTE
    * HEREDOC POUR POUVOIR ECRIRE DU CODE HTML AVEC PLEIN DE ""


## NOMBRES

    // ATTENTION PAS BESOIN DE GUILLEMETS
    $entier     = 123;
    $decimal    = 123.4;

## OPERATIONS MATHEMATIQUES SUR LES NOMBRES

    addition        +
    soustraction    -
    multiplication  *
    division        /       => quotient de la division
    modulo          %       => reste de la division     
    ...


    123 DIVISE PAR 10
    => 12.3
    => PARTIE ENTIERE 12  DECIMALE 3
    => QUOTIENT 12
    => RESTE    3       => MODULO = 3

    123 = 12 * 10 + 3

    12 = 6 * 2 + 0  => MODULO = 0

```php

    $nombre1 = 123;
    $reste   = $nombre1 % 10;

    echo $reste;

    $prixHT     = 100;
    $tauxTVA    = 20;
    $prixTTC    = $prixHT + $tauxTVA / 100 * $prixHT;
    $prixTTC    = $prixHT * (1 + $tauxTVA / 100);

```

    PAUSE JUSQU'A 11H...


## FORMULAIRE EN GET

    LIMITE EN TAILLE (QUELQUES Ko..)
    NAVIGATEUR QUI GARDE HISTORIQUE (ATTENTIONS AUX CYBERCAFES...)

    HISTORIQUEMENT: 
    ON DOIT UTILISER GET SI ON FAIT UNE REQUETE EN LECTURE
    (EXEMPLE: FORMULAIRE DE RECHERCHE DEVRAIT ETRE EN METHODE GET...)


    http://localhost/wf3/php02/contact.php?email=test119%40mail.me&nom=nom1119&sujet=sujet1119&message=message11



    <input type="email" name="email" required placeholder="votre email">
    ...
    <input type="text" name="nom" required placeholder="votre nom">
    ...
    <input type="text" name="sujet" required placeholder="votre sujet">
    ...
    <textarea name="message" required cols="30" rows="8"></textarea>



    http://localhost/wf3/php02/contact.php  => DESTINATAIRE DES INFOS

    PARTIE GET
    ?

    email=test119%40mail.me
    &
    nom=nom1119
    &
    sujet=sujet1119
    &
    message=message11


## FORMULAIRE EN POST

    HISTORIQUEMENT (STANDARD):
    SI UN FORMULAIRE SERT A CREER DU CONTENU SUR LE SERVEUR
    => ON DEVRAIT L'ENVOYER EN POST

    EN PRATIQUE: ON PEUT MELANGER CA MARCHE QUAND MEME
    ON PEUT UTILISER GET OU POST POUR FAIRE DE LA LECTURE ET ECRITURE

    EN POST:
    * TAILLE DE MESSAGE => PLUSIEURS Go
        => PERMET D'UPLOADER DES GROS FICHIERS


## DESTINATAIRE DU FORMULAIRE

    L'ATTRIBUT action PERMET DE DONNER L'URL DE LA PAGE QUI VA RECEVOIR LES INFOS


        <form method="POST" action="destinataire.php">
    => ENVOYER VERS LA PAGE destinataire.php

        <form method="POST" action="">
    => ASTUCE
    => SI ON NE MET RIEN
    => LE DESTINATAIRE EST LA PAGE ACTUELLE DU FORMULAIRE


    PAUSE DEJEUNER JUSQU'A 13H50...

## MISE EN LIGNE DU SITE SUR IONOS

    UTILISER WP FILE MANAGER POUR GLISSER LE DOSSIER php02/

    https://lh.entrequotes.com/php02/

## EXERCICE POUR CET APRES-MIDI

    COMPLETER VOTRE SITE VITRINE
    accueil
    galerie
    contact

    AVOIR UN FORMULAIRE DE CONTACT QUI FONCTIONNE
            stocke les infos dans un fichier
            envoi de mail

    METTRE LE SITE EN LIGNE
    ET VALIDER QU'IL FONCTIONNE CORRECTEMENT
        (envoi de mail qui pourra fonctionner...)

    ET TESTER AVEC DES OUTILS COMME web.dev
    QUEL EST LE SCORE DE VOTRE SITE...

    BONUS:
    AJOUTER UN FORMULAIRE D'INSCRIPTION A UNE NEWSLETTER SUR LA PAGE D'ACCUEIL
    AJOUTER DES PAGES SUPPLEMENTAIRES...    


    PAUSE JUSQU'A 15H55...


## SWIPED: POUR GERER LE SWIPE SUR MOBILE

    https://github.com/mishk0/swiped

    
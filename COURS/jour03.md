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
MABALISE ;

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

    $nombre1 = 123;
    $reste   = $nombre1 % 10;

    echo $reste;

    $prixHT     = 100;
    $tauxTVA    = 20;
    $prixTTC    = $prixHT + $tauxTVA / 100 * $prixHT;
    $prixTTC    = $prixHT * (1 + $tauxTVA / 100);


    PAUSE JUSQU'A 11H...
    
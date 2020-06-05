# JOUR 04

## LIEN LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?7D01B09B4C13082EAA7B625001B97EF8985F


## QUESTIONS / NEWS


    OPTIMISER LE FORMAT ET LA TAILLE DES IMAGES

    balise picture et attribut srcset

    https://developer.mozilla.org/fr/docs/Web/HTML/Element/picture

    et aussi balises meta pour précharger des URLs

    meta pre-render pre-fetch...

    https://developer.mozilla.org/fr/docs/Web/HTTP/FAQ_sur_le_pr%C3%A9chargement_des_liens


    FAVICON

    https://www.alsacreations.com/astuce/lire/59-icon-link-rel-favicon-ico-navigateur.html

    <link rel="icon" type="image/png" href="logo.png" />


## PROJETS EN EQUIPE

    3x EQUIPES DE 3
    2 SEMAINES

    * PROJET DE RECETTES DE CUISINE
        LISTE DE RECETTES POUR LA SEMAINE
        ET CREER LA LISTE DES INGREDIENTS POUR LES COURSES

    * PROJET AVEC CARTE POUR SIGNALER LES PLACES LIBRES
        AJOUTER LES PLACES QUI SE LIBERENT

    MVP
    Minimum Viable Product

    => STARTUP => PAIN POINT => PROBLEMATIQUE QUE TON APPLI VA RESOUDRE
        PITCH => RACONTER UNE HISTOIRE AVEC UN PERSONA QUI A UN PROBLEME
                    ET TON APPLI VA L'AIDER A RESOUDRE CE PROBLEME

    => DEFINIR LES SCENARIOS ESSENTIELS (USERS STORIES / USE CASES...)
    => DEFINIR LES MAQUETTES POUR REALISER CES SCENARIOS
    => PRIORITES A DEVELOPPER

    EXEMPLE:
    CREER DES INGREDIENTS   
        => PAGE POUR CREER DES INGREDIENTS  
        => MAQUETTE ET ACTIONS POSSIBLES
    CREER DES RECETTES AVEC INGREDIENTS 
        => PAGE POUR CREER DES RECETTES 
        => MAQUETTE ET ACTIONS POSSIBLES
    CREER DES MENUS AVEC LES RECETTES POUR LA SEMAINE   
        => PAGE POUR CREER DES MENUS 
        => MAQUETTE
    AFFICHER LA LISTE DES COURSES POUR LES MENUS DE LA SEMAINE 
        => PAGE POUR AFFICHER LA LISTE 


## CARTO EN JS


    FACILE
    https://leafletjs.com/examples.html


    PLUS COMPLET MAIS AUSSI PLUS COMPLIQUE
    https://developers.google.com/maps/documentation/javascript/tutorial


    PAUSE JUSQU'A 11H05

## COURS PHP 

    VARIABLES ET VALEURS

    TEXTES      OPERATEURS DE CONCATENATION
    NOMBRES     OPERATEURS ARITHMETIQUES

## BOOLEENS

    2 VALEURS POSSIBLES 
    true        VRAI
    false       FAUX

    LES BOOLEENS SONT DES RESULTATS D'OPERATEURS DE COMPARAISON

### OPERATEURS DE COMPARAISON

    SUR LES TEXTES
        ==      2 TEXTES SONT IDENTIQUES
        !=      2 TEXTES SONT DIFFERENTS

    exemple:

    $texte1 = "bonjour"; 
    $texte2 = "au revoir";

    $res1 = ($texte1 != "coucou");  // $res1 = true
    $res2 = ($texte1 == $texte2);   // $res2 = false

    SUR LES NOMBRES

        <       INFERIEUR STRICT
        >       SUPERIEUR STRICT
        <=      INFERIEUR OU EGAL
        >=      SUPERIEUR OU EGAL
        ==      EGALITE
        !=      DIFFERENT

    exemple:
    $nombre1 = 10;
    $nombre2 = 100;

    $res3 = ($nombre1 > 0);             // $res3 = true
    $res4 = ($nombre1 >= $nombre2);     // $res4 = false


## OPERATEURS LOGIQUES

    OPERATIONS SUR LES BOOLEENS
    &&      AND     => ET           true SI LES 2 VALEURS SONT true
    ||      OR      => OU           true SI UNE DES 2 VALEURS EST true
    !               => NEGATION

    $test1 = true;
    $test2 = false;

    $res5 = ($test1 && $test2);         // $res5 = false
    $res6 = (! $res5);                  // $res6 = true
    $res7 = ($res6 != $res5);           // $res7 = true

    TABLE DE VERITE

    ET                  $test1=true     $test1=false
    ---------------------------------------------------------------
    $test2=true         $res=true       $res=false
    $test2=false        $res=false      $res=false

    OU          true    false
    ---------------------
    true        true    true
    false       true    false


    $a = true;
    $b = true;
    $res7 = ($a && $b);


    ATTENTION: AUX CONVERSIONS AUTOMATIQUES ENTRE NOMBRES ET BOOLEEN...
    CA NE DONNE PAS FORCEMENT CE QU'ON CROIT...

### EQUIVALENCE

    COMPARAISON DE LA VALEUR ET DU TYPE
    === 
    !==

    $nombre = 10;
    $texte = "10";

    $res8 = ($nombre == $texte);     // $res8 = true     CAR LES VALEURS CONVERTIES SONT LES MEMES
    $res8 = ($nombre === $texte);    // $res8 = false   CAR LES TYPES SONT DIFFERENTS  


## STRUCTURE DE CONTROLE: CONDITION

    PERMET DE N'EXECUTER QUE UN DES 2 BLOCS DE CODE
    SOIT ON EXECUTE SCENARIO1 SOIT ON EXECUTE SCENARIO2
    MAIS JAMAIS LES 2 EN MEME TEMPS 

```php

    if ($test)
    {
        // SCENARIO1: $test A LA VALEUR true 
    }
    else
    {
        // SCENARIO2: $test A LA VALEUR false
    }

    // VARIANTE: SANS ELSE (OPTIONNEL)
    if ($test)
    {
        // SCENARIO1: $test A LA VALEUR true 
    }

    if ($test)
    {
        // SCENARIO1: $test A LA VALEUR true 
    }
    else if ($test2)
    {
        // SCENARIO2: $test2 A LA VALEUR true
    }
    else if ($test3)
    {
        // SCENARIO3: $test3 A LA VALEUR true
    }
    else
    {
        // SCENARIO PAR DEFAULT: TOUS LES TESTS ONT ECHOUE...
    }

    // VARIANTE AVEC switch SI ON TESTE SUR LA MEME VARIABLE
    switch ($test)
    {
        case "valeur1":
            // SCENARIO 1
            break;
        case "valeur2":
            // SCENARIO 2
            break;
        case "valeur3":
            // SCENARIO 3
            break;
        default;
            // SCENARIO PAR DEFAUT
            break;
    }

```

## VALEURS TABLEAUX

    PROBLEME: ET SI ON VEUT MEMORISER PLUSIEURS VALEURS DANS UNE SEULE VARIABLE ?

    EN PHP, ON AURA 2 VARIANTES DE TABLEAUX
    * TABLEAUX ORDONNES
    * TABLEAUX ASSOCIATIFS

    
### TABLEAU ORDONNE

    // ON SEPARE LES VALEURS AVEC UNE VIRGULE ET ON ENCADRE LES VALEURS AVEC DES [];

    $tableauNombre = [ 23, 45, 78, 21 ];

    // UNE AUTRE ECRITURE POSSIBLE  AVEC array ET ()

    $tableauNombre2 = array( 23, 45, 78, 21 );

    // EN JS => ATTENTION Array AVEC UNE MAJUSCULE SUR A

    // var arr = new Array(element0, element1, ..., elementN);
    // var arr = Array(element0, element1, ..., elementN);
    // var arr = [element0, element1, ..., elementN];

    // https://developer.mozilla.org/fr/docs/Web/JavaScript/Guide/Objets_%C3%A9l%C3%A9mentaires_JavaScript


    $tableauTexte = [ "a", "b", "c", "d" ];

    // PLUS RARE MAIS POSSIBLE DE MELANGER DES VALEURS DIFFERENTES
    $tableauMelange = [ "a", 10, true ];

    // TABLEAU VIDE
    $tableau = [];

    // ON PEUT LE REMPLIR PLUS TARD
    $tableau[] = "a";       // AJOUTE UN ELEMENT A LA FIN DU TABLEAU
    $tableau[] = "b";       // AJOUTE UN ELEMENT A LA FIN DU TABLEAU

### INDICES DANS UN TABLEAU ORDONNE

    DANS UN TABLEAU ORDONNE, CHAQUE ELEMENT/VALEUR EST ASSOCIE AVEC UN INDICE/NOMBRE
    ATTENTION: LE PREMIER INDICE EST 0 POUR LE PREMIER ELEMENT DU TABLEAU ORDONNE

    $tableauTexte = [ "a", "b", "c", "d" ];
            // INDICES 0,   1,   2,   3
            // 4 ELEMENTS DANS LE TABLEAU

    // SI ON VEUT RECUPERER LE PREMIER ELEMENT DANS LE TABLEAU
    // LECTURE
    $premier    = $tableauTexte[0];
    $deuxieme   = $tableauTexte[1];
    $troisieme  = $tableauTexte[2];
    // ...

    // SI ON VEUT CHANGER LA VALEUR D'UN ELEMENT DANS LE TABLEAU
    // ECRITURE/MODIFICATION
    $tableauTexte[2] = "nouvelle valeur";

### COMPTER LE NOMBRE D'ELEMENTS DANS UN TABLEAU

    ATTENTION: ON PASSE PAR UNE FONCTION count

    // https://www.php.net/manual/fr/function.count.php

    $nbElement = count($tableauTexte);  // 4

    // ASTUCE: INDICE DU DERNIER ELEMENT DANS UN TABLEAU ORDONNE
    // NOMBRE ELEMENT -1
    $dernierIndice = count($tableauTexte) -1;

    // ATTENTION: EN JS ON PASSE PAR .length


### FONCTIONS POUR MANIPULER DES TABLEAUX

    PHP EST TRES RICHE EN FONCTIONS POUR MANIPULER DES TABLEAUX...
    (ON VA EN UTILISER UNE DIZAINE DANS LA PLUPART DES PROJETS...)
    https://www.php.net/manual/fr/book.array.php


## TABLEAUX ASSOCIATIFS

    ON VA POUVOIR MEMORISER DES PAIRES DANS UN TABLEAU ASSOCIATIF
    PAIRE:  CLE => VALEUR

    // LES CLES SONT DES TEXTES
    // LES VALEURS PEUVENT ETRE TOUTE VALEUR POSSIBLE
    $tableauAssociatif = [ "cle1" => "valeur1", "cle2" => "valeur2", "cle3" => "valeur3" ];

    $tableauAssociatifMelange = [ "a" => "texte", "b" => 10, "c" => true ];

    // LECTURE
    // POUR RECUPERER UN ELEMENT
    // ON PASSE PAR SA CLE
    $element = $tableauAssociatif["cle1"];

    // ECRITURE
    $tableauAssociatif["cle4"] = "nouvel element";   // AJOUTER
    $tableauAssociatif["cle3"] = "nouvelle valeur";  // MODIFIER LA VALEUR ASSOCIEE A LA CLE
   

    EXEMPLE:
    // AVEC UN TABLEAU ASSOCIATIF
    $produit = [ "nom" => "oeufs", "prix" => 1, "stock" => 200 ];
    $produit["stock"] = 199;

    // AVEC UN TABLEU ORDONNE
    $produit = [ "oeufs", 1, 200 ];

    // PLUS COMPREHENSIBLE POUR UN HUMAIN
    $user = [ "nom" => "jean", "prenom" => "georges" ];

    $user = [ "jean", "georges" ];

    // EN JS: ON A LES OBJETS POUR FAIRE LA MEME CHOSE
    // var monObjet = { 'cle1' : 'valeur1', 'cle2': 'valeur2'};
    // lecture
    // var element  = monObjet.cle1;
    // var element2 = monObjet['cle2'];
    // ecriture
    // monObjet1.cle1    = 'nouvelle valeur';
    // monObjet1['cle2'] = 'autre valeur';


## STRUCTURE DE CONTROLE: BOUCLES

    REPETER PLUSIEURS FOIS UN BLOC DE CODE
    => DRY
        DON'T REPEAT YOURSELF

    foreach     PLUS SIMPLE
    for         PLUS FLEXIBLE
    while       ENCORE PLUS FLEXIBLE MAIS PLUS COMPLIQUE
    do...while  ...
    ...

### foreach PARCOURIR TOUS LES ELEMENTS D'UN TABLEAU

    LE PLUS SIMPLE AVEC UN TABLEAU
    => foreach VA PARCOURIR DU PREMIER ELEMENT AU DERNIER ELEMENT

```php
<?php

echo "<h3>foreach avec indice</h3>";
$tabOrdonne = [ "a", "b", "c", "d" ];

foreach($tabOrdonne as $index => $valeur)
{
    echo "<h4>$index / $valeur</h4>";
}

echo "<h3>foreach sans indice</h3>";
$tabOrdonne = [ "a", "b", "c", "d" ];

foreach($tabOrdonne as $valeur)
{
    echo "<h4>$valeur</h4>";
}

echo "<h3>foreach sur tableau associatif</h3>";

$tabAsso = [ "cle1" => "valeur1", "cle2" => "valeur2", "cle3" => "valeur3" ];
foreach($tabAsso as $cle => $valeur)
{
    echo "<h4>$cle / $valeur</h4>";   
}

echo "<h3>foreach sur tableau associatif sans les clés</h3>";

$tabAsso = [ "cle1" => "valeur1", "cle2" => "valeur2", "cle3" => "valeur3" ];
foreach($tabAsso as $valeur)
{
    echo "<h4>$valeur</h4>";   
}

```

    PAUSE DEJEUNER REPRISE A 13H40


### break POUR S'ARRETER EN COURS DE PARCOURS

    SOUVENT A COMBINER AVEC UNE CONDITION if
    DANS LA BOUCLE
    => PERMET DE NE PAS PARCOURIR TOUS LES ELEMENTS DU TABLEAU

```php

echo "<h3>foreach sur tableau associatif sans les clés avec break</h3>";

$tabAsso = [ "cle1" => "valeur1", "cle2" => "valeur2", "cle3" => "valeur3" ];
$search  = "valeur2";
foreach($tabAsso as $valeur)
{
    // SI ON TROUVE LA VALEUR CHERCHEE ALORS ON ARRETE LA BOUCLE
    echo "<h4>$valeur</h4>"; 
    if ($valeur == $search)
    {
        // ON SORT DE LA BOUCLE AVANT LA FIN
        break;
    }  
}

```

## BOUCLE AVEC for

    PERMET DE COMPTER SUR UN INDICE
    (PAS FORCEMENT UTILISE AVEC UN TABLEAU...)

    PRATIQUE CAR LES 3 ELEMENTS IMPORTANTS SONT SUR UNE SEULE LIGNE
    * POINT DE DEPART
    * CONDITION D'ARRET (TEST)
    * INCREMENTATION (ENTRE CHAQUE REPETITION)

```php
    $max = 10;
    // avec un tableau
    // $max = count($tableau)
    for($compteur=0; $compteur<$max; $compteur++)
    {
        echo "($compteur)";
    }
```

## BOUCLE AVEC while

    ATTENTION: LES 3 ELEMENTS SONT SUR PLUSIEURS LIGNES
    => NE PAS EN OUBLIER UN EN COURS DE ROUTE


```php
<?php

    $max = 10;
    $compteur=0;
    while ($compteur<$max)
    {
        echo "($compteur)";
        // ATTENTION: PIEGE CLASSIQUE NE PAS OUBLIER D'INCREMENTER LE COMPTEUR
        $compteur++;
    }


echo "<h3>while pour parcourir un tableau ordonné</h3>";
$tabOrdonne = [ "a", "b", "c", "d" ];

$compteur=0;
while ($compteur < count($tabOrdonne))
{
    $element = $tabOrdonne[$compteur];
    echo "($compteur/$element)";
    // ATTENTION NE PAS OUBLIER LE COMPTEUR A INCREMENTER
    $compteur++;
}

```


## LES FONCTIONS

    UN DES POINTS FORTS DE PHP
    => IL Y A DES MILLIERS DE FONCTIONS DEJA DISPONIBLES
    => HISTORIQUEMENT PHP EST UN LANGAGE FONCTIONNEL
    => SEULEMENT DEPUIS PHP5 QUE LA PROGRAMMATION ORIENTE OBJET DEVIENT IMPORTANTE

    https://www.php.net/manual/fr/funcref.php

    FONCTIONS SUR LES TABLEAUX
    https://www.php.net/manual/fr/ref.array.php

    * require SI LE FICHIER DEMANDE N'EXISTE PAS ALORS LE PROGRAMME S'ARRETE
    * require_once COMME require ET SI ON DEMANDE PLUSIEURS FOIS LE MEME FICHIER 
        ALORS PHP NE L'INCLUT PAS UNE 2E FOIS

    require_once (PAS VRAIMENT UNE FONCTION...)
    https://www.php.net/manual/fr/function.require-once.php
    require
    https://www.php.net/manual/fr/function.require.php


    * include SI LE FICHIER DEMANDE N'EXISTE PAS ALORS LE PROGRAMME NE S'ARRETE PAS
    * include_once SI ON DEMANDE PLUSIEURS FOIS LE MEME FICHIER 
        ALORS PHP NE L'INCLUT PAS UNE 2E FOIS

    include_once
    https://www.php.net/manual/fr/function.include-once.php
    include
    https://www.php.net/manual/fr/function.include.php


    AVANTAGE: DEJA COMPILE ET DONC PLUS RAPIDE EN TEMPS D'EXECUTION...

    MAUVAISE SURPRISE: 
        IL Y A PLEIN DE FONCTIONS UTILES DANS LA PLUPART DES PROJETS INTERNET
        MAIS QUI NE SONT PAS DISPONIBLES AVEC PHP...
        => CHAQUE PROJET DOIT RAJOUTER CES FONCTIONS MANQUANTES
        => CHAQUE PROJET S'APPUIE SUR UN FRAMEWORK QUI APPORTE CES FONCTIONS MANQUANTES

    2 FRAMEWORKS PHP LES PLUS POPULAIRES
    * LARAVEL   (PLUS SIMPLE ET EFFICACE, PLUS POPULAIRE DANS LE MONDE)
    * SYMFONY   (PLUS COMPLIQUE, PLUS LONG A APPRENDRE, PLUS POPULAIRE EN FRANCE CAR FONDATEUR EST FRANCAIS...)
    * ...

    https://trends.builtwith.com/framework/Laravel

    https://trends.builtwith.com/framework/symfony-PHP-Framework

    BIBLIOTHEQUE DE CODE    = LES FONCTIONS QU'ON CREE
    FRAMEWORK               = BIBLIOTHEQUE DE CODE + ORGANISATION (DOSSIERS ET FICHIERS...)
    CMS                     = FRAMEWORK + BACK OFFICE

    PRESTASHOP ET DRUPAL => CMS QUI MIGRENT SUR LE FRAMEWORK SYMFONY

## CREER SES FONCTIONS

    ON PEUT CREER SES PROPRES FONCTIONS
    * COMMENCER AVEC function
    * DONNER UN NOM POUR DISTINGUER LES FONCTIONS ENTRE ELLES
    * AJOUTER LES () POUR LES PARAMETRES
    * AJOUTER LES {} POUR LES INSTRUCTIONS DE LA FONCTION

    ASTUCE: UTILISER UN VERBE COMME NOM DES FONCTIONS

    ON CREE DES FONCTIONS POUR RANGER NOTRE CODE...
    UN DEV DEVRAIT ECRIRE AUTOUR DE 400 LIGNES DE CODE PAR JOUR
    SUR 7 HEURES DE TRAVAIL => MOINS D'UNE LIGNE DE CODE PAR MINUTE...   

    SUR UNE SEMAINE => 5 JOURS DE TRAVAIL => 5x400 => 2.000 LIGNES DE CODE
    SUR UN AN => 50 SEMAINES => 50x2.000 => 100.000 LIGNES DE CODE 

    SI ON RANGE 100 LIGNES DE CODE PAR FONCTION
    SI ON A 100 FONCTIONS => 100x100 => 10.000 LIGNES DE CODE

    ET SI ON DOIT GERER DES PROJETS EN 100.000 LIGNES DE CODE ?
    => DES MILLIERS DE FONCTIONS ???
    => LA PROGRAMMATION FONCTIONNELLE NE SUFFIT PLUS... (ANNEES 80)
    => IL FAUT RANGER LES FONCTIONS DANS DES BOITES
    => LA PROGRAMMATION ORIENTE OBJET... (ANNEES 90)
            (ET ON AURA AUSSI PLUS D'OUTILS PUISSANTS...;-p)


    https://informationisbeautiful.net/visualizations/million-lines-of-code/

```php

    // CREER SA FONCTION
    // ON PEUT AJOUTER DES PARAMETRES A LA FONCTION
    // => LES VALEURS DE CES PARAMETRES SERONT FOURNIES AU MOMENT DE L'APPEL DE LA FONCTION
    // => LES PARAMETRES SONT DES ENTREES
    function additionner ($param1, $param2)
    {
        // CORPS DE LA FONCTION
        // CODE EN ATTENTE D'ETRE EXECUTE
        // SI ON VEUT ADDITIONNER LES 2 NOMBRES EN PARAMETRES
        $resultat = $param1 + $param2;
        // SORTIE: ON PEUT RENVOYER UNE VALEUR EN RESULTAT DE LA FONCTION
        return $resultat;
    }

    // ET ENSUITE POUR ACTIVER LE CODE
    // ON APPELLE LA FONCTION
    additionner(12, 34);    // PHP ATTRIBUE LES VALEURS AUX PARAMETRES 
                            // $param1 = 12 ET $param2 = 34

```

    PAUSE JUSQU'A 15H50
    ET ENSUITE EXERCICES EN AUTONOMIE SUR LES FONCTIONS



## EXERCICES

### EXERCICE 01

    CREER UN FICHIER PAR EXERCICE
    exo01.php

    CREER UNE FONCTION QUI CALCULE LE VOLUME D'UNE PIECE
    EN PARAMETRE ON FOURNIRA LES 3 DIMENSIONS
    $longueur
    $largeur 
    $hauteur

    ET ON TESTERA AVEC 
    $longueur = 4
    $largeur  = 3
    $hauteur  = 2
    // RESULTAT ATTENDU: 24m3


### EXERCICE 02

    CREER UN FICHIER PAR EXERCICE
    exo02.php
    
    CREER UNE FONCTION QUI CALCULE LA SURFACE DES 4 MURS
    EN PARAMETRE ON FOURNIRA LES 3 DIMENSIONS
    $longueur
    $largeur 
    $hauteur

    ET ON TESTERA AVEC 
    $longueur = 4
    $largeur  = 3
    $hauteur  = 2
    // RESULTAT ATTENDU: 28m2

    $mur1   = $longueur * $hauteur
    $mur2   = $largeur  * $hauteur
    $mur3   = $longueur * $hauteur
    $mur4   = $largeur  * $hauteur


### EXERCICE 03

    CREER UN FICHIER PAR EXERCICE
    exo03.php
    
    CREER UNE FONCTION QUI CALCULE LE PLUS PETIT ENTRE 2 NOMBRES
    EN PARAMETRE, ON FOURNIRA LES 2 NOMBRES
    $nombre1
    $nombre2

    ET ON TESTERA AVEC 
    $nombre1 = 10
    $nombre2 = 20
    // RESULTAT ATTENDU 10

### EXERCICE 04

    CREER UN FICHIER PAR EXERCICE
    exo04.php
    
    CREER UNE FONCTION QUI CALCULE LE PLUS PETIT ENTRE 3 NOMBRES
    EN PARAMETRE, ON FOURNIRA LES 3 NOMBRES
    $nombre1
    $nombre2
    $nombre3

    ET ON TESTERA AVEC 
    $nombre1 = 10
    $nombre2 = 2
    $nombre3 = 7

    // RESULTAT ATTENDU 2

    ET ON TESTERA AVEC 
    $nombre1 = 1
    $nombre2 = 7
    $nombre3 = 19

    // RESULTAT ATTENDU 1

    ET ON TESTERA AVEC 
    $nombre1 = 12
    $nombre2 = 71
    $nombre3 = 9

    // RESULTAT ATTENDU 9


### EXERCICE 05

    CREER UN FICHIER PAR EXERCICE
    exo05.php
    
    CREER UNE FONCTION QUI TROUVE LA PLUS PETITE VALEUR DANS UN TABLEAU DE NOMBRES
    EN PARAMETRE, ON FOURNIRA UN TABLEAU DE NOMBRES
    $tabNombre

    ET ON TESTERA AVEC 
    $tabNombre = [ 12, 3, 45, 1, 100, 35 ];

    // RESULTAT ATTENDU 1


### EXERCICE 06

    CREER UN FICHIER PAR EXERCICE
    exo06.php
    
    CREER UNE FONCTION QUI CALCULE LA SOMME DES VALEURS DANS UN TABLEAU DE NOMBRES
    EN PARAMETRE, ON FOURNIRA UN TABLEAU DE NOMBRES
    $tabNombre

    ET ON TESTERA AVEC 
    $tabNombre = [ 12, 3, 45, 1, 100, 35 ];

    // RESULTAT ATTENDU 196

### EXERCICE 07

    CREER UN FICHIER PAR EXERCICE
    exo07.php

    CREER UNE FONCTION QUI RENVOIE 
    UN TEXTE CONCATENANT LES VALEURS D'UN TABLEAU DE LETTRES
    EN SEPARANT CHAQUE LETTRE AVEC UNE VIRGULE
    EN PARAMETRE, ON FOURNIRA UN TABLEAU DE LETTRES
    $tabLettre

    ET ON TESTERA AVEC 
    $tabLettre = [ "a", "b", "c", "d" ];

    // RESULTAT ATTENDU "a,b,c,d"
    // ATTENTION: PAS DE VIRGULE AU DEBUT OU A LA FIN

### EXERCICE 08

    CREER UN FICHIER PAR EXERCICE
    exo08.php

    CREER UNE FONCTION QUI PREND EN PARAMETRE UN TABLEAU ORDONNE
    DE CHEMINS D'IMAGE $tabImage
    ET QUI AFFICHE UNE LISTE D'IMAGES EN HTML

    EXEMPLE:
    creerGalerie([ "assets/img/photo1.jpg", "assets/img/photo2.jpg", "assets/img/photo2.jpg" ]);

    ET QUI PRODUIRA LE CODE HTML

    <img src="assets/img/photo1.jpg">
    <img src="assets/img/photo2.jpg">
    <img src="assets/img/photo3.jpg">


### EXERCICE 09

    CREER UN FICHIER PAR EXERCICE
    exo09.php

    CREER UNE FONCTION QUI PREND EN PARAMETRE UN TABLEAU ASSOCIATIF
    ET QUI AFFICHE UN MENU EN HTML

    EXEMPLE:
    creerMenu([ 
        "accueil" => "index.php", 
        "galerie" => "galerie.php", 
        "contact" => "contact.php" 
        ]);

    ET QUI PRODUIRA LE CODE HTML

    <nav>
        <a href="index.php">accueil</a>
        <a href="galerie.php">galerie</a>
        <a href="contact.php">contact</a>
    </nav>


### EXERCICE 10

    (UN PEU PLUS COMPLIQUE...)
    CREER UN FICHIER PAR EXERCICE
    exo10.php

    CREER UN DAMIER
    CREER UNE FONCTION QUI AFFICHE UN DAMIER CARRE

    EN PARAMETRE ON DONNE LE NOMBRE DE CASES PAR COTE
    ET ON DOIT AFFICHER UN DAMIER

    EXEMPLE:
    creerDamier(3);

    XOX
    OXO
    XOX

    creerDamier(4);

    XOXO
    OXOX
    XOXO
    OXOX

    creerDamier(5);

    XOXOX
    OXOXO
    XOXOX
    OXOXO
    XOXOX


### EXERCICE 11

    (UN PEU PLUS COMPLIQUE...)
    CREER UN FICHIER PAR EXERCICE
    exo11.php

    CREER UN DISTRIBUTEUR DE BILLETS
    
    CREER UNE FONCTION QUI PREND EN PARAMETRE UN MONTANT DEMANDE
    $montantDemande
    ET QUI RENVERRA UN TABLEAU ASSOCIATIF DE BILLETS

    IL Y A DES FONCTIONS PHP POUR ARRONDIR
    https://www.php.net/manual/fr/function.floor.php
    https://www.php.net/manual/fr/function.ceil.php
    https://www.php.net/manual/fr/function.round.php

    ET AUSSI ASTUCE: UTILISER LE MODULO %...


    EXEMPLE:
    distribuerBillet(345);


    ON OBTIENDRA COMME RESULTAT UN TABLEAU ASSOCIATIF

    $tabResultat =
    [
        "500"   => 0,
        "200"   => 1,
        "100"   => 1,
        "50"    => 0,
        "20"    => 2,
        "10"    => 0,
        "5"     => 1,
    ];

    BONUS:
    CREER UNE PAGE AVEC UN FORMULAIRE QUI DEMANDE LE MONTANT
    ET AFFICHER LES BILLETS CORRESPONDANTS...

    LES IMAGES DES BILLETS PEUVENT ETRE TROUVEES SUR INTERNET...
    https://fr.wikipedia.org/wiki/Billets_de_banque_en_euros





















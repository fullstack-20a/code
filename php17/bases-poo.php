<?php

class User
{
    // METHODE D'OBJET
    // METHODE MAGIQUE __construct
    function __construct ()
    {
        // DEBUG
        echo "(User::__construct)";
    }

    function __destruct ()
    {
        // DEBUG
        echo "(User::__destruct)";

    }

}

class Article 
{
    // METHODE D'OBJET
    // METHODE MAGIQUE __construct
    function __construct ()
    {
        // DEBUG
        echo "(Article::__construct)";
    }

    // METHODE MAGIQUE __destruct ()
    // QUAND PHP FAIT DU MENAGE A LA FIN CELA VA DECLENCHER LA METHODE MAGIQUE __destruct
    function __destruct ()
    {
        // DEBUG
        echo "(Article::__destruct)";

    }
}

// User::__construct();
// Fatal error: Uncaught Error: Non-static method User::__construct()

// DEBUG
echo "(step1)";
$user1 = new User;          // SUR new PHP ACTIVE AUTOMATIQUEMENT LE CALLBACK __construct
$user2 = new User;          // SUR new PHP ACTIVE AUTOMATIQUEMENT LE CALLBACK __construct

require_once "code2.php";

// ON PEUT DETRUIRE UNE VALEUR NOUS MEME
// https://www.php.net/manual/fr/function.unset
unset($user2);              // ON DETRUIT L'OBJET ET DONC ON VA DECLENCHER LE CALLBACK __destruct

echo "(step2)";
$user1->__construct();  // TECHNIQUEMENT POSSIBLE MAIS GENERALEMENT NON UTILISE

// A LA FIN PHP DETRUIT LES OBJETS CREES
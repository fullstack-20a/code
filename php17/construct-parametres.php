<?php

class User
{
    // PROPRIETES D'OBJET
    public $prenom      = "";
    public $email       = "";
    public $codePostal  = "";

    // methode qu'on créé mais on n'a pas le choix sur le nom
    // mais on peut ajouter des paramètres...
    // constructeur
    function __construct ($prenom, $param2, $param3, $param4="valeur par défaut")
    {
        // GENERALEMENT 
        // ON VA INITIALISER LES VALEURS DES PROPRIETES
        $this->prenom = $prenom;
        $this->email  = $param2;
        $this->codePostal = $param3;
    }

}


$user1 = new User("valeur1", "valeur2", "valeur3");  // PHP VA ACTIVER __construct
                    // Fatal error: Uncaught ArgumentCountError: Too few arguments
                    // 
$user1->prenom      = "gerard";
$user1->email       = "gerard@mail.me";
$user1->codePostal  = "13001";

$user2 = new User("valeur1", "valeur2", "valeur3");  // PHP VA ACTIVER __construct
$user2->prenom      = "bernard";
$user2->email       = "bernard@mail.me";
$user2->codePostal  = "13002";

// UN PEU LOURD D'AVOIR DES BLOCS DE CODE SUR PLUSIEURS LIGNES
$user3 = new User("bernard", "bernard@mail.me", "13002");       
                    // $param1 = "bernard" ET $param2 = "bernard@mail.me" ET $param3 = "13002"
                    // ET PHP VA CREER LA VARIABLE SPECIALE $this = $user3


class Toto
{
    // OPTIONNEL
    function __construct()
    {
        echo "(__construct)";
    }

    // MES METHODES
    function faireTravail ()
    {
        echo "(faireTravail)";

    }
}

$objet = new Toto;      // PHP DECLENCHE AUTOMATIQUEMENT __construct

$objet->faireTravail(); // JE DECLENCHE MOI MEME L'APPEL A MA METHODE
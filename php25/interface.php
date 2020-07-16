<?php

interface MonInterface
{
    // TOUTES LES METHODES SONT ABSTRAITES
    function faireEtape1 ();

    function faireEtape2($param1, $param2);

    // ...
}

// POUR UN DEV EN PRATIQUE: CA SERT A RIEN VU QUE IL N'Y A PAS DE CODE ???
// => UNE INTERFACE EST UN CONTRAT QUE LE DEV S'ENGAGE A RESPECTER

// EN PRATIQUE: LE DEV1 CREE UNE CLASSE POUR AJOUTER SON CODE
class CodeDev1
    implements MonInterface     // DANS LA CLASSE CodeDev1 
                                // ON S'ENGAGE A CODER LES METHODES DE L'INTERFACE MonInterface
{
    function faireEtape1 ()
    {
        // AJOUTER LE CODE ICI...
    }

    function faireEtape2 ($param1, $param2)
    {
        // JE CODE RIEN...
        // implements NE VERIFIE QUE LA PRESENCE DE LA METHODE
        // PHP NE VERIFIE MEME PAS SI ON RAJOUTE DU CODE DANS {}
    }

}

// Fatal error: Class CodeDev1 contains 1 abstract method and must therefore be declared abstract or implement the remaining methods (MonInterface::faireEtape2)

abstract class Bout1 
    implements MonInterface
{
    function faireEtape1 ()
    {
        // AJOUTER LE CODE ICI...
    }
    
    // IL MANQUE DES METHODES DE L'INTERFACE
    // => IL FAUT AJOUTER abstract DEVANT LA CLASSE
}

class Bout2
    extends Bout1
{
    function faireEtape2 ($param1, $param2)
    {
        // JE CODE RIEN...
        // implements NE VERIFIE QUE LA PRESENCE DE LA METHODE
        // PHP NE VERIFIE MEME PAS SI ON RAJOUTE DU CODE DANS {}
    }
    
}

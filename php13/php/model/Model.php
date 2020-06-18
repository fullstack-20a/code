<?php

class Model
{
    // METHODES
    static function compter ($nomTable)
    {
        // https://sql.sh/fonctions/agregation/count
        $requeteSQL =
<<<CODESQL

SELECT count(*) FROM `$nomTable`

CODESQL;

        // IL FAUT ENFIN RAJOUTER id DANS LES TOKENS
        $pdoStatement = Model::envoyerRequeteSQL($requeteSQL, []);
        // ASTUCE: ON PEUT RECUPERER DIRECTEMENT LA VALEUR DE LA PREMIERE COLONNE
        // https://www.php.net/manual/fr/pdostatement.fetchcolumn.php
        $nbLigne = $pdoStatement->fetchColumn();

        return $nbLigne;
    }

    static function update ($nomTable, $id, $tabAssoToken)
    {
        $listeColonneToken = "";
        $compteur = 0;
        foreach($tabAssoToken as $colonne => $valeur)
        {
            // VIRGULE
            if ($compteur == 0)
            {
                $listeColonneToken .= "$colonne = :$colonne";   // PAS DE VIRGULE AVANT
            }
            else
            {
                $listeColonneToken .= ", $colonne = :$colonne"; // ON RAJOUTE UNE VIRGULE AVANT
            }
            $compteur++;
        }

        $requeteSQL =
<<<CODESQL

UPDATE $nomTable
SET
    $listeColonneToken
WHERE id = :id

CODESQL;

        // IL FAUT ENFIN RAJOUTER id DANS LES TOKENS
        $tabAssoToken["id"] = $id;
        Model::envoyerRequeteSQL($requeteSQL, $tabAssoToken);
    }
    // FIN DE LA METHODE update

    // ON VA UTILISER id POUR EFFACER UNE LIGNE
    static function delete ($nomTable, $tabAssoToken)
    {
        $requeteSQL =
<<<CODESQL

DELETE FROM $nomTable
WHERE id = :id

CODESQL;

        Model::envoyerRequeteSQL($requeteSQL, $tabAssoToken);

    }

    static function insert ($nomTable, $tabAssoToken)
    {
        // ON UTILISE LES CLES DU TABLEAU ASSO POUR CONSTRUIRE LES 2 LISTES
        $listeColonne   = "";
        $listeToken     = "";
        // https://www.php.net/manual/fr/function.array-keys.php
        $tabCle         = array_keys($tabAssoToken);
        // [ "titre", "photo", "contenu", "categorie", "datePublication" ]
        // "titre, photo, contenu, categorie, datePublication"
        // "titre, :photo, :contenu, :categorie, :datePublication"
        $listeColonne   = implode(", ", $tabCle);
        $listeToken     = implode(", :", $tabCle);  // ATTENTION: IL MANQUE LE PREMIER :

        // CONCATENATION POUR OBTENIR LA REQUETE SQL
        $requeteSQL =
<<<CODESQL

INSERT INTO $nomTable
( $listeColonne )
VALUES
( :$listeToken )

CODESQL;

        Model::envoyerRequeteSQL($requeteSQL, $tabAssoToken);
    }

    static function read ($nomTable)
    {
        $requeteSQL =
<<<CODESQL

SELECT * FROM $nomTable
ORDER BY id DESC

CODESQL;

        $pdoStatement = Model::envoyerRequeteSQL($requeteSQL, []);

        // ON RENVOIE UN TABLEAU ORDONNE DE TABLEAUX ASSOCIATIFS
        return $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    static function chercher ($nomTable, $colonneFiltre, $valeurCherchee)
    {
        $requeteSQL =
<<<CODESQL

SELECT * FROM $nomTable
WHERE $colonneFiltre = :$colonneFiltre
ORDER BY id DESC

CODESQL;

        $pdoStatement = Model::envoyerRequeteSQL($requeteSQL, [ $colonneFiltre => $valeurCherchee ]);

        // ON RENVOIE UN TABLEAU ORDONNE DE TABLEAUX ASSOCIATIFS
        return $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    static function envoyerRequeteSQL($requeteSQL, $tabAssoToken)
    {
        $dbname         = Config::$dbnameSQL ?? "";     // A CHANGER A CHAQUE PROJET
        $userSQL        = Config::$userSQL ?? "root";
        $passwordSQL    = Config::$passwordSQL ?? "";
        $port           = Config::$portSQL ??"3306";
        $host           = Config::$hostSQL ?? "localhost";

        // CODE NECESSAIRE POUR COMMUNIQUER ENTRE PHP ET SQL
        // $dbh GERE LA CONNEXION ENTRE PHP ET SQL
        $dbh = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $userSQL, $passwordSQL);

        // AFFICHER LES ERREURS SQL COMME ERREURS PHP
        // https://www.php.net/manual/fr/pdo.error-handling.php
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        // SECURITE: ON ISOLE LES VALEURS DANS LE TABLEAU ASSOCIATIF
        // PROTECTION CONTRE LES INJECTIONS SQL
        $pdoStatement = $dbh->prepare($requeteSQL);
        
        $pdoStatement->execute($tabAssoToken);

        // AFFICHE LES INFOS SUR LA REQUETE SQL 
        // => PRATIQUE POUR LE DEBUG (A ACTIVER SI BESOIN...)
        // $pdoStatement->debugDumpParams();

        // POUR LA LECTURE, ON A BESOIN DE CONTINUER A UTILISER $pdoStatement
        return $pdoStatement;
    }
}

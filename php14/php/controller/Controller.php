<?php

// RESPONSABLE SECURITE
// VALABLE POUR TOUS LE FORMULAIRES
class Controller
{
    // PROPRIETE STATIC
    public static $tabAssoJson = [];

    // PROPRIETE QUI VA MEMORISER LES ERREURS DETECTEES DANS LES FORMULAIRES
    public static $tabErreur = [];


    // METHODES
    static function traiterFormulaire ()
    {
        ob_start();

        // ICI ON VA RECEPTIONNER LA REQUETE DU NAVIGATEUR
        // ET ON VA ACTIVER LA BONNE CLASSE ET METHODE D'API

        // RECUPERER LES INFOS POUR LA CLASSE ET LA METHODE CIBLE
        $classeCible  = Controller::filtrer("classeCible");     // $_REQUEST["classeCible"];
        $methodeCible = Controller::filtrer("methodeCible");    // $_REQUEST["methodeCible"];

        if (($classeCible != "") && ($methodeCible != ""))
        {
            // SECURITE: RESTREINDRE L'ACCES A NOTRE CODE...
            // ON PREFIXE AVEC Api POUR NE LAISSER L'ACCESS 
            // SEULEMENT SUR LES CLASSES QUI COMMENCENT PAR Api
            $codeCible = "Api$classeCible::$methodeCible";
            // AVEC PHP, ON PEUT ACTIVER DU CODE QUI EST DANS UN TEXTE
            // https://www.php.net/manual/fr/function.is-callable.php 
            if (is_callable($codeCible))
            {
                // ON APPELLE LA FONCTION DONT LE CODE EST CODEE DANS LE TEXTE
                $codeCible();
            }
        }

        // ON CAPTURE TOUT L'AFFICHAGE D'AVANT
        $outputDetourne = ob_get_clean();

        // ON VA FOURNIR DU CODE JSON
        Controller::$tabAssoJson["request"]    = $_REQUEST; // POUR AIDER AU DEBUG
        Controller::$tabAssoJson["debug"]      = $outputDetourne;

        // ON CONVERTIR LE TABLEAU ASSOCIATIF EN CODE JSON
        echo json_encode(Controller::$tabAssoJson, JSON_PRETTY_PRINT);

    }

    static function redirigerPrecedent ()
    {
        // SI ON VEUT ON PEUT FAIRE UNE REDICECTION VERS LA PAGE D'AVANT
        // https://www.php.net/manual/fr/reserved.variables.server.php
        $urlPrecedente = $_SERVER["HTTP_REFERER"];
        // REDIRECTION
        // https://www.php.net/manual/fr/function.header.php
        header("location: $urlPrecedente");

    }
    
    // CETTE METHODE VA PROTEGER PHP
    // EN FILTRANT LES INFOS RECUES DES FORMULAIRES
    // <input name="toto">
    // EN PHP ON VA RETROUVER LA SAISIE DU VISITEUR DANS 
    // $_REQUEST["toto"]
    static function filtrer ($name)
    {
        // $_REQUEST VA RECEVOIR LES INFOS EN GET ET EN POST: PRATIQUE COTE HTML ON PEUT FAIRE LES 2

        $resultat = $_REQUEST[$name] ?? "";     
        // PREMIERE SECURITE: ON MET UNE VALEUR PAR DEFAUT SI L'INFO N'EST PAS PRESENTE
        // ON NE VEUT PAS RECEVOIR DU CODE HTML OU AUTRE
        // https://www.php.net/manual/fr/function.strip-tags.php
        $resultat = strip_tags($resultat);
        // https://www.php.net/manual/fr/function.trim.php
        $resultat = trim($resultat);
        // etc...

        return $resultat;
    }

    static function filtrerEmail ($name)
    {
        $email = Controller::filtrerTexte($name);
        // ON VA VERIFIER LE FORMAT DE L'EMAIL
        // https://www.php.net/manual/fr/filter.examples.validation.php
        if ( ! filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            // SI ON A DETECTE UNE ERREUR ON VA LA RAJOUTER DANS LE TABLEAU DES ERREURS
            Controller::$tabErreur[] = "$email N'EST PAS VALIDE";
        }
        return $email;
    }
    
    static function filtrerTexte ($name)
    {
        $texte = Controller::filtrer($name);
        if ($texte == "")
        {
            Controller::$tabErreur[] = "$name EST OBLIGATOIRE";
        }
        return $texte;
    }

    // CODE A PART POUR GERER LES UPLOADS DANS UN FORMULAIRE
    static function filtrerUpload ($name)
    {
        // ON DOIT GERER LES UPLOAD A PART
        // SI IL Y A UN FICHIER EN QUARANTAINE
        // LES INFOS SONT DANS UN TABLEAU ASSOCIATIF $_FILES
        // DEBUG
        print_r($_FILES);
        $destination = "";
        // https://www.php.net/manual/fr/function.isset.php
        if (isset($_FILES[$name]))
        {
            // OUI ON A UN FICHIER EN QUARANTAINE EN ATTENTE
            $tabAssoFichier = $_FILES[$name];
            /*
            $error      = $tabAssoFichier["error"];     // 0 SI TOUT EST BIEN TRANSFERE
            $size       = $tabAssoFichier["size"];      // TAILLE DU FICHIER EN OCTETS
            $name       = $tabAssoFichier["name"];      // NOM DU FICHIER ORIGINAL
            $tmp_name   = $tabAssoFichier["tmp_name"];  // LE FICHIER EN QUARANTAINE
            */
            // https://www.php.net/manual/fr/function.extract.php
            extract($tabAssoFichier);

            // ICI IL FAUT DECIDER SI ON RECUPERE CE FICHIER
            // SI ON NE LE RECUPERE PAS APACHE VA LE DETRUIRE RAPIDEMENT... 
            // ON VA RECUPERER LE FICHIER EN QUARANTAINE 
            // ET ON VA LE DEPLACER DANS assets/upload 
            // (NE PAS OUBLIER DE CREER CE DOSSIER AVANT...)
            // https://www.php.net/manual/fr/function.move-uploaded-file.php
            // AJOUTER PLEIN DE TESTS...
            if ($error == 0)
            {
                // EVITER D'ACCEPTER DES FICHIERS AVEC DES EXTENSIONS DANGEREUSES
                // https://www.php.net/manual/fr/function.in-array
                // https://www.php.net/manual/fr/function.pathinfo.php
                /*
                $extension = pathinfo($name, PATHINFO_EXTENSION);
                $filename  = pathinfo($name, PATHINFO_FILENAME);
                */
                extract(pathinfo($name));

                // METTRE L'EXTENSION EN MINUSCULES
                // https://www.php.net/manual/fr/function.strtolower.php
                $extension = strtolower($extension);
                if (in_array($extension, Config::$listeExtensionOK))
                {
                    if ($size < Config::$sizeMaxUpload)
                    {
                        // FILTRER LE NOM DU FICHIER
                        // POUR ENLEVER LES CARACTERES SPECIAUX
                        // https://www.php.net/manual/fr/function.preg-replace.php
                        // https://regex101.com/
                        $filename = Controller::str_without_accents($filename);
                        $filename = preg_replace("/[^a-zA-Z0-9-]/", "", $filename);

                        $destination = "assets/upload/$filename.$extension";
                        // FILTRER POUR PASSER EN MINUSCULES
                        $destination = strtolower($destination);
                        move_uploaded_file($tmp_name, $destination);

                        // ON PEUT TRAVAILLER SUR LE FICHIER UPLOADE
                        // ON PEUT CREER DES MINIATURES SUR LES 3 FORMATS jpg, png, gif
                        $tabFormatImage = [ "jpg", "jpeg", "png", "gif" ];
                        if (in_array($extension, $tabFormatImage))
                        {
                            // ON VA CREER DES MINIATURES
                            foreach(Config::$tabMiniature as $taille => $dossierCible)
                            {
                                Controller::creerMini($taille, $destination, $dossierCible);
                            }
                        }
                    }
                    else
                    {
                        // ERREUR: TAILLE DEPASSEE
                        Controller::$tabErreur[] = "TAILLE DEPASSEE";
                    }
                }
                else
                {
                    // ERREUR SUR L'EXTENSION
                    Controller::$tabErreur[] = "EXTENSION NON AUTORISEE";
                }

            }
            else
            {
                // ERREUR PENDANT LE TRANSFERT
                Controller::$tabErreur[] = "ERREUR RESEAU";
            }

        }
        // ON RENVOIE LE CHEMIN DU FICHIER SUR LE SERVEUR
        return $destination;

    }

    static function creerMini ($taille, $fichierSource, $dossierCible)
    {
        // DETERMINER LE FORMAT DE L'IMAGE
        // CHARGER L'IMAGE EN MEMOIRE PHP A PARTIR DU FICHIER SOURCE
        // DETERMINER LES DIMENSIONS DE L'IMAGE SOURCE
        // CALCULER LES DIMENSIONS DE L'IMAGE CIBLE
        // CREER EN MEMOIRE PHP L'ESPACE NECESSAIRE POUR DESSINER L'IMAGE CIBLE
        // COPIER LE CONTENU DE L'IMAGE SOURCE VERS L'IMAGE CIBLE
        // ENREGISTRER LE CONTENU CIBLE DANS LE DOSSIER CIBLE

        // https://www.php.net/manual/fr/function.exif-imagetype.php
        $formatImage = exif_imagetype($fichierSource);
        $imageSource = null;
        if ($formatImage == IMAGETYPE_JPEG)
        {
            // https://www.php.net/manual/fr/function.imagecreatefromjpeg.php
            $imageSource = imagecreatefromjpeg($fichierSource);
        }
        elseif ($formatImage == IMAGETYPE_PNG)
        {
            // https://www.php.net/manual/fr/function.imagecreatefrompng.php
            $imageSource = imagecreatefrompng($fichierSource);
        }
        elseif ($formatImage == IMAGETYPE_GIF)
        {
            // https://www.php.net/manual/fr/function.imagecreatefromgif.php
            $imageSource = imagecreatefromgif($fichierSource);
        }

        if ($imageSource)
        {
            // IMAGE SOURCE BIEN CHARGEE
            // https://www.php.net/manual/fr/function.imagesx.php
            // https://www.php.net/manual/fr/function.imagesy.php
            $largeurSource = imagesx($imageSource);
            $hauteurSource = imagesy($imageSource);

            // ON VEUT AVOIR UNE IMAGE CIBLE LA PLUS PETITE QUI CONTIENNE LE CARRE DE COTE $taille
            $largeurCible = $taille;
            $hauteurCible = $taille;

            // PORTRAIT
            if ($largeurSource < $hauteurSource)
            {
                // LARGEUR = TAILLE DU CARRE OK
                $hauteurCible = $hauteurSource * $taille / $largeurSource;
            }
            // PAYSAGE
            if ($largeurSource >= $hauteurSource)
            {
                // LONGUEUR = TAILLE DU CARRE OK
                $largeurCible = $largeurSource * $taille / $hauteurSource;
            }
            // https://www.php.net/manual/fr/function.imagecreatetruecolor.php
            $imageCible = imagecreatetruecolor($largeurCible, $hauteurCible);

            imagealphablending($imageCible, false); // GARDE LA TRANSPARENCE
            // https://www.php.net/manual/fr/function.imagesavealpha.php
            imagesavealpha($imageCible, true);

            // https://www.php.net/manual/fr/function.imagecopyresampled.php
            imagecopyresampled(
                $imageCible, $imageSource,
                0, 0,
                0, 0,
                $largeurCible, $hauteurCible,
                $largeurSource, $hauteurSource
            );

            $nomCible = pathinfo($fichierSource, PATHINFO_BASENAME);
            if ($formatImage == IMAGETYPE_JPEG)
            {
                // https://www.php.net/manual/fr/function.imagejpeg.php
                imagejpeg($imageCible, "$dossierCible/$nomCible");
            }
            elseif ($formatImage == IMAGETYPE_PNG)
            {
                // https://www.php.net/manual/fr/function.imagepng.php
                imagepng($imageCible, "$dossierCible/$nomCible");
            }
            elseif ($formatImage == IMAGETYPE_GIF)
            {
                // https://www.php.net/manual/fr/function.imagegif.php
                imagegif($imageCible, "$dossierCible/$nomCible");
            }
    
        }

    }

    // https://stackoverflow.com/questions/1017599/how-do-i-remove-accents-from-characters-in-a-php-string
    static function str_without_accents($str, $charset='utf-8')
    {
        $str = htmlentities($str, ENT_NOQUOTES, $charset);

        $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
        $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
        $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères

        return $str;   // or add this : mb_strtoupper($str); for uppercase :)
    }

    // SECURITE: VALIDER LES INFOS DU FORMULAIRE
    static function isOK ()
    {
        // ON COMPTE LE NOMBRE D'ERREURS DETECTEES PAR LES METHODES filtrer...
        $nbErreur = count(Controller::$tabErreur);
        if ($nbErreur == 0)
        {
            return true;
        }
        else
        {
            // ON PEUT CONSTRUIRE LE MESSAGE D'ERREUR
            $listeErreur = implode(", ", Controller::$tabErreur);

            Controller::$tabAssoJson["confirmation"] = $listeErreur;

            return false;
        }
    }
}

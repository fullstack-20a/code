# JOUR 13

## LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?7A105199780FFECCCD17321968D0D13A5A7E

## NEWS / QUESTIONS

## RESUME EPISODE PRECEDENT

    AJOUT PROTECTION DE LA PARTIE ADMIN
        LOGIN / LOGOUT
        CLE API QUI PROTEGE LES FONCTIONNALITES SERVEUR
        
    => IMPORTANT DE LA METTRE EN PLACE
    => CELA PERMET DE PENSER A METTRE LE SITE EN LIGNE

## UPLOAD DE FICHIER

    https://www.w3schools.com/php/php_file_upload.asp

    HTML OBLIGATOIRE
    method="POST"
    ET
    enctype="multipart/form-data"

```html

<form action="upload.php" method="POST" enctype="multipart/form-data">
  Select image to upload:
  <input type="texte" name="legende">
  <input type="file" name="photo">
  <input type="file" name="photo2">
  <input type="submit" value="Upload Image">
</form>

```

    DANGER DE RECEVOIR DES FICHIERS DANGEREUX
    APACHE MET LE FICHIER EN QUARANTAINE
    APACHE VA INFORMER PHP QU'UN FICHIER EST EN ATTENTE EN QUARANTAINE

    LES INFOS SUR LE FICHIER EN QUARANTAINE EST DANS LE TABLEAU $_FILES
    $_FILES EST UN TABLEAU ASSOCIATIF DE TABLEAU ASSOCIATIF

    Array
    (
        [photo] => Array
            (
                [name] => pexels-photo-3651813.jpeg
                [type] => image/jpeg
                [tmp_name] => C:\xampp\tmp\php542F.tmp
                [error] => 0
                [size] => 300422
            )
        [photo2] => Array
            (
                ...
            )
    )

```php

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
            $error      = $tabAssoFichier["error"];     // 0 SI TOUT EST BIEN TRANSFERE
            $size       = $tabAssoFichier["size"];      // TAILLE DU FICHIER EN OCTETS
            $name       = $tabAssoFichier["name"];      // NOM DU FICHIER ORIGINAL
            $tmp_name   = $tabAssoFichier["tmp_name"];  // LE FICHIER EN QUARANTAINE
            // ICI IL FAUT DECIDER SI ON RECUPERE CE FICHIER
            // SI ON NE LE RECUPERE PAS APACHE VA LE DETRUIRE RAPIDEMENT... 
            // SI ON EST OPEN BAR ON VA RECUPERER LE FICHIER EN QUARANTAINE 
            // ET ON VA LE DEPLACER DANS assets/upload 
            // (NE PAS OUBLIER DE CREER CE DOSSIER AVANT...)
            // https://www.php.net/manual/fr/function.move-uploaded-file.php
            $destination = "assets/upload/$name";
            move_uploaded_file($tmp_name, $destination);

        }
        // ON RENVOIE LE CHEMIN DU FICHIER SUR LE SERVEUR
        return $destination;

    }

```

    PAUSE JUSQU'A 10H55


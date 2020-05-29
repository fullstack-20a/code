<?php


// echo "<h4>RECEPTION DES INFOS DE FORMULAIRE</h4>";

// PHP VA RECEVOIR LES INFOS DU FORMULAIRE DANS LA VARIABLE $_REQUEST
// SI ON A UN FORMULAIRE HTML EN POST => ON PEUT UTILISER $_POST
// print_r($_POST);
if (empty($_POST))
{
    // SCENARIO 1: LE VISITEUR VIENT D'ARRIVER SUR LA PAGE
    // METTRE UN MESSAGE D'ENCOURAGEMENT SYMPA
    echo "<h4>merci de remplir ce formulaire</h4>";
}
else
{
    // SCENARIO 2: LE VISITEUR VIENT D'ARRIVER SUR LA PAGE
    // ON VA STOCKER CES INFOS POUR QUE LE WEBMASTER PUISSE LES CONSULTER PLUS TARD
    // => A TERME CE SERA LE ROLE DE MySQL
    // => POUR LE MOMENT, ON VA STOCKER LE MESSAGE DANS UN FICHIER
    // ON VA STOCKER LES INFOS DANS UN FICHIER php/model/contact.txt
    // => ET ON PEUT AUSSI ENVOYER UN EMAIL POUR PREVENIR LE WEBMASTER

    // Output       => SORTIE
    // Buffering    => TAMPON
    // https://www.php.net/manual/fr/function.ob-start.php
    ob_start(); // ON HACKE/DETOURNE L'AFFICHAGE QUI DEVRAIT NORMALEMENT ARRIVER AU NAVIGATEUR

    // PHP VA POUVOIR RECEPTIONNER LES INFOS DU FORMULAIRES
    // print_r      AFFICHAGE DE LA VALEUR D'UNE VARIABLE (POUR DEBUG)
    // (comme console.log EN JS...)
    // $_REQUEST    VARIABLE SPECIALE DE PHP
    // https://www.php.net/manual/fr/function.print-r.php
    print_r($_POST);

    // https://www.php.net/manual/fr/function.ob-get-clean.php
    // ON STOCKE DANS LA VARIABLE CE QUI AURAIT DU ETRE AFFICHE
    $affichageDetourne = ob_get_clean();

    // https://www.php.net/manual/fr/function.file-put-contents.php
    // ON VA LE STOCKER DANS LE FICHIER php/view/contact.txt 
    // FILE_APPEND PERMET DE GARDER L'ANCIEN CONTENU
    file_put_contents("php/model/contact.txt", $affichageDetourne, FILE_APPEND);

    // https://www.php.net/manual/fr/function.mail.php
    // NE PAS OUBLIER DE METTRE LA BONNE ADRESSE EMAIL (PAS LA MIENNE SVP...)
    @mail("webmaster@applh.com", "vous avez un nouveau message", $affichageDetourne);
    // Warning: mail(): Failed to connect to mailserver at "localhost" port 25, verify your "SMTP" and "smtp_port" setting in php.ini or use ini_set() 
    // => ON RAJOUTE @ POUR NE PLUS AVOIR LE MESSAGE D'ERREUR

    // METTRE UN MESSAGE DE CONFIRMATION
    echo "<h4>merci pour votre message</h4>";
}



/* 
Array ( 
    [email] => test1150@mail.me 
    [nom] => test1150 
    [sujet] => sujet1150 
    [message] => message1150 )
*/

?>
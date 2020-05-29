<section>
    <h2>CONTACT</h2>
    <div class="ligne">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur numquam omnis delectus consequatur aut veritatis molestiae dolore, rerum non mollitia explicabo dolorum consequuntur unde optio, deserunt corrupti repellendus eos odit!</p>
        <form method="POST" action="">
            <label>
                <span>votre email</span>
                <input type="email" name="email" required placeholder="votre email">
            </label>
            <label>
                <span>votre nom</span>
                <input type="text" name="nom" required placeholder="votre nom">
            </label>
            <label>
                <span>sujet</span>
                <input type="text" name="sujet" required placeholder="votre sujet">
            </label>
            <label>
                <span>votre message</span>
                <textarea name="message" required cols="30" rows="8"></textarea>
            </label>
            <button type="submit">envoyer le message</button>

<?php

// echo "<h4>RECEPTION DES INFOS DE FORMULAIRE</h4>";

if (! empty($_REQUEST))
{
    // ON VA STOCKER CES INFOS POUR QUE LE WEBMASTER PUISSE LES CONSULTER PLUS TARD
    // => A TERME CE SERA LE ROLE DE MySQL
    // => POUR LE MOMENT, ON VA STOCKER LE MESSAGE DANS UN FICHIER
    // ON VA STOCKER LES INFOS DANS UN FICHIER php/model/contact.txt
    // => ET ON PEUT AUSSI ENVOYER UN EMAIL POUR PREVENIR LE WEBMASTER

    // https://www.php.net/manual/fr/function.ob-start.php
    ob_start(); // ON HACKE/DETOURNE L'AFFICHAGE QUI DEVRAIT NORMALEMENT ARRIVER AU NAVIGATEUR

    // PHP VA POUVOIR RECEPTIONNER LES INFOS DU FORMULAIRES
    // print_r      AFFICHAGE DE LA VALEUR D'UNE VARIABLE (POUR DEBUG)
    // (comme console.log EN JS...)
    // $_REQUEST    VARIABLE SPECIALE DE PHP
    // https://www.php.net/manual/fr/function.print-r.php
    print_r($_REQUEST);

    // https://www.php.net/manual/fr/function.ob-get-clean.php
    // ON STOCKE DANS LA VARIABLE CE QUI AURAIT DU ETRE AFFICHE
    $affichageDetourne = ob_get_clean();

    // https://www.php.net/manual/fr/function.file-put-contents.php
    // ON VA LE STOCKER DANS LE FICHIER php/view/contact.txt 
    file_put_contents("php/model/contact.txt", $affichageDetourne, FILE_APPEND);

    // https://www.php.net/manual/fr/function.mail.php
    @mail("test@applh.com", "vous avez un nouveau message", $affichageDetourne);
    // Warning: mail(): Failed to connect to mailserver at "localhost" port 25, verify your "SMTP" and "smtp_port" setting in php.ini or use ini_set() 
    // => ON RAJOUTE @ POUR NE PLUS AVOIR LE MESSAGE D'ERREUR

    // METTRE UN MESSAGE DE CONFIRMATION
    echo "<h4>merci pour votre message</h4>";
}
else
{
    // METTRE UN MESSAGE D'ENCOURAGEMENT SYMPA
    echo "<h4>merci de remplir ce formulaire</h4>";
}



/* 
Array ( 
    [email] => test1150@mail.me 
    [nom] => test1150 
    [sujet] => sujet1150 
    [message] => message1150 )
*/
?>
        </form>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur numquam omnis delectus consequatur aut veritatis molestiae dolore, rerum non mollitia explicabo dolorum consequuntur unde optio, deserunt corrupti repellendus eos odit!</p>
    </div>
</section>
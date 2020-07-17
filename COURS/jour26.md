# JOUR 26

## LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?426981D31CB57104738D4936B23281E6E8B3

## NEWS / QUESTIONS

* CSS
    appliquer css sur un formulaire symfony 
    => aller plus loin dans les formulaires symfony

CONSEIL POUR LES PROCHAINES SEMAINES
* AVANCER SUR LES BESOINS DU PROJET
* ET SE POSER LA QUESTION: EST-CE JE SAIS LE FAIRE AVEC SYMFONY ?

## POO: GETTERS ET SETTERS

    ARCHITECTE LOGICIEL:
    LA RECOMMENDATION OFFICIELLE DANS LE MONDE ORIENTE OBJET PROFESSIONNEL
    => NE JAMAIS DONNER DE VISIBILITE public AUX PROPRIETES
    => MOTIVATION: UNE METHODE PERMET DE RAJOUTER UN SAS DE SECURITE POUR FAIRE PLUS DE VERIFICATIONS

    DEVELOPPEUR:
    => EN PRATIQUE: C'EST UNE IMMENSE CONNERIE
        CAR LES DEVELOPPEURS NE RAJOUTENT JAMAIS DE CODE DE SECURITE...

    COMPILATION:
    => DANS LES LANGAGES COMPILES
        CA FAIT PERDRE DES PERFORMANCES ET CA CONSOMME PLUS DE RESSOURCES
        LES COMPILATEURS REPASSENT LES PROPRIETES EN public ET VIRENT LES GETTERS ET SETTERS...

```php


class MaClasse
{
    // PROPRIETES
    public      $prop1       = "";   // RECOMMENDATION OFFICIELLE: NE JAMAIS FAIRE CA
    protected   $prop2       = "";
    private     $prop3       = "";


    // METHODES
    // GETTER => LECTURE
    public function getProp2 ()
    {
        return $this->prop2;

        // ICI ON POURRAIT AJOUTER DE LA SECURITE
        // MAIS GENERALEMENT (99%) RIEN N'EST FAIT
        /*
        if (User::accessOk())
        {
            return $this->prop2;
        }
        else
        {
            return "ERREUR: DROITS INSUFFISANTS";
        }
        */
    }

    // SETTER => ECRITURE
    public function setProp2 ($nouvelleValeur)
    {
        $this->prop2 = $nouvelleValeur;

        // ICI ON POURRAIT AJOUTER DE LA SECURITE
        // MAIS GENERALEMENT (99%) RIEN N'EST FAIT
        /*
        if (User::accessOk())
        {
            // ON EST DANS LA CLASSE, ON PEUT CHANGER LA VALEUR DE LA PROPRIETE prop2
            $this->prop2 = $nouvelleValeur;
        }
        else
        {
            // ON NE FAIT RIEN CAR LES DROITS SONT INSUFFISANTS
            // ON POURRAIT ALERTER LES ADMINISTATEURS
        }
        */
    }

}

class MaClasse2
{
    // PROPRIETES


    // METHODES
    function faireTravail ()
    {
        // ON VA DELEGUER UNE PARTIE A UN OBJET DE MaClasse
        $objet = new MaClasse;

        $objet->prop1 = "nouvelle valeur";  // ECRITURE OK CAR prop1 EST public
        echo $objet->prop1;                 // LECTURE

        //  $objet->prop2 = "nouvelle valeur";   // ERREUR PHP CAR protected
        $objet->setProp2("nouvelle valeur");     // ECRITURE OK CAR LA METHODE EST public
        echo $objet->getProp2();                 // LECTURE OK CAR LA METHHODE EST public

        //  $objet->prop3 = "nouvelle valeur";   // ERREUR PHP CAR private
    }
}

```

    PAUSE JUSQU'A 10H50...

## SYMFONY: GESTION DES UTILISATEURS ET LOGIN...

    https://symfony.com/blog/new-in-makerbundle-1-8-instant-user-login-form-commands

    ON A UNE COMMANDE POUR CREER LA DE CODE POUR GERER LES UTILISATEURS

    php bin/console make:user

    (REPONDRE AUX QUESTIONS...)

    created: src/Entity/User.php
    created: src/Repository/UserRepository.php
    updated: src/Entity/User.php
    updated: src/Entity/User.php
    updated: config/packages/security.yaml


    Next Steps:
    - Review your new App\Entity\User class.
    - Use make:entity to add more fields to your User entity and then run make:migration.
    - Create a way to authenticate! See https://symfony.com/doc/current/security.html

    LANCER ENSUITE LA COMMANDE

    php bin/console make:migration

        Next: Review the new migration "src/Migrations/Version20200717090458.php"      
        Then: Run the migration with php bin/console doctrine:migrations:migrate       
        See https://symfony.com/doc/current/bundles/DoctrineMigrationsBundle/index.html

    php bin/console doctrine:migrations:migrate

        -> CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB

        (IL SE PEUT QU'IL Y AIT DES ERREURS SUIVANT LA VERSION DE BASE DE DONNEES...)


    ON A UNE TABLE SQL user
    MAIS ON N'A PAS DE LIGNE, IL FAUT AJOUTER UN UTILISATEUR AVANT DE FAIRE LE LOGIN
    => PB LE MOT DE PASSE DOIT ETRE HASHE+SALE 
    => IDEALEMENT, IL FAUDRAIT UN FORMULAIRE DE CREATION DE COMPTE...

    https://symfony.com/doc/master/doctrine/registration_form.html

    ON PEUT UTILISER LA COMMANDE

    php bin/console make:registration-form

    (REPONDRE AUX QUESTIONS...)

        updated: src/Entity/User.php
        updated: src/Entity/User.php
        created: src/Security/EmailVerifier.php
        created: templates/registration/confirmation_email.html.twig
        created: src/Form/RegistrationFormType.php
        created: src/Controller/RegistrationController.php
        created: templates/registration/register.html.twig

                
        Success! 
                

        Next:
        1) Install some missing packages:
            composer require symfonycasts/verify-email-bundle
        2) In RegistrationController::verifyUserEmail():
        * Customize the last redirectToRoute() after a successful email verification.
        * Make sure you're rendering success flash messages or change the $this->addFlash() line.
        3) Review and customize the form, controller, and templates as needed.
        4) Run "php bin/console make:migration" to generate a migration for the newly added User::isVerified property.

        Then open your browser, go to "/register" and enjoy your new form!


    AVANT D'OUBLIER...
    TOUJOURS DANS LE DOSSIER cours-symfony
    LANCER LA COMMANDE

    composer require symfonycasts/verify-email-bundle

    OU SUR UNE INSTALL AVEC composer.phar...

    php ../composer.phar symfonycasts/verify-email-bundle

    POUR SYNCHRONISER LA TABLE SQL ET AJOUTER LA COLONNE is_verified

    php bin/console make:migration
    php bin/console doctrine:migrations:migrate


    QUAND ON ESSAIE D'ALLER SUR LA PAGE /register
    
    http://localhost/wf3/cours-symfony/public/register

    => ON A UNE ERREUR DE CONFIGURATION 

    The controller for URI "/register" is not callable: Environment variable not found: "MAILER_DSN".

    https://symfony.com/doc/current/mailer.html

    https://symfony.com/doc/current/mailer.html#disabling-delivery

    MODIFIER LE FICHIER .env POUR PARAMETRER LE SERVEUR D'EMAIL

    # EN LOCAL, POUR DESACTIVER L'ENVOI DE MAIL...
    MAILER_DSN=null://null


    => YOUPI SI ON A REUSSI ON PEUT CREER UN UTILISATEUR ;-p


## FORMULAIRE DE LOGIN AVEC SYMFONY

    https://symfony.com/blog/new-in-makerbundle-1-8-instant-user-login-form-commands

    ON A UNE COMMANDE POUR CREER LA BASE DE CODE POUR LE LOGIN

    php bin/console make:auth

        updated: config/packages/security.yaml
        created: src/Controller/SecurityController.php
        created: templates/security/login.html.twig
                
        Success! 
                
        Next:
        - Customize your new authenticator.
        - Finish the redirect "TODO" in the App\Security\LoginFormAuthenticator::onAuthenticationSuccess() method.
        - Review & adapt the login template: templates/security/login.html.twig.


    DANS LE FICHIER src/Security/LoginFormAuthenticator
    ET DANS LA METHODE onAuthenticationSuccess

```php

    // For example : return new RedirectResponse($this->urlGenerator->generate('some_route'));
    // ICI ON DETERMINE VERS QUELLE PAGE ON REDIRIGE APRES LE LOGIN
    return new RedirectResponse($this->urlGenerator->generate('accueil'));

    // throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);
```

    ON PEUT TESTER LA PAGE DE LOGIN

    http://localhost/wf3/cours-symfony/public/login


    PAUSE DEJEUNER JUSQU'A 13H40...


## FORMULAIRE PLUS AVANCE AVEC SYMFONY

    https://symfony.com/doc/current/forms.html

    https://symfony.com/doc/current/forms.html#rendering-forms

    https://symfony.com/doc/current/form/form_customization.html#reference-forms-twig-form

    DANS SYMFONY LES FORMULAIRES SONT GERES DANS UNE CLASSE QUI EST RANGEE
    DANS src/Form/...Type.php

    DANS TWIG
    https://symfony.com/doc/2.0/reference/forms/twig_reference.html#reference-form-twig-functions


    DANS PHP
    COMMENT CHANGER LES CHAMPS DE FORMULAIRES

    https://symfony.com/doc/current/forms.html#creating-form-classes

    https://symfony.com/doc/current/reference/forms/types.html

### SYMFONY ET UPLOAD AVEC INPUT TYPE FILE

    https://symfony.com/doc/current/reference/forms/types/file.html#basic-usage


## CMS BASE SUR SYMFONY: DRUPAL9

    https://www.drupal.fr/articles/2020/drupal-9-est


## RELATIONS ENTRE ENTITES

    https://symfony.com/doc/current/doctrine/associations.html


## ACTIVITE POUR LE RESTE DE LA JOURNEE

    CONSEIL:
    AVANCER SUR LE PROJET
    => ESSAYER DE DETERMINER SI IL VOUS MANQUE DES ELEMENTS POUR REALISER LE PROJET AVEC SYMFONY
    => OBJECTIF: REPERER LES POINTS DIFFICILES...

    SI POSSIBLE: COMMENCER A CODER EN HTML ET CSS LES MAQUETTES...
    

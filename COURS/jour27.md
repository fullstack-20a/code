# JOUR 27

## LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?0399A42357D392D502BF4903C57937E05291

## NEWS / QUESTIONS


## DERNIERE SEMAINE DE COURS

    LUNDI
    MARDI
    MERCREDI
    JEUDI
    VENDREDI    MODE PROJET (prévenir Nicolas M.)

## SYMFONY

    RELATIONS ENTRE TABLES / ASSOCIATIONS ENTRE ENTITE
    MARKETPLACE
        SITE ANNONCES
        UTILISATEURS / INSCRIPTION     
        ESPACE MEMBRE
        ESPACE ADMIN

    ANNONCE => ENTITE
        id                  (GERE PAR SYMFONY)
        titre               string  160
        uri                 string  160
        description         text
        photo               string  160
        datePublication     datetime
        auteur              ORM / association avec Entité User (ONE-TO-MANY)
        (categorie           string 160)

    ENTITE => CATEGORIE

    ASSOCIATION MANY-TO-MANY
        ENTRE LES ANNONCES ET LES CATEGORIES

    PAGES
        accueil         /
        contact         /contact
        annonces        /annonces
        annonce/{uri}   /annonce/voiture-marseille
        espace-membre   /espace-membre
        admin           /admin
        inscription
        login
        logout

    NOUVEAU SYMFONY ?

## CREATION D'UN NOUVEAU SYMFONY    symfony-marketplace

    (AVOIR COMPOSER INSTALLE...)

    OUVRIR UN TERMINAL DANS LE DOSSIER htdocs

    ET TESTER composer -v
    OU php composer.phar -v

    https://symfony.com/doc/current/setup.html#creating-symfony-applications


    composer create-project symfony/website-skeleton symfony-marketplace

    CHANGER DE DOSSIER POUR ALLER DANS LE DOSSIER symfony-marketplace

    cd symfony-marketplace

    https://symfony.com/doc/current/setup/web_server_configuration.html#adding-rewrite-rules

    composer require symfony/apache-pack
    OU
    php ../composer.phar require symfony/apache-pack

    (ATTENTION: IL FAUT REPONDRE A UNE QUESTION... yes...)

    Do you want to execute this recipe?
    [y] Yes
    [n] No
    [a] Yes for all packages, only for the current installation session
    [p] Yes permanently, never ask again for this project
    (defaults to n): y

    => SI TOUT SE PASSE BIEN, ON A UN FICHIER public/.htaccess

    DANS LE NAVIGATEUR, VERIFIER QUE LA PAGE RACINE S'AFFICHE CORRECTEMENT
    http://localhost/symfony-marketplace/public/


## MISE EN PLACE DE GIT

    git init

    => FAIRE UN PREMIER COMMIT DANS VSCODE POUR GARDER UN PREMIERE VERSION

## CREER DES PAGES DANS UN CONTROLLER

    COMMENCER A UTILISER LA CONSOLE POUR CREER UNE BASE DE CODE...

    https://symfony.com/doc/current/bundles/SymfonyMakerBundle/index.html

    POUR VERIFIER QUE LA CONSOLE EST OK
    OUVRIR UN TERMINAL DANS LE DOSSIER symfony-marketplace

    php bin/console

    POUR LES PAGES accueil, contact, etc...
    ON VA CREER UN SEUL CONTROLLER POUR CONTENIR CES DIFFERENTES PAGES...

    php bin/console make:controller Marketplace

    src/Controller/MarketplaceController.php
    templates/marketplace/index.html.twig


    CHANGER LA ROUTE DANS LA CLASSE CONTROLLER POUR OBTENIR LA PAGE D'ACCUEIL

    * @Route("/", name="accueil")

    http://localhost/symfony-marketplace/public/

    PAUSE JUSQU'A 11H05

## CREATION DES USERS...

    php bin/console make:user

    (REPONDRE AUX QUESTIONS...)

    created: src/Entity/User.php
    created: src/Repository/UserRepository.php
    updated: src/Entity/User.php
    updated: config/packages/security.yaml

## CREATION DES PAGES POUR CREER UN COMPTE

    php bin/console make:registration-form

    (REPONDRE AUX QUESTIONS...)

    updated: src/Entity/User.php
    updated: src/Entity/User.php
    created: src/Security/EmailVerifier.php
    created: templates/registration/confirmation_email.html.twig
    created: src/Form/RegistrationFormType.php
    created: src/Controller/RegistrationController.php
    created: templates/registration/register.html.twig

    AJOUTER LE BUNDLE MANQUANT...

    composer require symfonycasts/verify-email-bundle

## CREATION DES PAGES DE LOGIN ET LOGOUT

    https://symfony.com/doc/current/security/form_login_setup.html

    php bin/console make:auth

        What style of authentication do you want? [Empty authenticator]:
        [0] Empty authenticator
        [1] Login form authenticator
        > 1
        1

        The class name of the authenticator to create (e.g. AppCustomAuthenticator):
        > LoginFormAuthenticator

        Choose a name for the controller class (e.g. SecurityController) [SecurityController]:
        >

        Do you want to generate a '/logout' URL? (yes/no) [yes]:
        >

        created: src/Security/LoginFormAuthenticator.php
        updated: config/packages/security.yaml
        created: src/Controller/SecurityController.php
        created: templates/security/login.html.twig

    PERSONNALISER LA ROUTE APRES LOGIN

```php

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $providerKey)) {
            return new RedirectResponse($targetPath);
        }

        // For example : return new RedirectResponse($this->urlGenerator->generate('some_route'));
        return new RedirectResponse($this->urlGenerator->generate('accueil'));
        
        // throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);
    }

```


## CONFIGURER LE FICHIER .env

    https://symfony.com/doc/current/mailer.html#disabling-delivery
    POUR LE MAIL, DESACTIVER AVEC LA LIGNE

    ###> symfony/mailer ###
    # MAILER_DSN=smtp://localhost
    MAILER_DSN=null://null
    ###< symfony/mailer ###

    EN ENSUITE CONFIGURER LA DATABASE MYSQL

    ###> doctrine/doctrine-bundle ###
    # Format described at https://www.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html#connecting-using-a-url
    # For an SQLite database, use: "sqlite:///%kernel.project_dir%/var/data.db"
    # For a PostgreSQL database, use: "postgresql://db_user:db_password@127.0.0.1:5432/db_name?serverVersion=11&charset=utf8"
    # IMPORTANT: You MUST configure your server version, either here or in config/packages/doctrine.yaml
    # DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7
    DATABASE_URL=mysql://root:@127.0.0.1:3306/marketplace?serverVersion=5.7

    # SI PROBLEME AVEC MARIADB
    # DATABASE_URL=mysql://root:@127.0.0.1:3306/marketplace?serverVersion=mariadb-10.4

    ###< doctrine/doctrine-bundle ###

## CREER LA DATABASE MySQL

    https://symfony.com/doc/current/doctrine.html

    LANCER LA COMMANDE

    php bin/console doctrine:database:create

    Created database `marketplace` for connection named default

    ENSUITE FAIRE UNE PREMIERE MIGRATION POUR CREER LA TABLE user
    https://symfony.com/doc/current/doctrine.html#migrations-creating-the-database-tables-schema

    php bin/console make:migration

    Next: Review the new migration "migrations/Version20200720094912.php"

    ET ENSUITE LANCER LA COMMANDE

    php bin/console doctrine:migrations:migrate

    => VERIFIER QUE LA TABLE SQL user EST BIEN CREEE

## TESTER LA PAGE DE /register

    ALLER DANS LE NAVIGATEUR SUR LA PAGE /register

    http://localhost/symfony-marketplace/public/register

    => ON DOIT POUVOIR CREER UN COMPTE
    => VERIFIER QUE LA TABLE user A BIEN UNE NOUVELLE LIGNE ET QUE LE MOT DE PASSE EST HASHE+SALE

## TESTER LA PAGE DE /login

    ALLER DANS LE NAVIGATEUR SUR LA PAGE /login

    => ON DOIT POUVOIR SE CONNECTER AVEC LE COMPTE CREE PRECEDEMMENT

## TESTER LA PAGE DE /logout

    ALLER DANS LE NAVIGATEUR SUR LA PAGE /logout

    => ON DOIT POUVOIR SE DECONNECTER...

## CREATION DE L'ENTITE Annonce

    ANNONCE => ENTITE
        id                  (GERE PAR SYMFONY)
        titre               string  160
        uri                 string  160
        description         text
        photo               string  160
        datePublication     datetime
        user                ORM / association avec Entité User (ONE-TO-MANY)

    https://symfony.com/doc/current/doctrine.html#creating-an-entity-class

    php bin/console make:entity


    PAUSE DEJEUNER ET REPRISE A 13H45...


## CREATION DU CRUD SUR L'ENTITE Annonce

    https://symfony.com/blog/new-and-improved-generators-for-makerbundle

    php bin/console make:crud Annonce

    created: src/Controller/AnnonceController.php
    created: src/Form/AnnonceType.php
    created: templates/annonce/_delete_form.html.twig
    created: templates/annonce/_form.html.twig
    created: templates/annonce/edit.html.twig
    created: templates/annonce/index.html.twig
    created: templates/annonce/new.html.twig
    created: templates/annonce/show.html.twig

    Next: Check your new CRUD by going to /annonce/


    VERIFIER QUE LA PAGE S'AFFICHE CORRECTEMENT
    http://localhost/symfony-marketplace/public/annonce/

    http://localhost/symfony-marketplace/public/annonce/new

## ENTITY TYPE POUR LES FORMULAIRES

    https://symfony.com/doc/current/reference/forms/types/entity.html#basic-usage

    DANS LE FICHIER src/ForM/AnnonceType.php

```php

// ...
use App\Entity\User;
// ...
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
// ...
            ->add('user', EntityType::class, [ 'class' => User::class, 'choice_label' => 'email' ])
// ...

```

    ET POUR AFFICHER LES INFORMATIONS SUR LES ANNONCES EN COMPLETANT AVEC LES AUTEURS
    DANS LES TEMPLATES TWIG

    {{ annonce.user.id }}
    {{ annonce.user.email }}

    COOL ON A UN CRUD QUI FONCTIONNE ET ON AFFICHE LES AUTEURS DES ANNONCES... ;-p

## CREATION DE L'ESPACE ADMIN

    ON VA CREER UNE NOUVELLE ROUTE VERS LA PAGE /admin

    POUR SIMPLIFIER...
    JE CONTINUE A UTILISER LA CLASSE MarketplaceController
    ET JE RAJOUTE UNE NOUVELLE ROUTE AVEC UNE NOUVELLE METHODE
    ET ON VA AUSSI CREER UN AUTRE FICHIER TWIG POUR LA PAGE admin
    ET ENFIN VERIFIER QUE LA PAGE S'AFFICHE DANS LE NAVIGATEUR
    http://localhost/symfony-marketplace/public/admin

```php

    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('marketplace/admin.html.twig', [
            'controller_name' => 'MarketplaceController',
        ]);
    }

```

    ON VA PROTEGER L'ACCES A CET ESPACE ADMIN...
    IL FAUT MODIFIER LE CODE DANS config/packages/security.yaml

    DANS LES FICHIERS .yaml
    LES INDENTATIONS SONT PAR PAS DE 4 ESPACES (EXACTEMENT, NI PLUS, NI MOINS...)
    ON PROTEGE TOUTES LES PAGES DONT L'URL COMMENCE PAR /admin
    EN DEMANDANT LE ROLE_ADMIN POUR Y ACCEDER

    access_control:
        - { path: ^/admin, roles: ROLE_ADMIN }

    PAR DEFAUT: UNE PERSONNE CONNECTE A AUTOMATIQUEMENT LE ROLE_USER

    ON PEUT AUSSI CREER DES HIERARCHIES DE ROLES...
    https://symfony.com/doc/current/security.html#hierarchical-roles


    ET ENFIN, ON AJOUTE LE PREFIXE /admin AUX ROUTES DU CRUD AnnonceController.php

```php

/**
 * @Route("/admin/annonce")
 */
class AnnonceController extends AbstractController


```

    PAUSE JUSQU'A 15H50...


## ACTIVITE POUR LE RESTE DE LA JOURNEE...

    EQUIPE: 
        INTEGRATION PROJET
        ...
        
    EXERCICE INDIVIDUEL: 
        AJOUTER UNE ENTITE CATEGORIE

        id          (GERE PAR SYMFONY)
        nom
        annonces    ASSOCIATION MANY-TO-MANY AVEC ENTITE Annonce
        ...

    ET AJOUTER UNE ASSOCIATION MANY-TO-MANY ENTRE CATEGORIE ET ANNONCE
    ET FAIRE UN CRUD SUR CATEGORIE...







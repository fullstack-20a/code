# JOUR 28

## LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?BE761DABDAC4041139DA0B8BAB20F5AE3CBC

# NEWS / QUESTIONS

    CET APRES-MIDI 14h30... WEBCONF MEDINJOB...

## PAGES DU SITE EN PRIORITE

    USER STORIES
    USE CASES
    SCENARIOS

    CREER LES PERSONAS
    CREER LES SCENARIOS LES PLUS IMPORTANTS

    PERSONA POUR NOTRE MARKETPLACE :
    TRANCHE AGE:            +18ANS -70ANS
    LIEU:                   FRANCE / VILLE
    ACTIVITE:               CHOMEUR
    APPAREIL:               SMARTPHONE ANDROID
    JOURS PREFERENCE:       ?
    HEURES PREFERENCE:      ?

    => TYPE ANNONCE: GRATUIT / PAS CHER / OCCASION
    => ECHANGE SERVICES...
    => DONS D'OBJETS INUTILISES...

    SCENARIO TYPIQUE:
    ON M'EN A PARLE COMME UN BON TUYAU...
    LE VISITEUR ARRIVE SUR LA PAGE D'ACCUEIL DU SITE    
    => CONSTRUIRE UNE PAGE D'ACCUEIL PRESENTABLE EN MOBILE FIRST

    => ENSUITE, LE VISITEUR PEUT CONSULTER DES ANNONCES
    => MENU QUI AMENE VERS LA PAGES DES ANNONCES /annonces
    => CONSTRUIRE UNE PAGE DES ANNONCES PRESENTABLE EN MOBILE FIRST

    => ENSUITE, INCITER LE VISITEUR A CREER UN COMPTE
    => MENU VERS LA PAGE /register
    => CONSTRUIRE UNE PAGE DE CREATION DE COMPTE PRESENTABLE EN MOBILE FIRST

    => ENSUITE, INCITER LE VISITEUR A CREER UNE ANNONCE
    => MENU VERS LA PAGE D'ESPACE MEMBRE /membre
    => CONSTRUIRE UNE PAGE D'ESPACE MEMBRE PRESENTABLE EN MOBILE FIRST
    => SUR CETTE PAGE, LE MEMBRE POURRA PUBLIER DES ANNONCES ET VOIR SES PROPRES ANNONCES

## AJOUTER BOOTSTRAP DANS SYMFONY


    https://getbootstrap.com/docs/4.5/getting-started/introduction/

    https://getbootstrap.com/docs/4.5/getting-started/introduction/#starter-template


```
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>

```

```
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <!-- OBLIGATOIRE POUR OBTENIR UNE PAGE RESPONSIVE -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

        <title>{% block title %}Bienvenue sur WebForce Market{% endblock %}</title>
        {% block stylesheets %}{% endblock %}
    </head>
    <body>
        <header class="container">
            <h1>MA MARKET</h1>
        </header>

        <main>
            {% block body %}{% endblock %}
        </main>
        
        <footer class="container">
            <p>tous droits réservés</p>
        </footer>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
          
        {% block javascripts %}{% endblock %}
    </body>
</html>
```


## AJOUTER BOOTSTRAP POUR LES FORMULAIRES SYMFONY

    https://symfony.com/doc/current/form/bootstrap4.html

    MODIFIER LE FICHIER config/packages/twig.yaml

```
twig:
    default_path: '%kernel.project_dir%/templates'
    form_themes: ['bootstrap_4_layout.html.twig']
```

    => LE CODE HTML DES FORMULAIRE EST CREE POUR ETRE COMPATIBLE AVEC BOOTSTRAP...

    ASTUCE: 
    NE PAS HESITER A CREER PLUSIEURS FICHIERS TEMPLATES 
    base.html.twig, base-membre.html.twig, base-public.html.twig
    ET ENSUITE CHANGER LES extends POUR UTILISER LE BON TEMPLATE PARENT

    PAUSE ET REPRISE A 10H50


## PAGE DES ANNONCES

    https://symfony.com/doc/current/doctrine.html#fetching-objects-from-the-database

    POUR FAIRE DES REQUETES DE LECTURE SUR UNE ENTITE
    ON PASSE PAR UN OBJET DE LA CLASSE AnnonceRepository
    ET LA METHODE D'OBJET findAll

```php
    /**
     * @Route("/annonces", name="annonces")
     */
    public function annonces(AnnonceRepository $annonceRepository): Response
    {
        // ICI ON VEUT AFFICHER LA LISTE DES ANNONCES
        // => SCENARIO CRUD : READ LISTE

        return $this->render('marketplace/annonces.html.twig', [
            // ON TRANSMET DE PHP A TWIG LA LISTE DES ANNONCES
            // DANS LA VARIABLE TWIG annonces
            'annonces' => $annonceRepository->findBy([], [ "datePublication" => "DESC" ]),
            // COMPTER TOUTES LES LIGNES DANS LA TABLE SQL annonce
            'annoncesTotal' => $annonceRepository->count([]),
        ]);
    }
```

```php
    /**
     * @Route("/", name="annonce_index", methods={"GET"})
     */
    public function index(AnnonceRepository $annonceRepository): Response
    {
        return $this->render('annonce/index.html.twig', [
            
            // 'annonces' => $annonceRepository->findAll(),    // TROP BASIQUE
            // https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/working-with-objects.html#by-simple-conditions
            // TRI PAR id DECROISSANT
            'annonces' => $annonceRepository->findBy([], [ "id" => "DESC" ]),
        ]);
    }
```


    PAUSE DEJEUNER JUSQU'A 13H40...

## NOUVEAU LIVESHARE

    https://prod.liveshare.vsengsaas.visualstudio.com/join?5F183BBA9BBCD7E826190B4BEC7713F14D9A


## ACTIVITE POUR CET APRES-MIDI


    COMPLETER LA PAGE /register POUR POUVOIR CREER SON COMPTE
    COMPLETER LA PAGE /membre POUR POUVOIR CREER UNE ANNONCE
    AJOUTER DU JS...
    AVANCER SUR LES PROJETS EN EQUIPE...

## CODE DE PROJETS SUR SYMFONY

    CMS...
    https://www.drupal.org/
    https://github.com/drupal

    CMS SPECIALISE POUR LES BOUTIQUES EN LIGNE...
    https://thelia.net/?lang=fr_FR
    https://github.com/thelia/thelia


    PAUSE JUSQU'A 15H50...

    
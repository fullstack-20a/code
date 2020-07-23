# JOUR 30

## LIVESHARE

https://prod.liveshare.vsengsaas.visualstudio.com/join?EBE28EBB682A29AF7765F0648FB04CB60E03

## NEWS / QUESTIONS

    DERNIER COURS EN MODE COURS
    AJAX
    ANGULAR ET SYMFONY
    PROJET MARKETPLACE: ESPACE MEMBRE ET FAIRE CRUD
    ...

## DEBUG: EFFACER LE CACHE 

    ASTUCE:
    EFFACER LE CACHE SYMFONY REGULIEREMENT

    php bin/console cache:clear

## BUNDLES SYMFONY

    https://symfony.com/doc/bundles/

    TOUT SYMFONY EST DECOUPE EN BUNDLES
    => MEME LE NOYAU DE SYMFONY EST UN BUNDLE
    => ON PEUT AJOUTER DES FONCTIONNALITES SUPPLEMENTAIRES EN AJOUTANT DES BUNDLES
    (=> UN PEU COMME LES EXTENSIONS DANS WORDPRESS...)

    EXEMPLE: EASY ADMIN BUNDLE
    POUR CREER DES DASHBOARD ADMIN POUR CRUD...
    https://symfony.com/doc/current/bundles/EasyAdminBundle/dashboards.html

    https://symfony.com/blog/easyadmin-3-is-released


## BUNDLE API PLATFORM

    POUR UTILISER SYMFONY COMME API (SEULEMENT BACK)
    ET ENSUITE POUVOIR LE CONNECTER AVEC UNE AUTRE PARTIE FRONT (REACT, VUE, etc...)

    https://api-platform.com/

    https://api-platform.com/docs/

    AJOUTER LE BUNDLE

    composer require api

    ...

    * Your API is almost ready:
    1. Create your first API resource in src/Entity;
    2. Go to /api to browse your API

    * To enable the GraphQL support, run composer require webonyx/graphql-php,
        then browse /api/graphql.

    * Read the documentation at https://api-platform.com/docs


    VERIFIER QUE LA PAGE /api S'AFFICHE CORRECTEMENT (MAIS VIDE POUR LE MOMENT...)
    http://localhost/symfony-marketplace/public/api

    ENSUITE DANS NOS ENTITES, IL FAUT RAJOUTER DES ANNOTATIONS 
    POUR EXPOSER LEUR API

```php

// ...
// POUR API PLATFORM
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 * @ApiResource(
 *     attributes={"pagination_items_per_page"=3},
 *     normalizationContext={"groups"={"scenario1"}},
 *     denormalizationContext={"groups"={"scenario2"}}
 * ) 
 */
class Annonce
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"scenario1", "scenario2"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=160)
     * @Groups({"scenario1", "scenario2"})
     */
    private $titre;

    // ...
}
```

## CREER UNE ROUTE POUR RENVOYER DU JSON

```php

    /**
     * @Route("/apijson", name="apijson", methods={"GET","POST"})
     */
    public function apijson(Request $request): Response
    {
        // ON VA RENVOYER DU JSON
        // https://symfony.com/doc/current/components/http_foundation.html
        // https://symfony.com/doc/current/components/http_foundation.html#creating-a-json-response

        $tabAssoJson = [];
        // ON RAJOUTE LES INFOS DANS LE TABLEAU ASSOCIATIF
        $tabAssoJson["date"] = date("H:i:s");

        // ON RANGE LE TABLEAU ASSO DANS UN OBJET DE CLASSE JsonResponse
        $objetJsonResponse = new JsonResponse($tabAssoJson);
        // ON RENVOIE L'OBJET
        return $objetJsonResponse;
        
    }

    /**
     * @Route("/front-in-symfony", name="front-in-symfony")
     */
    public function frontInSymfony()
    {
        return $this->render('marketplace/front-in-symfony.html.twig', [
        ]);
    }

```


## INTEGRER UN FRAMEWORK FRONT DANS SYMFONY

    https://symfony.com/doc/current/frontend.html
    React
    VueJS
    Angular ???

    MON CONSEIL: 
    IL VAUT MIEUX SEPARER FRAMEWORK FRONT ET FRAMEWORK BACK...
    SYMFONY POUR LA PARTIE BACK AVEC API JSON
    ET UN FRONT AVEC UN AUTRE FRAMEWORK...


    PAUSE DEJEUNER ET ON REPREND A 13H35...

## RESUME DE TOUTES LES TECHNOS FULLSTACK

    PROFIL/
    * JE VEUX CODER LE MOINS POSSIBLE       =>      WORDPRESS CMS
    * JE VEUX CODER UN PEU MAIS PAS TROP    =>      WORDPRESS FRAMEWORK + CODER UN THEME DE ZERO
    * JE VEUX CODER BEAUCOUP                =>      FRONT:  VUEJS
                                                    BACK:   LARAVEL

    TEMPS/ METHODE PROFESSEUR LONG  
        MIX 1-2-3-4                             20H PAR SEMAINE 30H
        PRIORITE    1           40% DU TEMPS    8H              12H
        PRIORITE    2           30% DU TEMPS    6H              9H
        PRIORITE    3           20% DU TEMPS    4H              6H
        PRIORITE    4           10% DU TEMPS    2H              3H
    => METTRE LE CHRONO ET UNE FOIS LE TEMPS EPUISE PASSER SUR LA PRIORITE SUIVANTE


## ACTIVITE APRES-MIDI

    * DEMO VUEJS
    **** PROJET MARKETPLACE / ESPACE MEMBRE CRUD / PAGE CONTACT
    PROJET EQUIPE
    ...


## AJOUTER DES CONTRAINTES POUR LES FORMULAIRES

    https://symfony.com/doc/current/reference/constraints.html

    https://symfony.com/doc/current/reference/constraints/File.html

    https://symfony.com/doc/current/reference/constraints/Image.html


## EXERCICE: PAGE CONTACT

    AJOUTER UNE ROUTE POUR AFFICHER LA PAGE /contact

    AJOUTER UNE ENTITE Contact
    POUR SAUVEGARDER LES MESSAGES

    ENTITE Contact
        id              (GERE PAR SYMFONY)
        email           string 160
        sujet           string 160
        message         text
        dateMessage     datetime

    CREER L'ENTITE ET ENSUITE CRUD

    S'INSPIRER DU CREATE POUR AJOUTER LE FORMULAIRE DE CONTACT SUR LA PAGE /contact

    => EXERCICE A REALISER EN AUTONOMIE...


    PAUSE ET ON REPREND A 15H50...


    COMMENCER PAR CREER L'ENTITE Contact

    php bin/console make:entity Contact

    php bin/console make:migration

    php bin/console doctrine:migrations:migrate

    php bin/console make:crud Contact

    VERIFIER QUE LA PAGE S'AFFICHE
    http://localhost/symfony-marketplace/public/contact/

    ET EN FAIT, ON VA DEPLACER CES PAGES CRUD DANS LA PARTIE ADMIN...
    => RAJOUTER /admin/contact DANS LA ROUTE

```php
    /**
    * @Route("/admin/contact")
    */
    class ContactController extends AbstractController

```

    ENSUITE AJOUTER UNE NOUVELLE ROUTE POUR CREER LA PAGE /contact
    ET CREER UN TEMPLATE
    ET AJOUTER LE LIEN DANS LE MENU


## AFFICHAGE INDIVIDUEL D'UNE ANNONCE

    DANS templates/marketplace/annonces.html.twig

    <h3><a href="{{ url('annonce_detail', { 'uri' : annonce.uri }) }}">{{ annonce.titre }}</a></h3>


    DANS src/Controller/MarketplaceController.php

```php

    /**
     * @Route("/annonce/{uri}", name="annonce_detail", methods={"GET"})
     */
    public function annonceDetail(Annonce $annonce): Response
    {
        return $this->render('marketplace/annonce_detail.html.twig', [
            'annonce' => $annonce,
        ]);
    }

```

## FIN DES COURS

    BRAVO ! VOUS ETES ARRIVES AU BOUT ;-p


    
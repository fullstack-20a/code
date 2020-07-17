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
    
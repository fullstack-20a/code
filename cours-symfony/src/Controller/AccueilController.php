<?php

namespace App\Controller;
// => LA CLASSE AccueilController EST RANGEE DANS LE NAMESPACE App\Controller

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
// ... AJOUTER DES use EN PLUS
use App\Commun\CodeCommun;

// => DANS LA SUITE DU FICHIER QUAND ON VA UTILISER LA CLASSE AbstractController
//          C'EST LA CLASSE QUI EST RANGEE DANS LE NAMESPACE Symfony\Bundle\FrameworkBundle\Controller
// => DANS LA SUITE DU FICHIER QUAND ON VA UTILISER LA CLASSE Route
//          C'EST DANS LE NAMESPACE Symfony\Component\Routing\Annotation QUI CONTIENT LA CLASSE

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index()
    {
        // LA METHODE render EST FOURNIE PAR LA CLASSE AbstractController
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    /**
     * @Route("/testaccueil", name="testaccueil")
     */
    public function testaccueil()
    {
        // ON VEUT APPELER LA METHODE construireTexte DANS LA CLASSE CodeCommun
        $objet = new CodeCommun; 
        $resultat = $objet->construireTexte();

        return $this->render('accueil/testaccueil.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }


}

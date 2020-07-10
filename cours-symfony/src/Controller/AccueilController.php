<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index()
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    /**
     * @Route("/testaccueil", name="testaccueil")
     */
    public function testaccueil()
    {
        return $this->render('accueil/testaccueil.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }


}

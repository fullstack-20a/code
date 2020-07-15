<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FormulaireController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        // POUR VOIR LA PAGE DANS LE NAVIGATEUR
        // http://localhost/wf3/cours-symfony/public/

        return $this->render('formulaire/index.html.twig', [
            'controller_name' => 'FormulaireController',
        ]);

    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        // POUR VOIR LA PAGE DANS LE NAVIGATEUR
        // http://localhost/wf3/cours-symfony/public/contact

        return $this->render('formulaire/contact.html.twig', [
            'controller_name' => 'FormulaireController',
        ]);

    }

}

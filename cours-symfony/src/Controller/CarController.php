<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/car")
 */
class CarController extends AbstractController
{
    /**
     * @Route("/", name="car_index", methods={"GET"})
     * => URL DANS LE NAVIGATEUR SERA /public/car/
     */
    public function index(CarRepository $carRepository): Response
    {
        // AFFICHER LA LISTE DES LIGNES SOUS LA FORME D'UNE TABLE HTML
        // (READ LISTE)

        return $this->render('car/index.html.twig', [
            // VARIABLES QUE PHP TRANSMET A TWIG
            'cars' => $carRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="car_new", methods={"GET","POST"})
     * => URL DANS LE NAVIGATEUR SERA /public/car/new
     */
    public function new(Request $request): Response
    {
        // (CREATE)

        // CONTROLLER => TRAITEMENT DU FORMULAIRE
        /* DEBUT CODE EN PLUS => CODE POUR TRAITER LE FORMULAIRE */
        $car = new Car();
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        // VERIFICATION DU FORMULAIRE
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            // SI TOUT EST OK
            // PREPARE LE INSERT
            $entityManager->persist($car);

            // EXECUTE POUR LANCER LA REQUETE SQL
            $entityManager->flush();

            // ON FAIT UNE REDIRECTION POUR REVENIR A LA PAGE DE LA LISTE
            return $this->redirectToRoute('car_index');
        }
        /* FIN CODE EN PLUS */

        // VIEW => AFFICHAGE DU FORMULAIRE
        return $this->render('car/new.html.twig', [
            // ON TRANSMET 2 VARIABLES A TWIG: car ET form
            'car'  => $car,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="car_show", methods={"GET"})
     */
    public function show(Car $car): Response
    {
        // (READ POUR UN ELEMENT)

        // CETTE METHODE VA GERER UN GROUPE D'URLS DIFFERENTES
        // /public/car/1
        // /public/car/2
        // etc... 

        return $this->render('car/show.html.twig', [
            'car' => $car,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="car_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Car $car): Response
    {
        // (UPDATE)

        // CETTE METHODE VA GERER UN GROUPE D'URLS DIFFERENTES
        // /public/car/1/edit
        // /public/car/2/edit
        // etc... 

        // CONTROLLER => TRAITEMENT DE FORMULAIRE
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('car_index');
        }

        // VIEW => AFFICHAGE DE LA PAGE
        return $this->render('car/edit.html.twig', [
            'car' => $car,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="car_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Car $car): Response
    {
        // (DELETE)
        
        if ($this->isCsrfTokenValid('delete'.$car->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($car);
            $entityManager->flush();
        }

        return $this->redirectToRoute('car_index');
    }
}

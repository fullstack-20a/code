<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

class LuckyController
{
    /**
      * @Route("/lucky/number")
      * DANS LE NAVIGATEUR, ON POURRA VOIR LA PAGE AVEC CETTE URL
      * http://localhost/wf3/cours-symfony/public/lucky/number
      */
    public function number(): Response
    {
        $number = random_int(0, 100);

        // ICI ON CONSTRUIT LE CODE HTML DE LA PAGE
        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }

}

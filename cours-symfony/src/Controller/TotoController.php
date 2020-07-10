<?php
// src/Controller/TotoController.php
namespace App\Controller;
// App EST LE BUNDLE PAR DEFAUT DEPUIS SYMFONY4

use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

class TotoController
{
    /**
     * @Route("/toto")
     */
    public function titi (): Response
    {
        // ICI ON CONSTRUIT LE CODE HTML DE LA PAGE
        // TEMPORAIRE: ON VA ENSUITE SEPARER LE CODE VIEW AILLEURS...
        return new Response(
            '<html><body>CONTENU DE LA PAGE</body></html>'
        );

    }
}

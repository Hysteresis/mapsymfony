<?php

namespace App\Controller;

use Dompdf\Dompdf;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DompdfController extends AbstractController
{
    #[Route('/dompdf/{lat}/{lon}/{name}', name: 'app_dompdf')]
    public function index($lat, $lon, $name): Response
    {
        $lat = str_replace("a",".",$lat);
        $lon = str_replace("a",".",$lon);

        $dompdf = new Dompdf();
        $dompdf->loadHtml("les coordonnées");

        $dompdf->loadHtml("Latitude : " . $lat . " et la Longitude : " . $lon  .  " Ville : " . $name);
        $dompdf->setPaper('A4', 'landscape');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream();
        
        return $this->render('dompdf/index.html.twig', [
            'controller_name' => 'DompdfController',
        ]);
    }
}

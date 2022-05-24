<?php

namespace App\Controller;

use App\Form\CodePostalType;
use App\Service\Curlconnexion;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CodePostalController extends AbstractController
{
    #[Route('/', name: 'app_code_postal')]
    public function index(Request $request, Curlconnexion $curlconnexion ): Response
    {


        // just set up a fresh $task object (remove the example data)
        // $task = new Task();
        
        $lat = 48.856614;
        $lon = 2.3522219;
        $form = $this->createForm(CodePostalType::class);
        
        $form->handleRequest($request);
        $codepostal = 75000;
        $town = 'Paris';
        $display_name = "paris";
        $coordinates = '';

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            
            $reponse = $form->getData();

            $town = $reponse['town'];
            $codepostal = $reponse['codepostal'];
            $coordinates = $curlconnexion->connexionapi($town,$codepostal);
            // dd($coordinates);
            if($coordinates != []){
               
                $lat = $coordinates[0]['lat'];
                $lon = $coordinates[0]['lon'];
                $display_name = $coordinates[0]['display_name'];

            } else {
                $lat = 48.856614;
                $lon = 2.3522219;
                $display_name = "paris";
                echo "veuillez resaisir votre demande";
            }                  
        }

        return $this->render('code_postal/index.html.twig', [
            'coordinates' => $coordinates,
            'codepostal' => $codepostal,
            'town' => $town,
            'lat' => $lat,
            'lon' => $lon,
            'name' => $display_name,
            'form' => $form->createView(),
            
            
        ]);
    }
}

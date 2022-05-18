<?php

namespace App\Controller;

use App\Form\CodePostalType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CodePostalController extends AbstractController
{
    #[Route('/', name: 'app_code_postal')]
    public function index(Request $request): Response
    {

        // just set up a fresh $task object (remove the example data)
        // $task = new Task();

        $form = $this->createForm(CodePostalType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            

            // ... perform some action, such as saving the task to the database

            return $this->redirectToRoute('app_code_postal');
        }

        return $this->renderForm('code_postal/index.html.twig', [
            'form' => $form
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class InscriptionsController extends AbstractController
{
    #[Route('/inscriptions', name: 'app_inscriptions')]
    public function index(): Response
    {
        return $this->render('inscriptions/index.html.twig', [
            'controller_name' => 'InscriptionsController',
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MLifeController extends AbstractController
{
    #[Route('/mlife', name: 'mlife')]
    public function index(): Response
    {
        $nutrients = ["protein","fat","calories","fiber"];

        return $this->render('index.html.twig',[
            "nutrients" => $nutrients,
        ]);
    }    
}

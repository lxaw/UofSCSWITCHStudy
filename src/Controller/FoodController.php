<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Food;

class FoodController extends AbstractController
{
    #[Route('/food', name: 'app_food')]
    public function index(EntityManagerInterface $em): Response
    {

        $repository = $em->getRepository(Food::class);

        $foods = $repository->findAll();

        dd($foods);

        return $this->render('food/index.html.twig', [
            'controller_name' => 'FoodController',
        ]);
    }
}

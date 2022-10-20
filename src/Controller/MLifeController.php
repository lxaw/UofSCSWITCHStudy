<?php

namespace App\Controller;

use App\Repository\NutrientRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Nutrient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MLifeController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em){
        $this->em = $em; 
    }

    #[Route('/', name: '')]
    public function index(): Response
    {
        // findAll() - SELECT * FROM nutrients
        // find(id) - SELECT * FROM nutrients WHERE id = id

        $respository = $this->em->getRepository(Nutrient::class);

        $nutrients = $respository->findBy([],['id' => 'DESC']);

        return $this->render('nutrients/index.html.twig',[
            'nutrients' => $nutrients,
            ]
        );
    }    
    #[Route('/nutrients/{id}', methods:["GET"],name: 'nutrients')]
    public function show($id): Response
    {
        $respository = $this->em->getRepository(Nutrient::class);

        $nutrient = $respository->find($id);

        // dd($nutrients);

        return $this->render('nutrients/show.html.twig',[
            'nutrient' =>$nutrient
        ]);
    }    

}

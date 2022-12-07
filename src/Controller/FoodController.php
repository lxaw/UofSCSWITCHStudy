<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInferface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
// use App\Entity\Food;
// use App\Form\FoodFormType;


// foods
use App\Entity\MenustatFood;
use App\Repository\MenustatRepository;

use Symfony\Component\HttpFoundation\Request;
// use App\FoodDatabaseInteraction;


class FoodController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }
    #[Route('/food', name: 'FoodController__index')]
    public function index(): Response
    {

        $menustatFoodRepo = $this->em->getRepository(MenustatFood::class);

        $menustatFoods= $menustatFoodRepo->findBy(array('User' => $this->getUser()));

        return $this->render('food/index.html.twig', [
            'menustatFoods' => $menustatFoods,
        ]);
    }

    #[Route('/food/show/{strDataType}/{id}', methods: ["GET"],name:'FoodController__getFoodById')]
    public function show($strDataType,$id): Response
    {
        $food = NULL;
        switch($strDataType){
            case "menustat":
                $menustatRepo = $this->em->getRepository(MenustatFood::class);
                $food= $menustatRepo->find($id);
                break;
            case "usda_branded":
                break;
            case "usda_non-branded":
                break;
        }

        return $this->render('food/show.html.twig',[
            'food' => $food
        ]);
    }
    #[Route('/food/edit/{id}', methods: ["GET"],name:'FoodController__editFoodById')]
    public function edit($id,Request $request): Response
    {
        $repository = $this->em->getRepository(Food::class);

        $food = $repository->find($id);

        $form = $this->createForm(FoodFormType::class, $food);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            dd("OK");
        }


        return $this->render('food/edit.html.twig',[
            'food' => $food,
            'form' => $form->createView()
        ]);
    }
    #[Route('/food/create',name:'FoodController__createFood')]
    public function create(Request $request): Response
    {
        $food = new Food();
        $form = $this->createForm(FoodFormType::class,$food);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $newFood = $form->getData();
            $newFood->setUser($this->getUser());
            $this->em->persist($newFood);
            $this->em->flush();

            return $this->redirectToRoute('FoodController__getFoodById',['id'=>$newFood->getId()]);
        }

        return $this->render('food/create.html.twig',[
            'form' => $form->createView()
        ]);
    }

    #[Route('/food/delete/{id}',methods:['GET','DELETE'],name:'delete_food')]
    public function delete($id): Response
    {
        $repository= $this->em->getRepository(Food::class);
        $food = $repository->find($id);
        $this->em->remove($food);
        $this->em->flush();

        return $this->redirectToRoute('FoodController__index');
    }
}

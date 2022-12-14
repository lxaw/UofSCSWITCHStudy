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
use App\Entity\UsdaBrandedFood;
use App\Repository\UsdaBrandedFoodRepository;
use App\Entity\UsdaNonBrandedFood;
use App\Repository\UsdaNonBrandedFoodRepository;

use Symfony\Component\HttpFoundation\Request;
// use App\FoodDatabaseInteraction;


class FoodController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    function date_sort($objA,$objB){
        if($objA->getDate() == $objB->getDate()) return 0;
        return ($objA->getDate() < $objB->getDate()) ? -1:1;
    }

    #[Route('/food', name: 'FoodController__index')]
    public function index(): Response
    {
        $conn = $this->em->getConnection();
        $sqlMenustatDates = '
        select distinct date
        from (
            select date from menustat_food
            union
            select date from usda_branded_food
            union
            select date from usda_non_branded_food
        ) tableName
        order by date DESC
        ';
        $stmt = $conn->prepare($sqlMenustatDates);
        $dates = $stmt ->execute()->fetchAll();
        print_r($dates);

        return $this->render('food/index.html.twig', [
            'dates'=>$dates
        ]);
    }

    #[Route('/food/show/{strDataType}/{id}', methods: ["GET"],name:'FoodController__getFoodById')]
    public function show($strDataType,$id): Response
    {
        $food = NULL;
        switch($strDataType){
            case "MenustatFood":
                $menustatRepo = $this->em->getRepository(MenustatFood::class);
                $food= $menustatRepo->find($id);

                return $this->render('food/menustat/show.html.twig',[
                    'food' => $food
                ]);
            case "UsdaBrandedFood":
                $usdaBrandedRepo = $this->em->getRepository(UsdaBrandedFood::class);
                $food= $usdaBrandedRepo->find($id);
                
                return $this->render('food/usda_branded/show.html.twig',[
                    'food' => $food
                ]);
            case "UsdaNonBrandedFood":
                $usdaNonBrandedRepo= $this->em->getRepository(UsdaNonBrandedFood::class);
                $food= $usdaNonBrandedRepo->find($id);

                return $this->render('food/usda_non_branded/show.html.twig',[
                    'food' => $food
                ]);
        }
        return $this->redirectToRoute('FoodController__index');
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

    #[Route('/food/delete/{foodType}/{id}',methods:['GET','DELETE'],name:'delete_food')]
    public function delete($foodType,$id): Response
    {
        $repository = NULL;
        switch($foodType){
            case "MenustatFood" :
                $repository = $this->em->getRepository(MenustatFood::class);
                break;
            case "UsdaBrandedFood":
                $repository = $this->em->getRepository(UsdaBrandedFood::class);
                break;
            case "UsdaNonBrandedFood":
                $repository = $this->em->getRepository(UsdaN::class);
                break;
        }
        $food = $repository->find($id);
        $this->em->remove($food);
        $this->em->flush();

        return $this->redirectToRoute('FoodController__index');
    }
}

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


/*
TO DO:
Make sure that private routes are private for all users, ie
for displaying a food by id, make sure only that user who
created the food can do this.
*/

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

    #[Route('/food/date/{date}/',name:'FoodController__food-by-date')]
    public function byDate($date): Response
    {
        $menustatRepo = $this->em->getRepository(MenustatFood::class);
        $usdaBrandedRepo= $this->em->getRepository(UsdaBrandedFood::class);
        $usdaNonBrandedRepo= $this->em->getRepository(UsdaNonBrandedFood::class);

        $userFoods = array();

        // push the foods
        $userFoods = array_merge($userFoods,$menustatRepo->findBy([
            'User' =>  $this->getUser()
        ]));
        $userFoods = array_merge($userFoods,$usdaBrandedRepo->findBy([
            'User' =>  $this->getUser()
        ]));
        $userFoods = array_merge($userFoods,$usdaNonBrandedRepo->findBy([
            'User' =>  $this->getUser()
        ]));

        $foods = array();

        foreach($userFoods as $food){
            if($food->getDate()->format('Y-m-d') == $date){
                array_push($foods,$food);
            }
        }

        return $this->render('food/date/index.html.twig',[
            'foods'=>$foods,
            'date'=>$date
        ]);
    }

    #[Route('/food', name: 'FoodController__index')]
    public function index(): Response
    {
        $conn = $this->em->getConnection();
        $sqlMenustatDates = "
        select distinct substring_index(date,' ',1) as subDate
        from (
            select date from menustat_food
            union
            select date from usda_branded_food
            union
            select date from usda_non_branded_food
        ) tableName
        order by subDate DESC
        ";
        $stmt = $conn->prepare($sqlMenustatDates);
        $dates = $stmt ->execute()->fetchAll(\PDO::FETCH_COLUMN);

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

<?php

/*
Controll all the food-related views.
*/

namespace App\Controller;

// required installs
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

// food entities and repositorie containers
use App\Entity\MenustatFood;
use App\Repository\MenustatRepository;
use App\Entity\UsdaBrandedFood;
use App\Repository\UsdaBrandedFoodRepository;
use App\Entity\UsdaNonBrandedFood;
use App\Form\MenustatFoodFormType;
use App\Form\UsdaBrandedFoodFormType;
use App\Form\UsdaNonBrandedFoodFormType;
use App\Repository\UsdaNonBrandedFoodRepository;

use Symfony\Component\HttpFoundation\Request;

/*
TO DO:
Make sure that private routes are private for all users, ie
for displaying a food by id, make sure only that user who
created the food can do this.
*/

class FoodController extends AbstractController
{
    // The entity manager
    private $em;

    // Constructor
    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    // Sort by dates.
    //
    function date_sort($objA,$objB){
        if($objA->getDate() == $objB->getDate()) return 0;
        return ($objA->getDate() < $objB->getDate()) ? -1:1;
    }

    #[Route('/food/date/{date}/',name:'FoodController__food-by-date')]    
    /**
     * byDate
     * Show foods by date.
     * Get all the foods and display them to user.
     * 
     * @param  mixed $date
     * @return Response
     */
    public function byDate($date): Response
    {
        // get each repo
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

        // get the foods by specified date
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
    /**
     * index
     * Display a list of dates where food was entered
     * @return Response
     */
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
    /**
     * Show a specific food.
     * Given an id and datatype, show the food.
     *
     * @param  mixed $strDataType
     * @param  mixed $id
     * @return Response
     */
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
    #[Route('/food/update/{strDataType}/{id}', methods: ["GET","POST"],name:'FoodController__updateFoodById')]    
    /**
     * Show a specific food.
     * Given an id and datatype, show the food.
     *
     * @param  mixed $strDataType
     * @param  mixed $id
     * @return Response
     */
    public function update($strDataType,$id,Request $request): Response
    {
        $form = NULL;
        $foodRepo = NULL;
        $food = NULL;
        // path to render
        $strRenderPath = "/food/update.html.twig";

        switch($strDataType){
            case "MenustatFood":
                // get the food
                $foodRepo = $this->em->getRepository(MenustatFood::class);
                $food = $foodRepo->find($id);
                $form = $this->createForm(MenustatFoodFormType::class,$food);
                $form->handleRequest($request);
                if($form->isSubmitted() && $form->isValid()){
                    // To do!
                    // make so you can update all fields
                    $food->setDescription($form->get('Description')->getData());
                    $this->em->flush();
                    return $this->redirectToRoute('FoodController__getFoodById',array(
                        'strDataType' => $strDataType,
                        'id' => $id
                    ));
                }
                break;
            case "UsdaBrandedFood":
                $foodRepo= $this->em->getRepository(UsdaBrandedFood::class);
                $food = $foodRepo->find($id);
                $form = $this->createForm(UsdaBrandedFoodFormType::class,$food);
                $form->handleRequest($request);
                if($form->isSubmitted() && $form->isValid()){
                    $food->setDescription($form);
                    $this->em->flush();
                    return $this->redirectToRoute('FoodController__getFoodById',array(
                        'strDataType' => $strDataType,
                        'id'=>$id
                    ));
                }
                break;
            case "UsdaNonBrandedFood":
                $foodRepo= $this->em->getRepository(UsdaNonBrandedFood::class);
                $food = $foodRepo->find($id);
                $form = $this->createForm(UsdaNonBrandedFoodFormType::class,$food);
                $form->handleRequest($request);
                if($form->isSubmitted() && $form->isValid()){
                    $food->setDescription($form);
                    $this->em->flush();
                    return $this->redirectToRoute('FoodController__getFoodById',array(
                        'strDataType' => $strDataType,
                        'id'=>$id
                    ));
                }
                break;
        }


        return $this->render($strRenderPath,[
            'food' => $food,
            'form'=> $form->createView()
        ]);
    }
    private function checkUserOwnsFood(){
        // todo
        
    }
}

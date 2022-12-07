<?php

namespace App\Controller;

use App\Repository\NutrientRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Nutrient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\NutrientFormType;
use Symfony\Component\HttpFoundation\Request;
// food types
use App\Entity\MenustatFood;
use App\Entity\UsdaBrandedFood;
use App\Entity\UsdaNonBrandedFood;

// see: https://stackoverflow.com/questions/38317137/symfony2-how-to-call-php-function-from-controller
use App\FoodDatabaseInteraction\Classes\DBSearcher;
use App\FoodDatabaseInteraction\Classes\TemplateLoader;

class MLifeController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em){
        $this->em = $em; 
    }
    #[Route('', name: 'MLifeController__index')]
    public function index(): Response
    {
        // findAll() - SELECT * FROM nutrients
        // find(id) - SELECT * FROM nutrients WHERE id = id

        return $this->render('index.html.twig');
    }    
    #[Route('about/', name: 'MLifeController__about')]
    public function about(): Response
    {
        return $this->render('base/about.html.twig');
    }    

    #[Route('user/pie_charts/',name:"mLifeController__pie_charts")]
    public function pie_charts(): Response
    {
        return $this->render("pie_charts/index.html.twig");
    }

    // query the names of the database, get the initial search food info and the food image
    #[Route('ajax/queryNames',methods:["GET"],name:"queryNames")]
    public function queryNames(Request $request): Response
    {
        $dbSearcher = new DBSearcher();
        $templateLoader = new TemplateLoader();

        $strQuery = $request->get("strQuery");
        $strDBType = $request->get("strDBType");
        $intOffset = (int)$request->get("intOffset");

        $rootDir = $this->getParameter('kernel.project_dir');


        $strOut = "";

        switch($strDBType){
            case "menustat":
                $arrAllTemplateData = $dbSearcher->arrQueryMenustatNames($strQuery,$intOffset);
                foreach($arrAllTemplateData as $subArr){
                    $tempBody = $templateLoader->strTemplateToStr($subArr,$rootDir."/templates/pie_charts/menustat/table_entry.html");
                    $strOut = $strOut.$tempBody;
                }
                break;
            case "usda_branded":
                $arrAllTemplateData = $dbSearcher->arrQueryUSDABrandedNames($strQuery,$intOffset);
                foreach($arrAllTemplateData as $subArr){
                    $tempBody = $templateLoader->strTemplateToStr($subArr,$rootDir."/templates/pie_charts/usda_branded/table_entry.html");
                    $strOut = $strOut.$tempBody;
                }
                break;
            case "usda_non-branded":
                $arrAllTemplateData = $dbSearcher->arrQueryUSDANonBrandedNames($strQuery,$intOffset);
                foreach($arrAllTemplateData as $subArr){
                    $tempBody = $templateLoader->strTemplateToStr($subArr,$rootDir."/templates/pie_charts/usda_non_branded/table_entry.html");
                    $strOut = $strOut.$tempBody;
                }
                break;
            default:
                break;
        }

        return new Response($strOut);
    }
    
    #[Route('ajax/queryData',methods:["GET"],name:"queryData")] 
    public function queryData(Request $request): Response
    {
        $dbSearcher = new DBSearcher();
        $templateLoader = new TemplateLoader($this->getParameter('kernel.project_dir'));

        $strDbType = $request->get("strDbType");
        $strId = $request->get("strId");

        // return str
        $arrRet = array();

        switch($strDbType){
            case "menustat":
                $arrTemplateData = $dbSearcher->arrQueryMenustatDetail($strId);
                $strModal = $templateLoader->strPopulateMenustatModal($arrTemplateData);
                $arrRet = array(
                    "data_type"=>$arrTemplateData['data_type'],
                    'modal'=>$strModal
                );
                break;
            case "usda_branded":
                $arrTemplateData = $dbSearcher->arrQueryUsdaBrandedDetail($strId);
                $strModal = $templateLoader->strPopulateUsdaBrandedModal($arrTemplateData);
                $arrRet = array(
                    "data_type"=>$arrTemplateData['data_type'],
                    'modal'=>$strModal
                );
                break;
            case "usda_non-branded":
                $arrTemplateData = $dbSearcher->arrQueryUsdaNonBrandedDetail($strId);
                $strModal = $templateLoader->strPopulateUsdaNonBrandedModal($arrTemplateData);
                $arrRet = array(
                    "data_type"=>$arrTemplateData['data_type'],
                    'modal'=>$strModal
                );
                break;
            default:
                break;
        }
        return new JsonResponse($arrRet);
    }

    #[Route('ajax/submitFoods',methods:["POST"],name:"submitFoods")]
    public function submitFoods(Request $request): Response
    {
        $strId = $request->get("strId");
        $strDataType = $request->get("strDataType");
        $floatQty =  (float) $request->get("strQty");
        // need serving size

        // get food data
        //
        $dbSearcher = new DBSearcher();
        switch($strDataType){
            case "menustat":
                // TO DO:
                // NEED TO PASS SOME SERVING SIZE INTO THIS FUNCTION
                // ELSE YOU CANNOT KNOW HOW LARGE THE SERVING SIZE IS
                $arrData = $dbSearcher->arrQueryMenustatDetail($strId);
                $food = new MenustatFood();
                // get fat, calories, potassium, fiber
                $floatServingSize = (float) $arrData[0]['serving_size'];
                $floatServingSizeUnit = $arrData[0]['serving_size_unit'];
                $floatFatAmount = $floatQty * (float) $arrData[0]['fat_amount'];
                $floatProteinAmount = $floatQty * (float) $arrData[0]['protein_amount'];
                $floatEnergyAmount = $floatQty * (float) $arrData[0]['energy_amount'];
                $floatPotassiumAmount = $floatQty * (float) $arrData[0]['potassium_amount'];
                $floatCarbAmount = $floatQty * (float) $arrData[0]['carb_amount'];
                $floatFiberAmount = $floatQty * (float) $arrData[0]['fiber_amount'];
                $strRestaurant = $arrData['restaurant'];

                // set attributes
                $food->setUser($this->getUser());
                $food->setServingSize((float) $floatServingSize);
                $food->setServingSizeUnit($floatServingSizeUnit);
                $food->setFatAmount((float) $floatFatAmount);
                $food->setProteinAmount((float) $floatProteinAmount);
                $food->setEnergyAmount((float) $floatEnergyAmount);
                $food->setPotassiumAmount((float) $floatPotassiumAmount);
                $food->setCarbAmount((float) $floatCarbAmount);
                $food->setFiberAmount((float) $floatFiberAmount);
                $food->setDate(new \DateTime());
                $food->setMenustatId((int) $strId);
                $food->setRestaurant($strRestaurant);
                $food->setDescription($arrData['description']);

                $this->em->persist($food);
                $this->em->flush();
                break;

            case "usda_branded":
                break;
            case "usda_non_branded":
                break;
            default:
                break;
        }

        return new JsonResponse("done");
    }
}

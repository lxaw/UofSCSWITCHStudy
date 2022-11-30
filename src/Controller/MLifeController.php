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

    #[Route('ajax/queryNames',methods:["GET"],name:"search")]
    public function queryDb(Request $request): Response
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
    
}

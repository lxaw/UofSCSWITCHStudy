<?php

namespace App\Controller;

use App\Repository\NutrientRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Nutrient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\NutrientFormType;
use Symfony\Component\HttpFoundation\Request;


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

        $respository = $this->em->getRepository(Nutrient::class);

        $nutrients = $respository->findBy([],['id' => 'DESC']);

        // check if user is logged in
        if(!$this->getUser()){
            // user not logged in, redirect to login
            return $this->redirectToRoute("SecurityController__login");
        }

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

    #[Route('test/', name: 'MLifeController__test')]
    public function test(): Response
    {
        // findAll() - SELECT * FROM nutrients
        // find(id) - SELECT * FROM nutrients WHERE id = id

        $respository = $this->em->getRepository(Nutrient::class);

        $nutrients = $respository->findBy([],['id' => 'DESC']);

        // check if user is logged in
        if(!$this->getUser()){
            // user not logged in, redirect to login
            return $this->redirectToRoute("SecurityController__login");
        }

        return $this->render('nutrients/index.html.twig',[
            'nutrients' => $nutrients,
            ]
        );
    }    
    #[Route('/nutrients/delete/{id}',methods:['GET','DELETE'],name:'delete_movie')]
    public function delete($id): Response
    {
        $repository = $this->em->getRepository(Nutrient::class);
        $nutrient = $repository->find($id);
        $this->em->remove($nutrient);
        $this->em->flush();

        return $this->redirectToRoute('');
    }
    #[Route('/nutrients/create',name:'create_nutrient')]
    public function create(Request $request):Response
    {
        $nutrient = new Nutrient();
        $form = $this->createForm(NutrientFormType::class, $nutrient);

        $form -> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $newNutrient = $form->getData();

            $this->em->persist($newNutrient);
            $this->em->flush();
            // redirect user when persisted
            return $this->redirectToRoute('');
        }

        return $this->render('nutrients/create.html.twig',[
            'form' => $form->createView()
        ]);
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

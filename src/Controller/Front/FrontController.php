<?php

namespace App\Controller\Front;

use App\Entity\User;
use App\Entity\Client;
use App\Form\UserType;
use App\Form\ClientType;
use App\Repository\ConseillerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="app_front")
     */
    public function index(ConseillerRepository $conseillerRepository): Response
    {
        return $this->render('front/index.html.twig', [
            'conseillers' => $conseillerRepository->findAll(),
        ]);
    }
    /**
     * @Route("/inscription", name="app_inscription")
     */
    public function inscription(Request $request, UserPasswordHasherInterface $encoder, EntityManagerInterface $manager): Response
    {   

        if($this->getUser()){

            $this->addFlash("warning", "attention vous avez deja un compte.");

            return $this->redirectToRoute('app_profil');
        }
        $client = new Client ; //on cree un nouvel utilisateur
        $form = $this->createForm(ClientType::class, $client) ;//on cree un formulaire d'inscription 

        $form->handleRequest($request); //on stoque les donnees

        if($form->IsSubmitted()  && $form->IsValid()){
             // Hashage des données
             $password = $encoder->hashPassword($client, $client->getPassword());
             // On rentre le mdp hashé dans les données de l'utilisateur
             $client->setPassword( $password );
             // dd($user);
 
             // Envoyer en BDD 
             $manager->persist($client);
             $manager->flush();

             $this->addFlash("success", "Vous etes inscrit. vous pouvez maitenant vous connecter");
             return $this->redirectToRoute('app_login');
        }
        


        return $this->renderForm('front/inscription.html.twig',[
            'formClient' => $form
        ]) ;
    
    }
      
    /**
     * @Route("/profil", name="app_profil")
     * @IsGranted("ROLE_USER")
     */
    public function profil()
    {
        return $this->render('front/profil.html.twig');
    }

   
    // /**
    //  * @Route("/front_conseiller", name="front_conseiller")
    //  */
    // public function reservation(ConseillerRepository $conseillerRepository){

        
    //     return $this->render('front//index.html.twig', [
    //         'destinations' => $conseillerRepository->findAll(),
    //     ]);
    // }


}
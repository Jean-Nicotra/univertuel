<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\User\User;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProfileController extends AbstractController
{
	
	
    public function relations(Request $request)
    {
        $user = $this->getUser();
        
        return $this->render('memberArea/relations/homepage.html.twig', [
            'user' => $user      
        ]);
    }
    
    /*
    public function profile(Request $request)
    {
        $currentUser = $this->getUser();
        $userRepository = $this->getDoctrine()->getRepository('App\Entity\User\User');
        $form = $this->createForm(\App\Form\User\ProfileEditFormType::class, $currentUser);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($form->get('password')->getData() != null)
            {
                $currentUser->setPassword(
                    $passwordEncoder->encodePassword(
                        $currentUser,
                        $form->get('password')->getData()
                        ));
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($currentUser);
            $entityManager->flush();
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('member_homepage');
        }
        
        return $this->render('memberArea/profile/profile.html.twig', ['form' => $form->createView()]);
    }
    */
    
    public function profile($id)
    {
        
        $userRepository = $this->getDoctrine()->getRepository('App\Entity\User\User');
        $relation = $userRepository->find($id);
        
        return $this->render('memberArea/profile/profile.html.twig', ['relation' => $relation]  );
    }
    
    public function relationAdd($id)
    {
    	$userRepository = $this->getDoctrine()->getRepository('App\Entity\User\User');
    	$relation = $userRepository->find($id);
    	$user = $this->getUser();
    	$user->addRelation($relation);
    	
    	$em = $this->getDoctrine()->getManager();
    	$em->persist($user);
    	$em->flush();
	
    	
    	return $this->render('memberArea/profile/profile.html.twig', ['relation' => $relation]  );
    }
    
    public function findProfile(Request $request)
    {  
        $userRepository = $this->getDoctrine()->getRepository('App\Entity\User\User');
        $users = null;
        
        $form = $this->createFormBuilder()
        ->add('username', TextType::class)
        ->add('rechercher', SubmitType::class)
        ->getForm()
        ;
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $username = $form->getData()['username'];
            $users = $userRepository->findBy(['username' => $username]);
            
            return $this->render('memberArea/profile/form_find_profile.html.twig' , ['form' => $form->createView(), 'users' => $users]);
        }
        
        return $this->render('memberArea/profile/form_find_profile.html.twig' , ['form' => $form->createView(), 'users' => $users]);
    }
    
    //test pour identifier comment selectionner et afficher la liste des relations d'un utilisateur
    public function getRelations()
    {
        $user = $this->getUser();
        $users = $user->getRelations();
        
        return $this->render('memberArea/profile/profiles.html.twig' , ['users' => $users]);
    }
  
}

   


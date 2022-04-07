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
    public function profile(Request $request)
    {
        $user = new User();
        $userRepository = $this->getDoctrine()->getRepository('App\Entity\User\User');
        $user = $userRepository->find($this->getUser()->getId());
        
        $form = $this->createFormBuilder($user)
        ->add('email', EmailType::class)
        ->add('password', PasswordType::class)
        ->add('username', TextType::class)
        ->add('submit', SubmitType::class, ['label' => 'valider'])
        ->getForm();
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($currentUser);
            $entityManager->flush();
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('member_homepage');
        }
        
        return $this->render('memberArea/profile/profile.html.twig', ['form' => $form->createView()]);
    }
}

   


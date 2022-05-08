<?php

/*******************************************************************************************************************
 name      : RegistrationController.php
 Role      : Controller for user registration
 author    : tristesire
 date      : 18/03/2022
 *******************************************************************************************************************/

namespace App\Controller\User;

use App\Entity\User\User;
use App\Form\User\RegistrationFormType;
use App\Security\TokenAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class RegistrationController extends AbstractController
{
    /**
     * role: display form registration and register user
     * 
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param GuardAuthenticatorHandler $guardHandler
     * @param SluggerInterface $slugger
     * @param TokenAuthenticator $authenticator
     * @return Response
     */
    public function registration(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, 
        SluggerInterface $slugger, TokenAuthenticator $authenticator): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'main' // firewall name in security.yaml
            );
        }

        return $this->render('user/registration/registration.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
    /*

    public function profile (Request $request, UserPasswordEncoderInterface $passwordEncoder)
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
        
        return $this->render('user/registration/profile.html.twig', ['form' => $form->createView()]);
    }
    
    public function getUsersGroup (Request $request)
    {
        $group = new Group();
        $form = $this->createForm(\App\Form\User\GroupFormType::class, $group);
        $userRepository = $this->getDoctrine()->getRepository('App\Entity\User\User');
        $groupRepository = $this->getDoctrine()->getRepository('App\Entity\User\Group');
        $form->handleRequest($request);
        $users = null;
        if($form->isSubmitted() && $form->isValid())
        {
            $group = $form->get('name')->getData();
            $users = $userRepository->findBy(['group' => $group]);
            
            return $this->render('user/registration/usersGroupList.html.twig', ['users' => $users,'form' => $form->createView() ]);
        }

        return $this->render('user/registration/usersGroupList.html.twig', ['users' => $users, 'form' => $form->createView()]);
    }

    public function userPermissions($id, Request $request)
    {
        $userRepository = $this->getDoctrine()->getRepository('App\Entity\User\User');
        $user = $userRepository->find($id);
        $form = $this->createForm(PermissionFormType::class,$user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $group = new Group();
            $group = $form->get('group')->getData();
            $user->setRoles($group->getRole());
            $entityManager->persist($user);
            $entityManager->flush();
        }
        return $this->render('user/registration/userPermissions.html.twig', ['form' => $form->createView()]);
    }
    */
}

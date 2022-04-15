<?php

/*******************************************************************************************************************
    name      : PlatformController.php
    Role      : Controller for all platform objects and views
    author    : tristesire
    date      : 18/03/2022
*******************************************************************************************************************/

namespace App\Controller\Game;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Game\Game;
use Symfony\Component\HttpFoundation\Request;
use App\Form\Game\GameFormType;



class GameController extends AbstractController
{

   public function new(Request $request)
   {
       $game = new Game();
       $game->setName("jean");
       $form = $this->createForm(GameFormType::class, $game);
       
       $form->handleRequest($request);
       
       if ($form->isSubmitted() && $form->isValid())
       {
           //$game = $form->getData();
           $entityManager = $this->getDoctrine()->getManager();
           $entityManager->persist($game);
           
           $entityManager->flush();
           // do anything else you need here, like send an email
           
           return $this->redirectToRoute('member_homepage');
       }
       
       return $this->render('memberArea/admin/game/form_game.html.twig', ['form' => $form->createView(),]);
   }
   
   public function games()
   {
       $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
       $games = $gameRepository->findAll();
       
       return $this->render('platform/game/available_games.html.twig', ['games' => $games]);
   }
}

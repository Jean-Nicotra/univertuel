<?php

/*******************************************************************************************************************
    name      : GameController.php
    Role      : Controller for all game objects and views : by game, it is intended generic games, not a 
                specific game
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

    /**
     * role: this is entend to create a new game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
   public function new(Request $request)
   {
       $game = new Game();
       $form = $this->createForm(GameFormType::class, $game);
       
       $form->handleRequest($request);
       
       if ($form->isSubmitted() && $form->isValid())
       {
           $entityManager = $this->getDoctrine()->getManager();
           $entityManager->persist($game);
           $entityManager->flush();
           
           return $this->redirectToRoute('member_homepage');
       }
       
       return $this->render('memberArea/admin/game/form_game.html.twig', ['form' => $form->createView(),]);
   }
   
   /**
    * role: display the complete list of available games
    * 
    * @return \Symfony\Component\HttpFoundation\Response
    */
   public function games()
   {
       $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
       $games = $gameRepository->findAll();
       
       return $this->render('platform/game/available_games.html.twig', ['games' => $games]);
   }
}

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
use App\Entity\Game\Game;
use Symfony\Component\HttpFoundation\Request;
use App\Form\Game\GameFormType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\FileException;



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
       $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
       $games = $gameRepository->findAll();
       
       $game = new Game();
       $form = $this->createForm(GameFormType::class, $game);
       
       $form->handleRequest($request);
       
       if ($form->isSubmitted() && $form->isValid())
       {
           /** @var UploadedFile $image */
           $imageFile = $form->get('image')->getData();
           
           // this condition is needed because the 'brochure' field is not required
           // so the PDF file must be processed only when a file is uploaded
           if ($imageFile) {
               $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
               // this is needed to safely include the file name as part of the URL
               //$safeFilename = $slugger->slug($originalFilename);
               $newFilename = $originalFilename.'-'.uniqid().'.'.$imageFile->guessExtension();
               $game->setImage($newFilename);
               // Move the file to the directory where brochures are stored
               try
               {
                   $imageFile->move(
                       $this->getParameter('upload_directory'),
                       $newFilename
                       );
               }
               catch (FileException $e)
               {
                   // ... handle exception if something happens during file upload
               }
               
           }
           
           
           $entityManager = $this->getDoctrine()->getManager();
           $entityManager->persist($game);
           $entityManager->flush();
           
           return $this->redirectToRoute('member_homepage');
       }
       
       return $this->render('memberArea/admin/game/form_game.html.twig', ['form' => $form->createView(),'games' => $games]);
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
   
   /**
    * role: call the method controller to setup the game components for the target Game
    * 
    * @param Game $id
    * @return \Symfony\Component\HttpFoundation\RedirectResponse
    */
   public function setup($id)
   {
       $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
       
       $game = $gameRepository->find($id);
       $route = "setup_".$game->getInterfaceCode();
       
       return $this->redirectToRoute($route);
   }
   
   
   
   
}

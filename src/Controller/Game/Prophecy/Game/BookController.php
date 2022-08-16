<?php

namespace App\Controller\Game\Prophecy\Game;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Form\Game\Prophecy\Game\ProphecyBookFormType;
use App\Entity\Game\Prophecy\Game\ProphecyBook;

class BookController extends AbstractController
{

    public function addProphecyBook(Request $request, $role): Response
    {
        $title = "Nouveau livre";
        $book = new ProphecyBook();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $prophecy = $gameRepository->findOneBy(['code' => 'prophecy']);
        $book->setGame($prophecy);
        
        $form = $this->createForm(ProphecyBookFormType::class, $book);      
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($book);
            $entityManager->flush();
            
            //return to admin create content Prophecy 
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
                'form' =>$form->createView(),
                'title' => $title,
                'games' => $games,
        ]);
        

    }
}

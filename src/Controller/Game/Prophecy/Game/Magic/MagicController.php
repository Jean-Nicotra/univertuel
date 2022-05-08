<?php

/*******************************************************************************************************************
 name      : MagicController.php
 Role      : Controller for all caste objects and views for Prophecy game
 author    : tristesire
 date      : 18/03/2022
 *******************************************************************************************************************/

namespace App\Controller\Game\Prophecy\Game\Magic;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Game\Prophecy\Game\Magic\ProphecyDiscipline;
use App\Form\Game\Prophecy\Game\Magic\ProphecyDisciplineFormType;
use App\Entity\Game\Prophecy\Game\Magic\ProphecySphere;
use App\Form\Game\Prophecy\Game\Magic\ProphecySphereFormType;
use App\Entity\Game\Prophecy\Game\Magic\ProphecySpell;
use App\Form\Game\Prophecy\Game\Magic\ProphecySpellFormType;

class MagicController extends AbstractController
{
    /**
     * role: display the form to create new magic discipline in Prophecy game
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newDiscipline(Request $request)
    {
        $title = "Nouvelle Discipline";
        $discipline = new ProphecyDiscipline();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Magic\ProphecyDiscipline');
        $items = $itemRepository->findAll();
        
        $form = $this->createForm(ProphecyDisciplineFormType::class, $discipline);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-discipline')
            {
                $discipline->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($discipline);
            $entityManager->flush();
            
            //return to create content Prophecy if ok
            return $this->redirectToRoute('setup_Prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'items' => $items, 
            'games' => $games,
        ]);
    }
    
    /**
     * role: display the form to create new magic sphere in Prophecy game
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newSphere(Request $request)
    {
        $title = "Nouvelle Sphere";
        $sphere = new ProphecySphere();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Magic\ProphecySphere');
        $items = $itemRepository->findAll();
        
        $form = $this->createForm(ProphecySphereFormType::class, $sphere);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-sphere')
            {
                $sphere->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sphere);          
            $entityManager->flush();
            
            //return to create content Prophecy if ok
            return $this->redirectToRoute('setup_Prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'items' => $items,
            'games' => $games,
        ]);
    }
    
    /**
     * role: display the form to create new magic spell in Prophecy game
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newSpell(Request $request)
    {
        $title = "Nouveau sort";
        $spell = new ProphecySpell();
        
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $games = $gameRepository->findAll();
        
        $itemRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Magic\ProphecySpell');
        $items = $itemRepository->findAll();
        
        $form = $this->createForm(ProphecySpellFormType::class, $spell);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-spell')
            {
                $spell->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($spell);
            $entityManager->flush();
            
            //return to create content Prophecy if ok
            return $this->redirectToRoute('setup_Prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/create_component.html.twig', [
            'form' =>$form->createView(),
            'title' => $title,
            'items' => $items,
            'games' => $games,
        ]);
    }
}

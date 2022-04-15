<?php

/*******************************************************************************************************************
 name      : CasteController.php
 Role      : Controller for all caste objects and views for Prophecy game
 author    : tristesire
 date      : 18/03/2022
 *******************************************************************************************************************/

namespace App\Controller\Game\Prophecy\Game\Caste;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyCaste;
use App\Form\Game\Prophecy\Game\Caste\CasteFormType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyBenefit;
use App\Form\Game\Prophecy\Game\Caste\ProphecyFormBenefitType;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyStatus;
use App\Form\Game\Prophecy\Game\Caste\ProphecyStatusFormType;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyProhibited;
use App\Form\Game\Prophecy\Game\Caste\ProphecyFormProhibitedType;
use App\Entity\Game\Prophecy\Game\Caste\prophecyFavour;
use App\Form\Game\Prophecy\Game\Caste\ProphecyFormFavourType;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyTechnic;
use App\Form\Game\Prophecy\Game\Caste\ProphecyTechnicFormType;

class CasteController extends AbstractController
{
    /**
     * role: display the form to create a new caste in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newCaste(Request $request)
    {
        $title = "Nouvelle caste";
        $caste = new ProphecyCaste();
        $form = $this->createForm(CasteFormType::class, $caste);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($caste);
            $entityManager->flush();
            
            //return to create content Prophecy if ok
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]); 
    }
    
    /**
     * role: display the form to create a new caste status in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newStatus(Request $request)
    {
        $title = "nouveau status de caste";
        $status = new ProphecyStatus();
        $form = $this->createForm(ProphecyStatusFormType::class, $status);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($status);   
            $entityManager->flush();
            
            //return to create content Prophecy if ok
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
    
    /**
     * role: display the form to create a new benefit for a caste in Prophecy Game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newBenefit(Request $request)
    {
        $title = "nouveau bénéfice de caste";
        $benefit = new ProphecyBenefit();
        $form = $this->createForm(ProphecyFormBenefitType::class, $benefit);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($benefit);
            $entityManager->flush();
                      
            //return to create content Prophecy if ok
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
    
    /**
     * role: display the create a new prohibited item for a caste in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newProhibited(Request $request)
    {
        $title = "nouvel interdit de caste";
        $prohibited = new ProphecyProhibited();
        $form = $this->createForm(ProphecyFormProhibitedType::class, $prohibited);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($prohibited);
            $entityManager->flush();
            
            //return to create content Prophecy if ok
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
   
    /**
     * role: display the for to create a new favour for a caste in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newFavour(Request $request)
    {
        $title = "nouveau privilège de caste";
        $favour = new prophecyFavour();
        $form = $this->createForm(ProphecyFormFavourType::class, $favour);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($favour);
            $entityManager->flush();
            
            //return to create content Prophecy if ok
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
    
    /**
     * role: display the form to create a new technic for a caste in Prophecy game
     * 
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newTechnic(Request $request)
    {
        $title = "nouvelle technique de caste";
        $technic = new ProphecyTechnic();
        $form = $this->createForm(ProphecyTechnicFormType::class, $technic);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if($request->getPathInfo() == '/admin/new-technic')
            {
                $technic->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($technic);
            $entityManager->flush();
            
            //return to create content Prophecy if ok
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
}

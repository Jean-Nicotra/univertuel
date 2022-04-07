<?php

namespace App\Controller\Game\Prophecy\Game\World;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Game\Prophecy\Game\World\ProphecyCurrency;
use App\Form\Game\Prophecy\Game\World\ProphecyCurrencyFormType;
use App\Entity\Game\Prophecy\Game\World\ProphecyNation;
use App\Form\Game\Prophecy\Game\World\ProphecyNationFormType;

class WorldController extends AbstractController
{
    public function newCurrency(Request $request)
    {
        $title = "Nouvelle monnaie";
        $currency = new ProphecyCurrency();
        $form = $this->createForm(ProphecyCurrencyFormType::class, $currency);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-currency')
            {
                $currency->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($currency);
            
            $entityManager->flush();
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
    
    public function newNation(Request $request)
    {
        $title = "Nouvelle nation";
        $nation = new ProphecyNation();
        $form = $this->createForm(ProphecyNationFormType::class, $nation);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-nation')
            {
                $nation->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($nation);
            
            $entityManager->flush();
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
}

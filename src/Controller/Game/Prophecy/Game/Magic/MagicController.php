<?php

namespace App\Controller\Game\Prophecy\Game\Magic;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Game\Prophecy\Game\Magic\ProphecyDiscipline;
use App\Form\Game\Prophecy\Game\Magic\ProphecyDisciplineFormType;
use App\Entity\Game\Prophecy\Game\Magic\ProphecySphere;
use App\Form\Game\Prophecy\Game\Magic\ProphecySphereFormType;
use App\Entity\Game\Prophecy\Game\Magic\ProphecySpell;
use App\Form\Game\Prophecy\Game\Magic\ProphecySpellFormType;

class MagicController extends AbstractController
{
    public function newDiscipline(Request $request)
    {
        $title = "Nouvelle Discipline";
        $discipline = new ProphecyDiscipline();
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
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
    
    public function newSphere(Request $request)
    {
        $title = "Nouvelle Sphere";
        $sphere = new ProphecySphere();
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
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
    
    public function newSpell(Request $request)
    {
        $title = "Nouveau sort";
        $spell = new ProphecySpell();
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
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
}

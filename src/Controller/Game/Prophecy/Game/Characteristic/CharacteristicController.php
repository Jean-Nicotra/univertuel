<?php

namespace App\Controller\Game\Prophecy\Game\Characteristic;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyAdvantageCategoryFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantageCategory;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAdvantage;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyAdvantageFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyCaracteristic;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyCaracteristicFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAge;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyAgeFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyDisadvantage;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyDisadvantageFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyOmen;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyOmenFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyMajorAttribute;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyMajorAttributeFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyMinorAttribute;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyMinorAttributeFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkillCategory;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecySkillCategoryFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyTendency;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecyTendencyFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkill;
use App\Form\Game\Prophecy\Game\Characteristic\ProphecySkillFormType;

class CharacteristicController extends AbstractController
{
       
    public function newAdvantageCategory(Request $request)
    {
        $title = "Nouvelle catégorie d'avantage et inconvénient";
        $category = new ProphecyAdvantageCategory();
        $form = $this->createForm(ProphecyAdvantageCategoryFormType::class, $category);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            
            $entityManager->flush();
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
    
    public function newAdvantage(Request $request)
    {
        $title = "Nouvel avantage";
        $advantage = new ProphecyAdvantage();
        $form = $this->createForm(ProphecyAdvantageFormType::class, $advantage);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($advantage);
            
            $entityManager->flush();
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
    
    public function newCaracteristic(Request $request)
    {
        $title = "Nouvelle caractéristique";
        $caracteristic = new ProphecyCaracteristic();
        $form = $this->createForm(ProphecyCaracteristicFormType::class, $caracteristic);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {                                 
            if ($request->getPathInfo() == '/admin/new-caracteristic')
            {
                $caracteristic->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($caracteristic);
            
            $entityManager->flush();
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
    
    public function newAge(Request $request)
    {
        $title = "Nouvel âge";
        $age = new ProphecyAge();
        $form = $this->createForm(ProphecyAgeFormType::class, $age);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-age')
            {
                $age->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($age);
            
            $entityManager->flush();
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
    
    public function newDisadvantage(Request $request)
    {
        $title = "Nouvel inconvénient";
        $disadvantage = new ProphecyDisadvantage();
        $form = $this->createForm(ProphecyDisadvantageFormType::class, $disadvantage);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-disadvantage')
            {
                $disadvantage->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($disadvantage);
            
            $entityManager->flush();
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
    
    public function newOmen(Request $request)
    {
        $title = "Nouvel augure";
        $omen = new ProphecyOmen();
        $form = $this->createForm(ProphecyOmenFormType::class, $omen);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($omen);
            
            $entityManager->flush();
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
    
    
    public function newMajorAttribute(Request $request)
    {
        $title = "Nouvel attribut majeur";
        $majorAttribute = new ProphecyMajorAttribute();
        $form = $this->createForm(ProphecyMajorAttributeFormType::class, $majorAttribute);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-major-attribute')
            {
                $majorAttribute->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($majorAttribute);
            
            $entityManager->flush();
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
    
    public function newMinorAttribute(Request $request)
    {
        $title = "Nouvel attribut mineur";
        $minorAttribute = new ProphecyMinorAttribute();
        $form = $this->createForm(ProphecyMinorAttributeFormType::class, $minorAttribute);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-minor-attribute')
            {
                $minorAttribute->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($minorAttribute);
            
            $entityManager->flush();
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
    
    public function newSkillCategory(Request $request)
    {
        $title = "Nouvelle catégorie de compétence";
        $category = new ProphecySkillCategory();
        $form = $this->createForm(ProphecySkillCategoryFormType::class, $category);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            
            $entityManager->flush();
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
    
    public function newTendency(Request $request)
    {
        $title = "Nouvelle tendence";
        $tendency = new ProphecyTendency();
        $form = $this->createForm(ProphecyTendencyFormType::class, $tendency);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-tendency')
            {
                $tendency->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tendency);
            
            $entityManager->flush();
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
    
    public function newSkill(Request $request)
    {
        $title = "Nouvelle compétence";
        $skill = new ProphecySkill();
        $form = $this->createForm(ProphecySkillFormType::class, $skill);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            if ($request->getPathInfo() == '/admin/new-skill')
            {
                $skill->setCampaign(null);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($skill);
            
            $entityManager->flush();
            // do anything else you need here, like send an email
            
            return $this->redirectToRoute('setup_prophecy');
        }
        
        return $this->render('memberArea/admin/game/prophecy/caste/castes.html.twig', ['form' =>$form->createView(), 'title' => $title]);
    }
}

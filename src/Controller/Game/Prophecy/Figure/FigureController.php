<?php

/*******************************************************************************************************************
 name      : FigureController.php
 Role      : Controller for all figure routes in Prophecy game only. Please, create one FigureController by game
 author    : tristesire
 date      : 18/03/2022
 *******************************************************************************************************************/

namespace App\Controller\Game\Prophecy\Figure;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\Game\Prophecy\Figure\ProphecyFigureRepository;
use App\Entity\User\User;
use App\Entity\Game\Prophecy\Figure\ProphecyFigure;
use App\Form\Game\Prophecy\Figure\ProphecyFigureStepOneFormType;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureCaracteristic;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureMajorAttribute;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureMinorAttribute;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureTendency;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureSkill;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureWound;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureDiscipline;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureSphere;

class FigureController extends AbstractController
{
    public function figures(Request $request)
    {
        $user = $this->getUser();
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figures = $figureRepository->findBy(['owner' => $user]);
        
        return $this->render('memberArea/figure/figures.html.twig', ['figures' => $figures]);
    }
    
    /**
     * Role : Init figure database : figureWound, figureMajorAttribute...
     * @param Request $request
     * @param ProphecyFigure $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newFigure(Request $request, $id)
    {
        $user = $this->getUser();     
        
        //figureCaracteristics
        $caracteristicRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyCaracteristic');
        $caracteristics = $caracteristicRepository->findAll();
        
        //figureMajorAttribute
        $majorAttributeRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyMajorAttribute');
        $majorAttributes = $majorAttributeRepository->findAll();

        //figureMinorAttribute
        $minorAttributeRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyMinorAttribute');
        $minorAttributes = $minorAttributeRepository->findAll();
        
        //figureTendency
        $tendencyRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyTendency');
        $tendencies = $tendencyRepository->findAll();
        
        //figureSkill
        $skillRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkill');
        $skills = $skillRepository->findAll();
        
        //figureWound
        $woundRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyWound');
        $wounds = $woundRepository->findAll();
        
        //figureDiscipline
        $disciplineRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Magic\ProphecyDiscipline');
        $disciplines = $disciplineRepository->findAll();
        
        //figureSphere
        $sphereRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Magic\ProphecySphere');
        $spheres = $sphereRepository->findAll();
        
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Campaign\Campaign');
        $campaign = $campaignRepository->find($id);
        $figure = new ProphecyFigure();
        $figure->setOwner($user);
        $figure->setCampaign($campaign);
        $figure->setIsFinish(false);
        
        $form = $this->createForm(ProphecyFigureStepOneFormType::class, $figure);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($figure);
            
            //setup figureCaracteristic
            foreach ($caracteristics as $caracteristic)
            {
                $figureCaracteristic = new ProphecyFigureCaracteristic();
                $figureCaracteristic->setCaracteristic($caracteristic);
                $figureCaracteristic->setFigure($figure);
                $em->persist($figureCaracteristic);
                $em->flush();
            }
            
            //setup majorAttribute
            foreach ($majorAttributes as $majorAttribute)
            {
                $figureMajorAttribute = new ProphecyFigureMajorAttribute();
                $figureMajorAttribute->setFigure($figure);
                $figureMajorAttribute->setAttribute($majorAttribute);
                $em->persist($figureMajorAttribute);
                $em->flush($figureMajorAttribute);
            }
            
            //setup minorAttribute
            foreach($minorAttributes as $minorAttribute)
            {
                $figureMinorAttribute = new ProphecyFigureMinorAttribute();
                $figureMinorAttribute->setFigure($figure);
                $figureMinorAttribute->setMinorAttribute($minorAttribute);
                $em->persist($figureMinorAttribute);
                $em->flush($figureMinorAttribute);
            }
            
            //setup tendency
            foreach($tendencies as $tendency)
            {
                $figureTendency = new ProphecyFigureTendency();
                $figureTendency->setFigure($figure);
                $figureTendency->setTendency($tendency);
                $em->persist($figureTendency);
                $em->flush($figureTendency);
            }
            
            //setup skill
            foreach($skills as $skill)
            {
                $figureSkill = new ProphecyFigureSkill();
                $figureSkill->setFigure($figure);
                $figureSkill->setSkill($skill);
                $em->persist($figureSkill);
                $em->flush($figureSkill);
            }
            
            //setup wound
            foreach($wounds as $wound)
            {
                $figureWound = new ProphecyFigureWound();
                $figureWound->setFigure($figure);
                $figureWound->setWound($wound);
                $em->persist($figureWound);
                $em->flush($figureWound);
            }
            
            //setup discipline
            foreach($disciplines as $discipline)
            {
                $figureDiscipline = new ProphecyFigureDiscipline();
                $figureDiscipline->setFigure($figure);
                $figureDiscipline->setDiscipline($discipline);
                $em->persist($figureDiscipline);
                $em->flush($figureDiscipline);
            }
            
            //setup discipline
            foreach($spheres as $sphere)
            {
                $figureSphere = new ProphecyFigureSphere();
                $figureSphere->setFigure($figure);
                $figureSphere->setSphere($sphere);
                $em->persist($figureSphere);
                $em->flush($figureSphere);
            }
            
            $em->flush();
        
            $figures = $figureRepository->findBy(['owner' => $user]);
            
            return $this->redirectToRoute('figures', ['figures' => $figures]);
        }
        
        return $this->render('memberArea/figure/form_new_figure.html.twig', ['form' => $form->createView()]);
    }
    
    
    /**
     * 
     * Figure $id
     * @return \Symfony\Component\HttpFoundation\Response
     * role: display caracteristics figure page
     */
    public function figure($id)
    {
        $user = $this->getUser();
        
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $skillCategoryRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkillCategory');
        $skillcategories = $skillCategoryRepository->findAll();
        
        //add caracteristics to figure's view
        $figureCaracteristicRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureCaracteristic');
        $caracteristics = $figureCaracteristicRepository->findBy(['figure' => $figure]);
     
        //add majorAttributes to figure's view
        $figureMajorAttributeRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureMajorAttribute');
        $majorAttributes = $figureMajorAttributeRepository->findBy(['figure' => $figure]);
        
        //add minorAttributes to figure's view
        $figureMinorAttributeRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureMinorAttribute');
        $minorAttributes = $figureMinorAttributeRepository->findBy(['figure' => $figure]);
        
        //add tendencies to figure's view
        $figureTendencyRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureTendency');
        $tendencies = $figureTendencyRepository->findBy(['figure' => $figure]);
        
        //add skills to figure's view
        $figureSkillRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureSkill');
        $skills = $figureSkillRepository->findBy(['figure' => $figure], []);
        
        //add wounds to figure's view
        $figureWoundRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureWound');
        $wounds = $figureWoundRepository->findBy(['figure' => $figure], []);
        
        return $this->render('memberArea/figure/figure.html.twig', 
            [
                'figure' => $figure, 
                'caracteristics' => $caracteristics, 
                'majorAttributes' => $majorAttributes,
                'minorAttributes' => $minorAttributes,
                'tendencies' => $tendencies,
                'skills' => $skills,
                'skillCategories' => $skillcategories,
                'wounds' => $wounds,
            ]);
    }
    
    public function figureMagic($id)
    {
        
        $user = $this->getUser();
        
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
                                                                                             
        $figureDisciplineRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureDiscipline');
        $disciplines = $figureDisciplineRepository->findAll();
        
        $figureSphereRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureSphere');
        $spheres = $figureSphereRepository->findAll();
        
        return $this->render('memberArea/figure/figure_magic.html.twig',
            [
                'figure' => $figure, 
                'disciplines' => $disciplines,
                'spheres' => $spheres,
            ]);
    }
    
    public function figureEquipment($id)
    {
        return $this->render('memberArea/figure/figure_equipment.html.twig');
    }
}
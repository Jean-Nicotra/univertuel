<?php

/*******************************************************************************************************************
 name      : FigureController.php
 Role      : Controller for all figure routes in Prophecy game only. Please, create one FigureController by game
 author    : tristesire
 date      : 18/03/2022
 *******************************************************************************************************************/

namespace App\Controller\Game\Prophecy\Figure;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Game\Prophecy\Figure\ProphecyFigure;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureCaracteristic;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureMajorAttribute;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureMinorAttribute;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureTendency;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureSkill;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureWound;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureDiscipline;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureSphere;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureCurrency;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureCaracteristicsFormType;
use App\Form\Game\Prophecy\Figure\ProphecyCreateFigureFormType;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureMajorAttributesFormType;
use App\Entity\Game\Figure;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureCasteFormType;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureAgeFormType;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureBackgroundFormType;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureOmenFormType;
use Symfony\Component\HttpFoundation\Response;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureMinorAttributesFormType;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureNationFormType;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureProhibitedFormType;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureTendenciesFormType;
use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyModifierByAge;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureDisadvantagesFormType;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureDisadvantage;
use App\Form\Game\Prophecy\Figure\EditProphecyDisadvantageFormType;
use Doctrine\Common\Collections\ArrayCollection;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureSkillFormType;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureSpheresFormType;
use App\Form\Game\Prophecy\Figure\InitialiseProphecyFigureReputationType;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureProhibited;
use App\Form\Game\Prophecy\Figure\AddProphecyFigureProhibitedFormType;
use App\Form\Game\Prophecy\Figure\AddProphecyFigureDisadvantageFormType;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureAdvantage;
use App\Form\Game\Prophecy\Figure\AddProphecyFigureAdvantageFormType;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyInitialCurrencies;
use App\Entity\Game\Roll;
use App\Entity\Game\Prophecy\Game\Magic\ProphecySpell;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureSpell;
use App\Form\Game\Prophecy\Figure\AddProphecyFigureMageInitialSpellFormType;
use App\Entity\Game\Prophecy\Game\Caste\ProphecyFavour;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureFavour;
use App\Form\Game\Prophecy\Figure\AddProphecyFigureInitialFavourFormType;
use App\Form\Game\Prophecy\Figure\AddProphecyFigureWeaponFormType;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureWeapon;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureArmor;
use App\Form\Game\Prophecy\Figure\AddProphecyFigureArmorFormType;
use App\Entity\Game\Prophecy\Figure\ProphecyFigureShield;
use App\Form\Game\Prophecy\Figure\AddProphecyFigureShieldFormType;


class FigureController extends AbstractController
{
    public function figures(Request $request)
    {
        $user = $this->getUser();
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figures = $figureRepository->findBy(['owner' => $user]);
        
        return $this->render('memberArea/figure/prophecy/figures.html.twig', [
            'figures' => $figures,
        ]);
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
        $interfaceFigure = new Figure();
        
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
        
        //figureCurrency
        $currencyRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\World\ProphecyCurrency');
        $currencies = $currencyRepository->findAll();
        
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Campaign');
        $campaign = $campaignRepository->find($id);
        $figure = new ProphecyFigure();
        $figure->setOwner($user);
        $figure->setCampaign($campaign);
        //$figure->setXperience(70);	//MODIFIER AVEC POINTS DE DEPARTS EN FONCTION DE L AGE
        
        $form = $this->createForm(ProphecyCreateFigureFormType::class, $figure);
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
                $figureMajorAttribute->setMajorAttribute($majorAttribute);
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
            
            //setup currency
            foreach($currencies as $currency)
            {
                $figureCurrency = new ProphecyFigureCurrency();
                $figureCurrency->setFigure($figure);
                $figureCurrency->setCurrency($currency);
                if($currency->getName() == "bronze")
                {
                    $figureCurrency->setValue(10);
                }
                $em->persist($figureCurrency);
                $em->flush($figureCurrency);
            }
            
            $em->flush();
        
            $figures = $figureRepository->findBy(['owner' => $user]);
            
            //add to App\Entity\Game\Figure
            $interfaceFigure->setCampaign($campaign);
            $interfaceFigure->setFigure($figure->getId());
            $interfaceFigure->setOwner($user);
            $interfaceFigure->setName($figure->getName());
            $em->persist($interfaceFigure);
            $em->flush();
            
            return $this->redirectToRoute('figures', ['figures' => $figures]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_new_figure.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
    
    /**
     * 
     * Figure $id
     * @return \Symfony\Component\HttpFoundation\Response
     * role: display caracteristics figure page
     */
    public function figureCaracteristics($id): Response
    {

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
        $skills = $figureSkillRepository->findBy(['figure' => $figure]);
        
        //add spheres to figure's view
        $figureSphereRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureSphere');
        $spheres = $figureSphereRepository->findBy(['figure' => $figure]);
        
        //add wounds to figure's view
        $figureWoundRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureWound');
        $wounds = $figureWoundRepository->findBy(['figure' => $figure]);
        
        
        return $this->render('memberArea/figure/prophecy/figure_caracteristics.html.twig', [
            'figure' => $figure,
            'caracteristics' => $caracteristics,
            'majorAttributes' => $majorAttributes,
            'minorAttributes' => $minorAttributes,
            'tendencies' => $tendencies,
            'skills' => $skills,
            'spheres' => $spheres,
            'skillCategories' => $skillcategories,
            'wounds' => $wounds,
        ]);

    }
    
    
    public function figureMagic($id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
                                                                                             
        $figureDisciplineRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureDiscipline');
        $disciplines = $figureDisciplineRepository->findBy(['figure' => $figure]);
        
        $figureSphereRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureSphere');
        $spheres = $figureSphereRepository->findBy(['figure' => $figure]);
        
        $figureSpellRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureSpell');
        $spells = $figureSpellRepository->findBy(['figure' => $figure]);
        
        return $this->render('memberArea/figure/prophecy/figure_magic.html.twig',[
                'figure' => $figure, 
                'disciplines' => $disciplines,
                'spheres' => $spheres,
                'spells' => $spells
            ]);
    }
    
    public function figureEquipment($id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        //add currencies to figure's view
        $figureCurrencyRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureCurrency');
        $currencies = $figureCurrencyRepository->findBy(['figure' => $figure]);
        
        return $this->render('memberArea/figure/prophecy/figure_equipment.html.twig', [
            'figure' => $figure,
            'currencies' => $currencies,
        ]);
    }
    

    /**
     * 
     * @param ProphecyFigure $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function figureCaste($id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        return $this->render('memberArea/figure/prophecy/figure_caste.html.twig', [
            'figure' => $figure,      
        ]);
    }

    /**
     * 
     * @param ProphecyFigure $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function figureBackground($id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        return $this->render('memberArea/figure/prophecy/figure_background.html.twig', [
            'figure' => $figure,
        ]);
    }

   
    public function figureEditInitialOmen(Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $form =  $this->createForm(InitialiseProphecyFigureOmenFormType::class, $figure );
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId()
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);    
        
    }
    
    
    /**
     * Role: to the figure creation, edit initial caracteristic
     * @param Request $request
     * @param ProphecyFigure $id
     *
     *ca marche : ca affiche les caracteristiques et une valeur à choisir -   reste a faire : la liste doit pouvoir etre customisée
     */
    public function figureEditInitialCaracteristic(Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figureCaracteristicRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureCaracteristic');
        $figure = $figureRepository->find($id);
        $figureCaracteristics = $figureCaracteristicRepository->findByFigure(['figure' => $figure]);
        
        $form =  $this->createForm(InitialiseProphecyFigureCaracteristicsFormType::class, $figure );
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $figure->setIsCaracteristicsChoosen(true);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId()
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(), 
            'figure' => $figure, 
            'figureCaracteristics' => $figureCaracteristics
        ]);    
    }
    
    public function figureEditInitialMajorAttribute(Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $form = $this->createForm(InitialiseProphecyFigureMajorAttributesFormType::class, $figure );
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $figure->setIsMajorAttributesChoosen(true);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId()
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    public function figureEditInitialMinorAttribute(Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $form = $this->createForm(InitialiseProphecyFigureMinorAttributesFormType::class, $figure );
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $figure->setIsMinorAttributesChoosen(true);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId()
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    public function figureEditInitialCaste(Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $form = $this->createForm(InitialiseProphecyFigureCasteFormType::class, $figure);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId()
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(), 
            'figure' => $figure,
        ]);
    }
    
    public function figureEditInitialAge(Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figureCaracteristicRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureCaracteristic');
        $figure = $figureRepository->find($id);
        $caracteristics = $figureCaracteristicRepository->findBy(['figure' => $figure]);
        
        $form = $this->createForm(InitialiseProphecyFigureAgeFormType::class, $figure);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            //after age select
            $age = $figure->getAge();
            $modifierRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyModifierByAge');
            $modifiers = $modifierRepository->findBy(['age' => $age]);
            foreach ($caracteristics as $caracteristic)
            {
                foreach ($modifiers as $modifier)
                {
                    if($modifier->getCaracteristic()->getName() == $caracteristic->getCaracteristic()->getName())
                    {
                        $value = $modifier->getValue();
                        $caracteristic->setValue ($value);
                        $entityManager->persist($figure);
                        $entityManager->flush();
                    }
                }
                
            }
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
            /*
            return $this->render('memberArea/figure/prophecy/test.html.twig', [
                'figure' => $figure,
                'modifiers' => $modifiers,
            ]);
            */
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(), 
            'figure' => $figure,
        ]);
    }
    
    public function figureEditInitialNation(Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $form = $this->createForm(InitialiseProphecyFigureNationFormType::class, $figure );
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId()
            ]);
            
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    
    public function figureEditInitialProhibited(Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        $caste = $figure->getCaste();
        
        $prohibitedRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Caste\ProphecyProhibited');
        $prohibitedsList = $prohibitedRepository->findBy(['caste' => $caste]);
        
        $figureProhibited = new ProphecyFigureProhibited();
        $figureProhibited->setFigure($figure);
        
        $form = $this->createForm(AddProphecyFigureProhibitedFormType::class, $figureProhibited, [
            'prohibiteds' => $prohibitedsList,
        ]);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figureProhibited);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    
    /** ATTENTION $FREEPOINTS DANS LA CLASSE PROPHECYTENDENCY ILS FAUT AFFECTER LES BONNES VALEURS SELON LA TABLE NATION */
    public function figureEditInitialTendency(Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $form = $this->createForm(InitialiseProphecyFigureTendenciesFormType::class, $figure);
        $form->handleRequest($request);
        
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $figure->setIsTendenciesChoosen(true);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_initial_tendencies.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    //charger les categories selon l age et charger la liste dans le formulaire, et changer entitytype par choice
    public function figureEditInitialDisadvantages (Request $request, $id)
    {
        
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $age = $figure->getAge();
        $ageDisadvantagesRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyAgeDisadvantage');
        $ageDisadvantagesList = $ageDisadvantagesRepository->findBy(['age' => $age ]);
        
        $disadvantageRepository =  $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyDisadvantage');
        $disadvantagesList = new ArrayCollection();
        
        $figureDisadvantage = new ProphecyFigureDisadvantage();
        $figureDisadvantage->setFigure($figure);
        
        $form = $this->createForm(AddProphecyFigureDisadvantageFormType::class, $figureDisadvantage );
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figureDisadvantage);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
        
    }
    
    public function figureEditInitialAdvantages (Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        
        $advantageRepository =  $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecyDisadvantage');
        $advantagesList = new ArrayCollection();
        
        $figureAdvantage = new ProphecyFigureAdvantage();
        $figureAdvantage->setFigure($figure);
        
        $form = $this->createForm(AddProphecyFigureAdvantageFormType::class, $figureAdvantage );
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figureAdvantage);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    /*
     * A FINIR
     * 
     */
    public function figureEditInitialCurrencies($id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $caste = $figure->getCaste();
        $initialCurrenciesRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Caste\ProphecyInitialCurrencies');
        $initialCurrency = $initialCurrenciesRepository->findOneBy(['caste' => $caste]); 
        
        $currency = $initialCurrency->getCurrency();
        $roll = new Roll(10, 8); 
        $value = $roll->getSum();
        
        $figureCurrencyRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureCurrency');
        $figureCurrency = $figureCurrencyRepository->findOneBy(['figure' => $figure, 'currency' => $currency ]);
        $figureCurrency->setCurrency($currency);
        $figureCurrency->setFigure($figure);
        $figureCurrency->setValue($value);
        $figure->setIsInitialCurrenciesGenerated(true);
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($figureCurrency);
        $entityManager->flush();
        
        $entityManager->persist($figure);
        $entityManager->flush();
        
        
        //return $this->render('test.html.twig', ['currency' => $currency->getName(), 'value' => $value]);
        
        return $this->redirectToRoute('prophecy_figure_view', [
            'id' => $figure->getId(),
        ]);
        
    }
    
    public function figureEditInitialSkills(Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $form = $this->createForm(InitialiseProphecyFigureSkillFormType::class, $figure);       
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    public function figureEditInitialBackground(Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $form = $this->createForm(InitialiseProphecyFigureBackgroundFormType::class, $figure);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    
    /* PB PB PB PB */
    public function figureEditInitialSpheres (Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $form = $this->createForm(InitialiseProphecyFigureSpheresFormType::class, $figure);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    public function figureEditInitialMagesSpells (Request $request, $id, $sphere)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
         
        //pour alimenter la liste des choix
        $sphereRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Magic\ProphecySphere');
        $prophecySphere = $sphereRepository->find($sphere);
       
        $figureSpell = new ProphecyFigureSpell();
        $figureSpell->setFigure($figure);
        
        $form = $this->createForm(AddProphecyFigureMageInitialSpellFormType::class, $figureSpell);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figureSpell);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
        
    }
    
    public function figureEditAdditionalInitialSpells (Request $request, $id, $sphere)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        //pour alimenter la liste des choix
        $sphereRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Magic\ProphecySphere');
        $prophecySphere = $sphereRepository->find($sphere);
        
        $figureSpell = new ProphecyFigureSpell();
        $figureSpell->setFigure($figure);
        
        $form = $this->createForm(AddProphecyFigureMageInitialSpellFormType::class, $figureSpell);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figureSpell);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    public function figureEditInitialFavour (Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $figureFavour = new ProphecyFigureFavour();
        $figureFavour->setFigure($figure);
        
        $form = $this->createForm(AddProphecyFigureInitialFavourFormType::class, $figureFavour);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figureFavour);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    
    public function figureEditInitialReputation (Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $form = $this->createForm(InitialiseProphecyFigureReputationType::class, $figure);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figure);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    public function figureEditInitialWeapons (Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $figureWeapon = new ProphecyFigureWeapon();
        $figureWeapon->setFigure($figure);
        
        $form = $this->createForm(AddProphecyFigureWeaponFormType::class, $figureWeapon);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figureWeapon);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    public function figureEditInitialArmors (Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $figureArmor = new ProphecyFigureArmor();
        $figureArmor->setFigure($figure);
        
        $form = $this->createForm(AddProphecyFigureArmorFormType::class, $figureArmor);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figureArmor);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    public function figureEditInitialShields (Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $figureShield = new ProphecyFigureShield();
        $figureShield->setFigure($figure);
        
        $form = $this->createForm(AddProphecyFigureShieldFormType::class, $figureShield);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($figureShield);
            $entityManager->flush();
            
            return $this->redirectToRoute('prophecy_figure_view', [
                'id' => $figure->getId(),
            ]);
        }
        
        return $this->render('memberArea/figure/prophecy/form_edit_figure_caracteristic.html.twig', [
            'form' =>$form->createView(),
            'figure' => $figure,
        ]);
    }
    
    
    //SERT A INDIQUER QUE L USER A VALIDE SON PERSONNAGE ET QU IL EST PRET A ETRE CONTROLE ET VALIDE PAR LE MJ A FINIR
    public function figurePlayerValidation(Request $request, $id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        //pour tester si la fonction marche???
        $figure->setXperience(20);

        //valide le personnage pour le joueur
        $figure->setIsFinish(true);
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($figure);
        $entityManager->flush();
        
         return $this->redirectToRoute('prophecy_figure_view', [
            'id' => $figure->getId(),
        ]);
        
    }
    
    public function figureView ($id)
    {
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigure');
        $figure = $figureRepository->find($id);
        
        $skillCategoryRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Game\Characteristic\ProphecySkillCategory');
        $skillcategories = $skillCategoryRepository->findAll();
        
        //add caracteristics to figure's view
        //$figureCaracteristicRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureCaracteristic');
        //$caracteristics = $figureCaracteristicRepository->findBy(['figure' => $figure]);
        
        //add majorAttributes to figure's view
        $figureMajorAttributeRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureMajorAttribute');
        $majorAttributes = $figureMajorAttributeRepository->findBy(['figure' => $figure]);
        
        //add minorAttributes to figure's view
        $figureMinorAttributeRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureMinorAttribute');
        $minorAttributes = $figureMinorAttributeRepository->findBy(['figure' => $figure]);
        
        //add tendencies to figure's view
        //$figureTendencyRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureTendency');
        //$tendencies = $figureTendencyRepository->findBy(['figure' => $figure]);
        
        //add skills to figure's view
        $figureSkillRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureSkill');
        $skills = $figureSkillRepository->findBy(['figure' => $figure]);
        
        //add wounds to figure's view
        $figureWoundRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureWound');
        $wounds = $figureWoundRepository->findBy(['figure' => $figure]);
 
        //magic
        $figureDisciplineRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureDiscipline');
        $disciplines = $figureDisciplineRepository->findBy(['figure' => $figure]);
        
        $figureSphereRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Prophecy\Figure\ProphecyFigureSphere');
        $spheres = $figureSphereRepository->findBy(['figure' => $figure]);
        
        if ($figure->getIsFinish())
        {
            return $this->redirectToRoute('prophecy_figure_caracteristics', [
                'id' => $id,
            ]);
        }
            
        return $this->render('memberArea/figure/prophecy/figure_initialisation.html.twig', [
            'figure' => $figure,
            //'caracteristics' => $caracteristics,
            //'majorAttributes' => $majorAttributes,
            'minorAttributes' => $minorAttributes,
            //'tendencies' => $tendencies,
            //'skills' => $skills,
            'skillCategories' => $skillcategories,
            'wounds' => $wounds,
            //'disciplines' => $disciplines,
            //'spheres' => $spheres,
        ]);
    }
       
}

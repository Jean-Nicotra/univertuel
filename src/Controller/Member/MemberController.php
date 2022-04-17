<?php

namespace App\Controller\Member;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MemberController extends AbstractController
{
    
    public function index(): Response
    {
        $user = $this-getUser();
        
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Campaign\Campaign');
       // $figureRepository = $this->getDoctrine()->getRepository('App\Entity\');
        
        return $this->render('member/member/index.html.twig', [
            'controller_name' => 'MemberController',
        ]);
    }
}

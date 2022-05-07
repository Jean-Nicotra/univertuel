<?php

namespace App\Controller\Game;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FigureController extends AbstractController
{
    public function figures()
    {
        $owner = $this->getUser();
        $figureRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Figure');
        $figuresList = $figureRepository->findBy(['owner' => $owner ]);
        
        return $this->render('memberArea/figure/prophecy/figures_test.html.twig', ['figures' => $figuresList]);
        
    }
    
    public function figureFind($id, $game)
    {
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Game\Game');
        $game = $gameRepository->find($game);
        $route = $game->getCode().'_figure_caracteristics';//format : Prophecy_figure_caracteristics or Cyberpunk_figure_caracteristics
        
        return $this->redirectToRoute($route, ['id' => $id]);
    }
}

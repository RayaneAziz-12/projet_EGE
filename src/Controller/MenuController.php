<?php

namespace App\Controller;

use App\Repository\AnneeScolaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    /**
     * @Route("/top_menu", name="top_menu")
     */
    public function topMenu(AnneeScolaireRepository $anneeScolaireRepository): Response
    {
        $annees = $anneeScolaireRepository->findBy(['isDeleted'=>false]);

        return $this->render('common/page-top.html.twig',[
            'annees'=>$annees
        ]);
    }
}

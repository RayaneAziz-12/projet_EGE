<?php

namespace App\Controller;

use App\Repository\EtudiantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatisticsController extends AbstractController
{
    /**
     * @Route("/statistics", name="statistics")
     */
    public function stat(EtudiantRepository $etudiantRepository): Response
    {
        $nombreEtudiants = $etudiantRepository->count([]);

        return $this->render('common/statistics.html.twig',[
            'nbrEtudiants'=>$nombreEtudiants
        ]);
    }
}

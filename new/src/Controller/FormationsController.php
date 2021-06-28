<?php

namespace App\Controller;

use App\Repository\AnneeScolaireFormationRepository;
use App\Repository\AnneeScolaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/formation")
 */
class FormationsController extends AbstractController
{
    /**
     * @Route("/", name="formation_index")
     */
    public function index(AnneeScolaireFormationRepository $anneeScolaireFormationRepository,AnneeScolaireRepository $anneeScolaireRepository): Response
    {
        $anneeScolaire = $anneeScolaireRepository->findAll();
        $formations = $anneeScolaireFormationRepository->findBy(['isDeleted'=>false,'isActived'=>true]);
        return $this->render('formation/index.html.twig', [
            'formations' => $formations,
            'anneeScolaire' => $anneeScolaire,
        ]);
    }
}

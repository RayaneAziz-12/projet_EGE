<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Entity\User;
use App\Form\EtudiantType;
use App\Repository\EtudiantRepository;
use App\Repository\UserRepository;
use App\Repository\AnneeScolaireRepository;
use App\Repository\FormationRepository;
use App\Repository\SexeRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/etudiant")
 */
class EtudiantController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * @Route("/", name="etudiant_index", methods={"GET"})
     */
    public function index(EtudiantRepository $etudiantRepository,AnneeScolaireRepository $anneeScolaireRepository,FormationRepository $formationRepository, SexeRepository $sexeRepository ): Response
    {
        $formation = $formationRepository->findby(["isDeleted"=> false,"isActived"=> true]);
        $anneeScolaire = $anneeScolaireRepository->findAll();
        $sexe = $sexeRepository->findAll();
        $etudiant = $etudiantRepository->findBy(["isDeleted"=> false]);
        /*dd($etudiant);*/
        return $this->render('etudiant/index.html.twig', [
            'etudiants' => $etudiant,
            'anneeScolaire' => $anneeScolaire,
            'formation' => $formation,
            'sexe' => $sexe,
        ]);
    }

    /**
     * @Route("/new", name="etudiant_new", methods={"POST"})
     */
    public function newEtudiantAction( Request $resquest ): Response
    {
        $data = $resquest->request->all();
        dd($data);
    }

    private function setUser($nom,$prenom,$sexe): User
    {
        dd('OK');
    }
}

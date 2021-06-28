<?php

namespace App\Controller;

use App\Entity\AnneeScolaireFormation;
use App\Entity\Etudiant;
use App\Form\EtudiantType;
use App\Repository\EtudiantRepository;
use App\Repository\UserRepository;
use App\Repository\AnneeScolaireRepository;
use App\Repository\FormationRepository;
use App\Repository\SexeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Repository\AnneeScolaireFormationRepository;
use App\Repository\AnneeScolaireStatutRepository;
use ContainerBypTMB3\getDoctrine_UlidGeneratorService;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\This;
use Proxies\__CG__\App\Entity\AnneeScolaire;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/etudiant")
 */
class EtudiantController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;
    }
    /**
     * @Route("/", name="etudiant_index", methods={"GET"})
     */
    public function index(EtudiantRepository $etudiantRepository,AnneeScolaireRepository $anneeScolaireRepository,AnneeScolaireFormationRepository $formationRepository, SexeRepository $sexeRepository ): Response
    {
        /*dd($userRepository->findAll());*/
        $formation = $formationRepository->findby(["isDeleted"=> false,"isActived"=> true]);
        
        $anneeScolaire = $anneeScolaireRepository->findAll();
        $sexe = $sexeRepository->findAll();
        $etudiant = $etudiantRepository->findBy(["isDeleted"=> false]);
        /*dd($etudiant);*/
        return $this->render('etudiant/index.html.twig', [
            'etudiants' => $etudiant,
            'anneeScolaire' => $anneeScolaire,
            'formation' => $formation,
            'sexe' => $sexe
        ]);

    }
     /**
     * @Route("/new", name="etudiant_new", methods={"POST"})
     */
    public function create(Request $request): Response
    {
        if($request->getMethod("POST")){
            /*dd($_POST);*/
            
            $form = $request->request->all(); 
            
            if(empty($form)){

                return new JsonResponse("Formulaire vide");
            }

            $user = $this->setUser($form['nom'], $form['prenom'], $form['email'], $form['telephone'], $form['adresse'], $form['date_naissance']);

            if($user){
                $etudiant = $this->setEtudiant($user,$form['sexe'],$form['anneeScolaire'],$form['formation']);
            }
            else{ 
                return new JsonResponse("L'utilisateur n'a pas pu être créé");
            }
            return $this->redirect('/etudiant');         

        }
       
        
            
    }

    private function setUser( $nom, $prenom, $email, $telephone, $adresse, $date_naissance):User
    {
        $user = new User();
            
            if($nom === null || $prenom === null || $email === null  || $telephone  === null || $adresse  === null || $date_naissance  === null ){
                return false;
            }
               
            $user->setNom($nom);
            $user->setPrenom($prenom);
            $user->setEmail($email);
            $user->setTelephone($telephone);
            $user->setAdresse($adresse);
            $user->setDateNaissance( new \DateTime($date_naissance));
            $user->setNom($nom);
            $user->setPrenom($prenom);
            $user->setCreatedAt(new \DateTime());
            $user->setCreatedBy($user->getEmail());
            $user->setIsDeleted(false);
            $user->setIsActived(true);

    
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $user;
    }

    private function setEtudiant(User $user, $sexe,int $annee_scolaire,int $formation):Etudiant
    {
        $etudiant = new Etudiant();
            
            if($user === null || $sexe === null ||$annee_scolaire ===null|| $formation === null ){
                return false;
            }
            $AnneeScolairerepository = $this->getDoctrine()->getRepository(AnneeScolaire::class);
            $Formationrerepository = $this->getDoctrine()->getRepository(AnneeScolaireFormation::class); 
            $as =  $AnneeScolairerepository ->findOneBy(['id'=>$annee_scolaire]);
            if($as === null ){
                return false;
            }
            $f = $Formationrerepository->findOneBy(['id'=>$formation,'anneeScolaire'=>$as]);
            if($f === null ){
                return false;
            }
            $etudiant->setUser($user);
            $etudiant->setSexe($sexe);
            $etudiant->addFormation($f);
            $etudiant->setCreatedAt(new \DateTime());
            $etudiant->setCreatedBy($user->getEmail());
            $etudiant->setIsDeleted(false);
            $etudiant->setIsActived(true);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($etudiant);
            $em->flush();
            return $etudiant;
    }
    
}

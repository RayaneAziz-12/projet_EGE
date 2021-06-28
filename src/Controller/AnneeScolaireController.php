<?php

namespace App\Controller;

use App\Repository\AnneeScolaireRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class AnneeScolaireController extends AbstractController
{

    public function __construct()
    {

    }

    /**
     * @Route("/select/annee", name="select_annee_scolaire", options={"expose"=true},methods={"POST"} )
     */
    public function selectAnnee(Request $request,AnneeScolaireRepository $anneeScolaireRepository,SerializerInterface $serializer): Response
    {
        if($request->isXmlHttpRequest()){
            $session = $request->getSession();
            $data = $request->request->all();
            $annee = $anneeScolaireRepository->find($data['id']);
            if ($annee != null){
                $annee = $serializer->serialize($annee,'json');
                $session->set('annee_scolaire',json_decode($annee));
                return new JsonResponse($annee,200);
            }else{
                return new JsonResponse("NOT FOUND",200);
            }

        }
        return new JsonResponse('NOT AJAX REQUEST',409);
    }
}

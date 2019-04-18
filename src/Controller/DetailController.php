<?php


namespace App\Controller;


use App\Entity\Personne;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    /**
     * @Route("/liste")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function liste()
    {
        $repository = $this->getDoctrine()->getRepository(Personne::class);
        $personnes = $repository->findAll();
        return $this->render('liste.html.twig', [
            'personnes' => $personnes
        ]);
    }

    /**
     * @Route("/inscrit/details-ancetre/{id}", methods={"GET", "POST"})
     * @return Response
     */
    public function detail(Personne $personne, Request $request): Response
    {

        return $this->render('inscrit/show.html.twig', [
            'personne' => $personne
        ]);
    }

}



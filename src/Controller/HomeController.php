<?php


namespace App\Controller;


use App\Entity\Personne;
use App\Entity\PropertySearch;
use App\Form\PropertySearchType;
use App\Form\RechercheType;
use App\Repository\PersonneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/")
     * @return Response
     *
     */
    public function home(): Response
    {
        return $this->render('home.html.twig');
    }

    /**
     * @Route("/contact")
     * @return Response
     */
    public function contact(): Response
    {
        return $this->render('contact.html.twig');
    }

    /**
     * @Route("/lagenealogie/cquoi")
     * @return Response
     */
    public function cquoi(): Response
    {
        return $this->render('/lagenealogie/cquoi.html.twig');
    }

    /**
     * @Route("/lagenealogie/aide-recherche")
     * @return Response
     */
    public function aide(): Response
    {
        return $this->render('/aide.html.twig');
    }

    /**
     * @Route("/histoire/origine-noms-famille")
     * @return Response
     */
    public function origineFamille(): Response
    {
        return $this->render('/origine-noms-famille.html.twig');
    }

    /**
     * @Route("/histoire/origine-prenom")
     * @return Response
     */
    public function originePrenoms(): Response
    {
        return $this->render('/origine-prenoms.html.twig');
    }
    /**
     * @Route("/histoire/nom-affranchis")
     * @return Response
     */
    public function nomAffranchis(): Response
    {
        return $this->render('/noms-affranchis.html.twig');
    }
    /**
     * @Route("/rechercher/rechercher-ancetre")
     * @return Response
     */
    public function rechercherAncetre(Request $request): Response
    {
        $search = new PropertySearch();
        $form = $this->createForm(PropertySearchType::class, $search);
        $form->handleRequest($request);


        return $this->render('/rechercher-ancetre.html.twig', [
            'form'=>$form->createView()
        ]);
    }
    /**
     * @param int $id
     * @Route("/rechercher/rechercher-esclave")
     * @return Response
     */
    public function rechercherEsclave(Request $request): Response
    {
        $search = new PropertySearch();
        $form = $this->createForm(PropertySearchType::class, $search);
        $form->handleRequest($request);


        return $this->render('/rechercher-esclave.html.twig');
    }
    /**
     * @Route("/rechercher/rechercher-sepulture")
     * @return Response
     */
    public function rechercherSepulture(): Response
    {
        return $this->render('/rechercher-sepulture.html.twig');
    }
    /**
     * @Route("/rechercher/rechercher-monument")
     * @return Response
     */
    public function rechercherMonument(): Response
    {
        return $this->render('/rechercher-monument.html.twig');
    }
    /**
     * @Route("/rechercher/rechercher-soldat")
     * @return Response
     */
    public function rechercherSoldat(): Response
    {
        return $this->render('/rechercher-soldat.html.twig');
    }

    /**
     * @Route("/monarbre/creer-arbre")
     * @return Response
     */
    public function creerArbre(): Response
    {
        return $this->render('/creer-arbre.html.twig');
    }

    /**
     * @Route("/monarbre/modifier-arbre")
     * @return Response
     */
    public function modifierArbre(): Response
    {
        return $this->render('/modifier-arbre.html.twig');
    }

    /**
     * @Route("/forum")
     * @return Response
     */
    public function forum(): Response
    {
        return $this->render('/forum.html.twig');
    }

    /**
     * @Route("/entraide")
     * @return Response
     */
    public function associationEntraide(): Response
    {
        return $this->render('/entraide.html.twig');
    }

    /**
     * @Route("/liste")
     * @return Response
     */
    public function liste(PersonneRepository $repository)
    {
        $repository = $this->getDoctrine()->getRepository( Personne::class);
        $personnes = $repository->findAll();
        return $this->render('/liste.html.twig', [
            'personnes' => $personnes
        ]);
    }
}
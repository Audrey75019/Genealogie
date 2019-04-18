<?php


namespace App\Controller;

use App\Entity\Matricule;
use App\Entity\Personne;
use App\Entity\PropertySearch;
use App\Form\MatriculeType;
use App\Form\PersonneType;
use App\Form\PropertySearchType;
use App\Form\RechercheType;
use App\Repository\PersonneRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
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
        $personne = new Personne();
        $form = $this->createForm(PersonneType::class, $personne);
        //dump('ici');
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            dump('la');
            $personnes =  $this->getDoctrine()
                ->getRepository(Personne::class)
                ->findPeoples($personne);
            dump($personnes);


        }
        return $this->render('rechercher-ancetre.html.twig', [
            'form' => $form->createView(), 'resultat' => $personnes]);
    }
    /**
     * @param int $id
     * @Route("/rechercher/rechercher-esclave")
     * @return Response
     */
    public function rechercherEsclave(Request $request): Response
    {
        $personnes = [];
        $personne = new Personne();
        $form = $this->createForm(MatriculeType::class, $personne);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            //dump('la');
            $personnes =  $this->getDoctrine()
                ->getRepository(Matricule::class)
                ->findPeoples($personne);
            dump($personnes);
        }
        return $this->render('rechercher-ancetre.html.twig', [
            'form' => $form->createView(), 'resultat' => $personnes]);

    }
    /**
     * @Route("/rechercher/rechercher-sepulture")
     * @return Response
     */
    public function rechercherSepulture(Request $request): Response
    {

    }
    /**
     * @Route("/rechercher/rechercher-monument")
     * @return Response
     */
    public function rechercherMonument(Request $request): Response
    {

    }
    /**
     * @Route("/rechercher/rechercher-soldat")
     * @return Response
     */
    public function rechercherSoldat(Request $request): Response
    {
        $search = new PropertySearch();
        $form = $this->createForm(PropertySearchType::class, $search);
        $form->handleRequest($request);


        return $this->render('/rechercher-soldat.html.twig', [
            'form'=>$form->createView()
        ]);
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

}

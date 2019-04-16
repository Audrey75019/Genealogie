<?php


namespace App\Controller;


use App\Entity\Personne;
use App\Form\RechercheType;
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
    public function rechercherAncetre(int $id, Request $request): Response
    {
        $repo = $this->getDoctrine()->getRepository(Personne::class);
        $personne = $repo->findOneBy([
            'id' => $id
        ]);
        $form = $this->createForm(RechercheType::class, $personne);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->flush();
            return $this->render('rechercher-ancetre.html.twig', [
                'personne' => $personne,
                'editForm' => $form->createView()
            ]);
        }

        return $this->render('/rechercher-ancetre.html.twig');
    }
    /**
     * @param int $id
     * @Route("/rechercher/rechercher-esclave")
     * @return Response
     */
    public function rechercherEsclave(): Response
    {
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

    public function forum(): Response
    {
        return $this->render('/forum.html.twig');
    }
    public function associationEntraide(): Response
    {
        return $this->render('/entraide.html.twig');
    }
}
<?php


namespace App\Controller;


use App\Entity\Personne;
use App\Form\PersonneType;
use Stof\DoctrineExtensionsBundle\Uploadable\UploadableManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InscritController extends AbstractController
{
    /**
     * @Route("/inscrit/formulaire-personne")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function formPersonne(Request $request): Response
    {
        return $this->render('inscrit/formulaire-personne.html.twig');
    }

    /**
     * @Route("/inscrit/creation")
     * @param Request $request
     * @param UploadableManager $uploadableManager
     * @return Response
     */
    public function create(Request $request): Response
    {
        $personne = new Personne();
        $form = $this->createForm(PersonneType::class, $personne);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($personne);
            $manager->flush();
            $this->addFlash('success', 'Votre ancêtre a bien été ajouté');
            return $this->redirectToRoute('app_inscrit_create', [
                'personne' => $personne->getId()
            ]);
        }
        return $this->render('/inscrit/formulaire-personne.html.twig', [
            'createForm' => $form->createView()
        ]);
    }
    /**
     * @Route("/inscrit/connecte")
     * @return Response
     */
    public function connecte()
    {
        return $this->render('/inscrit/connecte.html.twig');
    }
    /**
     * @Route("/monarbre/creer-arbre")
     * @return Response
     */
    public function creerArbre(Request $request): Response
    {
        $personne = new Personne();
        $form = $this->createForm(PersonneType::class, $personne);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($personne);
            return $this->redirectToRoute('app_inscrit_creerarbre', [
                'personne' => $personne->getId()
            ]);
        }
        return $this->render('/creer-arbre.html.twig', [
            'createForm' => $form->createView(),
            'createForm2' => $form->createView(),
            'createForm3' => $form->createView(),
            'createForm4' => $form->createView(),
            'createForm5' => $form->createView(),
        ]);
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

}
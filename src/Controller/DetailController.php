<?php


namespace App\Controller;


use App\Entity\Personne;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    /**
     * @Route("/{id}", name="article_list")
     */
    public function liste()
    {
        // Récupération du Repository
        $repository = $this->getDoctrine()->getRepository(Personne::class);
        // Récupération des articles
        $articles = $repository->findAll();
        return $this->render('liste.html.twig', [
            'articles' => $articles
        ]);
    }
    /**
     * @Route("/article/{id}", name="article_show")
     */
    public function show($id)
    {
        // Récupération du Repository
        $repository = $this->getDoctrine()->getRepository(Article::class);
        // Récupération de l'article lié à l'id
        $article = $repository->findOneBy([
            'id' => $id
        ]);
        return $this->render('article/show.html.twig', [
            'article' => $article
        ]);
    }
}
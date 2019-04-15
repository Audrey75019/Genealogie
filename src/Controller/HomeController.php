<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        return $this->render('/lagenealogie/aide.html.twig');
    }

}
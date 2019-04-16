<?php


namespace App\Controller;


use App\Entity\Personne;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModerateurController extends AbstractController
{
    /**
     * @Route("/moderateur/home")
     * @return Response
     */
    public function moderateur(): Response
    {
        return $this->render('moderateur/home.html.twig');
    }
}
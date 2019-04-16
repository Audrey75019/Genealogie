<?php


namespace App\Controller;


use App\Entity\User;
use App\Form\UserFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/back-office/utilisateurs")
     * @return Response
     */
    public function list(): Response
    {
        $repo = $this->getDoctrine()->getRepository(User::class);
        $users = $repo->findAll();
        return $this->render('user/list.html.twig', [
            'users' => $users
        ]);
    }

    /**
     * @Route("/back-office/")
     * @return Response
     */
    public function backHome(): Response
    {
        return $this->render('user/back-office.html.twig');
    }
    /**
     * @Route("/back-office/utilisateurs/changement-roles/{id}",name="app_user_editrole", requirements={"id"="[0-9]+"})
     * @param int $id
     * @return Response
     */
    public function edit(int $id, Request $request): Response
    {
        $repo = $this->getDoctrine()->getRepository(User::class);
        $user = $repo->findOneBy([
            'id' => $id
        ]);
        $form = $this->createForm(UserFormType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->flush();
            $this->addFlash('primary', 'Rôle modifié');
        }
        return $this->render('user/show.html.twig', [
            'user' => $user,
            'editForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/back-office/utilisateurs/suppression", name="article_delete")
     * @param User $user
     * @return Response
     */
    public function delete(User $user): Response
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($user);
        $manager->flush();
        $this->addFlash('danger', 'l\'utilisateur a bien été supprimé');
        return $this->redirectToRoute('article_delete');
    }

}
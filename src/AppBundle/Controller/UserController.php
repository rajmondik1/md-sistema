<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/user")
 * Class UserController
 * @package AppBundle\Controller
 */
class UserController extends BaseController
{
    /**
     * @Route("/", name="user_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {

        if ($this->isGranted('ROLE_ADMIN', null)) {

        $this->before();
        $users = $this->userManager->findUsers();

        return $this->render('admin/user/index.html.twig', [
            'users' => $users,
        ]);

        }

        return $this->redirectToRoute('homepage');


    }

    /**
     * @Route("/delete/{user}", name="admin_delete")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, User $user)
    {

        if ($this->isGranted('ROLE_ADMIN', null)) {

        $this->before();
            $this->userManager->deleteUser($user);

        return $this->redirectToRoute('user_index', [
            'user'=> $user,
        ]);

        }

        return $this->redirectToRoute('homepage');



    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/edit/{user}", name="user_edit")
     */
    public function editAction(Request $request, User $user)
    {


        if ($this->isGranted('ROLE_ADMIN', null)) {

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('admin/user/actions/add.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);

        }

        return $this->redirectToRoute('homepage');



    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/{user}", name="user_info")
     */
    public function userInfo(User $user)
    {

        if ($this->isGranted('ROLE_ADMIN', null)) {

        $users = $this->getDoctrine()->getRepository('AppBundle:User');
        $users->find($user);


        return $this->render('admin/user/show/user_info.html.twig', [
        'user' => $user,
        'users' => $users,
        ]);

        }

        return $this->redirectToRoute('homepage');



    }

}

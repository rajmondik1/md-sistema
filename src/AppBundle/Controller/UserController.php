<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/user", name="user")
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

        //tikrina ar adminas
        //jeigu adminas renderina puslapi, jeigu ne redirectina i homepage'a

        if($this->isGranted('ROLE_ADMIN', null))
        {

        //$userManager = $this->get('fos_user.user_manager');
        $this->before();

        $users = $this->userManager->findUsers();


        return $this->render('admin/user/index.html.twig', [
            'users' => $users,
            'user_roles' => $this->getUser() ? $this->getUser()->getRoles() : null
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
        $form = $this->createFormBuilder()
            ->add('save', SubmitType::class, ['label' => 'Yes'])
            ->getForm();

        //handling the form
        $form->handleRequest($request);

        if ($form->isSubmitted())
        {
            $this->before();
            $users = $this->userManager->deleteUser($user);

            return $this->redirectToRoute('admin_index');
        }



        return $this->render('admin/user/delete.html.twig', [
            'form' => $form->CreateView(),
            'user'=> $user,
            'users' => $users,
            'user_roles' => $this->getUser() ? $this->getUser()->getRoles() : null
        ]);

    }



}

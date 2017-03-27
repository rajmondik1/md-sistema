<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Programa;
use AppBundle\Form\ProgramaType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

    /**
     * @Route("/programa")
     * Class ProgramaController
     * @package AppBundle\Controller
     */
class ProgramaController extends Controller
{
    /**
     * @Route("/", name="programa_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        if ($this->isGranted('ROLE_ADMIN', null)) {
            $repo = $this->getDoctrine()->getRepository('AppBundle:Programa');
            $programa = $repo->findAll();

            return $this->render('admin/programa/index.html.twig', [
                'programa' => $programa,
            ]);

        }

        return $this->redirectToRoute('homepage');


    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/add", name="programa_add")
     */

    public function addAction(Request $request)
    {
        if ($this->isGranted('ROLE_ADMIN', null)) {
            //Defining new program
            $programa = new Programa();

            //Creating form

            $form = $this->createForm(ProgramaType::class, $programa)
                ->add('save', SubmitType::class, [
                    'label' => 'Prideti programa',
                    'attr' => [
                        'class' => 'btn btn-default',
                    ]
                ]);

            //Handling form
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($programa);
                $em->flush();

                return $this->redirectToRoute('programa_index');
            }

            //Default return
            return $this->render('admin/programa/actions/index.html.twig', [
                'form' => $form->createView(),
                'user_roles' => $this->getUser() ? $this->getUser()->getRoles() : null,
            ]);


        }
    }

    /**
     * @param Request $request
     * @param Programa $programa
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/delete/{programa}", name="programa_delete")
     */
    public function deleteAction(Request $request, Programa $programa)
    {
        if ($this->isGranted('ROLE_ADMIN', null)) {

        $em = $this->getDoctrine()->getManager();
        $em->remove($programa);
        $em->flush();


        return $this->redirectToRoute('programa_index', [
        ]);

        }

        return $this->redirectToRoute('homepage');

    }

    /**
     * @param Request $request
     * @param Programa $programa
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/edit/{programa}", name="programa_edit")
     */

    public function editAction(Request $request ,Programa $programa)
    {

        if ($this->isGranted('ROLE_ADMIN', null)) {

        $form = $this->createForm(ProgramaType::class, $programa);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('programa_index');
        }

        return $this->render('admin/programa/actions/index.html.twig', [
            'programa' => $programa,
            'form' => $form->createView(),
        ]);

        }

        return $this->redirectToRoute('homepage');


    }


    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/{programa}", name="programa_show")
     */

    public function showStudents(Programa $programa)
    {

        if ($this->isGranted('ROLE_ADMIN', null)) {

        return $this->render('admin/programa/show/index.html.twig', [
            'programa' => $programa,
            'user_roles' => $this->getUser() ? $this->getUser()->getRoles() : null
        ]);

        }

        return $this->redirectToRoute('homepage');


    }

}


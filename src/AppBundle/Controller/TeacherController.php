<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Teacher;
use AppBundle\Form\TeacherType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class TeacherController
 * @package AppBundle\Controller
 * @Route("/teacher")
 */
class TeacherController extends Controller
{
    /**
     * @param Teacher $teacher
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="teacher_index")
     */
    public function indexAction(Request $request)
    {
        if ($this->isGranted('ROLE_ADMIN', null)) {
            $repo = $this->getDoctrine()->getRepository('AppBundle:Teacher');
            $teacher = $repo->findAll();

            return $this->render(':admin/teacher:index.html.twig', [
                'teacher' => $teacher,
            ]);
        }

        return $this->redirectToRoute('homepage');
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/add", name="teacher_add")
     */
    public function addAction(Request $request)
    {
        if ($this->isGranted('ROLE_ADMIN', null)) {

            $teacher = new Teacher();

            $form = $this->createForm(TeacherType::class, $teacher)
                ->add('save', SubmitType::class, [
                    'label' => 'Prideti',
                    'attr' => [
                        'class' => 'btn btn-default',
                    ]
                ]);

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($teacher);
                $em->flush();

                return $this->redirectToRoute('teacher_index');
            }
            //default return

            return $this->render('admin/teacher/actions/teacher_add.html.twig', [
                'form' => $form->createView(),
                'user_roles' => $this->getUser() ? $this->getUser()->getRoles() : null,
            ]);
        }
        return $this->redirectToRoute('homepage');
    }

    /**
     * @param Request $request
     * @param Teacher $teacher
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/delete/{teacher}", name="teacher_delete")
     */

    public function deleteAction(Request $request, Teacher $teacher)
    {
        if ($this->isGranted('ROLE_ADMIN', null))
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($teacher);
            $em->flush();

            return $this->redirectToRoute('teacher_index');
        }

        return $this->redirectToRoute('homepage');
    }

    /**
     * @param Request $request
     * @param Teacher $teacher
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/edit/{teacher}", name="teacher_edit")
     */

    public function editAction(Request $request, Teacher $teacher)
    {
        if ($this->isGranted('ROLE_ADMIN', null))
        {
            $form = $this->createForm(TeacherType::class, $teacher);

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $em->flush();

                return $this->redirectToRoute('teacher_index');
            }

            return $this->render(':admin/teacher/actions:teacher_add.html.twig', [
                'teacher' => $teacher,
                'form' => $form->createView()
            ]);
        }
        return $this->redirectToRoute('homepage');
    }
    /*
    public function showAction()
    {
        if ($this->isGranted('ROLE_ADMIN', null))
        {
            return $this->render()
        }
    }
    */
}

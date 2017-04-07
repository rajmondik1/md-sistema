<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Student;
use AppBundle\Form\StudentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class StudentController
 * @package AppBundle\Controller
 * @Route("/student")
 */
class StudentController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="student_index")
     */
    public function indexAction()
    {

        $student = $this->getDoctrine()->getRepository('AppBundle:Student')->findAll();

        return $this->render(':admin/student:index.html.twig', [
            'student' => $student
        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/add", name="student_add")
     */
    public function addAction(Request $request)
    {
        if ($this->isGranted('ROLE_ADMIN', null)){

            $student = new Student();
            $student->setGimdata(new \DateTime());

            $form = $this->createForm(StudentType::class, $student)
                ->add('save', SubmitType::class, [
                    'label' => 'Prideti',
                    'attr' => [
                        'class' => 'btn btn-default'
                    ]
                ]);

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($student);
                $em->flush();

                return $this->redirectToRoute('student_index');
            }

            return $this->render(':admin/student/actions:student_add.html.twig', [
                'form' => $form->createView(),
                'edit' => false
            ]);
        }
        return $this->redirectToRoute('homepage');
    }

    /**
     * @param Request $request
     * @param Student $student
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/edit/{student}", name="student_edit")
     */
    public function editAction(Request $request, Student $student)
    {
        if($this->isGranted('ROLE_ADMIN', null)){
            $form = $this->createForm(StudentType::class, $student);

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $em->flush();

                return $this->redirectToRoute('student_index');
            }

            return $this->render(':admin/student/actions:student_add.html.twig', [
                'student' => $student,
                'form' => $form->createView(),
                'edit' => true
            ]);
        }
        return $this->redirectToRoute('homepage');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/delete/{student}", name="student_delete")
     */
    public function deleteAction(Student $student)
    {
        if ($this->isGranted('ROLE_ADMIN', null))
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($student);
            $em->flush();

            return $this->redirectToRoute('student_index');
        }
        return $this->redirectToRoute('homepage');
    }

    /**
     * @param Student $student
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/{student}", name="student_info")
     */
    public function showAction(Student $student)
    {
        if($this->isGranted('ROLE_ADMIN', null))
        {
            return $this->render(':admin/student/show:index.html.twig', [
                'student' => $student
            ]);
        }
        return $this->redirectToRoute('homepage');
    }
}

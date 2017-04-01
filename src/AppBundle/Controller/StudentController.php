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
            ]);
        }
        return $this->redirectToRoute('homepage');
    }
}

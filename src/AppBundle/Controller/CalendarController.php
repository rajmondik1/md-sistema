<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Calendar;
use AppBundle\Form\CalendarType;
use Doctrine\ORM\Mapping\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CalendarController
 * @package AppBundle\Controller
 * @Route("/calendar")
 */

class CalendarController extends Controller
{


    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="calendar")
     */


    public function indexAction()
    {

        if ($this->isGranted('ROLE_ADMIN', null)) {

        return $this->render('admin/calendar/calendar.html.twig', [
            'user_roles' => $this->getUser() ? $this->getUser()->getRoles() : null,
        ]);

        }

        return $this->redirectToRoute('homepage');

    }

    /**
     * @Route("/json", name="json")
     * @return JsonResponse
     *
     */
    public function jsonAction()
    {

        if ($this->isGranted('ROLE_ADMIN', null)) {

        $repo = $this->getDoctrine()->getRepository('AppBundle:Calendar');
        $data = $repo->findAll();

        $display = [];
        $format = 'c';
        foreach ($data as $calendar) {
            $display[] = [
                'id' => $calendar->getId(),
                // paima programos title (ManyToOne) events
                'title' => $calendar->getEvents()->getPavadinimas(),
                'start' => $calendar->getStart()->format($format),
                'end' => $calendar->getEnd()->format($format),
            ];
        }
/*
        $bla = 1;

        for ($i )

        dump($calendar->getStart()->format('c'));
*/
        return new JsonResponse($display);

        }

        return $this->redirectToRoute('homepage');


    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route("/add", name="calendar_add")
     */

    public function addAction(Request $request)
    {

        if ($this->isGranted('ROLE_ADMIN', null)) {

        $calendar = new Calendar();
        $calendar->setStart(new \DateTime());
        $calendar->setEnd(new \DateTime());

        $form = $this->createForm(CalendarType::class, $calendar)
            ->add('save', SubmitType::class, ['label' => 'Prideti']);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($calendar);
            $em->flush();

            return $this->redirectToRoute('calendar');
        }

        return $this->render('admin/calendar/actions/calendar_add.html.twig', [
            'form' => $form->createView(),
            'user_roles' => $this->getUser() ? $this->getUser()->getRoles() : null,
        ]);

        }

        return $this->redirectToRoute('homepage');




    }

    /**
     * @param Request $request
     * @param Calendar $calendar
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/edit/{calendar}", name="calendar_edit")
     */
    public function editAction(Request $request, Calendar $calendar)
    {

        if ($this->isGranted('ROLE_ADMIN', null)) {

        $form = $this->createForm(CalendarType::class, $calendar);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('calendar');
        }

        return $this->render('admin/calendar/actions/calendar_add.html.twig', [
            'form' => $form->createView(),
            'calendar' => $calendar
        ]);

        }

        return $this->redirectToRoute('homepage');


    }

    /**
     * @Route("/update", name="calendar_update")
     */
    public function updateAction(Request $request)
    {

        if ($this->isGranted('ROLE_ADMIN', null)) {

        $content = $request->getContent();
            if (!empty($content)) {
                $em = $this->getDoctrine()->getManager();

                $params = json_decode($content, true);
                $new = $em->getRepository('AppBundle:Calendar')->find($params['id']);
                $new->setEnd(new \DateTime($params['end']));
                $new->setStart(new \DateTime($params['start']));


                //$em->persist($new);
                $em->flush();

            return new JsonResponse([
                'data' => $params
            ]);
        }

        return new Response('Error!', 400);

        }

        return $this->redirectToRoute('homepage');



    }




}

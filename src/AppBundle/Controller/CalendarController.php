<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Calendar;
use Doctrine\ORM\Mapping\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CalendarController extends Controller
{


    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/calendar", name="calendar")
     */


    public function indexAction()
    {

        //$serializer = $this->get('serializer');


        //$time = time();

        return $this->render('calendar/calendar.html.twig', [
            'user_roles' => $this->getUser() ? $this->getUser()->getRoles() : null,
        ]);
    }

    /**
     * @Route("/json", name="json")
     * @return JsonResponse
     *
     */
    public function jsonAction()
    {
        $repo = $this->getDoctrine()->getRepository('AppBundle:Calendar');
        $data = $repo->findAll();

        $display = [];
        $format = 'c';
        foreach ($data as $calendar) {
            $display[] = [
                'id' => $calendar->getId(),
                'title' => $calendar->getTitle(),
                'start' => $calendar->getStart()->format($format),
                'end' => $calendar->getEnd()->format($format),
            ];
        }

        return new JsonResponse($display);


        /*return $this->render('calendar/calendar.html.twig', [
         * 'data' => $data,
         * 'user_roles' => $this->getUser() ? $this->getUser()->getRoles() : null,
         * ]);
         * */
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route("/calendar/add", name="calendar_add")
     */

    public function addAction(Request $request)
    {
        $calendar = new Calendar();

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

        return $this->render('calendar/calendar.html.twig', [
            'form' => $form->createView(),
            'user_roles' => $this->getUser() ? $this->getUser()->getRoles() : null,
        ]);
    }

    /**
     * @Route("/update", name="calendar_update")
     */
    public function updateAction(Request $request)
    {


        $content = $request->getContent();
            if (!empty($content)) {
                $em = $this->getDoctrine()->getManager();

                $params = json_decode($content);
                $new = $em->getRepository('AppBundle:Calendar')->find($params['id']);
                $new->setTitle($params['title']);
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

}

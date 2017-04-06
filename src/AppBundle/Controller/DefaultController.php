<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $us = $this->getDoctrine()->getRepository('AppBundle:User')->stats();
        $st = $this->getDoctrine()->getRepository('AppBundle:Student')->stats();
        $tch = $this->getDoctrine()->getRepository('AppBundle:Teacher')->stats();
        $pr = $this->getDoctrine()->getRepository('AppBundle:Programa')->stats();
        $cal = $this->getDoctrine()->getRepository('AppBundle:Calendar')->stats();

        //$message = $this->get('translator')->trans("MY.HELLO");
        //dump($message);

        // replace this example code with whatever you need
        return $this->render('admin/home.html.twig', [
            'user_roles' => $this->getUser() ? $this->getUser()->getRoles() : null,
            'us' => $us,
            'pr' => $pr,
            'tch' => $tch,
            'st' => $st,
            'cal' => $cal
        ]);
    }
}

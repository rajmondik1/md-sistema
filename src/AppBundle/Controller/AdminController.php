<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/admin", name="admin")
     */
    public function indexAction()
    {
        return $this->render('admin/asdasd/admin_base.html.twig', [
        ]);
    }
}

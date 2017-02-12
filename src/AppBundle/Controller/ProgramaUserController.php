<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProgramaUserController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', [
            'user_roles' => $this->getUser() ? $this->getUser()->getRoles() : null
        ]);
    }
}

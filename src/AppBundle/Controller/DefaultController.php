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

        /**if ($this->getUser()->getRoles()->contains('ROLE_USER')){
            return $this->redirect('home');
        }*/

       /** dump($this->getUser());
        return new Response();
*/

        //tikrina ar useris logged in, jeigu taip tai redirectina ji i puslapi prisilogintiems
      /** if ($this->getUser() && $this->getUser()->hasRole('ROLE_USER'))
        {
           return $this->redirectToRoute('fos_user_security_login');
        }
*/
        // replace this example code with whatever you need
        return $this->render('admin/admin_content.html.twig', [
            'user_roles' => $this->getUser() ? $this->getUser()->getRoles() : null,
        ]);
    }
}

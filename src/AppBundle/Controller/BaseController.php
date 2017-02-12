<?php
/**
 * Created by PhpStorm.
 * User: rajmondik1
 * Date: 16.12.18
 * Time: 13.16
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{
    protected $userManager;

    public function before()
    {
        $this->userManager = $this->get('fos_user.user_manager');
    }
}
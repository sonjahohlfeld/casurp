<?php
/**
 * Created by PhpStorm.
 * User: sonja
 * Date: 30.07.18
 * Time: 11:24
 */

namespace App\Controller;
use App\Service\Login;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StartpageController extends Controller
{
    /**
     * @Route("/")
     *
     */
    public function indexAction(){
        return $this->render('/index.html.twig');
    }

    /**
     * @Route("/main", name="main")
     */
    public function mainAction(){
        return $this->render('/main.html.twig');
    }

}
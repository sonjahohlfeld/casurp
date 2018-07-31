<?php
/**
 * Created by PhpStorm.
 * User: sonja
 * Date: 30.07.18
 * Time: 11:24
 */

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StartpageController extends Controller
{
    /**
     * @Route("/")
     *
     */
    public function displayStartPage(){
        return $this->render('/base.html.twig');
    }
}
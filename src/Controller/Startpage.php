<?php
/**
 * Created by PhpStorm.
 * User: sonja
 * Date: 30.07.18
 * Time: 11:24
 */

namespace App\Controller;
use App\Service\Listing\Overview;
use App\Service\Login;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Startpage extends Controller
{

    /**
     * @Route("/", name="main")
     */
    public function mainAction(Overview $overview){
        $data = $overview->execute();
        $twigParameter = array(
            "data" => $data
        );
        return $this->render('/main.html.twig', $twigParameter);
    }

}
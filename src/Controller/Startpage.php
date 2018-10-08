<?php
/**
 * Created by PhpStorm.
 * User: sonja
 * Date: 30.07.18
 * Time: 11:24
 */

namespace App\Controller;
use App\Service\Listing\Overview;
use App\Service\Listing\Consumer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Startpage extends Controller
{

    /**
     * @Route("/", name="index")
     */
    public function indexAction(){
        return $this->redirectToRoute('fos_user_security_login');
    }

    /**
     * @Route("/main", name="main")
     */
    public function mainAction(Overview $overview, Consumer $consumer){
        $data = $overview->execute();
        $consumer = $consumer->execute();
        $twigParameter = array(
            'data' => $data,
            'consumer' => $consumer
        );
        return $this->render('main.html.twig', $twigParameter);
    }

}
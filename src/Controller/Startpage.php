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
use App\Service\Listing\Product;
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
    public function mainAction(Overview $overview, Consumer $consumer, Product $product){
        $data = $overview->execute();
        $consumer = $consumer->execute();
        $product = $product->execute();
        $twigParameter = array(
            'data' => $data,
            'consumer' => $consumer,
            'product' => $product
        );
        return $this->render('main.html.twig', $twigParameter);
    }

}
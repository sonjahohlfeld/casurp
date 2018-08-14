<?php
/**
 * Created by PhpStorm.
 * User: sonja
 * Date: 13.08.18
 * Time: 13:49
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class Product extends Controller
{
    /**
     * @Route("/products", name="products")
     */
    public function displayProductsAction(\App\Service\Listing\Product $product){
        $result = $product->execute();
        return $this->render("product.html.twig", [
            'products' => $result
        ]);
    }

    /**
     * @Route("/products/milk", name="count_of_milk")
     * @return Response
     */
    public function getCountOfMilk(\App\Service\Listing\Product $product){
        $response = new Response();
        $response->setContent(json_encode(array(
            'data' => 123,
        )));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
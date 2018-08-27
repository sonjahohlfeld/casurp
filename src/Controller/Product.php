<?php

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
    public function getCountOfMilk(\App\Service\Details\Product $product){
        $name = "Snix";
        $result = $product->getDetailsOfProduct($name);
        $response = new Response();
        $response->setContent(json_encode(array(
            'data' => $result,
        )));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
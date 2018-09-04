<?php

namespace App\Controller;

use App\Service\Edit\ChangeCountOfProduct;
use App\Service\Edit\CreateProduct;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
        $result = $product->getDetailsOfProduct("Milk");
        $response = new Response();
        $response->setContent(json_encode(array(
            'count' => $result[0]['count']
        )));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @param Request $request
     * @param ChangeCountOfProduct $changeCountOfProduct
     * @return Response
     * @Route("/products/changeCount")
     */
    public function changeCountOfProduct(Request $request, ChangeCountOfProduct $changeCountOfProduct){
        $productId = $request->request->get('productId');
        $value = $request->request->get('value');
        $result = $changeCountOfProduct->execute($productId, $value);
        $response = new Response();
        $response->setContent(json_encode(array(
            'result' => $result
        )));
        $response->headers->set('Content-Type', 'application/json');
        return $response;

    }

    /**
     * @Route("/products/remove", name="remove_product", options={"expose"=TRUE})
     * @param Request $request
     * @param \App\Service\Edit\RemoveProduct $removeProduct
     * @return Response
     */
    public function removeProduct(Request $request, \App\Service\Edit\RemoveProduct $removeProduct){
        $productId = $request->request->get('productId');
        $result = $removeProduct->execute($productId);
        $response = new Response();
        $response->setContent(json_encode(array(
            'result' => $result
        )));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @param Request $request
     * @param CreateProduct $createProduct
     * @return Response
     * @Route("/products/create", name="create_product")
     */
    public function createNewProduct(Request $request, CreateProduct $createProduct){
        $productName = $request->request->get('productName');
        $productCount = $request->request->get('productCount');
        $productPrice = $request->request->get('productPrice');
        $productUnit = $request->request->get('productUnit');
        $result = $createProduct->execute($productName, $productCount, $productPrice, $productUnit);
        $response = new Response();
        $response->setContent(json_encode(array(
            'result' => $result
        )));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
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
    public function displayProducts(\App\Service\Listing\Product $product){
        $result = $product->execute();
        return $this->render("product.html.twig", [
            'products' => $result
        ]);
    }

    /**
     * @Route("/products/{productId}", name="product_details")
     * @param $productId
     * @param \App\Service\Details\Product $product
     */
    public function getDetailsOfProduct($productId, \App\Service\Details\Product $product){
        $result = $product->execute($productId);
        $twigParameter = array(
            'product' => $result
        );
        return $this->render('./product.details.html.twig', $twigParameter);
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
        var_dump($result);
        if(array_key_exists('success', $result)){
            // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://cctb-intern.biologie.uni-wuerzburg.de/hooks/3wrm81736jrkppo8oqswnf9nyh");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n\"channel\": \"testing-webhooks\",\n\"username\": \"Awesome\",\n\"text\": \"@channel ".$result['count']." ".$result['unit']." of ".$result['name']." left. \"\n}");
            curl_setopt($ch, CURLOPT_POST, 1);
            //do not use this in production
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

            $headers = array();
            $headers[] = "Content-Type: application/json";
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $curlResult = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close ($ch);
        }
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
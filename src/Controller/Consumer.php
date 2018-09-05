<?php
/**
 * Created by PhpStorm.
 * User: sonja
 * Date: 05.09.18
 * Time: 13:09
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Consumer
{
    /**
     * @Route("/consumer")
     * @param \App\Service\Listing\Consumer $consumer
     * @return Response
     */
    public function displayConsumer(\App\Service\Listing\Consumer $consumer){
        $result = $consumer->execute();
        $response = new Response();
        $response->setContent(json_encode(array(
            'consumer' => $result
        )));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
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
        $c = $consumer->execute();
        $result = array();
        for($i=0;$i<sizeof($c);$i++){
            $thisConsumer = array(
                'credit' => $c[$i]["paid"] + $c[$i]["expenses"],
                'name' => $c[$i]["firstName"]." ".$c[$i]["lastName"],
                'expenses' => $c[$i]["expenses"],
                'paid' => $c[$i]["paid"]
            );
            array_push($result, $thisConsumer);
        }
        $response = new Response();
        $response->setContent(json_encode(array(
            'consumer' => $result
        )));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
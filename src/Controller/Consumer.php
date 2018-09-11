<?php
/**
 * Created by PhpStorm.
 * User: sonja
 * Date: 05.09.18
 * Time: 13:09
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Consumer extends Controller
{
    /**
     * @Route("/getConsumers")
     * @param \App\Service\Listing\Consumer $consumer
     * @return Response
     */
    public function getConsumers(\App\Service\Listing\Consumer $consumer){
        $result = $this->generateData($consumer->execute());
        $response = new Response();
        $response->setContent(json_encode(array(
            'consumer' => $result
        )));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/consumers", name="consumers")
     */
    public function displayConsumers(\App\Service\Listing\Consumer $consumer){
        $result = $this->generateData($consumer->execute());
        $twigParameter = array(
            'consumer' => $result
        );
        return $this->render('/consumer.html.twig', $twigParameter);
    }

    /**
     * @param $consumers
     * @return array
     */
    private function generateData($consumers): array
    {
        $result = array();
        for ($i = 0; $i < sizeof($consumers); $i++) {
            $thisConsumer = array(
                'id' => $consumers[$i]["id"],
                'credit' => $consumers[$i]["paid"] + $consumers[$i]["expenses"],
                'name' => $consumers[$i]["firstName"] . " " . $consumers[$i]["lastName"],
                'expenses' => $consumers[$i]["expenses"],
                'paid' => $consumers[$i]["paid"]
            );
            array_push($result, $thisConsumer);
        }
        return $result;
    }

    /**
     * @Route("/consumers/{consumerId}", name="consumer_details")
     * @param $consumerId
     * @param \App\Service\Details\Consumer $consumer
     * @return Response
     */
    public function getDetailsOfConsumer($consumerId, \App\Service\Details\Consumer $consumer){
        $result = $this->generateData($consumer->execute($consumerId));
//        $response = new Response();
//        $response->setContent(json_encode(array(
//            'consumer' => $result
//        )));
//        $response->headers->set('Content-Type', 'application/json');
//        return $response;
        $twigParameter = array(
            'consumer' => $result
        );
        return $this->render('/consumer.details.html.twig', $twigParameter);
    }
}
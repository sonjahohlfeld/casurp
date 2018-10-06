<?php
/**
 * Created by PhpStorm.
 * User: sonja
 * Date: 05.09.18
 * Time: 13:09
 */

namespace App\Controller;


use App\Service\Edit\ChangeCreditOfConsumer;
use App\Service\Edit\ChangeEmailOfConsumer;
use App\Service\Edit\ChangeExpensesOfConsumer;
use App\Service\Edit\ChangeNameOfConsumer;
use App\Service\Edit\ChangePaidOfConsumer;
use App\Service\Edit\CreateConsumer;
use App\Service\Edit\RemoveConsumer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
     * @Security("is_granted('ROLE_ADMIN')")
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
                'paid' => $consumers[$i]["paid"],
                'email' => $consumers[$i]["email"]
            );
            array_push($result, $thisConsumer);
        }
        return $result;
    }

    /**
     * @Route("/consumers/{consumerId}", name="consumer_details")
     * @Security("is_granted('ROLE_ADMIN')")
     * @param $consumerId
     * @param \App\Service\Details\Consumer $consumer
     * @return Response
     */
    public function getDetailsOfConsumer($consumerId, \App\Service\Details\Consumer $consumer){
        $result = $this->generateData($consumer->execute($consumerId));
        $twigParameter = array(
            'consumer' => $result
        );
        return $this->render('/consumer.details.html.twig', $twigParameter);
    }

    /**
     * @Route("/consumersCreate", name="consumer_create")
     * @Security("is_granted('ROLE_ADMIN')")
     * @param Request $request
     * @param CreateConsumer $createConsumer
     * @return Response
     */
    public function createNewConsumer(Request $request, CreateConsumer $createConsumer)
    {
        $firstName = $request->request->get('consumerFirstName');
        $lastName = $request->request->get('consumerLastName');
        $email = $request->request->get('email');
        $expenses = $request->request->get('expenses');
        $paid = $request->request->get('paid');
        $result = $createConsumer->execute($firstName, $lastName, $email, $expenses, $paid);
        $response = new Response();
        $response->setContent(json_encode(array(
            'result' => $result
        )));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/consumersRemove", name="consumer_remove")
     * @Security("is_granted('ROLE_ADMIN')")
     * @param Request $request
     * @param RemoveConsumer $removeCustomer
     * @return Response
     */
    public function removeCustomer(Request $request, RemoveConsumer $removeConsumer){
        $consumerId = $request->request->get('consumerId');
        $result = $removeConsumer->execute($consumerId);
        $response = new Response();
        $response->setContent(json_encode(array(
            'result' => $result
        )));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @param Request $request
     * @param ChangeExpensesOfConsumer $changeExpensesOfConsumer
     * @return Response
     * @Route("/consumersChangeExpenses", name="consumer_change_expenses")
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function changeExpensesOfConsumer(Request $request, ChangeExpensesOfConsumer $changeExpensesOfConsumer){
        $consumerId = $request->request->get('consumerId');
        $value = $request->request->get('value');
        $result = $changeExpensesOfConsumer->execute($consumerId, $value);
        $response = new Response();
        $response->setContent(json_encode(array(
            'result' => $result
        )));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @param Request $request
     * @param ChangePaidOfConsumer $changePaidOfConsumer
     * @return Response
     * @Route("/consumersChangePaid", name="consumer_change_paid")
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function changePaidOfConsumer(Request $request, ChangePaidOfConsumer $changePaidOfConsumer){
        $consumerId = $request->request->get('consumerId');
        $value = $request->request->get('value');
        $result = $changePaidOfConsumer->execute($consumerId, $value);
        $response = new Response();
        $response->setContent(json_encode(array(
            'result' => $result
        )));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("consumersEditName", name="consumer_edit_email")
     * @Security("is_granted('ROLE_ADMIN')")
     * @param Request $request
     * @param ChangeNameOfConsumer $changeNameOfConsumer
     * @return Request
     */
    public function changeNameOfConsumer(Request $request, ChangeNameOfConsumer $changeNameOfConsumer){
        $consumerId = $request->request->get('consumerId');
        $firstName = $request->request->get('firstName');
        $lastName = $request->request->get('lastName');
        $result = $changeNameOfConsumer->execute($consumerId, $firstName, $lastName);
        $response = new Response();
        $response->setContent(json_encode(array(
            'result' => $result
        )));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("consumersEditEmail", name="consumer_edit_email")
     * @Security("is_granted('ROLE_ADMIN')")
     * @param Request $request
     * @param ChangeEmailOfConsumer $changeEmailOfConsumer
     * @return Response
     */
    public function changeEmailOfConsumer(Request $request, ChangeEmailOfConsumer $changeEmailOfConsumer){
        $consumerId = $request->request->get('consumerId');
        $email = $request->request->get('email');
        $result = $changeEmailOfConsumer->execute($consumerId, $email);
        $response = new Response();
        $response->setContent(json_encode(array(
            'result' => $result
        )));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
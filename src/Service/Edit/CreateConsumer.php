<?php
/**
 * Created by PhpStorm.
 * User: sonja
 * Date: 30.08.18
 * Time: 10:00
 */

namespace App\Service\Edit;


use App\Entity\Consumer;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\DBALException;

class CreateConsumer
{
    private $em;

    public function __construct(EntityManagerInterface $entityManager){
        $this->em = $entityManager;
    }

    public function execute($firstName, $lastName, $email, $expenses, $paid){
        $newConsumer = $this->em->getRepository(Consumer::class)->findByConsumerName($firstName, $lastName);
        if($newConsumer != null){
            return $result = array(
                'error' => "Consumer ".$newConsumer[0]["firstName"]." ".$newConsumer[0]["lastName"]." already exists."
            );
        }
        $c = new Consumer();
        $c->setFirstName($firstName);
        $c->setLastName($lastName);
        $c->setEmail($email);
        $c->setExpenses($expenses);
        $c->setPaid($paid);
        try {
            $this->em->persist($c);
            $this->em->flush();
            $newConsumer = $this->em->getRepository(Consumer::class)->findByConsumerName($firstName, $lastName);
            $result = array(
                "success" => "Created new consumer ".$firstName. " ".$lastName." successfully.",
                "consumer" => array(
                    'firstName' => $newConsumer[0]["firstName"],
                    'lastName' => $newConsumer[0]["lastName"],
                    'email' => $newConsumer[0]["email"],
                    'expenses' => $newConsumer[0]["expenses"],
                    'paid' => $newConsumer[0]["paid"],
                    'id' => $newConsumer[0]["id"]
                )
            );
        } catch (DBALException $e){
            $result = array(
                "error" => $e->getMessage()
            );
        }
        return $result;
    }
}
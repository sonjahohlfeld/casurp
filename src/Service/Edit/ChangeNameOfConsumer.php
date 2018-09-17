<?php
/**
 * Created by PhpStorm.
 * User: sonja
 * Date: 29.08.18
 * Time: 13:04
 */

namespace App\Service\Edit;

class ChangeNameOfConsumer
{
    private $em;

    public function __construct(\Doctrine\ORM\EntityManagerInterface $entityManager){
        $this->em = $entityManager;
    }

    public function execute($consumerId, $firstName, $lastName){
        $result = array();
        $c = $this->em->getRepository(\App\Entity\Consumer::class)->findOneBy(array(
            'id' => $consumerId
        ));
        if($c === null){
            $result['error'] = "There exist no consumer with the id ".$consumerId;
        } else {
            $c->setFirstName($firstName);
            $c->setLastName($lastName);
            $this->em->persist($c);
            $this->em->flush();
            $result['success'] = "Successfully update consumer name";
            $result['name'] = $c->getFirstName()." ".$c->getLastName();
        }
        return $result;
    }
}
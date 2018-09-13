<?php
/**
 * Created by PhpStorm.
 * User: sonja
 * Date: 29.08.18
 * Time: 13:04
 */

namespace App\Service\Edit;

class ChangeCreditOfConsumer
{
    private $em;

    public function __construct(\Doctrine\ORM\EntityManagerInterface $entityManager){
        $this->em = $entityManager;
    }

    public function execute($consumerId, $value){
        $result = array();
        $c = $this->em->getRepository(\App\Entity\Consumer::class)->findOneBy(array(
            'id' => $consumerId
        ));
        if($c === null){
            $result['error'] = "There exist no consumer with the id ".$consumerId;
        } else {
            $oldValue = $c->getPaid();
            $c->setPaid($oldValue + $value);
            $this->em->persist($c);
            $this->em->flush();
            $result['success'] = "Successfully update consumer credit";
            $result['expenses'] = $c->getExpenses();
            $result['paid'] = $c->getPaid();
        }
        return $result;
    }
}
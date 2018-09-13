<?php
/**
 * Created by PhpStorm.
 * User: sonja
 * Date: 13.09.18
 * Time: 15:04
 */

namespace App\Service\Edit;


use Doctrine\ORM\EntityManagerInterface;

class RemoveCustomer
{
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function execute($customerId){
        $customer = $this->em->getRepository()
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: sonja
 * Date: 11.09.18
 * Time: 14:35
 */

namespace App\Service\Details;


use Doctrine\ORM\EntityManagerInterface;

class Consumer
{
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function execute($consumerId){
        return $this->em->getRepository(\App\Entity\Consumer::class)->findByConsumerId($consumerId);
    }
}
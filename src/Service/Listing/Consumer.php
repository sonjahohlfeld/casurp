<?php
/**
 * Created by PhpStorm.
 * User: sonja
 * Date: 05.09.18
 * Time: 13:10
 */

namespace App\Service\Listing;


use Doctrine\ORM\EntityManagerInterface;

class Consumer
{
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function execute(){
        return $this->em->getRepository(\App\Entity\Consumer::class)->getConsumers();
    }

}
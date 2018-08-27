<?php

namespace App\Service\Details;

use Doctrine\ORM\EntityManagerInterface;

class Product
{
    private $em;

    /**
     * Product constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getDetailsOfProduct($product){
        return $this->em->getRepository(\App\Entity\Product::class)->findByName($product);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: sonja
 * Date: 13.08.18
 * Time: 14:11
 */

namespace App\Service\Listing;


use Doctrine\ORM\EntityManagerInterface;

class Product {
    private $em;

    public function __construct(EntityManagerInterface $entityManager){
        $this->em = $entityManager;
    }

    public function execute(){
        return $this->em->getRepository(\App\Entity\Product::class)->getProducts();
    }
}
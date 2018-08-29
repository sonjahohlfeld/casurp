<?php
/**
 * Created by PhpStorm.
 * User: sonja
 * Date: 29.08.18
 * Time: 10:08
 */

namespace App\Service\Listing;


use Doctrine\ORM\EntityManagerInterface;

class Overview
{
    private $em;

    public function __construct(EntityManagerInterface $entityManager){
        $this->em = $entityManager;
    }

    public function execute(){
        return [
            "products" => $this->em->getRepository(\App\Entity\Product::class)->findAll()
        ];
    }
}
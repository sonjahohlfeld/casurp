<?php
/**
 * Created by PhpStorm.
 * User: sonja
 * Date: 30.08.18
 * Time: 10:00
 */

namespace App\Service\Edit;


use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\DBALException;

class CreateProduct
{
    private $em;

    public function __construct(EntityManagerInterface $entityManager){
        $this->em = $entityManager;
    }

    public function execute($name, $count, $price, $unit){
        $result = array();
        $p = new Product();
        $p->setName($name);
        $p->setCount($count);
        $p->setPrice($price);
        $p->setUnit($unit);
        try {
            $this->em->persist($p);
            $this->em->flush();
            $result = array(
                "success" => "Created new product ".$name." successfully."
            );
        } catch (DBALException $e){
            $result = array(
                "error" => $e->getMessage()
            );
        }
        return $result;
    }
}
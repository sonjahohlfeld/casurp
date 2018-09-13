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
        $newProduct = $this->em->getRepository(Product::class)->findByProductName($name);
        if($newProduct != null){
            return $result = array(
                'error' => "Product ".$newProduct[0]["name"]." already exists."
            );
        }
        $p = new Product();
        $p->setName($name);
        $p->setCount($count);
        $p->setPrice($price);
        $p->setUnit($unit);
        try {
            $this->em->persist($p);
            $this->em->flush();
            $newProduct = $this->em->getRepository(Product::class)->findByProductName($name);
            $result = array(
                "success" => "Created new product ".$name." successfully.",
                "product" => array(
                    'name' => $newProduct[0]["name"],
                    'count' => $newProduct[0]["count"],
                    'price' => $newProduct[0]["price"],
                    'unit' => $newProduct[0]["unit"],
                    'id' => $newProduct[0]["id"]
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
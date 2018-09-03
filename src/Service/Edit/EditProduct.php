<?php
/**
 * Created by PhpStorm.
 * User: sonja
 * Date: 29.08.18
 * Time: 13:04
 */

namespace App\Service\Edit;

class RemoveProduct
{
    private $em;

    public function __construct(\Doctrine\ORM\EntityManagerInterface $entityManager){
        $this->em = $entityManager;
    }

    public function execute($productId, $productName, $productCount, $productPrice, $productUnit){
        $result = array();
        $p = $this->em->getRepository(\App\Entity\Product::class)->findOneBy(array(
            'id' => $productId
        ));
        if($p === null){
            $result['error'] = "There exist no product with the id ".$productId;
        } else {
            $p->setProductName($productName);
            $p->setProductCount($productCount);
            $p->setProductPrice($productPrice);
            $p->setProductUnit($productUnit);
            $this->em->persist($p);
            $this->em->flush();
            $result['success'] = "Successfully remove product ".$productId;
        }
        return $result;
    }
}
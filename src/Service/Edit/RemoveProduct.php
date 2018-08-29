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

    public function execute($product){
        $result = array();
        $p = $this->em->getRepository(\App\Entity\Product::class)->findOneBy(array(
            'name' => $product
        ));
        if($p === null){
            $result['error'] = "There exist no product with the name ".$product;
        } else {
            $this->em->remove($p);
            $result['success'] = "Successfully remove product ".$product;
        }
        return $result;
    }
}
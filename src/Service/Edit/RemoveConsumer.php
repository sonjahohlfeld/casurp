<?php
/**
 * Created by PhpStorm.
 * User: sonja
 * Date: 13.09.18
 * Time: 15:04
 */

namespace App\Service\Edit;

use App\Entity\Consumer;
use Doctrine\ORM\EntityManagerInterface;

class RemoveConsumer
{
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function execute($consumerId){
        $consumer = $this->em->getRepository(Consumer::class)->findOneBy(array(
            'id' => $consumerId
        ));
        if($consumer === null){
            $result['error'] = "There exist no consumer with the id ".$consumerId;
        } else {
            $this->em->remove($consumer);
            $this->em->flush();
            $result['success'] = "Successfully remove consumer ".$consumerId;
        }
        return $result;
    }
}
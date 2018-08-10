<?php
/**
 * Created by PhpStorm.
 * User: sonja
 * Date: 06.08.18
 * Time: 15:06
 */

namespace App\Service;

use App\Entity\Permission;

class Login
{

    private $em;

    public function __construct(\Doctrine\ORM\EntityManagerInterface $entityManager){
        $this->em = $entityManager;
    }

    public function execute($username){
        return $username;
    }
}
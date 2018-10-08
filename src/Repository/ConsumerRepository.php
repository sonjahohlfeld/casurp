<?php

namespace App\Repository;

use App\Entity\Consumer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Consumer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Consumer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Consumer[]    findAll()
 * @method Consumer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConsumerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Consumer::class);
    }

    public function getConsumers(){
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('c.id', 'c.firstName','c.lastName','c.expenses', 'c.paid', 'c.email')
            ->add('orderBy', 'c.expenses DESC')
            ->from('App\Entity\Consumer','c');
        $query = $qb->getQuery();
        return $query->getResult();
    }

    public function findByConsumerId($consumerId){
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('c.id', 'c.firstName', 'c.lastName', 'c.expenses', 'c.paid', 'c.email')
            ->from('App\Entity\Consumer', 'c')
            ->where('c.id = :consumerId')
            ->setParameter('consumerId', $consumerId);
        $query = $qb->getQuery();
        return $query->getResult();
    }

    public function findByConsumerName($firstName, $lastName){
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('c.id', 'c.firstName', 'c.lastName', 'c.expenses', 'c.paid', 'c.email')
            ->from('App\Entity\Consumer', 'c')
            ->where('c.firstName = :firstName')
            ->andWhere('c.lastName = :lastName')
            ->setParameter('lastName', $lastName)
            ->setParameter('firstName', $firstName);
        $query = $qb->getQuery();
        return $query->getResult();
    }
}

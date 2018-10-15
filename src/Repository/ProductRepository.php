<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Query\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function findByProductId($value){
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('p.id', 'p.name','p.price', 'p.count','p.unit')
            ->from('App\Entity\Product','p')
            ->where('p.id = :value')
            ->setParameter('value', $value);
        $query = $qb->getQuery();
        return $query->getResult();
    }

    public function findByProductName($name){
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('p.id', 'p.name','p.price', 'p.count','p.unit')
            ->from('App\Entity\Product','p')
            ->where('p.name = :name')
            ->setParameter('name', $name);
        $query = $qb->getQuery();
        return $query->getResult();
    }

    public function getProducts(){
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('p.id', 'p.name', 'p.price', 'p.count', 'p.unit', 'p.category')
            ->from('App\Entity\Product', 'p');
        $query = $qb->getQuery();
        return $query->getResult();
    }

}

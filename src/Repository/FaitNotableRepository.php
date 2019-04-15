<?php

namespace App\Repository;

use App\Entity\FaitNotable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FaitNotable|null find($id, $lockMode = null, $lockVersion = null)
 * @method FaitNotable|null findOneBy(array $criteria, array $orderBy = null)
 * @method FaitNotable[]    findAll()
 * @method FaitNotable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FaitNotableRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FaitNotable::class);
    }

    // /**
    //  * @return FaitNotable[] Returns an array of FaitNotable objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FaitNotable
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

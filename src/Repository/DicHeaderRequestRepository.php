<?php

namespace App\Repository;

use App\Entity\DicHeaderRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DicHeaderRequest|null find($id, $lockMode = null, $lockVersion = null)
 * @method DicHeaderRequest|null findOneBy(array $criteria, array $orderBy = null)
 * @method DicHeaderRequest[]    findAll()
 * @method DicHeaderRequest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DicHeaderRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DicHeaderRequest::class);
    }

    // /**
    //  * @return HeaderRequest[] Returns an array of Header objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Header
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

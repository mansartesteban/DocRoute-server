<?php

namespace App\Repository;

use App\Entity\HeaderRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method HeaderRequest|null find($id, $lockMode = null, $lockVersion = null)
 * @method HeaderRequest|null findOneBy(array $criteria, array $orderBy = null)
 * @method HeaderRequest[]    findAll()
 * @method HeaderRequest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HeaderRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HeaderRequest::class);
    }

    // /**
    //  * @return HeaderRequest[] Returns an array of HeaderRequest objects
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
    public function findOneBySomeField($value): ?HeaderRequest
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

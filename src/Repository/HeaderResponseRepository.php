<?php

namespace App\Repository;

use App\Entity\HeaderResponse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method HeaderResponse|null find($id, $lockMode = null, $lockVersion = null)
 * @method HeaderResponse|null findOneBy(array $criteria, array $orderBy = null)
 * @method HeaderResponse[]    findAll()
 * @method HeaderResponse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HeaderResponseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HeaderResponse::class);
    }

    // /**
    //  * @return HeaderResponse[] Returns an array of HeaderResponse objects
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
    public function findOneBySomeField($value): ?HeaderResponse
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

<?php

namespace App\Repository;

use App\Entity\DicHeaderResponse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DicHeaderResponse|null find($id, $lockMode = null, $lockVersion = null)
 * @method DicHeaderResponse|null findOneBy(array $criteria, array $orderBy = null)
 * @method DicHeaderResponse[]    findAll()
 * @method DicHeaderResponse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DicHeaderResponseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DicHeaderResponse::class);
    }

    // /**
    //  * @return DicHeaderResponse[] Returns an array of DicHeaderResponse objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DicHeaderResponse
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

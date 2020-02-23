<?php

namespace App\Repository;

use App\Entity\ReturnedDatasType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ReturnedDatasType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReturnedDatasType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReturnedDatasType[]    findAll()
 * @method ReturnedDatasType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReturnedDatasTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReturnedDatasType::class);
    }

    // /**
    //  * @return ReturnedDatasType[] Returns an array of ReturnedDatasType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ReturnedDatasType
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

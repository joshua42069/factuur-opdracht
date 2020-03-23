<?php

namespace App\Repository;

use App\Entity\BestelItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BestelItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method BestelItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method BestelItem[]    findAll()
 * @method BestelItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BestelItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BestelItem::class);
    }

    // /**
    //  * @return BestelItem[] Returns an array of BestelItem objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BestelItem
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

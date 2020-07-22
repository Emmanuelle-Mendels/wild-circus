<?php

namespace App\Repository;

use App\Entity\Represention;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Represention|null find($id, $lockMode = null, $lockVersion = null)
 * @method Represention|null findOneBy(array $criteria, array $orderBy = null)
 * @method Represention[]    findAll()
 * @method Represention[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepresentionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Represention::class);
    }

    // /**
    //  * @return Represention[] Returns an array of Represention objects
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
    public function findOneBySomeField($value): ?Represention
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

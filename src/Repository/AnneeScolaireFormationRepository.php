<?php

namespace App\Repository;

use App\Entity\AnneeScolaireFormation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnneeScolaireFormation|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnneeScolaireFormation|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnneeScolaireFormation[]    findAll()
 * @method AnneeScolaireFormation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnneeScolaireFormationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnneeScolaireFormation::class);
    }

    // /**
    //  * @return AnneeScolaireFormation[] Returns an array of AnneeScolaireFormation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AnneeScolaireFormation
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\AnneeScolaireStatut;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnneeScolaireStatut|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnneeScolaireStatut|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnneeScolaireStatut[]    findAll()
 * @method AnneeScolaireStatut[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnneeScolaireStatutRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnneeScolaireStatut::class);
    }

    // /**
    //  * @return AnneeScolaireStatut[] Returns an array of AnneeScolaireStatut objects
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
    public function findOneBySomeField($value): ?AnneeScolaireStatut
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

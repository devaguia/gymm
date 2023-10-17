<?php

namespace App\Repository;

use App\Entity\SheetsExercises;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SheetsExercises>
 *
 * @method SheetsExercises|null find($id, $lockMode = null, $lockVersion = null)
 * @method SheetsExercises|null findOneBy(array $criteria, array $orderBy = null)
 * @method SheetsExercises[]    findAll()
 * @method SheetsExercises[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SheetsExercisesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SheetsExercises::class);
    }

//    /**
//     * @return SheetsExercises[] Returns an array of SheetsExercises objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SheetsExercises
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

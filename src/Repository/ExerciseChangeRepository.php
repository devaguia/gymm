<?php

namespace App\Repository;

use App\Entity\ExerciseChange;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExerciseChange>
 *
 * @method ExerciseChange|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExerciseChange|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExerciseChange[]    findAll()
 * @method ExerciseChange[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExerciseChangeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExerciseChange::class);
    }

//    /**
//     * @return ExerciseChange[] Returns an array of ExerciseChange objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ExerciseChange
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

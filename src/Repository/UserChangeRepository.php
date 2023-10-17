<?php

namespace App\Repository;

use App\Entity\UserChange;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserChange>
 *
 * @method UserChange|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserChange|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserChange[]    findAll()
 * @method UserChange[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserChangeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserChange::class);
    }

//    /**
//     * @return UserChange[] Returns an array of UserChange objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UserChange
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

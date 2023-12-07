<?php

namespace App\Repository;

use App\Entity\QuizResults;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<QuizResults>
 *
 * @method QuizResults|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuizResults|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuizResults[]    findAll()
 * @method QuizResults[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuizResultsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuizResults::class);
    }

    public function findAllOrdered(): array
    {
        return $this->createQueryBuilder('q')
            ->orderBy('q.score', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }
//    /**
//     * @return QuizResults[] Returns an array of QuizResults objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('q.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?QuizResults
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

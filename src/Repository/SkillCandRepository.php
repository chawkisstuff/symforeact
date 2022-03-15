<?php

namespace App\Repository;

use App\Entity\SkillCand;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SkillCand|null find($id, $lockMode = null, $lockVersion = null)
 * @method SkillCand|null findOneBy(array $criteria, array $orderBy = null)
 * @method SkillCand[]    findAll()
 * @method SkillCand[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SkillCandRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SkillCand::class);
    }

    // /**
    //  * @return SkillCand[] Returns an array of SkillCand objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SkillCand
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

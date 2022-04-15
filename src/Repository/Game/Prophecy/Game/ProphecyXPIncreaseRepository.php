<?php

namespace App\Repository\Game\Prophecy\Game;

use App\Entity\Game\Prophecy\Game\ProphecyXPIncrease;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method XPIncrease|null find($id, $lockMode = null, $lockVersion = null)
 * @method XPIncrease|null findOneBy(array $criteria, array $orderBy = null)
 * @method XPIncrease[]    findAll()
 * @method XPIncrease[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProphecyXPIncreaseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProphecyXPIncrease::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ProphecyXPIncrease $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
 
    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(ProphecyXPIncrease $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return XPIncrease[] Returns an array of XPIncrease objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('x')
            ->andWhere('x.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('x.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?XPIncrease
    {
        return $this->createQueryBuilder('x')
            ->andWhere('x.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

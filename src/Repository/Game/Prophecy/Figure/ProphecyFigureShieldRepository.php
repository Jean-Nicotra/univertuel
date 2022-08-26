<?php

namespace App\Repository\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Figure\ProphecyFigureShield;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
 
/**
 * @method ProphecyFigureShield|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProphecyFigureShield|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProphecyFigureShield[]    findAll()
 * @method ProphecyFigureShield[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProphecyFigureShieldRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProphecyFigureShield::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ProphecyFigureShield $entity, bool $flush = true): void
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
    public function remove(ProphecyFigureShield $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ProphecyFigureShield[] Returns an array of ProphecyFigureShield objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProphecyFigureShield
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

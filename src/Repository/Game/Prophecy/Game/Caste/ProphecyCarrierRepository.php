<?php

namespace App\Repository\Game\Prophecy\Game\Caste;

use App\Entity\Game\Prophecy\Game\Caste\ProphecyCarrier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProphecyCarrier|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProphecyCarrier|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProphecyCarrier[]    findAll()
 * @method ProphecyCarrier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProphecyCarrierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProphecyCarrier::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ProphecyCarrier $entity, bool $flush = true): void
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
    public function remove(ProphecyCarrier $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ProphecyCarrier[] Returns an array of ProphecyCarrier objects
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
    public function findOneBySomeField($value): ?ProphecyCarrier
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

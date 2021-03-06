<?php

namespace App\Repository\Game\Prophecy\Game\Characteristic;

use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyCaracteristic;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
 
/**
 * @method ProphecyCaracteristic|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProphecyCaracteristic|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProphecyCaracteristic[]    findAll()
 * @method ProphecyCaracteristic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProphecyCaracteristicRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProphecyCaracteristic::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ProphecyCaracteristic $entity, bool $flush = true): void
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
    public function remove(ProphecyCaracteristic $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ProphecyCaracteristic[] Returns an array of ProphecyCaracteristic objects
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
    public function findOneBySomeField($value): ?ProphecyCaracteristic
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

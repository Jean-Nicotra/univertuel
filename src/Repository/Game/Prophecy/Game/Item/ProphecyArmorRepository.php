<?php

namespace App\Repository\Game\Prophecy\Game\Item;

use App\Entity\Game\Prophecy\Game\Item\ProphecyArmor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProphecyArmor|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProphecyArmor|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProphecyArmor[]    findAll()
 * @method ProphecyArmor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProphecyArmorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProphecyArmor::class);
    }
 
    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ProphecyArmor $entity, bool $flush = true): void
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
    public function remove(ProphecyArmor $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ProphecyArmor[] Returns an array of ProphecyArmor objects
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
    public function findOneBySomeField($value): ?ProphecyArmor
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

<?php

namespace App\Repository\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Figure\ProphecyFigureWeapon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
  
/**
 * @method ProphecyFigureWeapons|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProphecyFigureWeapons|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProphecyFigureWeapons[]    findAll()
 * @method ProphecyFigureWeapons[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProphecyFigureWeaponRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProphecyFigureWeapon::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ProphecyFigureWeapon $entity, bool $flush = true): void
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
    public function remove(ProphecyFigureWeapon $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ProphecyFigureWeapons[] Returns an array of ProphecyFigureWeapons objects
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
    public function findOneBySomeField($value): ?ProphecyFigureWeapons
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

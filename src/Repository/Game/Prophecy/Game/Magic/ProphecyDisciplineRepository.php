<?php

namespace App\Repository\Game\Prophecy\Game\Magic;

use App\Entity\Game\Prophecy\Game\Magic\ProphecyDiscipline;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProphecyDiscipline|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProphecyDiscipline|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProphecyDiscipline[]    findAll()
 * @method ProphecyDiscipline[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProphecyDisciplineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProphecyDiscipline::class);
    }
 
    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ProphecyDiscipline $entity, bool $flush = true): void
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
    public function remove(ProphecyDiscipline $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ProphecyDiscipline[] Returns an array of ProphecyDiscipline objects
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
    public function findOneBySomeField($value): ?ProphecyDiscipline
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

<?php

namespace App\Repository\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Figure\ProphecyFigureFavour;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
 
/**
 * @method ProphecyFigureFavour|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProphecyFigureFavour|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProphecyFigureFavour[]    findAll()
 * @method ProphecyFigureFavour[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProphecyFigureFavourRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProphecyFigureFavour::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ProphecyFigureFavour $entity, bool $flush = true): void
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
    public function remove(ProphecyFigureFavour $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ProphecyFigureFavour[] Returns an array of ProphecyFigureFavour objects
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
    public function findOneBySomeField($value): ?ProphecyFigureFavour
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

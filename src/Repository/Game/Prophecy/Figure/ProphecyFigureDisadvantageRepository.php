<?php
 
namespace App\Repository\Game\Prophecy\Figure;

use App\Entity\Game\Prophecy\Figure\ProphecyFigureDisadvantage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProphecyFigureDisadvantage|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProphecyFigureDisadvantage|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProphecyFigureDisadvantage[]    findAll()
 * @method ProphecyFigureDisadvantage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProphecyFigureDisadvantageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProphecyFigureDisadvantage::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ProphecyFigureDisadvantage $entity, bool $flush = true): void
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
    public function remove(ProphecyFigureDisadvantage $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ProphecyFigureDisadvantage[] Returns an array of ProphecyFigureDisadvantage objects
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
    public function findOneBySomeField($value): ?ProphecyFigureDisadvantage
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

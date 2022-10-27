<?php
 
namespace App\Repository\Game\Prophecy\Game\Characteristic;

use App\Entity\Game\Prophecy\Game\Characteristic\ProphecyWounds;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProphecyWounds|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProphecyWounds|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProphecyWounds[]    findAll()
 * @method ProphecyWounds[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProphecyWoundsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProphecyWounds::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ProphecyWounds $entity, bool $flush = true): void
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
    public function remove(ProphecyWounds $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ProphecyWounds[] Returns an array of ProphecyWounds objects
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
    public function findOneBySomeField($value): ?ProphecyWounds
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    
    public function findByMinMax($sum, $campaign)
    {
        return $this->createQueryBuilder('p')
        ->Where('p.minsum <= :sum AND p.maxsum >= :sum')
        ->andWhere('p.campaign = :campaign')
        ->setParameter('sum', $sum)
        ->setParameter('campaign', $campaign)
        ->getQuery()
        ->getResult()
        ;
    }
}

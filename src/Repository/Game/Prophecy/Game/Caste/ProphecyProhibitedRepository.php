<?php

namespace App\Repository\Game\Prophecy\Game\Caste;

use App\Entity\Game\Prophecy\Game\Caste\ProphecyProhibited;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Query\Parameter;

/**
 * @method ProphecyProhibited|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProphecyProhibited|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProphecyProhibited[]    findAll()
 * @method ProphecyProhibited[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProphecyProhibitedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProphecyProhibited::class);
    }

    /** 
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ProphecyProhibited $entity, bool $flush = true): void
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
    public function remove(ProphecyProhibited $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

     /**
      * @return ProphecyProhibited[] Returns an array of ProphecyProhibited objects
      */
    public function findByCasteCampaign($caste, $campaign): ?array
    {
        return $this->createQueryBuilder('p')
            ->Where('p.caste = :caste AND p.campaign  IS NULL')
            ->orWhere('p.caste = :caste AND p.campaign = :campaign')
            ->setParameter('caste', $caste)
            ->setParameter('campaign', $campaign)
            ->orderBy('p.name', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?ProphecyProhibited
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

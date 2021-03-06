<?php

namespace App\Repository\Game;

use App\Entity\Game\Campaign;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
//use Doctrine\DBAL\Driver\ResultStatement;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\OptimisticLockException;

/** 
 * @method Campaign|null find($id, $lockMode = null, $lockVersion = null)
 * @method Campaign|null findOneBy(array $criteria, array $orderBy = null)
 * @method Campaign[]    findAll()
 * @method Campaign[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CampaignRepository extends ServiceEntityRepository 
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Campaign::class);
    }
 
    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Campaign $entity, bool $flush = true): void
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
    public function remove(Campaign $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
    
    // /**
    //  * @return Campaign[] Returns an array of Campaign objects
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
     public function findOneBySomeField($value): ?Campaign
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

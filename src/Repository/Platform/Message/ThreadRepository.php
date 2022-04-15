<?php

namespace App\Repository\Platform\Message;

use App\Entity\Platform\Message\Thread;
use App\Entity\User\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Thread|null find($id, $lockMode = null, $lockVersion = null)
 * @method Thread|null findOneBy(array $criteria, array $orderBy = null)
 * @method Thread[]    findAll()
 * @method Thread[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ThreadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Thread::class);
    }

    // /**
    //  * @return Thread[] Returns an array of Thread objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Thread
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    
    
    public function findByUser(User $user)
    {
        return $this->createQueryBuilder('t')
            ->Where('t.sender = :id')
            ->orWhere('t.receiver = :id')
            ->andWhere('t.isReceiverDeleted = :value')
            ->andWhere('t.isSenderDeleted = :value')
            ->setParameter('id', $user->getId())
            ->setParameter('value', false)
            ->getQuery()
            ->getResult()
        ;
            
    }
    
}

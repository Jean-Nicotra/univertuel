<?php

namespace App\Repository\Platform\Message;

use App\Entity\Platform\Message\Message;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Platform\Message\Thread;

/**
 * @method Message|null find($id, $lockMode = null, $lockVersion = null)
 * @method Message|null findOneBy(array $criteria, array $orderBy = null)
 * @method Message[]    findAll()
 * @method Message[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MessageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Message::class);
    }

    // /**
    //  * @return Message[] Returns an array of Message objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Message
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    
    public function findMyAvailableMessages ($user)
    {
        $qb = $this->createQueryBuilder('m')
            ->join('m.thread', 't')
            ->addSelect('t')
            ->Where ('m.sender = :user')
            ->andWhere('t.isSenderDeleted = :value')
            ->orWhere('t.receiver = :user')
            ->andWhere('t.isReceiverDeleted = :value')
            ->setParameter('user', $user)
            ->setParameter('value', false)
        ;
        
        return $qb->getQuery()->getResult();
    }
    
    public function findByThread(Thread $thread)
    {
        return $this->createQueryBuilder('m')
            ->where('m.thread = :thread')
            ->setParameter('thread', $thread->getId())
            ->getQuery()
            ->getResult()
        ;    
    }
}

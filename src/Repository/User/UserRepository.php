<?php

namespace App\Repository\User;

use App\Entity\User\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\DBAL\Driver\ResultStatement;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(UserInterface $user, string $newEncodedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newEncodedPassword);
        $this->_em->persist($user);
        $this->_em->flush();
    }
 
    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    
    /************** for users administration ***************/
    
    /**
     * 
     * @param boolean $isactive = true
     * @return ResultStatement
     */
    public function findActiveUsers ($isactive = true)
    {
        return $this->createQueryBuilder('u')
        ->andWhere('u.isactive = :isactive')
        ->setParameter('isactive', $isactive)
        ->getQuery()
        ->getResult();
    }
    
    /**
     *
     * @param boolean $isactive = false
     * @return ResultStatement
     */
    public function findInactiveUsers ($isactive = false)
    {
        return $this->createQueryBuilder('u')
        ->andWhere('u.isactive = :isactive')
        ->setParameter('isactive', $isactive)
        ->getQuery()
        ->getResult();
    }
    
    /**
     * Role : get a users list to send a message, except current user
     * @param integer $senderId
     */
    public function findReceivers ($senderId)
    {
        return $this->createQueryBuilder('u')
        ->where('u.id != :id')
        ->setParameter('id', $senderId)
        ->getQuery()
        ->getResult();
    }
    
    


    
}

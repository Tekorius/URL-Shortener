<?php

namespace AppBundle\Repository;

use AppBundle\Entity\User;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Retrieve a user by their email
     *
     * @param string $email
     * @return User|null
     */
    public function getByEmail(string $email = null)
    {
        return $this->createQueryBuilder('t')
            ->select('t')
            ->where('t.email = :email')
            ->setParameter('email', $email)
            ->getQuery()
            ->getOneOrNullResult();
    }
}

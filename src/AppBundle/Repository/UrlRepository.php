<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Url;

/**
 * UrlRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UrlRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Retrieve Url entity by provided short url
     *
     * @param string $short
     * @return Url|null
     */
    public function getByShortUrl(string $short = null)
    {
        return $this->createQueryBuilder('t')
            ->select('t')
            ->where('t.short = :short')
            ->setParameter('short', $short)
            ->getQuery()
            ->getOneOrNullResult();
    }
}

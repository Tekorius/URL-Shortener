<?php

namespace AppBundle\Service;

use AppBundle\Entity\Url;
use AppBundle\Entity\User;
use AppBundle\Util\GuidGenerator;
use Symfony\Component\HttpFoundation\Request;

class UrlService
{
    /**
     * Create a new Url entity with required parameters set and generated
     *
     * @param string|null $ip
     * @param User|null $user
     * @return Url
     */
    public function createEntity(string $ip = null, User $user = null)
    {
        $url = new Url();

        // Set simple parameters
        $url
            ->setShort($this->generateShortUrlString())
            ->setCreatedByIp($ip)
            ->setCreatedByUser($user)
            ->setEditToken($this->generateGuidString())
        ;

        return $url;
    }

    /**
     * Generate a random string of provided length
     *
     * @param int $length
     * @return string
     */
    protected function generateShortUrlString(int $length = 6)
    {
        $seed = str_split(
            'abcdefghijklmnopqrstuvwxyz'
            .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            .'0123456789'
        );

        $rand = '';

        foreach (array_rand($seed, $length) as $k) {
            $rand .= $seed[$k];
        }

        return $rand;
    }

    /**
     * Generates a random GUID string
     *
     * @return string
     */
    protected function generateGuidString()
    {
        return GuidGenerator::generate();
    }
}
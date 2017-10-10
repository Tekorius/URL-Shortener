<?php

namespace AppBundle\Service;

use AppBundle\Entity\Click;
use AppBundle\Entity\Url;

/**
 * This service contains business logic of managing short url clicks
 */
class ClickService
{
    /**
     * Create a new click entity
     *
     * @param Url $url Url entity which was clicked
     * @param string|null $ip IP address of the clicker
     * @return Click The click entity
     */
    public function registerClick(Url $url, string $ip = null)
    {
        $click = new Click();

        $click
            ->setUrl($url)
            ->setClickedByIp($ip)
        ;

        return $click;
    }
}
<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Click
 *
 * @ORM\Table(name="click")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClickRepository")
 */
class Click
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="clicked_on", type="datetime")
     */
    private $clickedOn;

    /**
     * @var string
     *
     * @ORM\Column(name="clicked_by_ip", type="string", length=255)
     */
    private $clickedByIp;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @var Url
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Url")
     */
    private $url;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set clickedOn
     *
     * @param \DateTime $clickedOn
     *
     * @return Click
     */
    public function setClickedOn($clickedOn)
    {
        $this->clickedOn = $clickedOn;

        return $this;
    }

    /**
     * Get clickedOn
     *
     * @return \DateTime
     */
    public function getClickedOn()
    {
        return $this->clickedOn;
    }

    /**
     * Set clickedByIp
     *
     * @param string $clickedByIp
     *
     * @return Click
     */
    public function setClickedByIp($clickedByIp)
    {
        $this->clickedByIp = $clickedByIp;

        return $this;
    }

    /**
     * Get clickedByIp
     *
     * @return string
     */
    public function getClickedByIp()
    {
        return $this->clickedByIp;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Click
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set url
     *
     * @param \AppBundle\Entity\Url $url
     *
     * @return Click
     */
    public function setUrl(\AppBundle\Entity\Url $url = null)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return \AppBundle\Entity\Url
     */
    public function getUrl()
    {
        return $this->url;
    }
}

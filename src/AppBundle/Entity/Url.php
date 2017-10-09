<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Url
 *
 * @ORM\Table(name="url")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UrlRepository")
 */
class Url
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
     * Short url
     *
     * @var string
     *
     * @ORM\Column(name="short", type="string", length=255, unique=true)
     */
    private $short;

    /**
     * Long url to which we will redirect
     *
     * @var string
     *
     * @ORM\Column(name="full", type="string", length=1023)
     */
    private $full;

    /**
     * @var string
     *
     * @ORM\Column(name="created_by_ip", type="string", length=255)
     */
    private $createdByIp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_public", type="boolean")
     */
    private $isPublic;

    /**
     * @var string
     *
     * @ORM\Column(name="edit_token", type="string", length=255)
     */
    private $editToken;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     */
    private $createdByUser;


    public function __construct(string $full = null, string $short = null)
    {
        $this->full = $full;
        $this->short = $short;

        $this->createdAt = new \DateTime();
        $this->isPublic = false;
    }

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
     * Set short
     *
     * @param string $short
     *
     * @return Url
     */
    public function setShort($short)
    {
        $this->short = $short;

        return $this;
    }

    /**
     * Get short
     *
     * @return string
     */
    public function getShort()
    {
        return $this->short;
    }

    /**
     * Set full
     *
     * @param string $full
     *
     * @return Url
     */
    public function setFull($full)
    {
        $this->full = $full;

        return $this;
    }

    /**
     * Get full
     *
     * @return string
     */
    public function getFull()
    {
        return $this->full;
    }

    /**
     * Set createdByIp
     *
     * @param string $createdByIp
     *
     * @return Url
     */
    public function setCreatedByIp($createdByIp)
    {
        $this->createdByIp = $createdByIp;

        return $this;
    }

    /**
     * Get createdByIp
     *
     * @return string
     */
    public function getCreatedByIp()
    {
        return $this->createdByIp;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Url
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set isPublic
     *
     * @param boolean $isPublic
     *
     * @return Url
     */
    public function setIsPublic($isPublic)
    {
        $this->isPublic = $isPublic;

        return $this;
    }

    /**
     * Get isPublic
     *
     * @return bool
     */
    public function getIsPublic()
    {
        return $this->isPublic;
    }

    /**
     * Set editToken
     *
     * @param string $editToken
     *
     * @return Url
     */
    public function setEditToken($editToken)
    {
        $this->editToken = $editToken;

        return $this;
    }

    /**
     * Get editToken
     *
     * @return string
     */
    public function getEditToken()
    {
        return $this->editToken;
    }

    /**
     * Set createdByUser
     *
     * @param \AppBundle\Entity\User $createdByUser
     *
     * @return Url
     */
    public function setCreatedByUser(\AppBundle\Entity\User $createdByUser = null)
    {
        $this->createdByUser = $createdByUser;

        return $this;
    }

    /**
     * Get createdByUser
     *
     * @return \AppBundle\Entity\User
     */
    public function getCreatedByUser()
    {
        return $this->createdByUser;
    }
}

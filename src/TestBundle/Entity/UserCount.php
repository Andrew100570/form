<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserCount
 *
 * @ORM\Table(name="user_count")
 * @ORM\Entity(repositoryClass="TestBundle\Repository\UserCountRepository")
 */
class UserCount
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
     * @var int
     *
     * @ORM\Column(name="bel_count", type="integer")
     */
    private $belCount;

    /**
     * @var int
     *
     * @ORM\Column(name="rus_count", type="integer")
     */
    private $rusCount;

    /**
     * @var int
     *
     * @ORM\Column(name="ykr_count", type="integer")
     */
    private $ykrCount;

    /**
     * @var int
     *
     * @ORM\Column(name="kaz_count", type="integer")
     */
    private $kazCount;


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
     * Set belCount
     *
     * @param integer $belCount
     *
     * @return UserCount
     */
    public function setBelCount($belCount)
    {
        $this->belCount = $belCount;

        return $this;
    }

    /**
     * Get belCount
     *
     * @return int
     */
    public function getBelCount()
    {
        return $this->belCount;
    }

    /**
     * Set rusCount
     *
     * @param integer $rusCount
     *
     * @return UserCount
     */
    public function setRusCount($rusCount)
    {
        $this->rusCount = $rusCount;

        return $this;
    }

    /**
     * Get rusCount
     *
     * @return int
     */
    public function getRusCount()
    {
        return $this->rusCount;
    }

    /**
     * Set ykrCount
     *
     * @param integer $ykrCount
     *
     * @return UserCount
     */
    public function setYkrCount($ykrCount)
    {
        $this->ykrCount = $ykrCount;

        return $this;
    }

    /**
     * Get ykrCount
     *
     * @return int
     */
    public function getYkrCount()
    {
        return $this->ykrCount;
    }

    /**
     * Set kazCount
     *
     * @param integer $kazCount
     *
     * @return UserCount
     */
    public function setKazCount($kazCount)
    {
        $this->kazCount = $kazCount;

        return $this;
    }

    /**
     * Get kazCount
     *
     * @return int
     */
    public function getKazCount()
    {
        return $this->kazCount;
    }
}


<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * City
 *
 *
 * @ORM\Table(name="city")
 * @ORM\Entity(repositoryClass="TestBundle\Repository\CityRepository")
 */
class City
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
     * @ORM\Column(name="region_id", type="integer")
     */
    private $regionId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="crt_date", type="datetime")
     */
    private $crtDate;


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
     * Set regionId
     *
     * @param integer $regionId
     *
     * @return City
     */
    public function setRegionId($regionId)
    {
        $this->regionId = $regionId;

        return $this;
    }

    /**
     * Get regionId
     *
     * @return int
     */
    public function getRegionId()
    {
        return $this->regionId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return City
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set crtDate
     *
     * @param \DateTime $crtDate
     *
     * @return City
     */
    public function setCrtDate($crtDate)
    {
        $this->crtDate = $crtDate;

        return $this;
    }

    /**
     * Get crtDate
     *
     * @return \DateTime
     */
    public function getCrtDate()
    {
        return $this->crtDate;
    }
}


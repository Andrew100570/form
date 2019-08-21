<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rubrika
 *
 * @ORM\Table(name="rubrika")
 * @ORM\Entity(repositoryClass="TestBundle\Repository\RubrikaRepository")
 */
class Rubrika
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
     * @var string
     *
     * @ORM\Column(name="column_1", type="string", length=100)
     */
    private $column1;

    /**
     * @var string
     *
     * @ORM\Column(name="ID__", type="string", length=100)
     */
    private $iD;


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
     * Set column1
     *
     * @param string $column1
     *
     * @return Rubrika
     */
    public function setColumn1($column1)
    {
        $this->column1 = $column1;

        return $this;
    }

    /**
     * Get column1
     *
     * @return string
     */
    public function getColumn1()
    {
        return $this->column1;
    }

    /**
     * Set iD
     *
     * @param string $iD
     *
     * @return Rubrika
     */
    public function setID($iD)
    {
        $this->iD = $iD;

        return $this;
    }
}


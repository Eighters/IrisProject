<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Objectif
 *
 * @ORM\Table(name="objectif")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ObjectifRepository")
 */
class Objectif
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
     * @ORM\Column(name="description", type="string", length=300)
     */
    private $description;
    
        /**
     * @var int
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Enjeux", cascade={"persist"})
     */
    private $enjeux;


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
     * Set description
     *
     * @param string $description
     *
     * @return Objectif
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set enjeux
     *
     * @param integer $enjeux
     *
     * @return Objectif
     */
    public function setEnjeux($enjeux)
    {
        $this->enjeux = $enjeux;

        return $this;
    }

    /**
     * Get enjeux
     *
     * @return integer
     */
    public function getEnjeux()
    {
        return $this->enjeux;
    }
}
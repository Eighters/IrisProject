<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Exigence;

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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Enjeux", cascade={"persist"}, inversedBy="objectifs")
     * @ORM\JoinColumn(name="enjeux_id", referencedColumnName="id")
     */
    private $enjeux;

    /**
     * @var ArrayCollection
     * One Objectif has Many Exigences.
     * @ORM\OneToMany(targetEntity="Exigence", mappedBy="objectif")
     */
    private $exigences;


    public function __construct() {
        $this->exigences = new ArrayCollection();
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


    /**
     * Add exigence
     *
     * @param Exigence $exigence
     *
     * @return Objectif
     */
    public function addExigence(Exigence $exigence)
    {
        $this->exigences[] = $exigence;

        return $this;
    }

    /**
     * Remove exigence
     *
     * @param Exigence $exigence
     */
    public function removeExigence(Exigence $exigence)
    {
        $this->exigences->removeElement($exigence);
    }

    /**
     * Get exigences
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExigences()
    {
        return $this->exigences;
    }
}

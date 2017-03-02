<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exigence
 *
 * @ORM\Table(name="exigence")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExigenceRepository")
 */
class Exigence
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
     * @ORM\Column(name="reference", type="string", length=50)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="definition", type="string", length=70)
     */
    private $definition;

    /**
     * @var string
     *
     * @ORM\Column(name="condition_acceptation", type="string", length=80)
     */
    private $conditionAcceptation;

    /**
     * @var string
     *
     * @ORM\Column(name="priorite", type="string", length=50)
     */
    private $priorite;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=50)
     */
    private $statut;

    /**
     * @var int
     *
     * @ORM\Column(name="objectif_id", type="integer")
     */
    private $objectifId;

    /**
     * @var int
     *
     * @ORM\Column(name="partie_prenante_id", type="integer")
     */
    private $partiePrenanteId;


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
     * Set reference
     *
     * @param string $reference
     *
     * @return Exigence
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set definition
     *
     * @param string $definition
     *
     * @return Exigence
     */
    public function setDefinition($definition)
    {
        $this->definition = $definition;

        return $this;
    }

    /**
     * Get definition
     *
     * @return string
     */
    public function getDefinition()
    {
        return $this->definition;
    }

    /**
     * Set conditionAcceptation
     *
     * @param string $conditionAcceptation
     *
     * @return Exigence
     */
    public function setConditionAcceptation($conditionAcceptation)
    {
        $this->conditionAcceptation = $conditionAcceptation;

        return $this;
    }

    /**
     * Get conditionAcceptation
     *
     * @return string
     */
    public function getConditionAcceptation()
    {
        return $this->conditionAcceptation;
    }

    /**
     * Set priorite
     *
     * @param string $priorite
     *
     * @return Exigence
     */
    public function setPriorite($priorite)
    {
        $this->priorite = $priorite;

        return $this;
    }

    /**
     * Get priorite
     *
     * @return string
     */
    public function getPriorite()
    {
        return $this->priorite;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Exigence
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set objectifId
     *
     * @param integer $objectifId
     *
     * @return Exigence
     */
    public function setObjectifId($objectifId)
    {
        $this->objectifId = $objectifId;

        return $this;
    }

    /**
     * Get objectifId
     *
     * @return int
     */
    public function getObjectifId()
    {
        return $this->objectifId;
    }

    /**
     * Set partiePrenanteId
     *
     * @param integer $partiePrenanteId
     *
     * @return Exigence
     */
    public function setPartiePrenanteId($partiePrenanteId)
    {
        $this->partiePrenanteId = $partiePrenanteId;

        return $this;
    }

    /**
     * Get partiePrenanteId
     *
     * @return int
     */
    public function getPartiePrenanteId()
    {
        return $this->partiePrenanteId;
    }
}


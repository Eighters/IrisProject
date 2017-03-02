<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jalon
 *
 * @ORM\Table(name="jalon")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JalonRepository")
 */
class Jalon
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
     * @ORM\Column(name="resultatAttendu", type="string", length=50)
     */
    private $resultatAttendu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateLivraisonInitial", type="date")
     */
    private $dateLivraisonInitial;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateLivraisonReplanifiee", type="date")
     */
    private $dateLivraisonReplanifiee;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateLivraisonReelle", type="date")
     */
    private $dateLivraisonReelle;

    /**
     * @var string
     *
     * @ORM\Column(name="observations", type="string", length=300)
     */
    private $observations;

    /**
     * @var int
     *
     * @ORM\Column(name="project_id", type="integer")
     */
    private $projectId;


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
     * Set resultatAttendu
     *
     * @param string $resultatAttendu
     *
     * @return Jalon
     */
    public function setResultatAttendu($resultatAttendu)
    {
        $this->resultatAttendu = $resultatAttendu;

        return $this;
    }

    /**
     * Get resultatAttendu
     *
     * @return string
     */
    public function getResultatAttendu()
    {
        return $this->resultatAttendu;
    }

    /**
     * Set dateLivraisonInitial
     *
     * @param \DateTime $dateLivraisonInitial
     *
     * @return Jalon
     */
    public function setDateLivraisonInitial($dateLivraisonInitial)
    {
        $this->dateLivraisonInitial = $dateLivraisonInitial;

        return $this;
    }

    /**
     * Get dateLivraisonInitial
     *
     * @return \DateTime
     */
    public function getDateLivraisonInitial()
    {
        return $this->dateLivraisonInitial;
    }

    /**
     * Set dateLivraisonReplanifiee
     *
     * @param \DateTime $dateLivraisonReplanifiee
     *
     * @return Jalon
     */
    public function setDateLivraisonReplanifiee($dateLivraisonReplanifiee)
    {
        $this->dateLivraisonReplanifiee = $dateLivraisonReplanifiee;

        return $this;
    }

    /**
     * Get dateLivraisonReplanifiee
     *
     * @return \DateTime
     */
    public function getDateLivraisonReplanifiee()
    {
        return $this->dateLivraisonReplanifiee;
    }

    /**
     * Set dateLivraisonReelle
     *
     * @param \DateTime $dateLivraisonReelle
     *
     * @return Jalon
     */
    public function setDateLivraisonReelle($dateLivraisonReelle)
    {
        $this->dateLivraisonReelle = $dateLivraisonReelle;

        return $this;
    }

    /**
     * Get dateLivraisonReelle
     *
     * @return \DateTime
     */
    public function getDateLivraisonReelle()
    {
        return $this->dateLivraisonReelle;
    }

    /**
     * Set observations
     *
     * @param string $observations
     *
     * @return Jalon
     */
    public function setObservations($observations)
    {
        $this->observations = $observations;

        return $this;
    }

    /**
     * Get observations
     *
     * @return string
     */
    public function getObservations()
    {
        return $this->observations;
    }

    /**
     * Set projectId
     *
     * @param integer $projectId
     *
     * @return Jalon
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;

        return $this;
    }

    /**
     * Get projectId
     *
     * @return int
     */
    public function getProjectId()
    {
        return $this->projectId;
    }
}


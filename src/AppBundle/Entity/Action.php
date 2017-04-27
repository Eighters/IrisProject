<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Action
 *
 * @ORM\Table(name="action")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ActionRepository")
 */
class Action
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
     * @ORM\Column(name="visibilite", type="string", length=50)
     */
    private $visibilite;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PartiePrenante", cascade={"persist"}, inversedBy="actions")
     * @ORM\JoinColumn(name="responsable_id", referencedColumnName="id")
     */
    private $responsable;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PartiePrenante", cascade={"persist"}, inversedBy="actions")
     * @ORM\JoinColumn(name="origine_id", referencedColumnName="id")
     */
    private $origine;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebut", type="date")
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="echeancePrevue", type="date")
     */
    private $echeancePrevue;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFinReelle", type="date", nullable=true)
     */
    private $dateFinReelle;

    /**
     * @var string
     *
     * @ORM\Column(name="urgence", type="string", length=50)
     */
    private $urgence;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=50)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="observation", type="string", length=300, nullable=true)
     */
    private $observation;


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
     * Set visibilite
     *
     * @param string $visibilite
     *
     * @return Action
     */
    public function setVisibilite($visibilite)
    {
        $this->visibilite = $visibilite;

        return $this;
    }

    /**
     * Get visibilite
     *
     * @return string
     */
    public function getVisibilite()
    {
        return $this->visibilite;
    }

    /**
     * Set responsable
     *
     * @param string $responsable
     *
     * @return Action
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get responsable
     *
     * @return string
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * Set origine
     *
     * @param string $origine
     *
     * @return Action
     */
    public function setOrigine($origine)
    {
        $this->origine = $origine;

        return $this;
    }

    /**
     * Get origine
     *
     * @return string
     */
    public function getOrigine()
    {
        return $this->origine;
    }

    /**
     * Set datedebut
     *
     * @param \DateTime $datedebut
     *
     * @return Action
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    /**
     * Get datedebut
     *
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set echeancePrevue
     *
     * @param \DateTime $echeancePrevue
     *
     * @return Action
     */
    public function setEcheancePrevue($echeancePrevue)
    {
        $this->echeancePrevue = $echeancePrevue;

        return $this;
    }

    /**
     * Get echeancePrevue
     *
     * @return \DateTime
     */
    public function getEcheancePrevue()
    {
        return $this->echeancePrevue;
    }

    /**
     * Set dateFinReelle
     *
     * @param \DateTime $dateFinReelle
     *
     * @return Action
     */
    public function setDateFinReelle($dateFinReelle)
    {
        $this->dateFinReelle = $dateFinReelle;

        return $this;
    }

    /**
     * Get dateFinReelle
     *
     * @return \DateTime
     */
    public function getDateFinReelle()
    {
        return $this->dateFinReelle;
    }

    /**
     * Set urgence
     *
     * @param string $urgence
     *
     * @return Action
     */
    public function setUrgence($urgence)
    {
        $this->urgence = $urgence;

        return $this;
    }

    /**
     * Get urgence
     *
     * @return string
     */
    public function getUrgence()
    {
        return $this->urgence;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Action
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set observation
     *
     * @param string $observation
     *
     * @return Action
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation
     *
     * @return string
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set partiePrenante
     *
     * @param integer $partiePrenante
     *
     * @return Action
     */
    public function setPartiePrenante($partiePrenante)
    {
        $this->partiePrenanteId = $partiePrenante;

        return $this;
    }

    /**
     * Get partiePrenante
     *
     * @return \AppBundle\Entity\PartiePrenante
     */
    public function getPartiePrenante()
    {
        return $this->partiePrenante;
    }
}

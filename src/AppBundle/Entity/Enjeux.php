<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Objectif;

/**
 * Enjeux
 *
 * @ORM\Table(name="enjeux")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EnjeuxRepository")
 */
class Enjeux
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
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="priorite", type="string", length=35)
     */
    private $priorite;

    /**
     * @var string
     *
     * @ORM\Column(name="valeur_cible", type="string", length=50)
     */
    private $valeurCible;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Project", cascade={"persist"}, inversedBy="enjeux")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $project;

    /**
     * @var ArrayCollection
     * One Enjeux has Many Objectifs.
     * @ORM\OneToMany(targetEntity="Objectif", mappedBy="enjeux")
     */
    private $objectifs;


    public function __construct() {
        $this->objectifs = new ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Enjeux
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Enjeux
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set priorite
     *
     * @param string $priorite
     *
     * @return Enjeux
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
     * Set valeurCible
     *
     * @param string $valeurCible
     *
     * @return Enjeux
     */
    public function setValeurCible($valeurCible)
    {
        $this->valeurCible = $valeurCible;

        return $this;
    }

    /**
     * Get valeurCible
     *
     * @return string
     */
    public function getValeurCible()
    {
        return $this->valeurCible;
    }

    /**
     * Set project
     *
     * @param integer $project
     *
     * @return Enjeux
     */
    public function setProject($project)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return int
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Add objectif
     *
     * @param Objectif $objectif
     *
     * @return Enjeux
     */
    public function addObjectif(Objectif $objectif)
    {
        $this->objectifs[] = $objectif;

        return $this;
    }

    /**
     * Remove objectif
     *
     * @param Objectif $objectif
     */
    public function removeObjectif(Objectif $objectif)
    {
        $this->objectifs->removeElement($objectif);
    }

    /**
     * Get objectifs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getObjectifs()
    {
        return $this->objectifs;
    }
}

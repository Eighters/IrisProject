<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * Set projectId
     *
     * @param integer $projectId
     *
     * @return Enjeux
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


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\PartiePrenante

/**
 * RoleProject
 *
 * @ORM\Table(name="role_project")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RoleProjectRepository")
 */
class RoleProject
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
     * @ORM\Column(name="type", type="string", length=50)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=60)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=300)
     */
    private $description;

    /**
     * @var ArrayCollection
     * One RoleProject has Many Parties Prenantes.
     * @ORM\OneToMany(targetEntity="PartiePrenante", mappedBy="roleProject")
     */
    private $partiesPrenantes;


    public function __construct() {
        $this->partiesPrenantes = new ArrayCollection();
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
     * Set type
     *
     * @param string $type
     *
     * @return RoleProject
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
     * Set nom
     *
     * @param string $nom
     *
     * @return RoleProject
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
     * Set description
     *
     * @param string $description
     *
     * @return RoleProject
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
     * Add partiePrenante
     *
     * @param PartiePrenante $partiePrenante
     *
     * @return RoleProject
     */
    public function addPartiePrenante(PartiePrenante $partiePrenante)
    {
        $this->partiesPrenantes[] = $partiePrenante;

        return $this;
    }

    /**
     * Remove partiePrenante
     *
     * @param PartiePrenante $partiePrenante
     */
    public function removePartiePrenante(PartiePrenante $partiePrenante)
    {
        $this->partiesPrenantes->removeElement($partiePrenante);
    }

    /**
     * Get partiesPrenantes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPartiesPrenantes()
    {
        return $this->partiesPrenantes;
    }
}

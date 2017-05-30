<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\PartiePrenante;


/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * 
     * @ORM\Column(type="string", length=90)
     */
    private $address = null;

    public function __construct()
    {
        $this->partiesPrenantes = new ArrayCollection();
        parent::__construct();
    }


    
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50 )
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Company", cascade={"persist"}, inversedBy="users")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    private $company;

    /**
     * @var ArrayCollection
     * One User has Many Partie Prenantes.
     * @ORM\OneToMany(targetEntity="PartiePrenante", mappedBy="user")
     */
    private $partiesprenantes;
    

    /**
     * Set address
     *
     * @param string $address
     *
     * @return address
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
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
     * Set company
     *
     * @param \AppBundle\Entity\Company $company
     *
     * @return User
     */
    public function setCompany(\AppBundle\Entity\Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \AppBundle\Entity\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Add partiePrenante
     *
     * @param PartiePrenante $partiePrenante
     *
     * @return User
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

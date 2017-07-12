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
     * @ORM\ManyToMany(targetEntity="PartiePrenante")
     */
    private $partiesPrenantes;

    /**
     * @var ArrayCollection
     * One PartiePrenante has Many Actions.
     * @ORM\OneToMany(targetEntity="Action", mappedBy="responsable")
     */
    private $actions;

    /**
     * @var ArrayCollection
     * One PartiePrenante has Many Created Actions.
     * @ORM\OneToMany(targetEntity="Action", mappedBy="origine")
     */
    private $actionsCreated;
    

    public function __construct()
    {
        $this->partiesPrenantes = new ArrayCollection();
        $this->actions = new ArrayCollection();
        $this->actionsCreated = new ArrayCollection();
        parent::__construct();
    }

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

    /**
     * Add action
     *
     * @param Action $action
     *
     * @return User
     */
    public function addAction(Action $action)
    {
        $this->actions[] = $action;

        return $this;
    }

    /**
     * Remove action
     *
     * @param Action $action
     */
    public function removeAction(Action $action)
    {
        $this->actions->removeElement($action);
    }

    /**
     * Get actions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * Add actionCreated
     *
     * @param Action $actionCreated
     *
     * @return User
     */
    public function addActionCreated(Action $actionCreated)
    {
        $this->actionsCreated[] = $actionCreated;

        return $this;
    }

    /**
     * Remove actionCreated
     *
     * @param Action $actionCreated
     */
    public function removeActionCreated(Action $actionCreated)
    {
        $this->actionsCreated->removeElement($actionCreated);
    }

    /**
     * Get actionsCreated
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActionsCreated()
    {
        return $this->actionsCreated;
    }

}

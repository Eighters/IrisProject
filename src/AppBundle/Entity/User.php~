<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Company", cascade={"persist"})
     */
    private $company;

    /**
     * @var int
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\RoleUser", cascade={"persist"})
     */
    private $roleUser;
    

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
     * Set roleUser
     *
     * @param \AppBundle\Entity\RoleUser $roleUser
     *
     * @return User
     */
    public function setRoleUser(\AppBundle\Entity\RoleUser $roleUser = null)
    {
        $this->roleUser = $roleUser;

        return $this;
    }

    /**
     * Get roleUser
     *
     * @return \AppBundle\Entity\RoleUser
     */
    public function getRoleUser()
    {
        return $this->roleUser;
    }
}

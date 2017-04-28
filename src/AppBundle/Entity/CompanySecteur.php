<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompanySecteur
 *
 * @ORM\Table(name="company_secteur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CompanySecteurRepository")
 */
class CompanySecteur
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="iconpath", type="string", length=255, nullable=true)
     */
    private $iconpath;

    /**
     * @var ArrayCollection
     * One Secteur has Many Companies.
     * @ORM\OneToMany(targetEntity="Company", mappedBy="secteurCompany")
     */
    private $companies;


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
     * Set name
     *
     * @param string $name
     *
     * @return CompanySecteur
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set iconpath
     *
     * @param string $iconpath
     *
     * @return CompanySecteur
     */
    public function setIconpath($iconpath)
    {
        $this->iconpath = $iconpath;

        return $this;
    }

    /**
     * Get iconpath
     *
     * @return string
     */
    public function getIconpath()
    {
        return $this->iconpath;
    }
}

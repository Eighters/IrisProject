<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Company
 *
 * @ORM\Table(name="company")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CompanyRepository")
 */
class Company
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
     * @ORM\Column(name="raisonSocial", type="string", length=60)
     */
    private $raisonSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="siret", type="string", length=60)
     */
    private $siret;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=60)
     */
    private $telephone;


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
     * Set raisonSocial
     *
     * @param string $raisonSocial
     *
     * @return Company
     */
    public function setRaisonSocial($raisonSocial)
    {
        $this->raisonSocial = $raisonSocial;

        return $this;
    }

    /**
     * Get raisonSocial
     *
     * @return string
     */
    public function getRaisonSocial()
    {
        return $this->raisonSocial;
    }

    /**
     * Set siret
     *
     * @param string $siret
     *
     * @return Company
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;

        return $this;
    }

    /**
     * Get siret
     *
     * @return string
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Company
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }
}

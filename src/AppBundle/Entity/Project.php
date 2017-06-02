<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Company;
use AppBundle\Entity\PartiePrenante;
use AppBundle\Entity\Enjeux;
use AppBundle\Entity\Jalon;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjectRepository")
 */
class Project
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateLancement", type="date")
     */
    private $dateLancement;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="besoin", type="string", length=300, nullable=true)
     */
    private $besoin;

    /**
     * @var string
     *
     * @ORM\Column(name="origine", type="string", length=70, nullable=true)
     */
    private $origine;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="benefices", type="string", length=100, nullable=true)
     */
    private $benefices;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ProjectCategory", cascade={"persist"}, inversedBy="projects")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @var ArrayCollection
     * One Project has Many companies
     * @ORM\ManyToMany(targetEntity="Company", inversedBy="projects")
     */
    private $companies;

    /**
     * @var ArrayCollection
     * One Project has Many Partie Prenantes.
     * @ORM\OneToMany(targetEntity="PartiePrenante", mappedBy="project")
     */
    private $partiesprenantes;

    /**
     * @var ArrayCollection
     * One Project has Many enjeux.
     * @ORM\OneToMany(targetEntity="Enjeux", mappedBy="project")
     */
    private $enjeux;

    /**
     * @var ArrayCollection
     * One Project has Many Jalon.
     * @ORM\OneToMany(targetEntity="Jalon", mappedBy="project")
     */
    private $jalons;


    public function __construct() {
        $this->companies = new ArrayCollection();
        $this->partiesprenantes = new ArrayCollection();
        $this->enjeux = new ArrayCollection();
        $this->jalons = new ArrayCollection();
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
     * @return Project
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
     * Set dateLancement
     *
     * @param \DateTime $dateLancement
     *
     * @return Project
     */
    public function setDateLancement($dateLancement)
    {
        $this->dateLancement = $dateLancement;

        return $this;
    }

    /**
     * Get dateLancement
     *
     * @return \DateTime
     */
    public function getDateLancement()
    {
        return $this->dateLancement;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Project
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
     * Set besoin
     *
     * @param string $besoin
     *
     * @return Project
     */
    public function setBesoin($besoin)
    {
        $this->besoin = $besoin;

        return $this;
    }

    /**
     * Get besoin
     *
     * @return string
     */
    public function getBesoin()
    {
        return $this->besoin;
    }

    /**
     * Set origine
     *
     * @param string $origine
     *
     * @return Project
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
     * Set description
     *
     * @param string $description
     *
     * @return Project
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
     * Set benefices
     *
     * @param string $benefices
     *
     * @return Project
     */
    public function setBenefices($benefices)
    {
        $this->benefices = $benefices;

        return $this;
    }

    /**
     * Get benefices
     *
     * @return string
     */
    public function getBenefices()
    {
        return $this->benefices;
    }

    /**
     * Set category
     *
     * @param integer $category
     *
     * @return Project
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return int
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add company
     *
     * @param Company $company
     *
     * @return Project
     */
    public function addCompany(Company $company)
    {
        $this->companies[] = $company;

        return $this;
    }

    /**
     * Remove company
     *
     * @param Company $company
     */
    public function removeCompany(Company $company)
    {
        $this->companies->removeElement($company);
    }

    /**
     * Get companies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompanies()
    {
        return $this->companies;
    }


    /**
     * Add partiePrenante
     *
     * @param PartiePrenante $partiePrenante
     *
     * @return Project
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
     * Add enjeu
     *
     * @param Enjeux $enjeu
     *
     * @return Project
     */
    public function addEnjeu(Enjeux $enjeu)
    {
        $this->enjeux[] = $enjeu;

        return $this;
    }

    /**
     * Remove enjeu
     *
     * @param Enjeux $enjeu
     */
    public function removeEnjeu(Enjeux $enjeu)
    {
        $this->enjeux->removeElement($enjeu);
    }

    /**
     * Get enjeux
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEnjeux()
    {
        return $this->enjeux;
    }

    /**
     * Add jalon
     *
     * @param Jalon $jalon
     *
     * @return Project
     */
    public function addJalon(Jalon $jalon)
    {
        $this->jalons[] = $jalon;

        return $this;
    }

    /**
     * Remove jalon
     *
     * @param Jalon $jalon
     */
    public function removeJalon(Jalon $jalon)
    {
        $this->jalons->removeElement($jalon);
    }

    /**
     * Get jalons
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJalons()
    {
        return $this->jalons;
    }
}

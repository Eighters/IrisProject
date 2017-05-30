<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ProjectCategory", cascade={"persist"}, inversedBy="projects")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;


    public function __construct() {
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
}

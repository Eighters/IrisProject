<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Exigence
use AppBundle\Entity\Action


/**
 * PartiePrenante
 *
 * @ORM\Table(name="partie_prenante")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PartiePrenanteRepository")
 */
class PartiePrenante
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
     * @ORM\Column(name="influence", type="string", length=50, nullable=true)
     */
    private $influence;

    /**
     * @var string
     *
     * @ORM\Column(name="impact", type="string", length=50, nullable=true)
     */
    private $impact;

    /**
     * @var string
     *
     * @ORM\Column(name="observation", type="string", length=300, nullable=true)
     */
    private $observation;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", cascade={"persist"}, inversedBy="partiesprenantes")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\RoleProject", cascade={"persist"}, inversedBy="partiesPrenantes")
     * @ORM\JoinColumn(name="roleproject_id", referencedColumnName="id")
     */
    private $roleProject;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Project", cascade={"persist"}, inversedBy="partiesprenantes")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $project;

    /**
     * @var ArrayCollection
     * One PartiePrenante has Many Exigences.
     * @ORM\OneToMany(targetEntity="Exigence", mappedBy="partiePrenante")
     */
    private $exigences;

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


    public function __construct() {
        $this->exigences = new ArrayCollection();
        $this->actions = new ArrayCollection();
        $this->actionsCreated = new ArrayCollection();
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
     * @return PartiePrenante
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
     * @return PartiePrenante
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
     * Set influence
     *
     * @param string $influence
     *
     * @return PartiePrenante
     */
    public function setInfluence($influence)
    {
        $this->influence = $influence;

        return $this;
    }

    /**
     * Get influence
     *
     * @return string
     */
    public function getInfluence()
    {
        return $this->influence;
    }

    /**
     * Set impact
     *
     * @param string $impact
     *
     * @return PartiePrenante
     */
    public function setImpact($impact)
    {
        $this->impact = $impact;

        return $this;
    }

    /**
     * Get impact
     *
     * @return string
     */
    public function getImpact()
    {
        return $this->impact;
    }

    /**
     * Set observation
     *
     * @param string $observation
     *
     * @return PartiePrenante
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation
     *
     * @return string
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set user
     *
     * @param integer $user
     *
     * @return PartiePrenante
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return int
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set roleProject
     *
     * @param integer $roleProject
     *
     * @return PartiePrenante
     */
    public function setRoleProject($roleProject)
    {
        $this->roleProject = $roleProject;

        return $this;
    }

    /**
     * Get roleProject
     *
     * @return int
     */
    public function getRoleProject()
    {
        return $this->roleProject;
    }

    /**
     * Set project
     *
     * @param integer $project
     *
     * @return PartiePrenante
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
     * Add exigence
     *
     * @param Exigence $exigence
     *
     * @return PartiePrenante
     */
    public function addExigence(Exigence $exigence)
    {
        $this->exigences[] = $exigence;

        return $this;
    }

    /**
     * Remove exigence
     *
     * @param Exigence $exigence
     */
    public function removeExigence(Exigence $exigence)
    {
        $this->exigences->removeElement($exigence);
    }

    /**
     * Get exigences
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExigences()
    {
        return $this->exigences;
    }


    /**
     * Add action
     *
     * @param Action $action
     *
     * @return PartiePrenante
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
     * @return PartiePrenante
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

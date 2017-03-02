<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="influence", type="string", length=50)
     */
    private $influence;

    /**
     * @var string
     *
     * @ORM\Column(name="impact", type="string", length=50)
     */
    private $impact;

    /**
     * @var string
     *
     * @ORM\Column(name="observation", type="string", length=300)
     */
    private $observation;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\Column(name="role_project_id", type="integer")
     */
    private $roleProjectId;

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
     * Set userId
     *
     * @param integer $userId
     *
     * @return PartiePrenante
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set roleProjectId
     *
     * @param integer $roleProjectId
     *
     * @return PartiePrenante
     */
    public function setRoleProjectId($roleProjectId)
    {
        $this->roleProjectId = $roleProjectId;

        return $this;
    }

    /**
     * Get roleProjectId
     *
     * @return int
     */
    public function getRoleProjectId()
    {
        return $this->roleProjectId;
    }

    /**
     * Set projectId
     *
     * @param integer $projectId
     *
     * @return PartiePrenante
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


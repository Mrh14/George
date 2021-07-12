<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="interlocuteurs")
 */
class Interlocuteurs {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $nom;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $prenom;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $fonction;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $tel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Chantier", inversedBy="interlocuteurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(onDelete="CASCADE", nullable=false)
     * })
     */
    private $chantier;


    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * @param mixed $fonction
     */
    public function setFonction($fonction): void
    {
        $this->fonction = $fonction;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel): void
    {
        $this->tel = $tel;
    }
    /**
     * @return mixed
     */
    public function getChantier()
    {
        return $this->chantier;
    }

    /**
     * @param mixed $chantier
     */
    public function setChantier($chantier): void
    {
        $this->chantier = $chantier;
    }
    

    }
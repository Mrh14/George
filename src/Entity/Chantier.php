<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="chantier")
 */
class Chantier {

    public function __construct()
    {
        $this->Interlocuteurs = new ArrayCollection();
    }

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $type;

    /**
     * @ORM\OneToMany(
     *     targetEntity="App\Entity\Interlocuteurs",
     *     mappedBy="fonction",
          *     )
     */
    private $Interlocuteurs;

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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }
    public function __toString()
    {
        return $this->type;
    }

    }
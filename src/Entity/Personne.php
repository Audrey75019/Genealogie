<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonneRepository")
 */
class Personne
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private $profession;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Matricule", cascade={"persist", "remove"})
     */
    private $matricule;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Place", inversedBy="personnes")
     */
    private $passe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Association", inversedBy="personnes")
     */
    private $avoir;

    public function __construct()
    {
        $this->passe = new ArrayCollection();
    }
    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(?string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getMatricule(): ?Matricule
    {
        return $this->matricule;
    }

    public function setMatricule(?Matricule $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * @return Collection|Place[]
     */
    public function getPasse(): Collection
    {
        return $this->passe;
    }

    public function addPasse(Place $passe): self
    {
        if (!$this->passe->contains($passe)) {
            $this->passe[] = $passe;
        }

        return $this;
    }

    public function removePasse(Place $passe): self
    {
        if ($this->passe->contains($passe)) {
            $this->passe->removeElement($passe);
        }

        return $this;
    }

    public function getAvoir(): ?Association
    {
        return $this->avoir;
    }

    public function setAvoir(?Association $avoir): self
    {
        $this->avoir = $avoir;

        return $this;
    }

}

<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlaceRepository")
 */
class Place
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
    private $country;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $postalCode;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $city;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\FaitNotable", mappedBy="lieu")
     */
    private $faitNotables;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\FaitNotable", inversedBy="lieu")
     */
    private $lieu;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Personne", mappedBy="passe")
     */
    private $personnes;

    public function __construct()
    {
        $this->faitNotables = new ArrayCollection();
        $this->personnes = new ArrayCollection();
    }
    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->city;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postalCode;
    }

    public function setPostalCode(?int $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection|FaitNotable[]
     */
    public function getFaitNotables(): Collection
    {
        return $this->faitNotables;
    }

    public function addFaitNotable(FaitNotable $faitNotable): self
    {
        if (!$this->faitNotables->contains($faitNotable)) {
            $this->faitNotables[] = $faitNotable;
            $faitNotable->addLieu($this);
        }

        return $this;
    }

    public function removeFaitNotable(FaitNotable $faitNotable): self
    {
        if ($this->faitNotables->contains($faitNotable)) {
            $this->faitNotables->removeElement($faitNotable);
            $faitNotable->removeLieu($this);
        }

        return $this;
    }

    public function getLieu(): ?FaitNotable
    {
        return $this->lieu;
    }

    public function setLieu(?FaitNotable $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * @return Collection|Personne[]
     */
    public function getPersonnes(): Collection
    {
        return $this->personnes;
    }

    public function addPersonne(Personne $personne): self
    {
        if (!$this->personnes->contains($personne)) {
            $this->personnes[] = $personne;
            $personne->addPasse($this);
        }

        return $this;
    }

    public function removePersonne(Personne $personne): self
    {
        if ($this->personnes->contains($personne)) {
            $this->personnes->removeElement($personne);
            $personne->removePasse($this);
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FaitNotableRepository")
 */
class FaitNotable
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
    private $fait;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Place", mappedBy="lieu")
     */
    private $lieu;

    public function __construct()
    {
        $this->lieu = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->fait;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFait(): ?string
    {
        return $this->fait;
    }

    public function setFait(string $fait): self
    {
        $this->fait = $fait;

        return $this;
    }

    /**
     * @return Collection|Place[]
     */
    public function getLieu(): Collection
    {
        return $this->lieu;
    }

    public function addLieu(Place $lieu): self
    {
        if (!$this->lieu->contains($lieu)) {
            $this->lieu[] = $lieu;
            $lieu->setLieu($this);
        }

        return $this;
    }

    public function removeLieu(Place $lieu): self
    {
        if ($this->lieu->contains($lieu)) {
            $this->lieu->removeElement($lieu);
            // set the owning side to null (unless already changed)
            if ($lieu->getLieu() === $this) {
                $lieu->setLieu(null);
            }
        }

        return $this;
    }
}

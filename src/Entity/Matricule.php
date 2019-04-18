<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatriculeRepository")
 */
class Matricule
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Personne", mappedBy="matricule", cascade={"persist", "remove"})
     */
    private $personne;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getPersonne(): ?Personne
    {
        return $this->personne;
    }

    public function setPersonne(?Personne $personne): self
    {
        $this->personne = $personne;

        // set (or unset) the owning side of the relation if necessary
        $newMatricule = $personne === null ? null : $this;
        if ($newMatricule !== $personne->getMatricule()) {
            $personne->setMatricule($newMatricule);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->number;
    }

}

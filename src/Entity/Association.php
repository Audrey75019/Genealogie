<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AssociationRepository")
 */
class Association
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TypeAssociation", mappedBy="Association")
     */
    private $typeAssociations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Personne", mappedBy="avoir")
     */
    private $personnes;

    public function __construct()
    {
        $this->typeAssociations = new ArrayCollection();
        $this->personnes = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|TypeAssociation[]
     */
    public function getTypeAssociations(): Collection
    {
        return $this->typeAssociations;
    }

    public function addTypeAssociation(TypeAssociation $typeAssociation): self
    {
        if (!$this->typeAssociations->contains($typeAssociation)) {
            $this->typeAssociations[] = $typeAssociation;
            $typeAssociation->setAssociation($this);
        }

        return $this;
    }

    public function removeTypeAssociation(TypeAssociation $typeAssociation): self
    {
        if ($this->typeAssociations->contains($typeAssociation)) {
            $this->typeAssociations->removeElement($typeAssociation);
            // set the owning side to null (unless already changed)
            if ($typeAssociation->getAssociation() === $this) {
                $typeAssociation->setAssociation(null);
            }
        }

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
            $personne->setAvoir($this);
        }

        return $this;
    }

    public function removePersonne(Personne $personne): self
    {
        if ($this->personnes->contains($personne)) {
            $this->personnes->removeElement($personne);
            // set the owning side to null (unless already changed)
            if ($personne->getAvoir() === $this) {
                $personne->setAvoir(null);
            }
        }

        return $this;
    }
}

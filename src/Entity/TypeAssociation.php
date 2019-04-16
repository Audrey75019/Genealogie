<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeAssociationRepository")
 */
class TypeAssociation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $label;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Association", inversedBy="typeAssociations")
     */
    private $Association;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getAssociation(): ?Association
    {
        return $this->Association;
    }

    public function setAssociation(?Association $Association): self
    {
        $this->Association = $Association;

        return $this;
    }
}

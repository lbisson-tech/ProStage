<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormationRepository")
 */
class Formation
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
    private $nomF;

    /**
     * @ORM\Column(type="string", length=300)
     */
    private $nomComplet;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Stage", mappedBy="liste_formations")
     */
    private $liste_stages;

    public function __construct()
    {
        $this->liste_stages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomF(): ?string
    {
        return $this->nomF;
    }

    public function setNomF(string $nomF): self
    {
        $this->nomF = $nomF;

        return $this;
    }

    public function getNomComplet(): ?string
    {
        return $this->nomComplet;
    }

    public function setNomComplet(string $nomComplet): self
    {
        $this->nomComplet = $nomComplet;

        return $this;
    }

    /**
     * @return Collection|Stage[]
     */
    public function getListeStages(): Collection
    {
        return $this->liste_stages;
    }

    public function addListeStage(Stage $listeStage): self
    {
        if (!$this->liste_stages->contains($listeStage)) {
            $this->liste_stages[] = $listeStage;
        }

        return $this;
    }

    public function removeListeStage(Stage $listeStage): self
    {
        if ($this->liste_stages->contains($listeStage)) {
            $this->liste_stages->removeElement($listeStage);
        }

        return $this;
    }
}

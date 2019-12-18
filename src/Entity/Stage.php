<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StageRepository")
 */
class Stage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprise")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_entreprise;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Formation")
     */
    private $liste_formations;

    public function __construct()
    {
        $this->liste_formations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getIdEntreprise(): ?Entreprise
    {
        return $this->id_entreprise;
    }

    public function setIdEntreprise(?Entreprise $id_entreprise): self
    {
        $this->id_entreprise = $id_entreprise;

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getListeFormations(): Collection
    {
        return $this->liste_formations;
    }

    public function addListeFormation(Formation $listeFormation): self
    {
        if (!$this->liste_formations->contains($listeFormation)) {
            $this->liste_formations[] = $listeFormation;
        }

        return $this;
    }

    public function removeListeFormation(Formation $listeFormation): self
    {
        if ($this->liste_formations->contains($listeFormation)) {
            $this->liste_formations->removeElement($listeFormation);
        }

        return $this;
    }
}

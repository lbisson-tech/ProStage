<?php

namespace App\Entity;

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
}

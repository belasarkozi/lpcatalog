<?php

namespace App\Entity;

use App\Repository\KiadoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KiadoRepository::class)]
class Kiado
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $nev;

    #[ORM\OneToMany(mappedBy: 'kiado', targetEntity: Lemez::class)]
    private $lemezek;

    public function __construct()
    {
        $this->lemezek = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNev(): ?string
    {
        return $this->nev;
    }

    public function setNev(string $nev): self
    {
        $this->nev = $nev;

        return $this;
    }

    /**
     * @return Collection<int, Lemez>
     */
    public function getLemezek(): Collection
    {
        return $this->lemezek;
    }

    public function addLemezek(Lemez $lemezek): self
    {
        if (!$this->lemezek->contains($lemezek)) {
            $this->lemezek[] = $lemezek;
            $lemezek->setKiado($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nev;
    }
}

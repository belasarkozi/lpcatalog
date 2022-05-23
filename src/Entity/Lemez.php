<?php

namespace App\Entity;

use App\Repository\LemezRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LemezRepository::class)]
class Lemez
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $nev;

    #[ORM\Column(type: 'date')]
    private $kiadasi_datum;

    #[ORM\ManyToMany(targetEntity: Szerzo::class, inversedBy: 'lemezek')]
    private $szerzok;

    #[ORM\ManyToOne(targetEntity: Kiado::class, inversedBy: 'lemezek')]
    #[ORM\JoinColumn(nullable: false)]
    private $kiado;

    public function __construct()
    {
        $this->szerzok = new ArrayCollection();
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

    public function getKiadasiDatum(): ?\DateTimeInterface
    {
        return $this->kiadasi_datum;
    }

    public function setKiadasiDatum(\DateTimeInterface $kiadasi_datum): self
    {
        $this->kiadasi_datum = $kiadasi_datum;

        return $this;
    }

    /**
     * @return Collection<int, Szerzo>
     */
    public function getSzerzok(): Collection
    {
        return $this->szerzok;
    }

    public function addSzerzok(Szerzo $szerzok): self
    {
        if (!$this->szerzok->contains($szerzok)) {
            $this->szerzok[] = $szerzok;
        }

        return $this;
    }

    public function getKiado(): ?Kiado
    {
        return $this->kiado;
    }

    public function setKiado(?Kiado $kiado): self
    {
        $this->kiado = $kiado;

        return $this;
    }

    public function __toString()
    {
        return $this->nev;
    }        
}

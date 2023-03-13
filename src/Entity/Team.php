<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $code = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(length: 255)]
    private ?string $division = null;

    #[ORM\Column(length: 255)]
    private ?string $logo = null;

    #[ORM\Column(length: 255)]
    private ?string $established = null;

    #[ORM\Column(length: 255)]
    private ?string $headCoach = null;

    #[ORM\Column(length: 255)]
    private ?string $owner = null;

    #[ORM\ManyToMany(targetEntity: Stadium::class, inversedBy: 'teams')]
    private Collection $stadiums;

    public function __construct()
    {
        $this->stadiums = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getDivision(): ?string
    {
        return $this->division;
    }

    public function setDivision(string $division): self
    {
        $this->division = $division;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getEstablished(): ?string
    {
        return $this->established;
    }

    public function setEstablished(string $established): self
    {
        $this->established = $established;

        return $this;
    }

    public function getHeadCoach(): ?string
    {
        return $this->headCoach;
    }

    public function setHeadCoach(string $headCoach): self
    {
        $this->headCoach = $headCoach;

        return $this;
    }

    public function getOwner(): ?string
    {
        return $this->owner;
    }

    public function setOwner(string $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return Collection<int, Stadium>
     */
    public function getStadiums(): Collection
    {
        return $this->stadiums;
    }

    public function addStadium(Stadium $stadium): self
    {
        if (!$this->stadiums->contains($stadium)) {
            $this->stadiums->add($stadium);
        }

        return $this;
    }

    public function removeStadium(Stadium $stadium): self
    {
        $this->stadiums->removeElement($stadium);

        return $this;
    }
}

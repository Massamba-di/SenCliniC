<?php

namespace App\Entity;

use App\Repository\PharmaciesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PharmaciesRepository::class)]
class Pharmacies
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 8, nullable: true)]
    private ?string $latitude = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 11, scale: 8, nullable: true)]
    private ?string $longitude = null;

    #[ORM\Column(type: 'json')]
    private array $horaireGarde = [];

    #[ORM\Column(nullable: true)]
    private ?bool $gardeAujourdhui = null;

    // ✅ CORRIGÉ: DateTimeImmutable + NOT nullable
    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $createdAt;

    // ✅ AJOUTER UN CONSTRUCTEUR
    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;
        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;
        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): static
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(?string $latitude): static
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(?string $longitude): static
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getHoraireGarde(): array
    {
        return $this->horaireGarde;
    }

    public function setHoraireGarde(array $horaireGarde): static
    {
        $this->horaireGarde = $horaireGarde;
        return $this;
    }

    public function isGardeAujourdhui(): ?bool
    {
        return $this->gardeAujourdhui;
    }

    public function setGardeAujourdhui(?bool $gardeAujourdhui): static
    {
        $this->gardeAujourdhui = $gardeAujourdhui;
        return $this;
    }

    // ✅ UN SEUL getCreatedAt (pas de doublon)
    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    // ✅ UN SEUL setCreatedAt
    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\RendezVousRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RendezVousRepository::class)]
class RendezVous
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTime $heure = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $status = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0, nullable: true)]
    private ?string $montant = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $motif = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $notes = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $updatedAt = null;



    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Paiements $paiement = null;

    #[ORM\ManyToOne(inversedBy: 'rendezVouses')]
    private ?Creneaux $creneau = null;

    #[ORM\ManyToOne(inversedBy: 'rendezVouses')]
    private ?Medecins $medecin = null;

    #[ORM\ManyToOne(inversedBy: 'rendezVous')]
    private ?Patients $patients = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getHeure(): ?\DateTime
    {
        return $this->heure;
    }

    public function setHeure(?\DateTime $heure): static
    {
        $this->heure = $heure;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(?string $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): static
    {
        $this->motif = $motif;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): static
    {
        $this->notes = $notes;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTime $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }



    public function getPaiement(): ?Paiements
    {
        return $this->paiement;
    }

    public function setPaiement(?Paiements $paiement): static
    {
        $this->paiement = $paiement;

        return $this;
    }

    public function getCreneau(): ?Creneaux
    {
        return $this->creneau;
    }

    public function setCreneau(?Creneaux $creneau): static
    {
        $this->creneau = $creneau;

        return $this;
    }

    public function getMedecin(): ?Medecins
    {
        return $this->medecin;
    }

    public function setMedecin(?Medecins $medecin): static
    {
        $this->medecin = $medecin;

        return $this;
    }

    public function getPatients(): ?Patients
    {
        return $this->patients;
    }

    public function setPatients(?Patients $patients): static
    {
        $this->patients = $patients;

        return $this;
    }
}

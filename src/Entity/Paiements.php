<?php

namespace App\Entity;

use App\Repository\PaiementsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaiementsRepository::class)]
class Paiements
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $montant = null;

    #[ORM\Column(length: 50)]
    private ?string $methodePaiement = null;

    #[ORM\Column(length: 50)]
    private ?string $statut = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $datePaiement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $referenceTransaction = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $dateConfirmation = null;

    #[ORM\ManyToOne(inversedBy: 'paiements')]
    private ?Patients $patients = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getMethodePaiement(): ?string
    {
        return $this->methodePaiement;
    }

    public function setMethodePaiement(string $methodePaiement): static
    {
        $this->methodePaiement = $methodePaiement;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getDatePaiement(): ?\DateTime
    {
        return $this->datePaiement;
    }

    public function setDatePaiement(?\DateTime $datePaiement): static
    {
        $this->datePaiement = $datePaiement;

        return $this;
    }

    public function getReferenceTransaction(): ?string
    {
        return $this->referenceTransaction;
    }

    public function setReferenceTransaction(?string $referenceTransaction): static
    {
        $this->referenceTransaction = $referenceTransaction;

        return $this;
    }

    public function getDateConfirmation(): ?\DateTime
    {
        return $this->dateConfirmation;
    }

    public function setDateConfirmation(?\DateTime $dateConfirmation): static
    {
        $this->dateConfirmation = $dateConfirmation;

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

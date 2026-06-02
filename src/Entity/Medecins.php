<?php

namespace App\Entity;

use App\Repository\MedecinsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MedecinsRepository::class)]
class Medecins
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 250)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 100)]
    private ?string $specialite = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $numeroLicence = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $biographie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(nullable: true)]
    private ?array $joursTravail = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTime $heureDebut = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTime $heureFin = null;

    #[ORM\Column(nullable: true)]
    private ?int $dureeConsultation = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0, nullable: true)]
    private ?string $tarifConsultation = null;

    /**
     * @var Collection<int, RendezVous>
     */
    #[ORM\OneToMany(targetEntity: RendezVous::class, mappedBy: 'medecin')]
    private Collection $rendezVouses;

    /**
     * @var Collection<int, Creneaux>
     */
    #[ORM\OneToMany(targetEntity: Creneaux::class, mappedBy: 'medecins')]
    private Collection $creneau;

    public function __construct()
    {
        $this->rendezVouses = new ArrayCollection();
        $this->creneau = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): static
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getNumeroLicence(): ?string
    {
        return $this->numeroLicence;
    }

    public function setNumeroLicence(?string $numeroLicence): static
    {
        $this->numeroLicence = $numeroLicence;

        return $this;
    }

    public function getBiographie(): ?string
    {
        return $this->biographie;
    }

    public function setBiographie(?string $biographie): static
    {
        $this->biographie = $biographie;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getJoursTravail(): ?array
    {
        return $this->joursTravail;
    }

    public function setJoursTravail(?array $joursTravail): static
    {
        $this->joursTravail = $joursTravail;

        return $this;
    }

    public function getHeureDebut(): ?\DateTime
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(?\DateTime $heureDebut): static
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getHeureFin(): ?\DateTime
    {
        return $this->heureFin;
    }

    public function setHeureFin(?\DateTime $heureFin): static
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    public function getDureeConsultation(): ?int
    {
        return $this->dureeConsultation;
    }

    public function setDureeConsultation(?int $dureeConsultation): static
    {
        $this->dureeConsultation = $dureeConsultation;

        return $this;
    }

    public function getTarifConsultation(): ?string
    {
        return $this->tarifConsultation;
    }

    public function setTarifConsultation(?string $tarifConsultation): static
    {
        $this->tarifConsultation = $tarifConsultation;

        return $this;
    }

    /**
     * @return Collection<int, RendezVous>
     */
    public function getRendezVouses(): Collection
    {
        return $this->rendezVouses;
    }

    public function addRendezVouse(RendezVous $rendezVouse): static
    {
        if (!$this->rendezVouses->contains($rendezVouse)) {
            $this->rendezVouses->add($rendezVouse);
            $rendezVouse->setMedecin($this);
        }

        return $this;
    }

    public function removeRendezVouse(RendezVous $rendezVouse): static
    {
        if ($this->rendezVouses->removeElement($rendezVouse)) {
            // set the owning side to null (unless already changed)
            if ($rendezVouse->getMedecin() === $this) {
                $rendezVouse->setMedecin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Creneaux>
     */
    public function getCreneau(): Collection
    {
        return $this->creneau;
    }

    public function addCreneau(Creneaux $creneau): static
    {
        if (!$this->creneau->contains($creneau)) {
            $this->creneau->add($creneau);
            $creneau->setMedecins($this);
        }

        return $this;
    }

    public function removeCreneau(Creneaux $creneau): static
    {
        if ($this->creneau->removeElement($creneau)) {
            // set the owning side to null (unless already changed)
            if ($creneau->getMedecins() === $this) {
                $creneau->setMedecins(null);
            }
        }

        return $this;
    }
}

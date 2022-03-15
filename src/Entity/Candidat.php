<?php

namespace App\Entity;

use App\Entity\SkillCand;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CandidatRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: CandidatRepository::class)]
#[ApiResource()]
class Candidat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    public $id;

    #[ORM\Column(type: 'string', length: 30)]
    public $nomCa;

    #[ORM\Column(type: 'string', length: 30)]
    public $prenomCa;

    #[ORM\Column(type: 'string', length: 50)]
    public $univ;

    #[ORM\Column(type: 'string', length: 100)]
    public $email;

    #[ORM\Column(type: 'integer')]
    public $tel;

    #[ORM\Column(type: 'string', length: 50)]
    public $diplome;


    #[ORM\OneToMany(mappedBy: 'candidat', targetEntity: SkillCand::class)]
    //#[ORM\OneToMany(mappedBy: 'SkillCands', targetEntity: SkillCand::class, cascade:'persist', orphanRemoval: true)]
    public $CandidatSkills;


     public function __construct() {
        $this-> CandidatSkills = new ArrayCollection();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCa(): ?string
    {
        return $this->nomCa;
    }

    public function setNomCa(string $nomCa): self
    {
        $this->nomCa = $nomCa;

        return $this;
    }

    public function getPrenomCa(): ?string
    {
        return $this->prenomCa;
    }

    public function setPrenomCa(string $prenomCa): self
    {
        $this->prenomCa = $prenomCa;

        return $this;
    }

    public function getUniv(): ?string
    {
        return $this->univ;
    }

    public function setUniv(string $univ): self
    {
        $this->univ = $univ;

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

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getDiplome(): ?string
    {
        return $this->diplome;
    }

    public function setDiplome(string $diplome): self
    {
        $this->diplome = $diplome;

        return $this;
    }

    /**
     * @return Collection|SkillCand[]
     */
    public function getCandidatSkills(): Collection
    {
        return $this->CandidatSkills;
    }

    /**
     * Set the value of CandidatSkills
     *
     * @return  self
     */ 
    public function addCandidatSkill(SkillCand $skillCand): self
    {
        if (!$this->CandidatSkills->contains($skillCand)) {
            $this->CandidatSkills[] = $skillCand;
            $skillCand->setCandidat($this);
        }
        return $this;
    }


    public function removeCandidatSkill(SkillCand $skillCand): self
    {
        if ($this->CandidatSkills->removeElement($skillCand)) {
            // set the owning side to null (unless already changed)
            if ($skillCand->getCandidat() === $this) {
                $skillCand->setCandidat(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nomCa;
    }

}

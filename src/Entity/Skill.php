<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\SkillRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: SkillRepository::class)]
#[ApiResource()]
class Skill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 30)]
    private $nomS;

    #[ORM\Column(type: 'string', length: 255)]
    private $descS;

    #[ORM\OneToMany(mappedBy: 'skill', targetEntity: SkillCand::class)]
    private $SkilledCandidats;

    #[ORM\ManyToOne(targetEntity: Competence::class, inversedBy: 'skills')]
    #[ORM\JoinColumn(nullable: false)]
    private $idC;

    #[ORM\Column(type: 'string', length: 255)]
    private $Technologie;

    public function __construct() {
        $this->SkilledCandidats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomS(): ?string
    {
        return $this->nomS;
    }

    public function setNomS(string $nomS): self
    {
        $this->nomS = $nomS;

        return $this;
    }

    public function getDescS(): ?string
    {
        return $this->descS;
    }

    public function setDescS(string $descS): self
    {
        $this->descS = $descS;

        return $this;
    }

    /**
     * @return Collection|SkillCand[]
     */
    public function getSkilledCandidats(): Collection
    {
        return $this->SkilledCandidats;
    }

    public function addSkillCand(SkillCand $skillCand): self
    {
        if (!$this->CandidatSkills->contains($skillCand)) {
            $this->CandidatSkills[] = $skillCand;
            $skillCand->setSkill($this);
        }
        return $this;
    }


    /**
     * Set the value of SkilledCandidats
     *
     * @return  self
     */ 
    public function setSkilledCandidats($SkilledCandidats)
    {
        $this->SkilledCandidats [] = $SkilledCandidats;

        return $this;
    }

    public function removeSkilledCandidates(SkillCand $skillCand): self
    {
        if ($this->SkilledCandidates->removeElement($skillCand)) {
            // set the owning side to null (unless already changed)
            if ($skillCand->getSkill() === $this) {
                $skillCand->setSkill(null);
            }
        }
        return $this;
    }

    public function getIdC(): ?Competence
    {
        return $this->idC;
    }

    public function setIdC(?Competence $idC): self
    {
        $this->idC = $idC;

        return $this;
    }

    public function __toString()
    {
        return $this->nomS;
    }

    public function getTechnologie(): ?string
    {
        return $this->Technologie;
    }

    public function setTechnologie(string $Technologie): self
    {
        $this->Technologie = $Technologie;

        return $this;
    }

}

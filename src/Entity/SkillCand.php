<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\SkillCandRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: SkillCandRepository::class)]
#[ApiResource]
class SkillCand
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups("post:read")]
    private $id;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Groups("post:read")]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups("post:read")]
    private $level;

    
    #[ORM\ManyToOne(targetEntity: Skill::class, inversedBy: 'SkilledCandidats')]
    #[ORM\JoinColumn(nullable: false)]

    private $skill;

    
    #[ORM\ManyToOne(targetEntity: Candidat::class, inversedBy: 'CandidatSkills')]
    private $candidat;


    
    #[ORM\ManyToOne(targetEntity: Evaluateur::class, inversedBy: 'skillCands')]
    #[ORM\JoinColumn(nullable: false)]
    private $idE;

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): self
    {
        $this->level = $level;

        return $this;
    }
    

    /**
     * Get the value of skill
     */ 
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * Set the value of skill
     *
     * @return  self
     */ 
    public function setSkill($skill)
    {
        $this->skill = $skill;

        return $this;
    }

    /**
     * Get the value of candidat
     */ 
    public function getCandidat()
    {
        return $this->candidat;
    }

    /**
     * Set the value of candidat
     *
     * @return  self
     */ 
    public function setCandidat($candidat)
    {
        $this->candidat = $candidat;

        return $this;
    }


    public function getIdE(): ?Evaluateur
    {
        return $this->idE;
    }

    public function setIdE(?Evaluateur $idE): self
    {
        $this->idE = $idE;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}

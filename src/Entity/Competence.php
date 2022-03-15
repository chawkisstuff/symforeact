<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CompetenceRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: CompetenceRepository::class)]
#[ApiResource()]
class Competence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    public $id;

    #[ORM\Column(type: 'string', length: 30)]
    public $nomC;


    /**
     * @var Collection|Skill[]
     * @ORM\OneToMany(targetEntity="App\Entity\Skill", mappedBy="Competences")
     * 
     */
    #[ORM\JoinColumn(nullable: false)]
    //#[ORM\OneToMany(mappedBy: 'id', targetEntity: Skill::class)]

    
    #[ORM\OneToMany(mappedBy: 'idC', targetEntity: Skill::class)]
    public $skills;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
    }

    public function getnomC(): ?string
    {
        return $this->nomC;
    }

    public function setnomC(string $nomC): self
    {
        $this->nomC = $nomC;

        return $this;
    }

    /**
     * @return Collection|Skill[]
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    

    public function removeSkill(Skill $skill): self
    {
        if ($this->skills->removeElement($skill)) {
            // set the owning side to null (unless already changed)
            if ($skill->getIdC() === $this) {
                $skill->setIdC(null);
            }
        }

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


    public function addSkill(Skill $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills[] = $skill;
            $skill->setIdC($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nomC;
    }

}

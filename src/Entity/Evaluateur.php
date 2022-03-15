<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\EvaluateurRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: EvaluateurRepository::class)]
#[ApiResource()]
class Evaluateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomE;

    #[ORM\Column(type: 'string', length: 255)]
    private $prenomE;

    #[ORM\Column(type: 'string', length: 255)]
    private $emailE;

    #[ORM\Column(type: 'integer')]
    private $telE;

    #[ORM\Column(type: 'string', length: 20)]
    private $login;

    #[ORM\Column(type: 'string', length: 30)]
    private $password;

    #[ORM\OneToMany(mappedBy: 'idE', targetEntity: SkillCand::class)]
    private $skillCands;

    public function __construct()
    {
        $this->skillCands = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomE(): ?string
    {
        return $this->nomE;
    }

    public function setNomE(string $nomE): self
    {
        $this->nomE = $nomE;

        return $this;
    }

    public function getPrenomE(): ?string
    {
        return $this->prenomE;
    }

    public function setPrenomE(string $prenomE): self
    {
        $this->prenomE = $prenomE;

        return $this;
    }

    public function getEmailE(): ?string
    {
        return $this->emailE;
    }

    public function setEmailE(string $emailE): self
    {
        $this->emailE = $emailE;

        return $this;
    }

    public function getTelE(): ?int
    {
        return $this->telE;
    }

    public function setTelE(int $telE): self
    {
        $this->telE = $telE;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection|SkillCand[]
     */
    public function getSkillCands(): Collection
    {
        return $this->skillCands;
    }

    public function addSkillCand(SkillCand $skillCand): self
    {
        if (!$this->skillCands->contains($skillCand)) {
            $this->skillCands[] = $skillCand;
            $skillCand->setIdE($this);
        }
        return $this;
    }

    public function removeSkillCand(SkillCand $skillCand): self
    {
        if ($this->skillCands->removeElement($skillCand)) {
            // set the owning side to null (unless already changed)
            if ($skillCand->getIdE() === $this) {
                $skillCand->setIdE(null);
            }
        }
        return $this;
    }

    public function __toString()
    {
        return $this->nomE;
    }

}

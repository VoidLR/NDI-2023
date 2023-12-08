<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $text = null;

    #[ORM\Column(length: 255)]
    private ?string $reponse1 = null;

    #[ORM\Column(length: 255)]
    private ?string $reponse2 = null;

    #[ORM\Column(length: 255)]
    private ?string $reponse3 = null;

    #[ORM\Column(length: 255)]
    private ?string $reponse4 = null;

    #[ORM\Column]
    private ?int $numBonneRep = null;

    public function __construct(string $text, string $reponse1, string $reponse2, string $reponse3, string $reponse4, int $numBonneRep)
    {
        $this->text = $text;
        $this->reponse1 = $reponse1;
        $this->reponse2 = $reponse2;
        $this->reponse3 = $reponse3;
        $this->reponse4 = $reponse4;
        $this->numBonneRep = $numBonneRep;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function getReponse1(): ?string
    {
        return $this->reponse1;
    }

    public function setReponse1(string $reponse1): static
    {
        $this->reponse1 = $reponse1;

        return $this;
    }

    public function getReponse2(): ?string
    {
        return $this->reponse2;
    }

    public function setReponse2(string $reponse2): static
    {
        $this->reponse2 = $reponse2;

        return $this;
    }

    public function getReponse3(): ?string
    {
        return $this->reponse3;
    }

    public function setReponse3(string $reponse3): static
    {
        $this->reponse3 = $reponse3;

        return $this;
    }

    public function getReponse4(): ?string
    {
        return $this->reponse4;
    }

    public function setReponse4(string $reponse4): static
    {
        $this->reponse4 = $reponse4;

        return $this;
    }

    public function getNumBonneRep(): ?int
    {
        return $this->numBonneRep;
    }

    public function setNumBonneRep(int $numBonneRep): static
    {
        $this->numBonneRep = $numBonneRep;

        return $this;
    }
}

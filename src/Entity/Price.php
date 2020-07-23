<?php

namespace App\Entity;

use App\Repository\PriceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PriceRepository::class)
 */
class Price
{
    const CATEGORY = ["catégorie 1" =>"cat 1","catégorie 2"=>"cat 2","catégorie 3" => "cat 3"];
    const TYPE = ["Plein Tarif" =>"Plein Tarif","Tarif Réduit"=>"Tarif Réduit"];

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Choice(choices=App\Entity\Price::CATEGORY, message="Veuillez choisir une catégorie dans la liste.")
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Choice(choices=App\Entity\Price::TYPE, message="Veuillez choisir une type de tarif dans la liste.")
     */
    private $type;

    /**
     * @ORM\Column(type="float")
     * @Assert\Range(min=0, minMessage="Vous ne pouvez pas saisir un montant inférieur à {{ limit }}")
     */
    private $amout;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getAmout(): ?float
    {
        return $this->amout;
    }

    public function setAmout(float $amout): self
    {
        $this->amout = $amout;

        return $this;
    }
}

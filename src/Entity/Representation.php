<?php

namespace App\Entity;

use App\Repository\RepresentionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RepresentionRepository::class)
 */
class Representation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $Max_cat1;

    /**
     * @ORM\Column(type="integer")
     */
    private $Max_cat2;

    /**
     * @ORM\Column(type="integer")
     */
    private $Max_cat3;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getMaxCat1(): ?int
    {
        return $this->Max_cat1;
    }

    public function setMaxCat1(int $Max_cat1): self
    {
        $this->Max_cat1 = $Max_cat1;

        return $this;
    }

    public function getMaxCat2(): ?int
    {
        return $this->Max_cat2;
    }

    public function setMaxCat2(int $Max_cat2): self
    {
        $this->Max_cat2 = $Max_cat2;

        return $this;
    }

    public function getMaxCat3(): ?int
    {
        return $this->Max_cat3;
    }

    public function setMaxCat3(int $Max_cat3): self
    {
        $this->Max_cat3 = $Max_cat3;

        return $this;
    }
}

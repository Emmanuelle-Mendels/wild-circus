<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    const CATEGORY = ["catégorie 1" =>"cat 1","catégorie 2"=>"cat 2","catégorie 3" => "cat 3"];
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * Assert\NotBlank(message = "Merci de saisir votre nom suivi de votre prénom")
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max=100, maxMessage="Votre email doit être inférieur à {{ limit }} caractères")
     * @Assert\Email(message = "L'email '{{ value }}' n'est pas un format d'email valide.")
     * @Assert\NotBlank(message="Merci de saisir votre adresse email")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de saisir votre numéro de téléphone")
     * @Assert\Length(min=10, max=20, minMessage="Votre numéro de téléphone doit être composé de 10 chiffres",
     *      maxMessage="Votre numéro de téléphone doit être composé de 10 chiffres")
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Choice(choices=App\Entity\Reservation::CATEGORY, message="Veuillez choisir une catégorie dans la liste.")
     */
    private $category;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(min=1, max=4, notInRangeMessage="Vous devez au minimum réserver une place adulte. Vous ne pouvez pas prendre au delà de {{ max }} places adulte.")
     */
    private $nb_adult;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Range(min = 0, max = 6, notInRangeMessage="Vous ne pouvez pas réserver plus de {{ max }} places enfants.")
     */
    private $nb_child;

    /**
     * @ORM\ManyToOne(targetEntity=Representation::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $representation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
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

    public function getNbAdult(): ?int
    {
        return $this->nb_adult;
    }

    public function setNbAdult(int $nb_adult): self
    {
        $this->nb_adult = $nb_adult;

        return $this;
    }

    public function getNbChild(): ?int
    {
        return $this->nb_child;
    }

    public function setNbChild(?int $nb_child): self
    {
        $this->nb_child = $nb_child;

        return $this;
    }

    public function getRepresentation(): ?Representation
    {
        return $this->representation;
    }

    public function setRepresentation(?Representation $representation): self
    {
        $this->representation = $representation;

        return $this;
    }
}

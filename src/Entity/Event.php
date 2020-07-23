<?php

namespace App\Entity;

use App\Repository\EventRepository;
use \DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 * @Vich\Uploadable
 */
class Event
{
    const MAX_SIZE="500k";
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez indiquer le titre de l'article")
     * @Assert\Length(max=255, maxMessage="Le nom du titre {{ value }} est trop long,
     * il ne devrait pas dépasser {{ limit }} caractères")
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @Vich\UploadableField(mapping="event_image", fileNameProperty="picture")
     * @var File|null
     * @Assert\File(maxSize = Event::MAX_SIZE,
     *     maxSizeMessage="Le fichier est trop gros  ({{ size }} {{ suffix }}),
     * il ne doit pas dépasser {{ limit }} {{ suffix }}",
     *     mimeTypes = {"image/jpeg", "image/jpg", "image/gif","image/png"},
     *     mimeTypesMessage = "Veuillez entrer un type de fichier valide: jpg, jpeg, png ou gif.")
     */
    private $pictureFile;

    /**
     * @ORM\Column(type="text")
     *@Assert\NotBlank(message="Veuillez décrire la admin_performance")
     */
    private $description;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var DateTime|null
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture($picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
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

    public function setPictureFile(File $picture = null)
    {
        $this->pictureFile = $picture;
        if ($picture) {
            $this->updatedAt = new DateTime('now');
        }
    }

    public function getPictureFile(): ?File
    {
        return $this->pictureFile;
    }


}

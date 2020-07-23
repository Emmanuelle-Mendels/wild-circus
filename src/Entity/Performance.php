<?php

namespace App\Entity;

use App\Repository\PerformanceRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=PerformanceRepository::class)
 * @Vich\Uploadable
 */
class Performance
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
     * @Assert\NotBlank(message="Veuillez indiquer le titre de la admin_performance")
     * @Assert\Length(max=255, maxMessage="Le nom {{ value }} est trop long,
     * il ne devrait pas dépasser {{ limit }} caractères")
     */
    private $Name;

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
     * @Assert\NotBlank(message="Veuillez décrire la admin_performance")
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $focus;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $video;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var DateTime|null
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity=Artist::class, inversedBy="performances")
     */
    private $Artist;

    public function __construct()
    {
        $this->Artist = new ArrayCollection();
    }


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

    public function getFocus(): ?bool
    {
        return $this->focus;
    }

    public function setFocus(bool $focus): self
    {
        $this->focus = $focus;

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(?string $video): self
    {
        $this->video = $video;

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

    /**
     * @return Collection|Artist[]
     */
    public function getArtist(): Collection
    {
        return $this->Artist;
    }

    public function addArtist(Artist $artist): self
    {
        if (!$this->Artist->contains($artist)) {
            $this->Artist[] = $artist;
        }

        return $this;
    }

    public function removeArtist(Artist $artist): self
    {
        if ($this->Artist->contains($artist)) {
            $this->Artist->removeElement($artist);
        }

        return $this;
    }

}

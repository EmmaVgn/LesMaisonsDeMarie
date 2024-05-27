<?php

namespace App\Entity;

use App\Entity\Trait\SlugTrait;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\EquipmentRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: EquipmentRepository::class)]
#[Vich\Uploadable]
class Equipment
{
    use SlugTrait;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le nom de l\'equipement est obligatoire !')]
    private ?string $name = null;

    #[Assert\Image(
        mimeTypes: [
            'image/svg+xml',
        ],
        mimeTypesMessage: 'Le type MIME du fichier n\'est pas valide ({{ type }}). Le format autorisé est {{ types }}'
    )]
    #[Vich\UploadableField(mapping: 'icones_images', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageName = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    /**
     * @var Collection<int, Ad>
     */
    #[ORM\ManyToMany(targetEntity: Ad::class, inversedBy: 'equipment')]
    private Collection $ads;

    #[ORM\ManyToOne(inversedBy: 'equipment')]
    private ?Criteria $criteria = null;

    public function __construct()
    {
        $this->ads = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getFullNameWithCriteria(): string
    {
        $fullName = $this->name;
        if ($this->criteria !== null) {
            $fullName .= ' (' . $this->criteria->getName() . ')';
        }
        return $fullName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Ad>
     */
    public function getAds(): Collection
    {
        return $this->ads;
    }

    public function addAd(Ad $ad): static
    {
        if (!$this->ads->contains($ad)) {
            $this->ads->add($ad);
        }

        return $this;
    }

    public function removeAd(Ad $ad): static
    {
        $this->ads->removeElement($ad);

        return $this;
    }

        /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }


    public function getCriteria(): ?Criteria
    {
        return $this->criteria;
    }

    public function setCriteria(?Criteria $criteria): static
    {
        $this->criteria = $criteria;

        return $this;
    }
}

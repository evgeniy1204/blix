<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categoryKey;

    /**
     * @var Community[]
     *
     * @ORM\OneToMany(targetEntity=Community::class, mappedBy="category")
     */
    private $communities;

    /**
     * @return mixed
     */
    public function __toString(): string
    {
        return $this->name;
    }

    /**
     * Category constructor.
     */
    public function __construct()
    {
        $this->communities = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCategoryKey(): ?string
    {
        return $this->categoryKey;
    }

    /**
     * @param string $categoryKey
     *
     * @return $this
     */
    public function setCategoryKey(string $categoryKey): self
    {
        $this->categoryKey = $categoryKey;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getCommunities(): Collection
    {
        return $this->communities;
    }

    /**
     * @param Community $community
     *
     * @return $this
     */
    public function addCohort(Community $community): self
    {
        $this->communities->add($community);

        return $this;
    }

    /**
     * @param Community $community
     *
     * @return $this
     */
    public function removeCohort(Community $community): self
    {
        $this->communities->remove($community);

        return $this;
    }

    public function addCommunity(Community $community): self
    {
        if (!$this->communities->contains($community)) {
            $this->communities[] = $community;
            $community->setCategory($this);
        }

        return $this;
    }

    public function removeCommunity(Community $community): self
    {
        if ($this->communities->contains($community)) {
            $this->communities->removeElement($community);
            // set the owning side to null (unless already changed)
            if ($community->getCategory() === $this) {
                $community->setCategory(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
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
    private $omschrijving;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prijs;

    /**
     * @ORM\Column(type="integer")
     */
    private $aantal;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BestelItem", mappedBy="ProductId")
     */
    private $bestelItems;

    public function __construct()
    {
        $this->bestelItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOmschrijving(): ?string
    {
        return $this->omschrijving;
    }

    public function setOmschrijving(string $omschrijving): self
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    public function getPrijs(): ?float
    {
        return $this->prijs;
    }

    public function setPrijs(?float $prijs): self
    {
        $this->prijs = $prijs;

        return $this;
    }

    public function getAantal(): ?int
    {
        return $this->aantal;
    }

    public function setAantal(int $aantal): self
    {
        $this->aantal = $aantal;

        return $this;
    }

    /**
     * @return Collection|BestelItem[]
     */
    public function getBestelItems(): Collection
    {
        return $this->bestelItems;
    }

    public function addBestelItem(BestelItem $bestelItem): self
    {
        if (!$this->bestelItems->contains($bestelItem)) {
            $this->bestelItems[] = $bestelItem;
            $bestelItem->setProductId($this);
        }

        return $this;
    }

    public function removeBestelItem(BestelItem $bestelItem): self
    {
        if ($this->bestelItems->contains($bestelItem)) {
            $this->bestelItems->removeElement($bestelItem);
            // set the owning side to null (unless already changed)
            if ($bestelItem->getProductId() === $this) {
                $bestelItem->setProductId(null);
            }
        }

        return $this;
    }
}

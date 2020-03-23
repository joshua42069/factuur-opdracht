<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BestellingRepository")
 */
class Bestelling
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\klant", inversedBy="bestellings")
     */
    private $klantid;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BestelItem", mappedBy="BestellingId")
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

    public function getKlantid(): ?klant
    {
        return $this->klantid;
    }

    public function setKlantid(?klant $klantid): self
    {
        $this->klantid = $klantid;

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
            $bestelItem->setBestellingId($this);
        }

        return $this;
    }

    public function removeBestelItem(BestelItem $bestelItem): self
    {
        if ($this->bestelItems->contains($bestelItem)) {
            $this->bestelItems->removeElement($bestelItem);
            // set the owning side to null (unless already changed)
            if ($bestelItem->getBestellingId() === $this) {
                $bestelItem->setBestellingId(null);
            }
        }

        return $this;
    }
}

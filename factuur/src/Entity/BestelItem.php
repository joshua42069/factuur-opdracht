<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BestelItemRepository")
 */
class BestelItem
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
    private $datum;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bestelling", inversedBy="bestelItems")
     */
    private $BestellingId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="bestelItems")
     */
    private $ProductId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getBestellingId(): ?Bestelling
    {
        return $this->BestellingId;
    }

    public function setBestellingId(?Bestelling $BestellingId): self
    {
        $this->BestellingId = $BestellingId;

        return $this;
    }

    public function getProductId(): ?Product
    {
        return $this->ProductId;
    }

    public function setProductId(?Product $ProductId): self
    {
        $this->ProductId = $ProductId;

        return $this;
    }
}

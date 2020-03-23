<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KlantRepository")
 */
class Klant
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
    private $naam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adres;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $postcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $woonplaats;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bestelling", mappedBy="klantid")
     */
    private $bestellings;

    public function __construct()
    {
        $this->bestellings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(string $adres): self
    {
        $this->adres = $adres;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getWoonplaats(): ?string
    {
        return $this->woonplaats;
    }

    public function setWoonplaats(string $woonplaats): self
    {
        $this->woonplaats = $woonplaats;

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

    /**
     * @return Collection|Bestelling[]
     */
    public function getBestellings(): Collection
    {
        return $this->bestellings;
    }

    public function addBestelling(Bestelling $bestelling): self
    {
        if (!$this->bestellings->contains($bestelling)) {
            $this->bestellings[] = $bestelling;
            $bestelling->setKlantid($this);
        }

        return $this;
    }

    public function removeBestelling(Bestelling $bestelling): self
    {
        if ($this->bestellings->contains($bestelling)) {
            $this->bestellings->removeElement($bestelling);
            // set the owning side to null (unless already changed)
            if ($bestelling->getKlantid() === $this) {
                $bestelling->setKlantid(null);
            }
        }

        return $this;
    }
}

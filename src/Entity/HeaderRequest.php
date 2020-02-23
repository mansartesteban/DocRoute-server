<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HeaderRequestRepository")
 */
class HeaderRequest
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\DicHeaderRequest")
     * @ORM\JoinColumn(nullable=false)
     */
    private $header;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getHeader(): ?DicHeaderRequest
    {
        return $this->header;
    }

    public function setHeader(?DicHeaderRequest $header): self
    {
        $this->header = $header;

        return $this;
    }
}

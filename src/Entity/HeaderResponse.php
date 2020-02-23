<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HeaderResponseRepository")
 */
class HeaderResponse
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
     * @ORM\ManyToOne(targetEntity="App\Entity\DicHeaderResponse")
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

    public function getHeader(): ?DicHeaderResponse
    {
        return $this->header;
    }

    public function setHeader(?DicHeaderResponse $header): self
    {
        $this->header = $header;

        return $this;
    }
}

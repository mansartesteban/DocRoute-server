<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RouteRepository")
 */
class Route
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $path;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $returnedDatas;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Parameter")
     */
    private $parameter;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ReturnedDatasType")
     */
    private $returnedDatasType;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Method", inversedBy="routes")
     */
    private $method;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\HeaderRequest")
     */
    private $HeaderRequest;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\HeaderResponse")
     */
    private $HeaderResponse;

    public function __construct()
    {
        $this->parameter = new ArrayCollection();
        $this->method = new ArrayCollection();
        $this->HeaderRequest = new ArrayCollection();
        $this->HeaderResponse = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getReturnedDatas(): ?string
    {
        return $this->returnedDatas;
    }

    public function setReturnedDatas(?string $returnedDatas): self
    {
        $this->returnedDatas = $returnedDatas;

        return $this;
    }

    /**
     * @return Collection|Parameter[]
     */
    public function getParameter(): Collection
    {
        return $this->parameter;
    }

    public function addParameter(Parameter $parameter): self
    {
        if (!$this->parameter->contains($parameter)) {
            $this->parameter[] = $parameter;
        }

        return $this;
    }

    public function removeParameter(Parameter $parameter): self
    {
        if ($this->parameter->contains($parameter)) {
            $this->parameter->removeElement($parameter);
        }

        return $this;
    }

    public function getReturnedDatasType(): ?ReturnedDatasType
    {
        return $this->returnedDatasType;
    }

    public function setReturnedDatasType(?ReturnedDatasType $returnedDatasType): self
    {
        $this->returnedDatasType = $returnedDatasType;

        return $this;
    }

    /**
     * @return Collection|Method[]
     */
    public function getMethod(): Collection
    {
        return $this->method;
    }

    public function addMethod(Method $method): self
    {
        if (!$this->method->contains($method)) {
            $this->method[] = $method;
        }

        return $this;
    }

    public function removeMethod(Method $method): self
    {
        if ($this->method->contains($method)) {
            $this->method->removeElement($method);
        }

        return $this;
    }

    /**
     * @return Collection|HeaderRequest[]
     */
    public function getHeaderRequest(): Collection
    {
        return $this->HeaderRequest;
    }

    public function addHeaderRequest(HeaderRequest $headerRequest): self
    {
        if (!$this->HeaderRequest->contains($headerRequest)) {
            $this->HeaderRequest[] = $headerRequest;
        }

        return $this;
    }

    public function removeHeaderRequest(HeaderRequest $headerRequest): self
    {
        if ($this->HeaderRequest->contains($headerRequest)) {
            $this->HeaderRequest->removeElement($headerRequest);
        }

        return $this;
    }

    /**
     * @return Collection|HeaderResponse[]
     */
    public function getHeaderResponse(): Collection
    {
        return $this->HeaderResponse;
    }

    public function addHeaderResponse(HeaderResponse $headerResponse): self
    {
        if (!$this->HeaderResponse->contains($headerResponse)) {
            $this->HeaderResponse[] = $headerResponse;
        }

        return $this;
    }

    public function removeHeaderResponse(HeaderResponse $headerResponse): self
    {
        if ($this->HeaderResponse->contains($headerResponse)) {
            $this->HeaderResponse->removeElement($headerResponse);
        }

        return $this;
    }
}

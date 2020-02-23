<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MethodRepository")
 */
class Method
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
    private $label;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Route", mappedBy="method")
     */
    private $routes;

    public function __construct()
    {
        $this->routes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection|Route[]
     */
    public function getRoutes(): Collection
    {
        return $this->routes;
    }

    public function addRoute(Route $route): self
    {
        if (!$this->routes->contains($route)) {
            $this->routes[] = $route;
            $route->addMethod($this);
        }

        return $this;
    }

    public function removeRoute(Route $route): self
    {
        if ($this->routes->contains($route)) {
            $this->routes->removeElement($route);
            $route->removeMethod($this);
        }

        return $this;
    }
}

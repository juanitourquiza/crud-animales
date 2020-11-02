<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Animales
 * @ApiResource
 * @ORM\Table(name="animales")
 * @ORM\Entity
 */
class Animales
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=190, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=190, nullable=false)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="edad", type="string", length=100, nullable=false)
     */
    private $edad;

    /**
     * @var string
     *
     * @ORM\Column(name="register", type="string", length=15, nullable=false)
     */
    private $register;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getEdad(): ?string
    {
        return $this->edad;
    }

    public function setEdad(string $edad): self
    {
        $this->edad = $edad;

        return $this;
    }

    public function getRegister(): ?string
    {
        return $this->register;
    }

    public function setRegister(string $register): self
    {
        $this->register = $register;

        return $this;
    }
}

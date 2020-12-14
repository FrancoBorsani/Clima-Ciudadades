<?php

namespace App\Entity;

use App\Repository\BuscadoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BuscadoRepository::class)
 */
class Buscado
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nombre;

    /**
     * @ORM\Column(type="integer")
     */
    private $cantBuscado;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCantBuscado(): ?int
    {
        return $this->cantBuscado;
    }

    public function setCantBuscado(int $cantBuscado): self
    {
        $this->cantBuscado = $cantBuscado;

        return $this;
    }
}

<?php

namespace App\Model;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\SequenceGenerator;

#[Entity, Table(name: 'customers')]
class Customer
{
    #[Id, Column(type: Types::INTEGER), GeneratedValue(strategy: 'AUTO')]
    private int|null $id;

    #[Column(type: Types::STRING)]
    private string|null $name;

    #[Column(type: Types::DATETIME_MUTABLE, name: 'created_at')]
    private $createdAt;

    #[Column(type: Types::DATETIME_MUTABLE, name: 'updated_at', nullable: true)]
    private $updatedAt;

    #[Column(type: Types::DATETIME_MUTABLE, name: 'deleted_at', nullable: true)]
    private $deletedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
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

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}

<?php

declare(strict_types=1);

class Contact
{
    // ID
    private ?int $id = null;

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    // Name
    private ?string $name = null;

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    // Email
    private ?string $email = null;

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    // N° Tel
    private ?string $phone = null;

    public function setPhone(string $phone):void
    {
        $this->phone = $phone;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function __toString(): string
    {
        return "{$this->id} {$this->name}, {$this->email}, {$this->phone}";
    }
}
<?php

declare(strict_types=1);

class Contact
{
    private ?int $id = 0;
    private ?string $name = null;
    private ?string $email = null;
    private ?string $phone = null;
    
    // ID

    public function setId(int $id): self
    {
        $this->id = $id;
        
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    // Name

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    // Email

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    // N° Tel

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;
        
        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    // Format d'affichage de la chaine
    public function __toString(): string
    {
        return "{$this->id} {$this->name}, {$this->email}, {$this->phone}";
    }
}
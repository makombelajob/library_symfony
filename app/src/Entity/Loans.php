<?php

namespace App\Entity;

use App\Repository\LoansRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LoansRepository::class)]
class Loans
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $due_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $returned_at = null;

    #[ORM\ManyToOne(inversedBy: 'user')]
    private ?Users $users = null;

    #[ORM\ManyToOne(inversedBy: 'books')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Books $books = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getDueAt(): ?\DateTime
    {
        return $this->due_at;
    }

    public function setDueAt(\DateTime $due_at): static
    {
        $this->due_at = $due_at;

        return $this;
    }

    public function getReturnedAt(): ?\DateTimeImmutable
    {
        return $this->returned_at;
    }

    public function setReturnedAt(?\DateTimeImmutable $returned_at): static
    {
        $this->returned_at = $returned_at;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): static
    {
        $this->users = $users;

        return $this;
    }

    public function getBooks(): ?Books
    {
        return $this->books;
    }

    public function setBooks(?Books $books): static
    {
        $this->books = $books;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\BooksRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BooksRepository::class)]
class Books
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 100)]
    private ?string $published = null;

    #[ORM\Column]
    private ?\DateTime $published_at = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $ISBN = null;

    /**
     * @var Collection<int, Loans>
     */
    #[ORM\OneToMany(targetEntity: Loans::class, mappedBy: 'books')]
    private Collection $books;

    /**
     * @var Collection<int, Authors>
     */
    #[ORM\ManyToMany(targetEntity: Authors::class, mappedBy: 'authors')]
    private Collection $authors;

    public function __construct()
    {
        $this->books = new ArrayCollection();
        $this->authors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getPublished(): ?string
    {
        return $this->published;
    }

    public function setPublished(string $published): static
    {
        $this->published = $published;

        return $this;
    }

    public function getPublishedAt(): ?\DateTime
    {
        return $this->published_at;
    }

    public function setPublishedAt(\DateTime $published_at): static
    {
        $this->published_at = $published_at;

        return $this;
    }

    public function getISBN(): ?string
    {
        return $this->ISBN;
    }

    public function setISBN(?string $ISBN): static
    {
        $this->ISBN = $ISBN;

        return $this;
    }

    /**
     * @return Collection<int, Loans>
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Loans $book): static
    {
        if (!$this->books->contains($book)) {
            $this->books->add($book);
            $book->setBooks($this);
        }

        return $this;
    }

    public function removeBook(Loans $book): static
    {
        if ($this->books->removeElement($book)) {
            // set the owning side to null (unless already changed)
            if ($book->getBooks() === $this) {
                $book->setBooks(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Authors>
     */
    public function getAuthors(): Collection
    {
        return $this->authors;
    }

    public function addAuthor(Authors $author): static
    {
        if (!$this->authors->contains($author)) {
            $this->authors->add($author);
            $author->addAuthor($this);
        }

        return $this;
    }

    public function removeAuthor(Authors $author): static
    {
        if ($this->authors->removeElement($author)) {
            $author->removeAuthor($this);
        }

        return $this;
    }
}

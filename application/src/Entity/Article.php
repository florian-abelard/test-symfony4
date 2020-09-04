<?php

namespace App\Entity;

use DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message = "Un auteur doit être associé à l'article")
     */
    private $author;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\NotBlank(message = "Le contenu ne peut être vide.")
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *     min = 10,
     *     max = 70,
     *     minMessage = "Ce titre est trop court",
     *     maxMessage = "Ce titre est trop long"
     * )
     */
    private $title;

    /**
     * @ORM\Column(type="datetime", name="publication_date")
     * @Assert\Date(message = "Le format de la date n'est pas valide.")
     */
    private $publicationDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPublicationDate(): ?string
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(?DateTime $publicationDate): self
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }
}

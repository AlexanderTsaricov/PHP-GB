<?php

use Homework4_ex5\Book;
class PeperBook extends Book
{
    protected $id;
    protected $title;
    protected $description;
    protected $author;

    protected $adressBook;

    public function __construct(int $id, string $title, string $description, string $author, string $adressBook)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->author = $author;
        $this->adressBook = $adressBook;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAdressBook(string $adressBook): void
    {
        $this->adressBook = $adressBook;
    }

    function getBook(): string
    {
        return $this->adressBook;
    }
}
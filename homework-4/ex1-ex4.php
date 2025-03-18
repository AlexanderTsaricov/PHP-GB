<?php

class Book
{
    protected $title;
    protected $author;
    protected $discription;
    protected $pageCount;

    protected $type;

    public function __construct(string $title, string $author, string $discription, int $pageCount, string $type)
    {
        $this->title = $title;
        $this->author = $author;
        $this->discription = $discription;
        $this->pageCount = $pageCount;
        $this->type = $type;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
    public function getAuthor(): string
    {
        return $this->author;
    }
    public function getDiscription(): string
    {
        return $this->discription;
    }
    public function getPageCount(): int
    {
        return $this->pageCount;
    }
    public function getType(): string
    {
        return $this->type;
    }
}

class Jurnal extends Book
{
    protected $releaseDate;
    public function __construct(string $title, string $author, string $discription, int $pageCount, DateTime $releaseDate)
    {
        parent::__construct($title, $author, $discription, $pageCount, "Jurnal");
        $this->releaseDate = $releaseDate;
    }

    public function getReleaseDate(): DateTime
    {
        return $this->releaseDate;
    }

}

class Schoolbook extends Book
{
    protected $scientificType;
    public function __construct(string $title, string $author, string $discription, int $pageCount, string $scientificType)
    {
        parent::__construct($title, $author, $discription, $pageCount, "schoolbook");
        $this->scientificType = $scientificType;
    }
    public function getScientificType(): string
    {
        return $this->scientificType;
    }
}
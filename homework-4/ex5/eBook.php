<?php
class EBook extends Book
{
    protected $id;
    protected $title;
    protected $description;
    protected $author;

    protected $linkDownload;

    public function __construct(int $id, string $title, string $description, string $author, string $linkDownload)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->author = $author;
        $this->linkDownload = $linkDownload;
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

    function getBook(): string
    {
        return $this->linkDownload;
    }
}
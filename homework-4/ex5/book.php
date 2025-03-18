<?php
abstract class Book
{
    protected $id;
    protected $title;
    protected $description;
    protected $author;

    abstract function getBook();
}


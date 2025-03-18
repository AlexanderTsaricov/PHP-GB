<?php

namespace Homework4_ex5;
abstract class Book
{
    protected $id;
    protected $title;
    protected $description;
    protected $author;

    abstract function getBook();
}


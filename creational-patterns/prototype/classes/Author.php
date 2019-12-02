<?php

class Author
{
    /**
     *
     * @var null
     */
    private $name;

    /**
     * @var array
     */
    private $pages = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addToPage(Page $page): void
    {
        $this->pages[] = $page;
    }
}

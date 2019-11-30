<?php

class Rectangle
{
    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * Get the value of width
     *
     * @return  int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set the value of width
     *
     * @param  int  $width
     *
     * @return  self
     */
    public function setWidth(int $width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get the value of height
     *
     * @return  int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set the value of height
     *
     * @param  int  $height
     *
     * @return  self
     */
    public function setHeight(int $height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Calculate the area of rectangle
     *
     * @return integer
     */
    public function calculateArea(): int
    {
        return $this->width * $this->height;
    }
}

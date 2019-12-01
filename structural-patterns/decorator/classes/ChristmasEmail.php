<?php


class ChristmasEmail extends EmailDecorator
{

    public function load(): string
    {
        return "<span style=\"color:blue\">ChristmasEmail( </span>" . $this->email->load() . "<span style=\"color:blue\"> )</span>";
    }
}

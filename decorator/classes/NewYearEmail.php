<?php


class NewYearEmail extends EmailDecorator
{

    public function load(): string
    {
        return "<span style=\"color:red\">NewYearEmail( </span>" . $this->email->load() . "<span style=\"color:red\"> )</span>";
    }
}

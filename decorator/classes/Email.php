<?php


class Email implements EmailInterface
{
    public function load(): string
    {
        return  "<span style=\"color:green\">Email</span>";
    }
}

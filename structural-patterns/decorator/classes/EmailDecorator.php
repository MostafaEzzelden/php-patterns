<?php


abstract class EmailDecorator implements EmailInterface
{
    protected $email;

    public function __construct(EmailInterface $email)
    {
        $this->email = $email;
    }

    abstract public function load(): string;

}

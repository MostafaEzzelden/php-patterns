<?php


class ChristmasEmail extends EmailDecorator
{
    protected $config = [
        'MAIL_ENCRYPTION' => null,
        'MAIL_BODY' => 'This is extra content for Xmas email',
    ];

    public function loadConfig(): array
    {
        $config = array_merge($this->email->loadConfig(), $this->config);
        return $config;
    }
}

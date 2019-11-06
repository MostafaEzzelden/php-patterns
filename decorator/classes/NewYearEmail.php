<?php


class NewYearEmail extends EmailDecorator
{
    protected $config = [
        'MAIL_BODY' => 'This is extra content for new year email',
    ];

    public function loadConfig(): array
    {
        $config = array_merge($this->email->loadConfig(), $this->config);
        return $config;
    }
}

<?php


class Email implements EmailInterface
{
    /**
     * the default mail configration
     *
     * @var array
     */
    protected $config;

    public function __construct()
    {
        $this->config = [
            'MAIL_DRIVER' => 'smtp',
            'MAIL_HOST' => 'smtp.gmail.com',
            'MAIL_PORT' => 587,
            'MAIL_USERNAME' => 'username',
            'MAIL_PASSWORD' => sha1('pwd33#'),
            'MAIL_ENCRYPTION' => 'tls',
            'MAIL_BODY' => 'this is main body',
        ];
    }


    public function loadConfig(): array
    {
        return $this->config;
    }
}

<?php

class SocialPosterFactory
{
    public static function create(string $provider, $login, $password)
    {
        if (!empty($provider) && class_exists($provider = ucfirst($provider) . 'Poster')) {
            return new $provider($login, $password);
        }

        throw new \Exception("Provider $provider not found!");
    }
}

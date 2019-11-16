<?php

class SocialPosterFactory
{
    public static function create(string $provider, $login, $password): SocialNetworkPoster
    {
        if (empty($provider) || !class_exists($provider = ucfirst($provider) . 'Poster')) {
            throw new \Exception("Provider $provider not found!");
        }
        return new $provider($login, $password);
    }
}

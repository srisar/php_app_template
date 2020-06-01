<?php


namespace App\Core;


class App
{

    /**
     * Returns the site base URL (http://localhost)
     * @return string
     */
    public static function siteURL(): string
    {
        return sprintf("%s://%s", Request::scheme(), Request::host());
    }

    /**
     * Build a new url based on the path passed.
     * @param string $path
     * @param array $parameters
     * @return string
     */
    public static function url(string $path = '/', array $parameters = []): string
    {
        if ( empty($parameters) ) {
            return self::siteURL() . $path;
        } else {
            $query = http_build_query($parameters);
            return self::siteURL() . $path . '?' . $query;
        }
    }

    /**
     * Returns app's name
     * @return string
     */
    public static function appName(): string
    {
        return $_ENV['APP_NAME'];
    }

}
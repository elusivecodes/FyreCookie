<?php
declare(strict_types=1);

namespace Fyre\Cookie;

/**
 * CookieStore
 */
abstract class CookieStore
{

    protected static array $cookies = [];

    /**
     * Clear all cookies.
     */
    public static function clear(): void
    {
        static::$cookies = [];
    }

    /**
     * Delete a cookie.
     * @param string $name The cookie name.
     * @param array $options Options for the cookie.
     */
    public static function delete(string $name, array $options = []): void
    {
        static::set($name, '', $options + ['expire' => 0]);
    }

    /**
     * Dispatch all cookies.
     */
    public static function dispatch(): void
    {
        foreach (static::$cookies AS $cookie) {
            $cookie->dispatch();
        }
    }

    /**
     * Get a cookie.
     * @param string $name The cookie name.
     * @return Cookie|null The cookie.
     */
    public static function get(string $name): Cookie|null
    {
        foreach (static::$cookies AS $cookie) {
            if ($cookie->getName() !== $name) {
                continue;
            }

            return $cookie;
        }

        return null;
    }

    /**
     * Determine if a cookie exists.
     * @param string $name The cookie name.
     * @return bool TRUE if the cookie exists, otherwise FALSE.
     */
    public static function has(string $name): bool
    {
        return static::get($name) !== null;
    }

    /**
     * Set a cookie.
     * @param string $name The cookie name.
     * @param string $value The cookie value.
     * @param array $options Options for the cookie.
     */
    public static function set(string $name, string $value = '', array $options = []): void
    {
        $cookie = new Cookie($name, $value, $options);

        $id = $cookie->getId();

        static::$cookies[$id] = $cookie;
    }

}

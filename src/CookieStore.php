<?php
declare(strict_types=1);

namespace Fyre\Cookie;

use function array_values;
use function count;
use function implode;

/**
 * CookieStore
 */
abstract class CookieStore
{

    protected static array $cookies = [];

    /**
     * Get all the cookies.
     * @return array
     */
    public static function all(): array
    {
        return array_values(static::$cookies);
    }

    /**
     * Clear all cookies.
     */
    public static function clear(): void
    {
        static::$cookies = [];
    }

    /**
     * Get the number of cookies.
     * @return int The number of cookies.
     */
    public static function count(): int
    {
        return count(static::$cookies);
    }

    /**
     * Delete a cookie.
     * @param string $name The cookie name.
     * @param array $options Options for the cookie.
     */
    public static function delete(string $name, array $options = []): void
    {
        static::set($name, '', $options + ['expires' => 1]);
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

        $id = implode(';', [$cookie->getName(), $cookie->getPath(), $cookie->getDomain()]);

        static::$cookies[$id] = $cookie;
    }

}

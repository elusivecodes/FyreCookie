<?php
declare(strict_types=1);

namespace Fyre\Http;

use function array_replace;
use function implode;
use function setcookie;
use function time;

/**
 * Cookie
 */
class Cookie
{
    protected static array $defaults = [
        'expires' => null,
        'path' => '/',
        'domain' => '',
        'secure' => false,
        'httpOnly' => false,
        'sameSite' => 'Lax'
    ];
    protected string $domain;
    protected int|null $expires;
    protected bool $httpOnly;
    protected string $name;
    protected string $path;
    protected string $sameSite;
    protected bool $secure;
    protected string $value;

    /**
     * New Cookie constructor.
     * @param string $name The cookie name.
     * @param string $value The cookie value.
     * @param array $options Options for the cookie.
     */
    public function __construct(string $name, string $value = '', array $options = [])
    {
        $options = array_replace(static::$defaults, $options);

        $this->name = $name;
        $this->value = $value;

        $this->expires = $options['expires'];
        $this->path = $options['path'];
        $this->domain = $options['domain'];
        $this->secure = $options['secure'];
        $this->httpOnly = $options['httpOnly'];
        $this->sameSite = $options['sameSite'];
    }

    /**
     * Dispatch the cookie.
     * @return bool TRUE if the cookie was dispatched, otherwise FALSE.
     */
    public function dispatch(): bool
    {
        return setcookie($this->name, $this->value, [
            'expires' => $this->expires ?? 0,
            'path' => $this->path,
            'domain' => $this->domain,
            'secure' => $this->secure,
            'httponly' => $this->httpOnly,
            'sameSite' => $this->sameSite
        ]);
    }

    /**
     * Get the cookie default options.
     * @return array The default options.
     */
    public static function getDefaults(): array
    {
        return static::$defaults;
    }

    /**
     * Get the cookie domain.
     * @return string The cookie domain.
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * Get the cookie expires timestamp.
     * @return int|null The cookie expires timestamp.
     */
    public function getExpires(): int|null
    {
        return $this->expires;
    }

    /**
     * Get the cookie ID.
     * @return string The cookie ID.
     */
    public function getId(): string
    {
        return implode(';', [$this->name, $this->path, $this->domain]);
    }

    /**
     * Get the cookie name.
     * @return string The cookie name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the cookie path.
     * @return string The cookie path.
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Get the cookie same site attribute.
     * @return string The cookie same site attribute.
     */
    public function getSameSite(): string
    {
        return $this->sameSite;
    }

    /**
     * Get the cookie value.
     * @return string The cookie value.
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Determine if the cookie has expired.
     * @return bool TRUE if the cookie has expired, otherwise FALSE.
     */
    public function isExpired(): bool
    {
        return $this->expires !== null && $this->expires < time();
    }

    /**
     * Determine if the cookie is HTTP only.
     * @return bool TRUE if the cookie is HTTP only, otherwise FALSE.
     */
    public function isHttpOnly(): bool
    {
        return $this->httpOnly;
    }

    /**
     * Determine if the cookie is secure.
     * @return bool TRUE if the cookie is secure, otherwise FALSE.
     */
    public function isSecure(): bool
    {
        return $this->secure;
    }

    /**
     * Set cookie default options.
     * @param array $options The default options.
     */
    public static function setDefaults($options = []): void
    {
        static::$defaults = array_replace(static::$defaults, $options);
    }
}

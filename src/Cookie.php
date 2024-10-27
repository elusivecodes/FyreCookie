<?php
declare(strict_types=1);

namespace Fyre\Http;

use InvalidArgumentException;

use function array_map;
use function array_replace;
use function gmdate;
use function in_array;
use function rawurlencode;
use function strtolower;
use function time;

/**
 * Cookie
 */
class Cookie
{
    protected const RESERVED_CHARS = ['=', ',', ';', ' ', "\t", "\r", "\n", "\v", "\f"];

    protected static array $defaults = [
        'expires' => null,
        'path' => '/',
        'domain' => '',
        'secure' => false,
        'httpOnly' => false,
        'sameSite' => 'lax',
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
     *
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

        if ($this->sameSite) {
            $this->sameSite = strtolower($this->sameSite);

            if (!in_array($this->sameSite, ['lax', 'strict', 'none'])) {
                throw new InvalidArgumentException('Invalid sameSite option.');
            }
        }
    }

    /**
     * Get the cookie string.
     *
     * @return string The cookie string.
     */
    public function __toString(): string
    {
        $result = '';

        $replacements = array_map(fn(string $char): string => rawurlencode($char), static::RESERVED_CHARS);
        $result = str_replace(static::RESERVED_CHARS, $replacements, $this->name);
        $result .= '=';
        $result .= rawurlencode($this->value);

        if ($this->expires !== null) {
            $result .= '; expires='.gmdate('D, d M Y H:i:s T', $this->expires);
        }

        if ($this->path) {
            $result .= '; path='.$this->path;
        }

        if ($this->domain) {
            $result .= '; domain='.$this->domain;
        }

        if ($this->secure) {
            $result .= '; secure';
        }

        if ($this->httpOnly) {
            $result .= '; httponly';
        }

        if ($this->sameSite) {
            $result .= '; samesite='.$this->sameSite;
        }

        return $result;
    }

    /**
     * Get the cookie domain.
     *
     * @return string The cookie domain.
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * Get the cookie expires timestamp.
     *
     * @return int|null The cookie expires timestamp.
     */
    public function getExpires(): int|null
    {
        return $this->expires;
    }

    /**
     * Get the cookie header string.
     *
     * @return string The cookie header string.
     */
    public function getHeaderString(): string
    {
        return 'Set-Cookie: '.$this->__toString();
    }

    /**
     * Get the cookie name.
     *
     * @return string The cookie name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the cookie path.
     *
     * @return string The cookie path.
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Get the cookie same site attribute.
     *
     * @return string The cookie same site attribute.
     */
    public function getSameSite(): string
    {
        return $this->sameSite;
    }

    /**
     * Get the cookie value.
     *
     * @return string The cookie value.
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Determine whether the cookie has expired.
     *
     * @return bool TRUE if the cookie has expired, otherwise FALSE.
     */
    public function isExpired(): bool
    {
        return $this->expires !== null && $this->expires < time();
    }

    /**
     * Determine whether the cookie is HTTP only.
     *
     * @return bool TRUE if the cookie is HTTP only, otherwise FALSE.
     */
    public function isHttpOnly(): bool
    {
        return $this->httpOnly;
    }

    /**
     * Determine whether the cookie is secure.
     *
     * @return bool TRUE if the cookie is secure, otherwise FALSE.
     */
    public function isSecure(): bool
    {
        return $this->secure;
    }
}

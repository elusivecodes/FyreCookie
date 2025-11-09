<?php
declare(strict_types=1);

namespace Tests;

use Fyre\Http\Cookie;
use Fyre\Utility\Traits\MacroTrait;
use PHPUnit\Framework\TestCase;

use function class_uses;
use function time;

final class CookieTest extends TestCase
{
    public function testGetDomain(): void
    {
        $cookie = new Cookie('test', 'value', [
            'domain' => 'test.com',
        ]);

        $this->assertSame(
            'test.com',
            $cookie->getDomain()
        );
    }

    public function testGetDomainDefault(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertSame(
            '',
            $cookie->getDomain()
        );
    }

    public function testGetExpires(): void
    {
        $expires = time() + 3600;

        $cookie = new Cookie('test', 'value', [
            'expires' => $expires,
        ]);

        $this->assertSame(
            $expires,
            $cookie->getExpires()
        );
    }

    public function testGetExpiresDefault(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertSame(
            null,
            $cookie->getExpires()
        );
    }

    public function testGetName(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertSame(
            'test',
            $cookie->getName()
        );
    }

    public function testGetPath(): void
    {
        $cookie = new Cookie('test', 'value', [
            'path' => '/test',
        ]);

        $this->assertSame(
            '/test',
            $cookie->getPath()
        );
    }

    public function testGetPathDefault(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertSame(
            '/',
            $cookie->getPath()
        );
    }

    public function testGetSameSite(): void
    {
        $cookie = new Cookie('test', 'value', [
            'sameSite' => 'strict',
        ]);

        $this->assertSame(
            'strict',
            $cookie->getSameSite()
        );
    }

    public function testGetSameSiteDefault(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertSame(
            'lax',
            $cookie->getSameSite()
        );
    }

    public function testGetValue(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertSame(
            'value',
            $cookie->getValue()
        );
    }

    public function testIsExpired(): void
    {
        $cookie = new Cookie('test', 'value', [
            'expires' => time() + 3600,
        ]);

        $this->assertFalse(
            $cookie->isExpired()
        );
    }

    public function testIsExpiredExpired(): void
    {
        $cookie = new Cookie('test', 'value', [
            'expires' => time() - 3600,
        ]);

        $this->assertTrue(
            $cookie->isExpired()
        );
    }

    public function testIsExpiredNull(): void
    {
        $cookie = new Cookie('test', 'value', [
            'expires' => null,
        ]);

        $this->assertFalse(
            $cookie->isExpired()
        );
    }

    public function testIsHttpOnly(): void
    {
        $cookie = new Cookie('test', 'value', [
            'httpOnly' => true,
        ]);

        $this->assertTrue(
            $cookie->isHttpOnly()
        );
    }

    public function testIsHttpOnlyDefault(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertFalse(
            $cookie->isHttpOnly()
        );
    }

    public function testIsSecure(): void
    {
        $cookie = new Cookie('test', 'value', [
            'secure' => true,
        ]);

        $this->assertTrue(
            $cookie->isSecure()
        );
    }

    public function testIsSecureDefault(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertFalse(
            $cookie->isSecure()
        );
    }

    public function testMacroable(): void
    {
        $this->assertContains(
            MacroTrait::class,
            class_uses(Cookie::class)
        );
    }

    public function testToString(): void
    {
        $cookie = new Cookie('test', 'value', [
            'expires' => 9999999999,
            'path' => '/test',
            'domain' => 'test.com',
            'secure' => true,
            'httpOnly' => true,
            'sameSite' => 'strict',
        ]);

        $this->assertSame(
            'test=value; expires=Sat, 20 Nov 2286 17:46:39 GMT; path=/test; domain=test.com; secure; httponly; samesite=strict',
            (string) $cookie
        );
    }

    public function testToStringEncodedName(): void
    {
        $cookie = new Cookie('test=1', 'value');

        $this->assertSame(
            'test%3D1=value; path=/; samesite=lax',
            (string) $cookie
        );
    }

    public function testToStringEncodedValue(): void
    {
        $cookie = new Cookie('test', 'value=1');

        $this->assertSame(
            'test=value%3D1; path=/; samesite=lax',
            (string) $cookie
        );
    }
}

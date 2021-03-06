<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\Cookie\Cookie,
    PHPUnit\Framework\TestCase;

use function
    time;

final class CookieTest extends TestCase
{

    public function testGetDomain(): void
    {
        $cookie = new Cookie('test', 'value', [
            'domain' => 'test.com'
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
            'expires' => $expires
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
            0,
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
            'path' => '/test'
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
            'sameSite' => 'Strict'
        ]);

        $this->assertSame(
            'Strict',
            $cookie->getSameSite()
        );
    }

    public function testGetSameSiteDefault(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertSame(
            'Lax',
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
            'expires' => time() + 3600
        ]);

        $this->assertFalse(
            $cookie->isExpired()
        );
    }

    public function testIsExpiredExpired(): void
    {
        $cookie = new Cookie('test', 'value', [
            'expires' => time() - 3600
        ]);

        $this->assertTrue(
            $cookie->isExpired()
        );
    }

    public function testIsHttpOnly(): void
    {
        $cookie = new Cookie('test', 'value', [
            'httpOnly' => true
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
            'secure' => true
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

}

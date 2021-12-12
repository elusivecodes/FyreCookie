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

        $this->assertEquals(
            'test.com',
            $cookie->getDomain()
        );
    }

    public function testGetDomainDefault(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertEquals(
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

        $this->assertEquals(
            $expires,
            $cookie->getExpires()
        );
    }

    public function testGetExpiresDefault(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertEquals(
            0,
            $cookie->getExpires()
        );
    }

    public function testGetName(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertEquals(
            'test',
            $cookie->getName()
        );
    }

    public function testGetPath(): void
    {
        $cookie = new Cookie('test', 'value', [
            'path' => '/test'
        ]);

        $this->assertEquals(
            '/test',
            $cookie->getPath()
        );
    }

    public function testGetPathDefault(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertEquals(
            '/',
            $cookie->getPath()
        );
    }

    public function testGetSameSite(): void
    {
        $cookie = new Cookie('test', 'value', [
            'sameSite' => 'Strict'
        ]);

        $this->assertEquals(
            'Strict',
            $cookie->getSameSite()
        );
    }

    public function testGetSameSiteDefault(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertEquals(
            'Lax',
            $cookie->getSameSite()
        );
    }

    public function testGetValue(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertEquals(
            'value',
            $cookie->getValue()
        );
    }

    public function testIsExpired(): void
    {
        $cookie = new Cookie('test', 'value', [
            'expires' => time() + 3600
        ]);

        $this->assertEquals(
            false,
            $cookie->isExpired()
        );
    }

    public function testIsExpiredExpired(): void
    {
        $cookie = new Cookie('test', 'value', [
            'expires' => time() - 3600
        ]);

        $this->assertEquals(
            true,
            $cookie->isExpired()
        );
    }

    public function testIsHttpOnly(): void
    {
        $cookie = new Cookie('test', 'value', [
            'httpOnly' => true
        ]);

        $this->assertEquals(
            true,
            $cookie->isHttpOnly()
        );
    }

    public function testIsHttpOnlyDefault(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertEquals(
            false,
            $cookie->isHttpOnly()
        );
    }

    public function testIsSecure(): void
    {
        $cookie = new Cookie('test', 'value', [
            'secure' => true
        ]);

        $this->assertEquals(
            true,
            $cookie->isSecure()
        );
    }

    public function testIsSecureDefault(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertEquals(
            false,
            $cookie->isSecure()
        );
    }

}

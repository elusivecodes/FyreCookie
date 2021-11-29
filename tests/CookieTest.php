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

    public function testCookieGetDomain(): void
    {
        $cookie = new Cookie('test', 'value', [
            'domain' => 'test.com'
        ]);

        $this->assertEquals(
            'test.com',
            $cookie->getDomain()
        );
    }

    public function testCookieGetDomainDefault(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertEquals(
            '',
            $cookie->getDomain()
        );
    }

    public function testCookieGetExpires(): void
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

    public function testCookieGetExpiresDefault(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertEquals(
            0,
            $cookie->getExpires()
        );
    }

    public function testCookieGetName(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertEquals(
            'test',
            $cookie->getName()
        );
    }

    public function testCookieGetPath(): void
    {
        $cookie = new Cookie('test', 'value', [
            'path' => '/test'
        ]);

        $this->assertEquals(
            '/test',
            $cookie->getPath()
        );
    }

    public function testCookieGetPathDefault(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertEquals(
            '/',
            $cookie->getPath()
        );
    }

    public function testCookieGetSameSite(): void
    {
        $cookie = new Cookie('test', 'value', [
            'sameSite' => 'Strict'
        ]);

        $this->assertEquals(
            'Strict',
            $cookie->getSameSite()
        );
    }

    public function testCookieGetSameSiteDefault(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertEquals(
            'Lax',
            $cookie->getSameSite()
        );
    }

    public function testCookieGetValue(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertEquals(
            'value',
            $cookie->getValue()
        );
    }

    public function testCookieIsExpired(): void
    {
        $cookie = new Cookie('test', 'value', [
            'expires' => time() + 3600
        ]);

        $this->assertEquals(
            false,
            $cookie->isExpired()
        );
    }

    public function testCookieIsExpiredExpired(): void
    {
        $cookie = new Cookie('test', 'value', [
            'expires' => time() - 3600
        ]);

        $this->assertEquals(
            true,
            $cookie->isExpired()
        );
    }

    public function testCookieIsHttpOnly(): void
    {
        $cookie = new Cookie('test', 'value', [
            'httpOnly' => true
        ]);

        $this->assertEquals(
            true,
            $cookie->isHttpOnly()
        );
    }

    public function testCookieIsHttpOnlyDefault(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertEquals(
            false,
            $cookie->isHttpOnly()
        );
    }

    public function testCookieIsSecure(): void
    {
        $cookie = new Cookie('test', 'value', [
            'secure' => true
        ]);

        $this->assertEquals(
            true,
            $cookie->isSecure()
        );
    }

    public function testCookieIsSecureDefault(): void
    {
        $cookie = new Cookie('test', 'value');

        $this->assertEquals(
            false,
            $cookie->isSecure()
        );
    }

}

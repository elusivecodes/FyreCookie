<?php
declare(strict_types=1);

namespace Tests;

use Fyre\Cookie\Cookie;
use Fyre\Cookie\CookieStore;
use PHPUnit\Framework\TestCase;

final class CookieStoreTest extends TestCase
{

    public function testAll(): void
    {
        CookieStore::set('test1', 'value');
        CookieStore::set('test2', 'value');

        $cookies = CookieStore::all();

        $this->assertIsArray($cookies);
        $this->assertCount(2, $cookies);
        $this->assertSame(CookieStore::get('test1'), $cookies[0]);
        $this->assertSame(CookieStore::get('test2'), $cookies[1]);
    }

    public function testCount(): void
    {
        CookieStore::set('test1', 'value');
        CookieStore::set('test2', 'value');

        $this->assertSame(
            2,
            CookieStore::count()
        );
    }

    public function testDelete(): void
    {
        CookieStore::delete('test');

        $this->assertTrue(
            CookieStore::get('test')->isExpired()
        );
    }

    public function testGet(): void
    {
        CookieStore::set('test', 'value');

        $this->assertInstanceOf(
            Cookie::class,
            CookieStore::get('test')
        );
    }

    public function testGetInvalid(): void
    {
        $this->assertNull(
            CookieStore::get('invalid')
        );
    }

    public function testHas(): void
    {
        CookieStore::set('test', 'value');

        $this->assertTrue(
            CookieStore::has('test')
        );
    }

    public function testHasInvalid(): void
    {
        $this->assertFalse(
            CookieStore::has('invalid')
        );
    }

    protected function tearDown(): void
    {
        CookieStore::clear();
    }

}

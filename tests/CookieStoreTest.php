<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\Cookie\Cookie,
    Fyre\Cookie\CookieStore,
    PHPUnit\Framework\TestCase;

final class CookieStoreTest extends TestCase
{

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

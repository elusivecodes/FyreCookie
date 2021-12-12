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

        $this->assertEquals(
            true,
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
        $this->assertEquals(
            null,
            CookieStore::get('invalid')
        );
    }

    public function testHas(): void
    {
        CookieStore::set('test', 'value');

        $this->assertEquals(
            true,
            CookieStore::has('test')
        );
    }

    public function testHasInvalid(): void
    {
        $this->assertEquals(
            false,
            CookieStore::has('invalid')
        );
    }

    public function tearDown(): void
    {
        CookieStore::clear();
    }

}

<?php
namespace uploading\Test\Cache;
use uploading\Cache\FileStore;
use uploading\Cache\RedisStore;
use uploading\Cache\CacheFactory;
use PHPUnit\Framework\TestCase;
/**
 * @coversDefaultClass \TusPhp\Cache\CacheFactory
 */
class CacheFactoryTest extends TestCase
{
    /**
	 * @test
	 *
	 * @covers ::make
	 */
    public function it_makes_cache_store_object()
    {
        $this->assertInstanceOf(FileStore::class, CacheFactory::make());
        $this->assertInstanceOf(RedisStore::class, CacheFactory::make('redis'));
        $this->assertInstanceOf(FileStore::class, CacheFactory::make('invalid'));
    }
}
?>
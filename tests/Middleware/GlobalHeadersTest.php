<?php

namespace uploadingfile\Test\Middleware;

use Mockery as m;
use uploadingfile\Request;
use uploadingfile\Response;
use PHPUnit\Framework\TestCase;
use uploadingfile\Middleware\GlobalHeaders;

/**
 * @coversDefaultClass \TusPhp\Middleware\GlobalHeaders
 */
class GlobalHeadersTest extends TestCase
{
    /** @var GlobalHeaders */
    protected $globalHeaders;

    /**
     * Prepare vars.
     *
     * @return void
     */
    public function setUp()
    {
        $this->globalHeaders = new GlobalHeaders;

        parent::setUp();
    }

    /**
     * @test
     *
     * @covers ::handle
     */
    public function it_adds_global_headers()
    {
        $requestMock  = m::mock(Request::class, [])->makePartial();
        $responseMock = m::mock(Response::class);

        $responseMock
            ->shouldReceive('setHeaders')
            ->once()
            ->with([
                'X-Content-Type-Options' => 'nosniff',
                'Tus-Resumable' => '1.0.0',
            ])
            ->andReturnSelf();

        $this->assertNull($this->globalHeaders->handle($requestMock, $responseMock));
    }

    /**
     * Close mockery connection.
     *
     * @return void.
     */
    public function tearDown()
    {
        m::close();

        parent::tearDown();
    }
}

<?php

namespace uploadingfile\Test\Events;

use uploadingfile\File;
use uploadingfile\Request;
use uploadingfile\Response;
use uploadingfile\Events\TusEvent;
use PHPUnit\Framework\TestCase;
use uploadingfile\Events\UploadCreated;
use uploadingfile\Events\UploadComplete;
use uploadingfile\Tus\Server as TusServer;

/**
 * @coversDefaultClass \TusPhp\Events\TusEvent
 */
class TusEventTest extends TestCase
{
    /** @var TusServer */
    protected $tusServer;

    /**
     * Prepare vars.
     *
     * @return void
     */
    public function setUp()
    {
        $this->tusServer = new TusServer;
    }

    /**
     * @test
     *
     * @covers ::getFile
     * @covers ::getRequest
     * @covers ::getResponse
     */
    public function it_gets_file_request_and_response()
    {
        $this->tusServer->event()->addListener(UploadComplete::NAME, function (TusEvent $event) {
            $this->assertInstanceOf(File::class, $event->getFile());
        });

        $this->tusServer->event()->addListener(UploadComplete::NAME, function (TusEvent $event) {
            $this->assertInstanceOf(Request::class, $event->getRequest());
            $this->assertInstanceOf(Response::class, $event->getResponse());
        });

        $this->tusServer->event()->addListener(UploadCreated::NAME, function (TusEvent $event) {
            $this->assertTrue(false, 'This line should not be called.');
        });

        $this->tusServer->event()->dispatch(
            UploadComplete::NAME,
            new UploadComplete(new File(), new Request(), new Response())
        );
    }
}

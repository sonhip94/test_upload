<?php

namespace uploading\Events;

use uploading\File;
use uploading\Request;
use uploading\Response;

class UploadCreated extends TusEvent
{
    /** @var string */
    const NAME = 'tus-server.upload.created';

    /**
	 * UploadCreatedEvent constructor.
	 *
	 * @param File     $file
	 * @param Request  $request
	 * @param Response $response
	 */
    public function __construct(File $file, Request $request, Response $response)
    {
        $this->file     = $file;
        $this->request  = $request;
        $this->response = $response;
    }
}

?>
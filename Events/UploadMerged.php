<?php

namespace uploadingfile\Events;

use uploadingfile\File;
use uploadingfile\Request;
use uploadingfile\Response;

class UploadMerged extends TusEvent
{
    /** @var string */
    const NAME = 'tus-server.upload.merged';

    /**
	 * UploadMergedEvent constructor.
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
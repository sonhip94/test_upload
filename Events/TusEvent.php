<?php

namespace uploadingfile\Events;

use uploadingfile\File;
use uploadingfile\Request;
use uploadingfile\Response;
use Symfony\Component\EventDispatcher\Event;

class TusEvent extends Event
{
    /** @var File */
    protected $file;

    /** @var Request */
    protected $request;

    /** @var Response */
    protected $response;

    /**
	 * Get file.
	 *
	 * @return File
	 */
    public function getFile() : File
    {
        return $this->file;
    }

    /**
	 * Get request.
	 *
	 * @return Request
	 */
    public function getRequest() : Request
    {
        return $this->request;
    }

    /**
	 * Get response.
	 *
	 * @return Response
	 */
    public function getResponse() : Response
    {
        return $this->response;
    }
}

?>
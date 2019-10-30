<?php
namespace uploadingfile\Middleware;

use uploadingfile\Request;
use uploadingfile\Response;

interface TusMiddleware
{
    /**
	 * Handle request/response.
	 *
	 * @param Request  $request
	 * @param Response $response
	 *
	 * @return mixed
	 */
    public function handle(Request $request, Response $response);
}

?>
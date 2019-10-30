<?php
namespace uploadingfile\Middleware;

use uploadingfile\Request;
use uploadingfile\Response;
use uploadingfile\Tus\Server;

class GlobalHeaders implements TusMiddleware
{
    /**
	 * {@inheritDoc}
	 */
    public function handle(Request $request, Response $response)
    {
        $headers = [
            'X-Content-Type-Options' => 'nosniff',
            'Tus-Resumable' => Server::TUS_PROTOCOL_VERSION,
        ];

        $response->setHeaders($headers);
    }
}

?>
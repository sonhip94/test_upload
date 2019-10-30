<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Tus\Server as TusServer;
use uploadingfile\Tus\Server as TusServer;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class TusController extends Controller
{
	/**
	 * Create tus server.
	 *
	 * @return HttpResponse
	 */
    public function server()
    {
        $server = new TusServer('redis');

        $server
            ->setApiPath('/tus') // tus server endpoint.
            ->setUploadDir(WWW_ROOT . 'uploads'); // uploads dir, make sure it exists and is accessible.

        $response = $server->serve();

        return $response->send();
    }
}

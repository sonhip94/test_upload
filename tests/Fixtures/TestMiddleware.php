<?php

namespace uploadingfile\Test\Fixtures;

use uploadingfile\Request;
use uploadingfile\Response;
use uploadingfile\Middleware\TusMiddleware;

class TestMiddleware implements TusMiddleware
{
    /**
     * {@inheritDoc}
     */
    public function handle(Request $request, Response $response)
    {
        // Pass.
    }
}

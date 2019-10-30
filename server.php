<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

// // Thursday 5September - Begin
// $server   = new \TusPhp\Tus\Server('redis'); // Leave empty for file based cache
// $response = $server->serve();

// $response->send();

// exit(0); // Exit from current PHP process.

// Thursday 5September - End

require_once __DIR__.'/public/index.php';

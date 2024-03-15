<?php

require 'function.php';


// Get the path without the query string
$uri = parse_url($_SERVER["REQUEST_URI"])['path'];

// Map the paths routes
$routes = require 'routes.php';

// Check if the requested URI is in the routes array
if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    abort();
}

function abort($code = 404){
    http_response_code($code);
    $title = "Not Found";
    require 'views/404.view.php';
}

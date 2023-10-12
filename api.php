<?php 

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$uri = $_GET['uri'];
$token = '1a6ea4a5235c48d0bab60269ce0eed4c';

// Set cache time to 10 minutes
$cache_time = 600;

// Generate cache file name based on URI
$cache_file = '.cache/' . md5($uri) . '.cache';


// Check if cache file exists and is not expired
if (file_exists($cache_file) && (time() - filemtime($cache_file)) < $cache_time) {
    // Serve cached response
    echo file_get_contents($cache_file);
} else {
    // Fetch response from API
    $context = stream_context_create(array(
        'http' => array(
            'method' => 'GET',
            'header' => 'X-Auth-Token: ' . $token
        )
    ));

    $response = file_get_contents($uri, false, $context);

    // Save response to cache file
    file_put_contents($cache_file, $response);

    // Serve response
    echo $response;
} 

?>
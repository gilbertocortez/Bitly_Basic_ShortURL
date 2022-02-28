<?php
// Set error reporting on
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check to make sure user provided long url to shorten
if (!empty($_GET['long_url'])) {
    
    // Request URL Shortening
    // Store long url
    $long_url = $_GET['long_url'];
    // Require Bitly Class
    require './_inc/class/bitly.class.php';
    // Initiate request
    $_bitly = new BitlyShortener();
    $short_url = $_bitly->shorten_url($long_url);
    // Print response
    echo json_encode($short_url);

} else {

    // Set Error Response
    http_response_code(422);
    $response = new stdClass();
    $response->error = true;
    $response->code = "bitly_001";
    $response->message = "No URL Provided";
    $response->detail = "Please make sure to provide a long url when requesting a link shortening";
    // Print response
    echo json_encode($response);

}

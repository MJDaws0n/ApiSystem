<?php
use Net\MJDawson\ApiSystem\API;
use Net\MJDawson\ApiSystem\PageManager;
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'apiSystem'.DIRECTORY_SEPARATOR.'main.php';

// Sample pages for testing
$pages = [
    [
        'name' => 'Public Page',
        'security' => PageManager::SECURITY_NOT_ACCESSIBLE,
        'file' => dirname(__FILE__).DIRECTORY_SEPARATOR.'testingAPI.php',
        'API_KEYS' => [],
        'roles' => [],
        'subscriptions' => [],
        'users' => [],
        'uri' => '/1',
    ]
];

$user = [
    'id' => 1,
    'roles' => [],
    'admin' => true,
    'mfa' => false,
    'subscriptions' => [],
];

// Creating an instance of the API class
$api = new API($pages);

$api->get($user);


function getCurrentUri() {
    $uri = $_SERVER['REQUEST_URI']; // Get the request URI
    $uri = strtok($uri, '?'); // Remove query string if exists
    return $uri;
}
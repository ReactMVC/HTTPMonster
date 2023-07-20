<?php

require_once 'vendor/autoload.php';

use DarkPHP\HTTPMonster;

$http = new HTTPMonster();

$response = $http
    ->Url('https://example.com')
    ->Method('POST')
    ->Headers(
        array(
            'Content-Type: application/x-www-form-urlencoded'
        )
    )
    ->Body('email=user@gmail.com&password=123456')
    ->Send();

echo $response;

$statusCode = $http->getStatus();
echo "<br />Status Code: $statusCode\n";

try {
    $response = $http->Send();
} catch (Exception $e) {
    echo '<br />Error: ' . $e->getMessage();
}
<?php

require_once 'vendor/autoload.php';

use DarkPHP\HTTPMonster;

$http = new HTTPMonster();

$response = $http
    ->Url('https://nahanabzar.ir/ai')
    ->Method('GET')
    ->Headers(
        array(
            'Content-Type: application/json'
        )
    )
    ->Body('{"text": "Hello Bot"}')
    ->Send();

echo $response;

$statusCode = $http->getStatus();
echo "<br /> Status Code: $statusCode\n";

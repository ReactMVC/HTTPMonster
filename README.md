# HTTPMonster

HTTPMonster is a PHP class that provides a simple and easy-to-use interface for making HTTP requests using cURL. It allows you to easily set HTTP headers, request body, request method, and other options.

## Installation

You can install HTTPMonster using Composer:

```
composer require darkphp/monster
```

## Usage

To use HTTPMonster, you first need to create an instance of the class:

```php
require_once 'vendor/autoload.php';

use DarkPHP\HTTPMonster;

$http = new HTTPMonster();
```

### Setting Request Options

HTTPMonster provides several methods for setting request options:

```php
$http->Url('https://example.com');
$http->Method('POST');
$http->Headers([
    'Content-Type: application/json',
    'Authorization: Bearer XXXXXXXXXXXXXXXXXXXXXXXXX'
]);
$http->Body('{"foo": "bar"}');
$http->Timeout(30);
```

### Sending the Request

To send the request, simply call the `Send()` method:

```php
$response = $http->Send();
```

The `Send()` method returns the response from the server as a string.

### Getting the HTTP Status Code

You can get the HTTP status code of the response using the `getStatus()` method:

```php
$status = $http->getStatus();
```

### Setting Default Options

HTTPMonster sets default cURL options for the request. You can modify these defaults by calling the `setDefaults()` method:

```php
$http->setDefaults([
    CURLOPT_SSL_VERIFYHOST => 2,
    CURLOPT_SSL_VERIFYPEER => true
]);
```

### Add 1 Option
HTTPMonster add cURL options for the request. You can modify these defaults by calling the `Option()` method:
```php
$http->Option(CURLOPT_RETURNTRANSFER, true);
```

### Chaining Methods

HTTPMonster allows you to chain methods to make the code more readable:

```php
$response = $http->Url('https://example.com')
    ->Method('POST')
    ->Headers([
        'Content-Type: application/json',
        'Authorization: Bearer XXXXXXXXXXXXXXXXXXXXXXXXX'
    ])
    ->Body('{"foo": "bar"}')
    ->Timeout(30)
    ->Send();
```

## Error Handling

HTTPMonster throws an exception if cURL encounters an error while executing the request. You should always catch these exceptions to handle errors properly:

```php
try {
    $response = $http->Send();
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
```

## License

HTTPMonster is licensed under the MIT License. See `LICENSE` for more information.

## Developer

HTTPMonster is developed by Hossein Pira.

- Email: h3dev.pira@gmail.com
- Telegram: @h3dev

If you have any questions, comments, or feedback, please feel free to contact John via email or Telegram.

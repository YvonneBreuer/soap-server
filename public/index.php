<?php

declare(strict_types=1);

use Laminas\Soap\AutoDiscover;
use Laminas\Soap\Server;
use SoapServer\WebService\Calculator;
use SoapServer\WebService\StringMatch;

require __DIR__ . '/../vendor/autoload.php';

if (!isset($_SERVER['REQUEST_METHOD'])) {
    exit('Script should only be run via a web server.');
}

define('BASE_URI', getenv('URI') ? rtrim(getenv('URI'), '/') . '/' : 'http://localhost:8000/');
define('SERVICES', [
    'calculator' => Calculator::class,
    'string-match' => StringMatch::class,
]);

function handle_request(string $name): void
{
    $uri = BASE_URI . $name;
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (!isset($_GET['wsdl'])) {
            http_response_code(400);
        }

        $autodiscover = new AutoDiscover();
        $autodiscover->setUri($uri);
        $autodiscover->setClass(SERVICES[$name]);
        header('Content-Type: application/wsdl+xml');
        echo $autodiscover->toXml();
        return;
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $options = [
            'uri' => $uri
        ];
        $server = new Server(null, $options);
        $server->setClass(SERVICES[$name]);
        $server->handle();
    } else {
        http_response_code(405);
    }
}

$path = $_SERVER['PATH_INFO'];
$name = isset($path) ? ltrim($path, '/') : '';

if (array_key_exists($name, SERVICES)) {
    handle_request($name);
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo '<h1>SOAP Services</h1>';
    echo '<ul>';
    foreach (SERVICES as $service_name => $service_class) {
        echo '<li>';
        echo '<a href="' . BASE_URI . $service_name . '?wsdl">' . (string)$service_class . '</a>';
        echo '</li>';
    }
    echo '</ul>';
}

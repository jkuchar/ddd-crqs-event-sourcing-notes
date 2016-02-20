<?php

require __DIR__ . "/bootstrap.php";

$i = 0;

$app = function (\React\Http\Request $request, \React\Http\Response $response) use (&$i) {
	$i++;



	$text = "This is request number $i.\n";

	$headers = array('Content-Type' => 'text/plain');

	$response->writeHead(200, $headers);
	$response->end($text);
};


$loop = React\EventLoop\Factory::create();
$socket = new React\Socket\Server($loop);
$http = new React\Http\Server($socket);

$http->on('request', $app);

$socket->listen(1337);
$loop->run();
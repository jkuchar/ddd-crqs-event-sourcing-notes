<?php

require __DIR__ . "/vendor/autoload.php";

$loader = new Nette\Loaders\RobotLoader;
// Add directories for RobotLoader to index
$loader->addDirectory('app');
//$loader->addDirectory('libs');
// And set caching to the 'temp' directory on the disc
$loader->setCacheStorage(new Nette\Caching\Storages\FileStorage('temp'));
$loader->register(); // Run the RobotLoader


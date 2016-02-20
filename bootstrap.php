<?php

require __DIR__ . "/vendor/autoload.php";

$loader = new Nette\Loaders\RobotLoader;
// Add directories for RobotLoader to index
$loader->addDirectory(__DIR__ . '/app');
//$loader->addDirectory('libs');
// And set caching to the 'temp' directory on the disc
$loader->setCacheStorage(new Nette\Caching\Storages\FileStorage(__DIR__.'/temp'));
$loader->register(); // Run the RobotLoader


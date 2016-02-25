<?php

require __DIR__ . "/vendor/autoload.php";

// setup class auto-loader
$loader = new Nette\Loaders\RobotLoader;
$loader->addDirectory(__DIR__ . '/app');
$loader->setCacheStorage(new Nette\Caching\Storages\FileStorage(__DIR__.'/temp'));
$loader->register();

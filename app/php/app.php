<?php

require __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;

// create a log channel
$log = new Logger('logger');

//Log to stdout
$stdoutHandler = new \Monolog\Handler\ErrorLogHandler();
$formatter = new \Monolog\Formatter\JsonFormatter();
$stdoutHandler->setFormatter($formatter);
$log->pushHandler($stdoutHandler);

// File Handler
$fileHandler = new \Monolog\Handler\RotatingFileHandler(
    __DIR__ . '/../../var/logs/app.log',
    0,
    Logger::DEBUG
);
$formatter = new \Monolog\Formatter\JsonFormatter();
$fileHandler->setFormatter($formatter);
$log->pushHandler($fileHandler);

// Elasticsearch Handler
//$elasticClient = \Elasticsearch\ClientBuilder::create()
    //->setHosts(['elasticsearch:9200'])
    //->build();

//$elasticsearchHandler = new \Monolog\Handler\ElasticSearchHandler($elasticClient);
//$log->pushHandler($elasticsearchHandler);

// My Application
$options = getopt('a:b:');

# App Servidor A
if ($options['a'] == 'warning') {
    $log->warn('Esto es un Warning', ['Servidor' => 'Servidor A']);
} else {
    $log->info('Esto es un Info', ['Servidor' => 'Servidor A']);
}

# App Servidor B
if ($options['b'] == 'error') {
    $log->error('Esto es un Error', ['Servidor' => 'Servidor B']);
} else {
    $log->info('Esto es un Info', ['Servidor' => 'Servidor B']);
}




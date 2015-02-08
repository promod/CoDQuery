<?php

require 'CoDQuery.php';

$server = new Promod\CoDQuery\CoDServer('127.0.0.1', '28960');

var_dump($server->info());

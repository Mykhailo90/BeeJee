<?php

require 'vendor/autoload.php';
require 'core/bootstrap.php';

use App\Core\Request;
use App\Core\Router;

session_start();

Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method());

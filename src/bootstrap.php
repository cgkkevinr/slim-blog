<?php
declare(strict_types=1);

namespace App;

require __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);

// Instantiate the App
$settings = require "settings.php";
$app = new \Slim\App($settings);

// Wire up services
require "services.php";

// Register middleware
require "middleware.php";

// Register routes
require "routes.php";

// Start the App
$app->run();
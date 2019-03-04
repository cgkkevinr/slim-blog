<?php
declare(strict_types=1);

namespace App;

require __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);

// Instantiate the App
$settings = require "settings.php";
$app = new \Slim\App($settings);

// Wire up services
require __DIR__ . "services.php";

// Register middleware
require __DIR__ . "middleware.php";

// Register routes
require __DIR__ . "routes.php";

// Start the App
$app->run();
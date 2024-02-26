<?php

require_once '../vendor/autoload.php';

use Garcia\Nexus;

$filePath = __DIR__ . '/.env.test'; // Assuming .env is present for testing purposes

// Create a temporary .env file for testing
file_put_contents($filePath, "TEST_VAR=123\nANOTHER_VAR=abc");

// Load the .env file
Nexus::load($filePath);

// Check if environment variables are set
echo getenv('TEST_VAR') . "\n";
echo $_ENV['ANOTHER_VAR'] . "\n";
echo $GLOBALS['TEST_VAR'] . "\n";
echo getenv('ANOTHER_VAR') . "\n";
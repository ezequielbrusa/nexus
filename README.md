# Nexus
- Package to help with reading from `.env` files and injecting environment variables into your application.

## Description
- This package is a simple way to load environment variables from a `.env` file into your application. It is a simple package that is easy to use and does not require any configuration.

## Features
- Load environment variables from a `.env` file into your application.
- Access environment variables using `getenv()`, `$_ENV`, or `$GLOBALS`.
- No configuration required.
- No dependencies.
- Lightweight.
- Easy to use.
- Works with PHP 7.4 and above.
- Works with any PHP framework, library, or application.

## Installation
```bash
composer require josegarcia/nexus
```

## Usage
```php
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
```


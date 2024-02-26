<?php

namespace Garcia;

use Exception;

class Nexus
{
    /**
     * Load environment variables from .env file
     *
     * @param string $filePath - Path to .env file
     * @throws Exception
     */
    public static function load(string $filePath = '.env'): void
    {
        if (!file_exists($filePath)) {
            throw new Exception('.env file not found.');
        }

        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        self::setEnv($lines);
    }

    /**
     * Set environment variables
     *
     * @param array $lines - Array of lines from .env file.
     */
    private static function setEnv(array $lines): void
    {
        foreach ($lines as  $line) {
            // Ignore comments and invalid lines
            if (strpos($line, '#') === 0 || strpos($line, '=') === false) {
                continue;
            }

            // Split key and value
            list($key, $value) = explode('=', $line, 2);

            // Remove quotes
            $key = trim($key);
            $value = trim($value);

            // Inject into $GLOBALS
            $GLOBALS[$key] = $value;

            // Inject into $_ENV
            putenv("$key=$value");
            $_ENV[$key] = $value;
        }
    }
}

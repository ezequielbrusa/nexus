<?php

namespace test\unit;

use Exception;
use Garcia\Nexus;
use PHPUnit\Framework\TestCase;

class NexusTest extends TestCase
{
    /**
     * Test loading environment variables from .env file
     * @throws Exception
     */
    public function testLoadEnvFile(): void
    {
        $filePath = __DIR__ . '/.env'; // Assuming .env is present for testing purposes

        // Create a temporary .env file for testing
        file_put_contents($filePath, "TEST_VAR=123\nANOTHER_VAR=abc");

        // Load the .env file
        Nexus::load($filePath);

        // Check if environment variables are set
        $this->assertEquals('123', getenv('TEST_VAR'));
        $this->assertEquals('123', $_ENV['TEST_VAR']);
        $this->assertEquals('123', $GLOBALS['TEST_VAR']);

        $this->assertEquals('abc', getenv('ANOTHER_VAR'));
        $this->assertEquals('abc', $_ENV['ANOTHER_VAR']);
        $this->assertEquals('abc', $GLOBALS['ANOTHER_VAR']);

        // Clean up: Delete the temporary .env file
        unlink($filePath);
    }

    /**
     * Test loading environment variables from non-existing .env file
     * @throws Exception
     */
    public function testLoadEnvFileNotFound(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('.env file not found.');

        // Try to load a non-existing .env file
        Nexus::load('.env_non_existing');
    }

    // Test if the values that we get back from the .env file have the " or ' remove from them
    public function testEnvValues()
    {
        $filePath = __DIR__ . '/.env'; // Assuming .env is present for testing purposes

        // Create a temporary .env file for testing
        file_put_contents($filePath, "TEST_VAR='123'\nANOTHER_VAR=\"abc\"");

        // Load the .env file
        Nexus::load($filePath);

        // Check if environment variables are set
        $this->assertEquals('123', getenv('TEST_VAR'));
        $this->assertEquals('123', $_ENV['TEST_VAR']);
        $this->assertEquals('123', $GLOBALS['TEST_VAR']);

        $this->assertEquals('abc', getenv('ANOTHER_VAR'));
        $this->assertEquals('abc', $_ENV['ANOTHER_VAR']);
        $this->assertEquals('abc', $GLOBALS['ANOTHER_VAR']);

        // Clean up: Delete the temporary .env file
        unlink($filePath);
    }
}
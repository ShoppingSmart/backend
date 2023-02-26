<?php

use Framework\Config\ConfigHelper;
use Framework\Config\Env;

/**
 * Returns the full path to a file within the project's "database" directory.
 *
 * @param string $filename The name of the file to locate.
 * @return string The full path to the file.
 */
function database_path(string $filename = ''): string
{
    return __DIR__ . '/database/' . $filename;
}

/**
 * Returns the full path to a file within the project's "database" directory.
 *
 * @param string $filename The name of the file to locate.
 * @return string The full path to the file.
 */
function root_path(string $filename = ''): string
{
    if (php_sapi_name() === 'cli') {
        return __DIR__ . '/' . $filename;
    } else {
        return dirname($_SERVER['DOCUMENT_ROOT']) . '/' . $filename;
    }
}

/**
 * Returns the full path to a file within the project's "database" directory.
 *
 * @param string $filename The name of the file to locate.
 * @return string The full path to the file.
 */
function config_path(string $filename = ''): string
{
    return __DIR__ . '/config/' . $filename;
}

/**
 * Returns the full path to a file within the project's "routes" directory.
 *
 * @param string $filename The name of the file to locate.
 * @return string The full path to the file.
 */
function routes_path(string $filename = ''): string
{
    return __DIR__ . '/routes/' . $filename;
}

/**
 * Dump a variable or set of variables and end the script execution.
 *
 * @param mixed ...$args The variable(s) to dump.
 * @return void
 */
function dd(...$args): void
{
    foreach ($args as $arg) {
        var_dump($arg);
    }

    die();
}

if (!function_exists('config')) {
    /**
     * Get the specified configuration value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param  array|string|null  $key
     * @param  mixed  $default
     * @return mixed
     */
    function config($key = null, $default = null): mixed
    {
        $config = ConfigHelper::create()->read();

        $search = [];

        foreach (explode(".", $key) as $index) {
            $search = empty($search) ? $config[$index] : $search[$index];
        }

        if (is_null($search) || empty($search)) {
            return $default;
        }

        return $search;
    }
}

if (!function_exists('env')) {
    /**
     * Gets the value of an environment variable.
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    function env($key, $default = null): mixed
    {
        $env = Env::create()->read('.env');

        return $env[$key] ?? $default ?? null;
    }
}

<?php

/**
 * Returns the full path to a file within the project's "database" directory.
 *
 * @param string $filename The name of the file to locate.
 * @return string The full path to the file.
 */
function database_path(string $filename): string
{
    return __DIR__ . '/database/' . $filename;
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

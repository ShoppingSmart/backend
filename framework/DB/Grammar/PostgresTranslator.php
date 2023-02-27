<?php

namespace Framework\DB\Grammar;

class PostgresTranslator implements Translator
{
    /**
     * Get an Instance.
     *
     * @param void
     */
    public static function create(): Self
    {
        return new Self();
    }

    public function createTable(array $definition): string
    {
        $payload = [];

        foreach ($definition['schema'] as $schema) {
            $payload[] = $schema['name'] . ' ' . $schema['definition'];
        }

        return 'CREATE TABLE ' . $definition['name'] . '(' . implode(',', $payload) . ')' . ';';
    }
}

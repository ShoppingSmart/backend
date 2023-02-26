<?php

declare(strict_types=1);

namespace Framework\DB;

use Exception;
use Framework\DB\Grammar\PostgresTranslator;
use PDO;

final class Query
{
    /**
     * Constructor Method.
     *
     * @param void
     */
    private function __construct()
    {
        //
    }

    /**
     * Destruct Method.
     *
     * @param void
     */
    public function __destruct()
    {
        //
    }

    /**
     * Get an Instance.
     *
     * @param void
     */
    public static function create(): Self
    {
        return new Self();
    }

    /**
     * Get an Instance.
     *
     * @param void
     */
    public function refreshDatabase(): Self
    {
        $stmt = $this->createConnection();

        $stmt->exec('DROP SCHEMA public CASCADE;');
        $stmt->exec('CREATE SCHEMA public;');

        return new Self();
    }

    public function createTable(array $definition)
    {
        $this->createConnection()->exec(
            PostgresTranslator::create()->createTable($definition)
        );
    }

    /**
     * Método responsável por realizar a consulta ao banco de dados e retornar um objeto de dados.
     */
    public function find(array $standard = []): object
    {
        $stmt = $this->createConnection();

        $fields = implode(', ', $standard["fields"]);

        $querySQL = "SELECT {$fields} FROM {$standard["table"]}";

        $stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        try {
            $sql = $stmt->prepare($querySQL);

            $sql->execute();
        } catch (Exception $e) {
            DB::log($e->getMessage(), DB::DEVELOPMENT_ERROR);

            return (object) [];
        }

        return (object) $sql->fetchAll(PDO::FETCH_OBJ);
    }

    public function createConnection(): PDO
    {
        try {
            return DB::create()
                ->configure([
                    'host' => config('database.connections.pgsql.host'),
                    'port' => config('database.connections.pgsql.port'),
                    'user' => config('database.connections.pgsql.username'),
                    'pass' => config('database.connections.pgsql.password'),
                    'name' => config('database.connections.pgsql.database')
                ])
                ->connect();
        } catch (Exception $e) {
            DB::log($e->getMessage(), DB::DEVELOPMENT_ERROR);

            throw $e;
        }
    }
}

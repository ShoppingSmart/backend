<?php

namespace App\Models;

use Framework\DB\Query;
use PDO;

/**
 * A base class for all models.
 */
class Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected string $table;

    /**
     * A PDO connection object.
     *
     * @var PDO
     */
    protected PDO $connection;

    public function __construct()
    {
        $this->boot();
    }

    protected function boot()
    {
        $this->connection = Query::create()->createConnection();
    }

    public function all()
    {
        $query = "SELECT * FROM $this->table";
        $result = $this->connection->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function newModelInstance(): Self
    {
        return new static();
    }

    public function find(int $id)
    {
        $query = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function where(string $field, string $value)
    {
        $query = "SELECT * FROM $this->table WHERE $field = :value";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":value", $value, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $data = [])
    {
        $keys = array_keys($data);
        $columns = implode(",", $keys);
        $values = ":" . implode(",:", $keys);
        $query = "INSERT INTO $this->table ($columns) VALUES ($values)";
        $stmt = $this->connection->prepare($query);
        $stmt->execute($data);
        return $this->connection->lastInsertId();
    }

    public function update(int $id, array $data = [])
    {
        $set = [];
        foreach ($data as $key => $value) {
            $set[] = "$key = :$key";
        }
        $set = implode(",", $set);
        $query = "UPDATE $this->table SET $set WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute($data);
        return $stmt->rowCount();
    }

    public function delete(int $id)
    {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
}

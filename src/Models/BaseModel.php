<?php

namespace Motork\Models;


use PDO;

class BaseModel
{
    protected $pdo;

    protected $table;

    /**
     * BaseModel constructor.
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->pdo = $connection;
    }

    /**
     * Select all records from a database table.
     */
    public function selectAll() : array
    {
        $statement = $this->pdo->prepare("select * from {$this->table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Insert a record into a table.
     *
     * @param  array $parameters
     * @return bool
     * @throws \Exception
     */
    public function insert(array $parameters) : bool
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $this->table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $res = $statement->execute($parameters);

            return $res;
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

}
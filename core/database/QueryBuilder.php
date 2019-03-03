<?php

namespace App\Core\Database;

use PDO;

class QueryBuilder
{
    /**
     * The PDO instance.
     *
     * @var PDO
     */
    protected $pdo;

    /**
     * Create a new QueryBuilder instance.
     *
     * @param PDO $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Select all records from a database table.
     *
     * @param string $table
     *
     * @return array
     */
    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Select one record from a database table.
     *
     * @param string $table
     * @param string $param
     * @param string $value
     *
     * @return array
     */
    public function selectOne($table, $param, $value)
    {
        $statement = $this->pdo->prepare("select * from {$table} where {$param}={$value}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Update one record from a database table.
     *
     * @param string $table
     * @param array $data
     *
     */
    public function update($table, $id, $data)
    {
        $sqlString = "UPDATE {$table} SET ";
        $counter = 0;
        foreach ($data as $param => $value) {
            if ($counter){
                $sqlString .= ", ";
            }
            $sqlString .= "$param=:$param";
            $counter++;
        }
        $sqlString .= " WHERE id=:id";
        $data['id'] = $id;
        $statement = $this->pdo->prepare($sqlString);
        $statement->execute($data);
    }

    /**
     * Delete one record from a database table.
     *
     * @param string $table
     * @param string $id
     *
     */
    public function delete($table, $id)
    {
        $sql = "DELETE FROM {$table} WHERE id =  :id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute(['id' => $id]);
    }

    /**
     * Insert a record into a table.
     *
     * @param  string $table
     * @param  array  $parameters
     */
    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        $statement = $this->pdo->prepare($sql);
        $statement->execute($parameters);
    }
}

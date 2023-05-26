<?php

class Query
{
    public $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function insert($query)
    {
        $PDOStatement =  $this->connection->prepare($query);
        $PDOStatement->execute();
    }


    public function select($query)
    {
        $PDOStatement =  $this->connection->query($query);
        $PDOStatement->execute();
        $registros = $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
        return $registros;
    }

    public function update($query)
    {
        $PDOStatement = $this->connection->query($query);
        $PDOStatement->execute();
    }

    public function delete($query)
    {
        $PDOStatement = $this->connection->query($query);
        $PDOStatement->execute();
    }
}

<?php

namespace Core;
class Database
{
    public $connection;
    public $statement;
    public function __construct($config,$username,$password)
    {
        $dsn = "mysql:".http_build_query($config,'',";");
        $this->connection = new \PDO($dsn,$username,$password,[
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        ]);
       
    }
    public function query($sql,$params = [])
    {
        $this->statement = $this->connection->prepare($sql);
        $this->statement->execute($params);
        return $this;
    }
    public function find()
    {
        return $this->statement->fetch();
    }
}
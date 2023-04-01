<?php

namespace Core;
use PDO;

class Database {

    protected $conn;
    protected $statement;

    public function __construct($config, $user='root', $pwd='', $options= [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC])
    {
        $dsn = "mysql:" . http_build_query($config, '', ';');

        $this->conn = new PDO($dsn, $user, $pwd, $options);
    }

    public function query($query, $params=[])
    {
        $this->statement=$this->conn->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result=$this->find();
        if (! $result) {
            abort();
        }

        return $result;
    }

    public function findAll()
    {
        return $this->statement->fetchAll();
    }
} 
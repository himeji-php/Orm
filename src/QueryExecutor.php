<?php

declare(strict_types = 1);

namespace Himeji\Orm;

class QueryExecutor
{
    private $connection;

    public function __construct($host, $username, $password, $database, $port = '3306') {
        $this->switchConnection($host, $username, $password, $database, $port);
    }

    public function switchConnection($host, $username, $password, $database, $port) {
        $this->connection = mysqli_connect($host, $username, $password, $database, $port);
    }

    public function execute($command) : bool|\mysqli_result {
        $this->connection->query($command);
    }
}